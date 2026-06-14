<?php
// Loot Monsters - Oldschool MyAAC style
// Lê XMLs em data/monster ou data/monsters e monta tabela de loot por monstro

// Config: caminhos possíveis
$root = dirname(__DIR__, 2); // .../html
$monsterDirs = [
    // Absolutos comuns em Linux
    '/home/nekiro/data/monsters',
    '/home/nekiro/data/monster',
    // Relativos ao webroot atual
    $root . DIRECTORY_SEPARATOR . 'nekiro' . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'monsters',
    $root . DIRECTORY_SEPARATOR . 'nekiro' . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'monster',
    $root . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'monsters',
    $root . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'monster'
];
$itemsXmlCandidates = [
    // Absoluto comum em Linux
    '/home/nekiro/data/items/items.xml',
    // Relativos ao webroot
    $root . DIRECTORY_SEPARATOR . 'nekiro' . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'items' . DIRECTORY_SEPARATOR . 'items.xml',
    $root . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'items' . DIRECTORY_SEPARATOR . 'items.xml'
];

function firstExistingPath(array $paths){
    foreach ($paths as $p){ if (is_file($p) || is_dir($p)) return $p; }
    return '';
}

function gatherFilesRecursively($dir, $ext = 'xml'){
    $out = [];
    if (!is_dir($dir)) return $out;
    $it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS));
    foreach ($it as $file){
        if (!$file->isFile()) continue;
        if (strtolower($file->getExtension()) !== strtolower($ext)) continue;
        $out[] = $file->getPathname();
    }
    return $out;
}

function loadItemsMap($itemsXml){
    $map = [];
    if (!$itemsXml || !is_file($itemsXml)) return $map;
    $doc = @simplexml_load_file($itemsXml);
    if (!$doc) return $map;
    foreach ($doc->item as $item){
        $id = (string)($item['id'] ?? '');
        $name = (string)($item['name'] ?? '');
        if ($id === '' || $name === '') continue;
        $map[strtolower($name)] = [
            'id' => $id,
            'name' => (string)$name,
        ];
    }
    return $map;
}

function loadItemsDetails($itemsXml){
    $byId = [];
    $byNameLower = [];
    if (!$itemsXml || !is_file($itemsXml)) return [$byId, $byNameLower];
    $doc = @simplexml_load_file($itemsXml);
    if (!$doc) return [$byId, $byNameLower];
    foreach ($doc->item as $item){
        $id = (string)($item['id'] ?? '');
        $name = (string)($item['name'] ?? '');
        if ($id === '' || $name === '') continue;
        $article = (string)($item['article'] ?? 'a');
        $data = [
            'id' => $id,
            'name' => $name,
            'article' => $article,
            'description' => '',
            'weight' => 0,
            'attack' => 0,
            'defense' => 0,
            'armor' => 0,
            'range' => 0,
            'protection' => [],
            'charges' => 0,
            'containerSize' => 0,
        ];
        if (isset($item->attribute)){
            foreach ($item->attribute as $attr){
                $attrData = (array)$attr->attributes();
                $key = (string)($attrData['@attributes']['key'] ?? '');
                $value = (string)($attrData['@attributes']['value'] ?? '');
                switch ($key){
                    case 'description': $data['description'] = $value; break;
                    case 'weight': $data['weight'] = (int)$value; break;
                    case 'attack': $data['attack'] = (int)$value; break;
                    case 'defense': $data['defense'] = (int)$value; break;
                    case 'armor': $data['armor'] = (int)$value; break;
                    case 'range': $data['range'] = (int)$value; break;
                    case 'charges': $data['charges'] = (int)$value; break;
                    case 'containerSize': $data['containerSize'] = (int)$value; break;
                }
                if (strpos($key, 'absorbPercent') === 0){
                    $elem = strtolower(str_replace('absorbPercent', '', $key));
                    $data['protection'][$elem] = (int)$value;
                }
            }
        }
        $byId[$id] = $data;
        $byNameLower[strtolower($name)] = $data;
    }
    return [$byId, $byNameLower];
}

