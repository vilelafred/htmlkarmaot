<?php
require_once __DIR__ . '/monster_parser.php';
require_once __DIR__ . '/item_parser.php';

// Carrega dados do cache
$monsterParser = new MonsterParser();
$itemParser = new ItemParser();

$monsters = $monsterParser->loadFromCache();
$items = $itemParser->loadFromCache();

// Função para formatar chance de loot
function formatChance($chance) {
    if ($chance >= 100000) return "100%";
    if ($chance >= 10000) return number_format($chance / 1000, 1) . "%";
    if ($chance >= 1000) return number_format($chance / 1000, 2) . "%";
    return "0." . str_pad($chance, 3, '0', STR_PAD_LEFT) . "%";
}

// Função para obter cor baseada na experiência
function getExpColor($exp) {
    if ($exp >= 5000) return '#FF0000'; // Vermelho - muito perigoso
    if ($exp >= 2000) return '#FF6600'; // Laranja - perigoso  
    if ($exp >= 500) return '#FFAA00';  // Amarelo - moderado
    if ($exp >= 100) return '#00AA00';  // Verde - fácil
    return '#00FF00'; // Verde claro - muito fácil
}

// Função para obter sprite do monstro pelo nome
function getMonsterSprite($monsterName) {
    // Converter nome para formato de arquivo (minúsculo, espaços = underscores)
    $fileName = strtolower(str_replace(' ', '', $monsterName));
    $spritePath = "/images/monsters/{$fileName}.gif";
    
    // Verifica se o arquivo existe
    if (file_exists($_SERVER['DOCUMENT_ROOT'] . $spritePath)) {
        return $spritePath;
    }
    
    // Fallback: busca por nome original
    $originalPath = "/images/monsters/{$monsterName}.gif";
    if (file_exists($_SERVER['DOCUMENT_ROOT'] . $originalPath)) {
        return $originalPath;
    }
    
    // Se não encontrar, retorna imagem padrão
    return "/images/monsters/empty.gif";
}

// Função para obter sprite do item
function getItemSprite($itemId) {
    $spritePath = "/images/items/{$itemId}.gif";
    if (file_exists($_SERVER['DOCUMENT_ROOT'] . $spritePath)) {
        return $spritePath;
    }
    return "/images/items/empty.gif";
}

// Parâmetros de busca e filtro  
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$expMin = isset($_GET['exp_min']) ? (int)$_GET['exp_min'] : 0;
$expMax = isset($_GET['exp_max']) ? (int)$_GET['exp_max'] : 99999;
$sortBy = isset($_GET['sort']) ? $_GET['sort'] : 'name';
$sortOrder = isset($_GET['order']) ? $_GET['order'] : 'asc';

// Verificar se os dados foram carregados
if (empty($monsters)) {
    echo '<div id="content"><h1 style="color: #5a2800; text-align: center;">Error loading creatures data. Please try updating the cache.</h1></div>';
    return;
}

// Filtrar monstros
$filteredMonsters = array_filter($monsters, function($monster) use ($search, $expMin, $expMax) {
    $nameMatch = empty($search) || stripos($monster['name'], $search) !== false;
    $expMatch = $monster['experience'] >= $expMin && $monster['experience'] <= $expMax;
    return $nameMatch && $expMatch;
});

// Ordenar monstros
usort($filteredMonsters, function($a, $b) use ($sortBy, $sortOrder) {
    $result = 0;
    
    switch ($sortBy) {
        case 'name':
            $result = strcasecmp($a['name'], $b['name']);
            break;
        case 'exp':
            $result = $a['experience'] - $b['experience'];
            break;
        case 'hp':
            $result = $a['health']['max'] - $b['health']['max'];
            break;
        case 'speed':
            $result = $a['speed'] - $b['speed'];
            break;
    }
    
    return $sortOrder === 'desc' ? -$result : $result;
});

// Paginação
$perPage = 50;
$page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
$totalMonsters = count($filteredMonsters);
$totalPages = ceil($totalMonsters / $perPage);
$offset = ($page - 1) * $perPage;
$pagedMonsters = array_slice($filteredMonsters, $offset, $perPage);
?>