function parseMonsterFile($path){
    $doc = @simplexml_load_file($path);
    if (!$doc) return null;
    $name = (string)($doc['name'] ?? basename($path));
    $race = (string)($doc['race'] ?? '');
    // Ler loots: OTSBase: <loot><item id=".." name=".." chance=".."/>
    $loots = [];
    if ($doc->loot){
        foreach ($doc->loot->children() as $node){
            $nName = (string)($node['name'] ?? '');
            $nId   = (string)($node['id'] ?? '');
            $chance = (string)($node['chance'] ?? $node['chance1'] ?? '');
            $countmax = (string)($node['countmax'] ?? $node['count'] ?? '');
            if ($nName === '' && $nId === '') continue;
            $loots[] = [
                'id' => $nId,
                'name' => $nName,
                'chance' => $chance,
                'countmax' => $countmax,
            ];
        }
    }
    // Deduplicar por id (se houver) ou por nome em minúsculo
    if (!empty($loots)){
        $seen = [];
        $unique = [];
        foreach ($loots as $it){
            $key = ($it['id'] !== '') ? ('id:' . $it['id']) : ('name:' . strtolower($it['name']));
            if (isset($seen[$key])) continue;
            $seen[$key] = true;
            $unique[] = $it;
        }
        $loots = $unique;
    }
    return [
        'name' => $name,
        'race' => $race,
        'loots' => $loots,
        'file' => $path,
    ];
}

// Localizar diretórios/arquivos (aceita override via ?dir=PATH)
$forced = isset($_GET['dir']) ? trim((string)$_GET['dir']) : '';
if ($forced !== '' && is_dir($forced)){
    $monsterDir = $forced;
} else {
    $monsterDir = firstExistingPath($monsterDirs);
}
$itemsXml = firstExistingPath($itemsXmlCandidates);
$itemsMap = loadItemsMap($itemsXml);
$itemsById = [];
$itemsByNameLower = [];
list($itemsById, $itemsByNameLower) = loadItemsDetails($itemsXml);

$taskLuaCandidates = [
    '/home/nekiro/data/scripts/taskSystem.lua',
    $root . DIRECTORY_SEPARATOR . 'nekiro' . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'scripts' . DIRECTORY_SEPARATOR . 'taskSystem.lua',
    $root . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'scripts' . DIRECTORY_SEPARATOR . 'taskSystem.lua'
];

function loadTaskNames($file){
    $set = [];
    if (!$file || !is_file($file)) return $set;
    $txt = @file_get_contents($file);
    if ($txt === false) return $set;
    if (preg_match_all('~nameOfTheTask\s*=\s*"([^"]+)"~i', $txt, $m)){
        foreach ($m[1] as $name){
            $set[strtolower(trim($name))] = true;
        }
    }
    return $set;
}

$tasksLua = firstExistingPath($taskLuaCandidates);
$taskNamesLower = loadTaskNames($tasksLua);

$monsterFiles = $monsterDir ? gatherFilesRecursively($monsterDir, 'xml') : [];
$monsters = [];
foreach ($monsterFiles as $mf){
    $parsed = parseMonsterFile($mf);
    if ($parsed) $monsters[] = $parsed;
}

// Filtrar apenas monstros presentes nas tasks (se houver lista)
if (!empty($taskNamesLower)){
    $monsters = array_values(array_filter($monsters, function($m) use ($taskNamesLower){
        return isset($taskNamesLower[strtolower($m['name'])]);
    }));
}
// Deduplicar monstros por nome (case-insensitive)
if (!empty($monsters)){
    $seen = [];
    $uniq = [];
    foreach ($monsters as $m){
        $k = strtolower(trim($m['name']));
        if (isset($seen[$k])) continue;
        $seen[$k] = true;
        $uniq[] = $m;
    }
    $monsters = $uniq;
}

// Filtros simples
$q = isset($_GET['q']) ? trim((string)$_GET['q']) : '';
if ($q !== ''){
    $qLower = strtolower($q);
    $monsters = array_values(array_filter($monsters, function($m) use ($qLower){
        return (strpos(strtolower($m['name']), $qLower) !== false) || (strpos(strtolower($m['race']), $qLower) !== false);
    }));
}

// Ordenar por nome
usort($monsters, function($a,$b){ return strcasecmp($a['name'],$b['name']); });

function tibiawikiCandidatesForItem($name, $id){
    $sources = [];
    $title = trim((string)$name);
    if ($title !== ''){
        $titleCase = ucwords(strtolower($title));
        $under = str_replace(' ', '_', $titleCase);
        $sources[] = 'https://www.tibiawiki.com.br/wiki/Special:FilePath/' . $under . '.gif';
        $sources[] = 'https://www.tibiawiki.com.br/wiki/Special:FilePath/' . $under . '.png';
    }
    // Fallback locais por ID
    if ($id !== ''){
        $sources[] = 'images/items_shop/items/' . $id . '.png';
        $sources[] = 'images/items_shop/items/' . $id . '.gif';
    }
    return array_values(array_unique(array_filter($sources)));
}

function monsterImageCandidates($name){
    $cands = [];
    $raw = trim((string)$name);
    if ($raw === '') return $cands;
    $variants = [];
    $variants[] = $raw; // como vem do XML (case original)
    $variants[] = str_replace(' ', '_', $raw);
    $title = ucwords(strtolower($raw));
    $variants[] = $title;
    $variants[] = str_replace(' ', '_', $title);
    $lower = strtolower($raw);
    $variants[] = $lower;
    $variants[] = str_replace(' ', '_', $lower);
    $variants = array_values(array_unique($variants));
    foreach ($variants as $base){
        $cands[] = 'images/monsters/' . $base . '.gif';
        $cands[] = 'images/monsters/' . $base . '.png';
    }
    return array_values(array_unique($cands));
}

function tibiawikiCandidatesForMonster($name){
    $cands = [];
    $title = ucwords(strtolower(trim((string)$name)));
    if ($title === '') return $cands;
    $under = str_replace(' ', '_', $title);
    $cands[] = 'https://www.tibiawiki.com.br/wiki/Special:FilePath/' . $under . '.gif';
    $cands[] = 'https://www.tibiawiki.com.br/wiki/Special:FilePath/' . $under . '.png';
    return $cands;
}

function formatWeightOz($grams){
    if ($grams <= 0) return '';
    $oz = $grams / 100.0;
    return number_format($oz, 2) . ' oz.';
}

function buildItemHover($name, $id, $itemsById, $itemsByNameLower){
    $data = null;
    if ($id !== '' && isset($itemsById[$id])) $data = $itemsById[$id];
    if (!$data && $name !== '' && isset($itemsByNameLower[strtolower($name)])) $data = $itemsByNameLower[strtolower($name)];
    if (!$data){
        return 'You see ' . ($name !== '' ? $name : ('item #' . $id)) . '.';
    }
    $article = $data['article'] ?: 'a';
    $hover = 'You see ' . $article . ' ' . $data['name'];
    $stats = [];
    if ($data['attack'] > 0) $stats[] = 'Atk:' . $data['attack'];
    if ($data['defense'] > 0) $stats[] = 'Def:' . $data['defense'];
    if ($data['armor'] > 0) $stats[] = 'Arm:' . $data['armor'];
    if ($data['range'] > 0) $stats[] = 'Range:' . $data['range'];
    if (!empty($stats)) $hover .= ' (' . implode(', ', $stats) . ')';
    $hover .= '.';
    if (!empty($data['description'])) $hover .= "\n" . $data['description'];
    $w = formatWeightOz((int)$data['weight']);
    if ($w !== '') $hover .= "\nIt weighs " . $w;
    if (!empty($data['protection'])){
        $prot = [];
        foreach ($data['protection'] as $elem => $val){ $prot[] = $elem . ' +' . (int)$val . '%'; }
        if (!empty($prot)) $hover .= "\nProtection: " . implode(', ', $prot);
    }
    if ((int)$data['charges'] > 0) $hover .= "\nCharges: " . (int)$data['charges'];
    if ((int)$data['containerSize'] > 0) $hover .= "\nVol: " . (int)$data['containerSize'];
    return $hover;
}