<style>
        .creatures-table {
            width: 800px;
            border-spacing: 1px;
            font-family: Verdana, Tahoma, Helvetica, sans-serif;
            font-size: 13px;
            box-shadow: #000 1px 1px 10px;
            margin: 0 auto 20px auto;
        }
        .creatures-title {
            background: #4a4a45;
            color: #fff;
            padding: 8px;
            text-align: center;
            font-weight: bold;
        }
        .creatures-header {
            background: #505050;
            color: #efefef;
            font-weight: bold;
            text-align: center;
        }
        .creatures-row {
            background: #d4c0a1;
            text-align: center;
        }
        .creatures-row.alt {
            background: #f1e0c6;
        }
        .creatures-row td {
            padding: 6px;
        }
        .creatures-name {
            text-align: left;
            font-weight: bold;
        }
        .creatures-name a {
            color: #5a2800;
            text-decoration: none;
        }
        .creatures-name a:hover {
            text-decoration: underline;
        }
        .search-table {
            width: 800px;
            border-spacing: 1px;
            font-family: Verdana, Tahoma, Helvetica, sans-serif;
            font-size: 13px;
            box-shadow: #000 1px 1px 10px;
            margin: 0 auto 20px auto;
        }
        .search-table input, .search-table select {
            border: 1px solid #999;
            padding: 2px 4px;
            margin: 2px;
            font-size: 11px;
        }
</style>