function displayItemCell($loot, $itemsMap, $itemsById, $itemsByNameLower){
    $name = (string)($loot['name'] ?? '');
    $id = (string)($loot['id'] ?? '');
    if ($id === '' && $name !== ''){
        $m = $itemsMap[strtolower($name)] ?? null;
        if ($m) $id = (string)$m['id'];
    } elseif ($name === '' && $id !== ''){
        // tentar descobrir nome pelo id (preferir itemsById; fallback: itemsMap)
        if (isset($itemsById[$id])) {
            $name = (string)$itemsById[$id]['name'];
        } else {
            foreach ($itemsMap as $n => $info){
                if ((string)$info['id'] === (string)$id){ $name = $info['name']; break; }
            }
        }
    }
    $icons = tibiawikiCandidatesForItem($name, $id);
    $count = (string)($loot['countmax'] ?? '');
    $tip = buildItemHover($name, $id, $itemsById, $itemsByNameLower);
    if ($count !== ''){ $tip .= "\nMax: " . $count; }
    $first = htmlspecialchars($icons[0] ?? '');
    $srcsAttr = htmlspecialchars(implode('|', $icons));
    $onerr = "var s=(this.getAttribute('data-srcs')||'').split('|');var i=parseInt(this.getAttribute('data-i')||'0',10);if(i+1<s.length){this.setAttribute('data-i', (i+1)); this.src=s[i+1];}else{this.style.display='none';}";
    echo '<div class="image-wrapper" data-name="'. htmlspecialchars(strtolower($name)) .'">';
    echo '<img src="'. $first .'" alt="icon" class="item-image" data-srcs="'. $srcsAttr .'" data-i="0" style="object-fit:contain;image-rendering:pixelated;" onerror="'. $onerr .'">';
    echo '<div class="info-modal">'. nl2br(htmlspecialchars($tip)) .'</div>';
    echo '</div>';
}
?>

<div id="content">
    <div style="max-width:800px;margin:0 auto 8px;font-family:Verdana,Tahoma,Helvetica,sans-serif;">
        <h1 style="text-align:center;color:#333333;font-size:16px;margin:8px 0;">
            <img src="/images/items_shop/items/6010.png" style="vertical-align:middle;image-rendering:pixelated;width:22px;height:22px;margin-right:6px;"> LOOT MONSTERS <img src="/images/items_shop/items/6010.png" style="vertical-align:middle;image-rendering:pixelated;width:22px;height:22px;margin-left:6px;">
        </h1>
        <div style="height:2px;background:#4a4a45;box-shadow:#000 0 0 4px;opacity:.6;"></div>
    </div>

    <style>
        .lm-wrap { max-width: 1100px; margin: 0 auto; }
        .lm-toolbar { display:flex; gap:8px; align-items:center; justify-content:center; background:#f1e0c6; border:2px solid #d4c0a1; border-radius:8px; padding:10px; margin-bottom:12px; }
        .lm-toolbar input { min-width:260px; width: 40%; padding:8px 10px; background:#fff9ef; border:1px solid #d4c0a1; border-radius:4px; color:#5a2800; }
        .lm-toolbar .hint { font-size:12px; color:#5a2800; }
        .lm-empty { text-align:center; color:#666; font-style:italic; padding:10px; }
        .lm-table { width:100%; border-spacing:1px; font-family: Verdana, Tahoma, Helvetica, sans-serif; font-size:13px; box-shadow:#000000 1px 1px 10px; border: 1px solid #c7b48a; }
        .lm-th { background:#4a4a45; color:#fff; text-align:center; padding:6px; }
        .lm-td { padding:8px; vertical-align: top; }
        .lm-row-a { background:#D4C0A1; }
        .lm-row-b { background:#F1E0C6; }
        .lm-name { font-weight:bold; color:#5a2800; margin-top:2px; }
        .lm-race { color:#7a4800; font-size:12px; }
        .lm-loots { display:flex; flex-wrap:wrap; gap:4px; align-items:center; justify-content:center; }
        .lm-more { margin-top:6px; text-align:center; }
        .lm-btn { background:#d4c0a1; border:1px solid #8B4513; padding:4px 8px; cursor:pointer; border-radius:4px; color:#5a2800; font-weight:bold; }
        /* Tooltip estilo items.php */
        .image-wrapper { position: relative; display: inline-block; padding: 3px; background: #ece5d8; border: 2px solid #d36e0f; border-radius: 5px; transition: transform 0.2s; box-shadow: 2px 2px 5px rgba(0,0,0,0.2); }
        .image-wrapper:hover { transform: scale(1.05); box-shadow: 0 4px 8px rgba(0,0,0,0.2); }
        .item-image { width: 28px; height: 28px; cursor: pointer; }
        .info-modal { position: absolute; bottom: 110%; left: 50%; transform: translateX(-50%); background-color: rgba(90, 40, 0, 0.95); color: #fff9ef; padding: 10px 12px; border-radius: 6px; font-size: 11px; white-space: nowrap; opacity: 0; pointer-events: none; transition: opacity 0.3s ease; z-index: 1000; min-width: 200px; text-align: left; }
    </style>

    <div class="lm-wrap">
        <div class="lm-toolbar">
            <input type="text" id="lm-search" placeholder="Buscar por nome ou raça..." value="<?= htmlspecialchars($q) ?>" />
            <button type="button" class="lm-btn" id="lm-expand-all">Expand all</button>
            <button type="button" class="lm-btn" id="lm-collapse-all">Collapse all</button>
        </div>

        <?php if (empty($monsters)): ?>
            <div class="lm-empty">
                <?php if (!empty($taskNamesLower)): ?>
                    Nenhum monstro das tasks foi encontrado nos diretórios informados. Confirme o caminho dos XMLs.
                <?php else: ?>
                    Nenhuma task foi carregada. Verifique o arquivo taskSystem.lua em /home/nekiro/data/scripts ou nekiro/data/scripts.
                <?php endif; ?>
                <br>Diretórios tentados: /home/nekiro/data/monsters, /home/nekiro/data/monster, nekiro/data/monsters, nekiro/data/monster, data/monsters, data/monster.
                <br>Você pode forçar um caminho usando ?dir=/caminho/absoluto.
            </div>
        <?php else: ?>
            <table class="lm-table" id="lm-table" cellspacing="1" cellpadding="0">
                <thead>
                    <tr>
                        <th class="lm-th">Monster</th>
                        <th class="lm-th">Race</th>
                        <th class="lm-th">Loot</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $alt=false; foreach ($monsters as $idx => $m): $alt=!$alt; $rowClass = $alt ? 'lm-row-a' : 'lm-row-b'; ?>
                        <tr class="<?= $rowClass ?> lm-row" data-name="<?= htmlspecialchars(strtolower($m['name'])) ?>" data-race="<?= htmlspecialchars(strtolower($m['race'])) ?>">
                            <td class="lm-td" style="text-align:center;">
                                <?php
                                    $mwiki = tibiawikiCandidatesForMonster($m['name']);
                                    $mlocal = monsterImageCandidates($m['name']);
                                    $micons = array_values(array_unique(array_merge($mwiki, $mlocal)));
                                    $mfirst = htmlspecialchars($micons[0] ?? '');
                                    $msrcs = htmlspecialchars(implode('|', $micons));
                                    $displayName = ucwords(strtolower($m['name']));
                                ?>
                                <?php if (!empty($micons)): ?>
                                    <img src="<?= $mfirst ?>" alt="monster" data-srcs="<?= $msrcs ?>" data-i="0" style="width:34px;height:34px;object-fit:contain;image-rendering:pixelated;margin-bottom:4px;" onerror="var s=(this.getAttribute('data-srcs')||'').split('|');var i=parseInt(this.getAttribute('data-i')||'0',10);if(i+1<s.length){this.setAttribute('data-i', (i+1)); this.src=s[i+1];}else{this.style.display='none';}">
                                <?php endif; ?>
                                <div class="lm-name"><?= htmlspecialchars($displayName) ?></div>
                            </td>
                            <td class="lm-td" style="text-align:center;">
                                <span class="lm-race"><?= htmlspecialchars($m['race'] ?: '—') ?></span>
                            </td>
                            <td class="lm-td">
                                <?php $maxVisible = 12; $totalLoot = count($m['loots']); $uid = 'loot_' . $idx; ?>
                                <div class="lm-loots" id="<?= $uid ?>">
                                    <?php if ($totalLoot === 0): ?>
                                        <div class="lm-empty">Sem loot declarado.</div>
                                    <?php else: ?>
                                        <?php $i=0; foreach ($m['loots'] as $loot): $i++; if ($i <= $maxVisible) { displayItemCell($loot, $itemsMap, $itemsById, $itemsByNameLower); } endforeach; ?>
                                        <?php if ($totalLoot > $maxVisible): ?>
                                            <span class="lm-extra" style="display:none;">
                                                <?php $j=0; foreach ($m['loots'] as $loot): $j++; if ($j > $maxVisible) { displayItemCell($loot, $itemsMap, $itemsById, $itemsByNameLower); } endforeach; ?>
                                            </span>
                                            <div class="lm-more">
                                                <button class="lm-btn" onclick="toggleLoot('<?= $uid ?>', this)">Show more (<?= ($totalLoot - $maxVisible) ?>)</button>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

    <script>
    (function(){
        var input = document.getElementById('lm-search');
        if (!input) return;
        function apply(){
            var q = (input.value || '').trim().toLowerCase();
            var rows = document.querySelectorAll('#lm-table .lm-row');
            rows.forEach(function(r){
                var name = (r.getAttribute('data-name')||'');
                var race = (r.getAttribute('data-race')||'');
                var ok = !q || name.indexOf(q) !== -1 || race.indexOf(q) !== -1;
                r.style.display = ok ? '' : 'none';
            });
        }
        input.addEventListener('input', apply);
        // Expand/Collapse all handlers
        var btnExpandAll = document.getElementById('lm-expand-all');
        var btnCollapseAll = document.getElementById('lm-collapse-all');
        function setAll(expand){
            document.querySelectorAll('.lm-loots').forEach(function(wrap){
                var extra = wrap.querySelector('.lm-extra');
                var btn = wrap.parentElement.querySelector('.lm-more .lm-btn');
                if (!extra) return;
                if (expand){
                    extra.style.display = '';
                    if (btn) btn.textContent = (btn.textContent || '').replace('Show more', 'Show less');
                } else {
                    extra.style.display = 'none';
                    if (btn) btn.textContent = (btn.textContent || '').replace('Show less', 'Show more');
                }
            });
        }
        if (btnExpandAll) btnExpandAll.addEventListener('click', function(){ setAll(true); });
        if (btnCollapseAll) btnCollapseAll.addEventListener('click', function(){ setAll(false); });
        // Hover atrasado similar ao items.php
        function bindHover(wrapper){
            var image = wrapper.querySelector('.item-image');
            var modal = wrapper.querySelector('.info-modal');
            if (!image || !modal) return;
            var hoverTimeout;
            wrapper.addEventListener('mouseenter', function(){
                hoverTimeout = setTimeout(function(){ modal.style.opacity = '1'; }, 400);
            });
            wrapper.addEventListener('mouseleave', function(){
                clearTimeout(hoverTimeout);
                modal.style.opacity = '0';
            });
        }
        document.querySelectorAll('.image-wrapper').forEach(bindHover);
        window.toggleLoot = function(id, btn){
            var wrap = document.getElementById(id);
            if (!wrap) return;
            var extra = wrap.querySelector('.lm-extra');
            if (!extra) return;
            var visible = extra.style.display !== 'none';
            if (visible){
                extra.style.display = 'none';
                if (btn) btn.textContent = btn.textContent.replace('Show less', 'Show more');
            } else {
                extra.style.display = '';
                if (btn) btn.textContent = btn.textContent.replace('Show more', 'Show less');
            }
        };
    })();
    </script>

    <div style="clear:both;"></div>
    <br>
    <img src="templates/tibiana/images/line_body.gif" align="center" height="7" width="100%">
    <img src="templates/tibiana/images/blank.gif">
    <div align="center" style="font-face:verdana; font-size:10px"></div>
</div>