<div id="content">
    <p><img style="display:block; margin-left:auto; margin-right:auto;" src="templates/tibiana/images/line_body.gif" width="100%" height="7"></p>

    <!-- Page Title -->
    <table style="font-size:13px; color:#5a2800; margin:10px auto; width:800px; border-spacing:1px; font-family: Verdana, Tahoma, Helvetica, sans-serif; box-shadow:#000 1px 1px 10px;" cellspacing="1" cellpadding="10">
        <tbody>
            <tr style="background-color:#4a4a45;">
                <td style="text-align:center;"><span style="color:#ffffff;"><strong>CREATURES DATABASE</strong></span></td>
            </tr>
        </tbody>
    </table>

    <table style="font-size:13px; color:#5a2800; margin:0 auto 10px; width:800px; border-spacing:1px; font-family: Verdana, Tahoma, Helvetica, sans-serif; box-shadow:#000 1px 1px 10px;" cellspacing="1" cellpadding="10">
        <tbody>
            <tr style="background-color:#d4c0a1;">
                <td style="padding:15px;">
                    <p><strong>Explore all server creatures</strong></p>
                    <p>Browse through <?= count($monsters) ?> creatures with detailed information about HP, experience, speed and loot drops.</p>
                </td>
            </tr>
        </tbody>
    </table>

    <!-- Search Form -->
    <form method="GET">
        <table class="search-table" cellspacing="1" cellpadding="10">
            <tr style="background-color:#d4c0a1;">
                <td>
                    <strong>Search:</strong>
                    <input type="text" name="search" value="<?= htmlspecialchars($search) ?>" placeholder="Creature name..." style="width:150px;">
                    
                    <strong>Min EXP:</strong>
                    <input type="number" name="exp_min" value="<?= $expMin ?>" min="0" max="99999" style="width:60px;">
                    
                    <strong>Max EXP:</strong>
                    <input type="number" name="exp_max" value="<?= $expMax ?>" min="0" max="99999" style="width:60px;">
                    
                    <strong>Sort:</strong>
                    <select name="sort">
                        <option value="name" <?= $sortBy === 'name' ? 'selected' : '' ?>>Name</option>
                        <option value="exp" <?= $sortBy === 'exp' ? 'selected' : '' ?>>Experience</option>
                        <option value="hp" <?= $sortBy === 'hp' ? 'selected' : '' ?>>HP</option>
                        <option value="speed" <?= $sortBy === 'speed' ? 'selected' : '' ?>>Speed</option>
                    </select>
                    
                    <select name="order">
                        <option value="asc" <?= $sortOrder === 'asc' ? 'selected' : '' ?>>Ascending</option>
                        <option value="desc" <?= $sortOrder === 'desc' ? 'selected' : '' ?>>Descending</option>
                    </select>
                    
                    <input type="submit" value="Filter" style="margin-left:10px;">
                    <a href="?subtopic=monsters" style="margin-left:5px; color:#5a2800; text-decoration:none;">[Clear]</a>
                </td>
            </tr>
        </table>
    </form>

    <!-- Creatures List -->
    <table class="creatures-table" cellspacing="1" cellpadding="6">
        <tr><td colspan="5" class="creatures-title">CREATURES LIST (<?= count($pagedMonsters) ?> of <?= $totalMonsters ?> found)</td></tr>
        <tr class="creatures-header">
            <td style="width:150px;"><a href="?<?= http_build_query(array_merge($_GET, ['sort' => 'name', 'order' => $sortBy === 'name' && $sortOrder === 'asc' ? 'desc' : 'asc'])) ?>" style="color:#efefef; text-decoration:none;">Name</a></td>
            <td style="width:80px;"><a href="?<?= http_build_query(array_merge($_GET, ['sort' => 'hp', 'order' => $sortBy === 'hp' && $sortOrder === 'asc' ? 'desc' : 'asc'])) ?>" style="color:#efefef; text-decoration:none;">HP</a></td>
            <td style="width:80px;"><a href="?<?= http_build_query(array_merge($_GET, ['sort' => 'exp', 'order' => $sortBy === 'exp' && $sortOrder === 'asc' ? 'desc' : 'asc'])) ?>" style="color:#efefef; text-decoration:none;">Experience</a></td>
            <td style="width:80px;"><a href="?<?= http_build_query(array_merge($_GET, ['sort' => 'speed', 'order' => $sortBy === 'speed' && $sortOrder === 'asc' ? 'desc' : 'asc'])) ?>" style="color:#efefef; text-decoration:none;">Speed</a></td>
            <td>Main Loot</td>
        </tr>
        <?php 
        $rowCount = 0;
        foreach ($pagedMonsters as $monster): 
            $rowClass = ($rowCount % 2 == 0) ? 'creatures-row' : 'creatures-row alt';
            $rowCount++;
            
            // Get main loot items (most common ones)
            $mainLoot = [];
            
            // Sort loot by chance (highest first)
            $sortedLoot = $monster['loot'];
            usort($sortedLoot, function($a, $b) {
                return $b['chance'] - $a['chance'];
            });
            
            foreach ($sortedLoot as $lootItem) {
                if (count($mainLoot) >= 2) break; // Only show top 2 items
                
                if ($lootItem['chance'] >= 5000) { // 5%+ chance
                    $item = $itemParser->getItemById($lootItem['id'], $items);
                    
                    // Skip unknown items
                    if (strpos($item['name'], 'Unknown Item') === false) {
                        // Clean up item name
                        $itemName = $item['name'];
                        if (strlen($itemName) > 15) {
                            $itemName = substr($itemName, 0, 12) . '...';
                        }
                        $mainLoot[] = $itemName;
                    }
                }
            }
            
            // If no good items found, show generic message
            $lootText = empty($mainLoot) ? 'Various items' : implode(', ', $mainLoot);
        ?>
        <tr class="<?= $rowClass ?>">
            <td class="creatures-name">
                <a href="?subtopic=monster_details&name=<?= urlencode($monster['name']) ?>">
                    <?= htmlspecialchars($monster['name']) ?>
                </a>
            </td>
            <td><?= number_format($monster['health']['max']) ?></td>
            <td><?= number_format($monster['experience']) ?></td>
            <td><?= $monster['speed'] ?></td>
            <td style="font-size:11px;"><?= htmlspecialchars($lootText) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <?php if ($totalPages > 1): ?>
        <table style="font-size:13px; color:#5a2800; margin:10px auto; width:800px; border-spacing:1px; font-family: Verdana, Tahoma, Helvetica, sans-serif; box-shadow:#000 1px 1px 10px;" cellspacing="1" cellpadding="10">
            <tr style="background-color:#d4c0a1;">
                <td style="text-align:center;">
                    <?php if ($page > 1): ?>
                        <a href="?<?= http_build_query(array_merge($_GET, ['page' => 1])) ?>" style="color:#5a2800; text-decoration:none;">&laquo; First</a> |
                        <a href="?<?= http_build_query(array_merge($_GET, ['page' => $page - 1])) ?>" style="color:#5a2800; text-decoration:none;">&lsaquo; Previous</a> |
                    <?php endif; ?>

                    <?php
                    $startPage = max(1, $page - 2);
                    $endPage = min($totalPages, $page + 2);
                    
                    for ($i = $startPage; $i <= $endPage; $i++):
                    ?>
                        <?php if ($i == $page): ?>
                            <strong><?= $i ?></strong>
                        <?php else: ?>
                            <a href="?<?= http_build_query(array_merge($_GET, ['page' => $i])) ?>" style="color:#5a2800; text-decoration:none;"><?= $i ?></a>
                        <?php endif; ?>
                        <?php if ($i < $endPage): ?>|<?php endif; ?>
                    <?php endfor; ?>

                    <?php if ($page < $totalPages): ?>
                        | <a href="?<?= http_build_query(array_merge($_GET, ['page' => $page + 1])) ?>" style="color:#5a2800; text-decoration:none;">Next &rsaquo;</a>
                        | <a href="?<?= http_build_query(array_merge($_GET, ['page' => $totalPages])) ?>" style="color:#5a2800; text-decoration:none;">Last &raquo;</a>
                    <?php endif; ?>
                </td>
            </tr>
        </table>
    <?php endif; ?>

    <p><img style="display:block; margin-left:auto; margin-right:auto;" src="templates/tibiana/images/line_body.gif" width="100%" height="7"></p>
</div>
