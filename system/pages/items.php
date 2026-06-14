<?php
// Script to process items XML and categorize by type
class ItemsProcessor {
    private $xmlPath = '/home/nekiro/data/items/items.xml';
    private $categories = [
        'Amulets' => [],
        'Helmets' => [],
        'Swords' => [],
        'Shields' => [],
        'Armors' => [],
        'Axes' => [],
        'Runes' => [],
        'Scrolls & Tokens' => [],
        'Books' => [],
        'Legs' => [],
        'Clubs' => [],
        'Valuables' => [],
        'Vials' => [],
        'Rings' => [],
        'Boots' => [],
        'Distances' => [],
        'Foods' => []
    ];

    public function processItems() {
        if (!file_exists($this->xmlPath)) {
            return $this->categories;
        }

        $xml = simplexml_load_file($this->xmlPath);
        if (!$xml) {
            return $this->categories;
        }

        foreach ($xml->item as $item) {
            $itemData = $this->parseItem($item);
            if ($itemData) {
                $category = $this->categorizeItem($itemData);
                if ($category && isset($this->categories[$category])) {
                    $this->categories[$category][] = $itemData;
                }
            }
        }

        // Limitar a 100 itens por categoria para performance e ordenar por ID
        foreach ($this->categories as $cat => $items) {
            // Ordenar por ID para ter uma ordem consistente
            usort($items, function($a, $b) {
                return intval($a['id']) - intval($b['id']);
            });
            $this->categories[$cat] = array_slice($items, 0, 100);
        }

        return $this->categories;
    }

    private function parseItem($item) {
        $attributes = (array)$item->attributes();
        if (!isset($attributes['@attributes']['id']) || !isset($attributes['@attributes']['name'])) {
            return null;
        }

        $itemData = [
            'id' => (string)$attributes['@attributes']['id'],
            'name' => (string)$attributes['@attributes']['name'],
            'article' => isset($attributes['@attributes']['article']) ? (string)$attributes['@attributes']['article'] : 'a',
            'description' => '',
            'weight' => 0,
            'attack' => 0,
            'defense' => 0,
            'armor' => 0,
            'range' => 0,
            'weaponType' => '',
            'slotType' => '',
            'protection' => [],
            'charges' => 0,
            'containerSize' => 0,
            'special_attributes' => []
        ];

        // Processar atributos
        if (isset($item->attribute)) {
            foreach ($item->attribute as $attr) {
                $attrData = (array)$attr->attributes();
                $key = (string)$attrData['@attributes']['key'];
                $value = (string)$attrData['@attributes']['value'];

                switch ($key) {
                    case 'description':
                        $itemData['description'] = $value;
                        break;
                    case 'weight':
                        $itemData['weight'] = intval($value);
                        break;
                    case 'attack':
                        $itemData['attack'] = intval($value);
                        break;
                    case 'defense':
                        $itemData['defense'] = intval($value);
                        break;
                    case 'armor':
                        $itemData['armor'] = intval($value);
                        break;
                    case 'range':
                        $itemData['range'] = intval($value);
                        break;
                    case 'weaponType':
                        $itemData['weaponType'] = $value;
                        break;
                    case 'slotType':
                        $itemData['slotType'] = $value;
                        break;
                    case 'charges':
                        $itemData['charges'] = intval($value);
                        break;
                    case 'containerSize':
                        $itemData['containerSize'] = intval($value);
                        break;
                    case 'absorbPercentFire':
                    case 'absorbPercentIce':
                    case 'absorbPercentEarth':
                    case 'absorbPercentEnergy':
                    case 'absorbPercentDeath':
                    case 'absorbPercentHoly':
                    case 'absorbPercentPhysical':
                        $element = str_replace('absorbPercent', '', $key);
                        $itemData['protection'][$element] = intval($value);
                        break;
                    default:
                        if (in_array($key, ['showattributes', 'showcharges', 'showduration', 'stopduration', 'transformEquipTo'])) {
                            $itemData['special_attributes'][$key] = $value;
                        }
                        break;
                }
            }
        }

        return $itemData;
    }

    private function categorizeItem($itemData) {
        // Categorization based on slotType first
        switch ($itemData['slotType']) {
            case 'necklace':
                return 'Amulets';
            case 'head':
                return 'Helmets';
            case 'body':
                return 'Armors';
            case 'legs':
                return 'Legs';
            case 'feet':
                return 'Boots';
            case 'ring':
                return 'Rings';
            case 'shield':
                return 'Shields';
            case 'backpack':
                return 'Containers';
        }

        // Categorization based on weaponType
        switch ($itemData['weaponType']) {
            case 'sword':
                return 'Swords';
            case 'axe':
                return 'Axes';
            case 'club':
                return 'Clubs';
            case 'distance':
                return 'Distances';
        }

        // Categorization based on name
        $name = strtolower($itemData['name']);
        
        // Shields are identified by name, not by slotType in Tibia
        if (strpos($name, 'shield') !== false) {
            return 'Shields';
        }
        
        if (strpos($name, 'rune') !== false) {
            return 'Runes';
        }
        
        if (strpos($name, 'book') !== false || strpos($name, 'spellbook') !== false) {
            return 'Books';
        }
        
        if (strpos($name, 'vial') !== false || strpos($name, 'flask') !== false) {
            return 'Vials';
        }
        
        if (strpos($name, 'scroll') !== false || strpos($name, 'token') !== false) {
            return 'Scrolls & Tokens';
        }

        // Categorization based on specific characteristics
        if ($itemData['containerSize'] > 0) {
            return 'Containers';
        }

        // Valuable items (high weight and no specific function)
        if ($itemData['weight'] > 1000 && !$itemData['attack'] && !$itemData['defense'] && !$itemData['armor']) {
            return 'Valuables';
        }

        // Foods (common food names)
        $foods = ['bread', 'cheese', 'ham', 'meat', 'fish', 'apple', 'banana', 'cherry', 'cookie', 'cake', 'food', 'grape', 'orange'];
        foreach ($foods as $food) {
            if (strpos($name, $food) !== false) {
                return 'Foods';
            }
        }

        // Items within IDs range of coins are valuables
        if (intval($itemData['id']) >= 2148 && intval($itemData['id']) <= 2160) {
            return 'Valuables'; // Crystal coins, gold, etc
        }

        // Other common valuables
        $valuables = ['gold', 'crystal', 'platinum', 'diamond', 'ruby', 'emerald', 'sapphire', 'coin'];
        foreach ($valuables as $valuable) {
            if (strpos($name, $valuable) !== false) {
                return 'Valuables';
            }
        }

        return null; // Unclassified item
    }

    public function generateItemHover($item) {
        $hover = "You see " . $item['article'] . " " . $item['name'];
        
        if ($item['description']) {
            $hover .= "<br>" . $item['description'];
        }

        $stats = [];
        
        if ($item['attack'] > 0) {
            $stats[] = "Atk:" . $item['attack'];
        }
        
        if ($item['defense'] > 0) {
            $stats[] = "Def:" . $item['defense'];
        }
        
        if ($item['armor'] > 0) {
            $stats[] = "Arm:" . $item['armor'];
        }
        
        if ($item['range'] > 0) {
            $stats[] = "Range:" . $item['range'];
        }

        if (!empty($stats)) {
            $hover .= "<br>(" . implode(", ", $stats) . ")";
        }

        if (!empty($item['protection'])) {
            $protections = [];
            foreach ($item['protection'] as $element => $value) {
                $protections[] = strtolower($element) . " +" . $value . "%";
            }
            if (!empty($protections)) {
                $hover .= "<br>Protection: " . implode(", ", $protections);
            }
        }

        if ($item['charges'] > 0) {
            $hover .= "<br>Charges: " . $item['charges'];
        }

        if ($item['containerSize'] > 0) {
            $hover .= "<br>Vol:" . $item['containerSize'];
        }

        return $hover . ".";
    }
}

// Items processing
$processor = new ItemsProcessor();
$categorizedItems = $processor->processItems();
?>

<div id="content">
    <div style="max-width:800px;margin:0 auto 8px;font-family:Verdana,Tahoma,Helvetica,sans-serif;">
        <h1 style="text-align:center;color:#333333;font-size:16px;margin:8px 0;">
            <img src="/images/items_shop/items/6010.png" style="vertical-align:middle;image-rendering:pixelated;width:22px;height:22px;margin-right:6px;"> ITEMS <img src="/images/items_shop/items/6010.png" style="vertical-align:middle;image-rendering:pixelated;width:22px;height:22px;margin-left:6px;">
        </h1>
        <div style="height:2px;background:#4a4a45;box-shadow:#000 0 0 4px;opacity:.6;"></div>
    </div>
    <style>
        .items-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .items-search {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            align-items: center;
            justify-content: center;
            margin: 0 0 14px 0;
            background: #f1e0c6;
            border: 2px solid #d4c0a1;
            border-radius: 8px;
            padding: 10px;
        }
        
        .items-search input[type="text"] {
            min-width: 260px;
            max-width: 520px;
            width: 100%;
            padding: 8px 10px;
            background: #fff9ef;
            border: 1px solid #d4c0a1;
            border-radius: 4px;
            color: #5a2800;
        }
        
        .items-search button {
            background: #d4c0a1;
            border: 2px solid #8B4513;
            padding: 7px 12px;
            cursor: pointer;
            border-radius: 4px;
            font-weight: bold;
            color: #5a2800;
        }
        
        .tabs-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-bottom: 20px;
            background: #f1e0c6;
            border-radius: 8px;
            padding: 10px;
        }
        
        .tab-button {
            background: #d4c0a1;
            border: 2px solid #8B4513;
            padding: 8px 16px;
            margin: 4px;
            cursor: pointer;
            border-radius: 4px;
            font-weight: bold;
            color: #5a2800;
            transition: background-color 0.3s;
        }
        
        .tab-button:hover {
            background: #c4b091;
        }
        
        .tab-button.active {
            background: #b4a081;
            color: #000;
        }
        
        .tab-content {
            display: none;
            background: #fdf5e6;
            border: 2px solid #d4c0a1;
            border-radius: 8px;
            padding: 20px;
            min-height: 400px;
        }
        
        .tab-content.active {
            display: block;
        }
        
        .items-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(80px, 1fr));
            gap: 15px;
            justify-items: center;
        }
        
        .image-wrapper {
            position: relative;
            display: inline-block;
            padding: 5px;
            background: #ece5d8;
            border: 2px solid #d36e0f;
            border-radius: 5px;
            transition: transform 0.2s;
            box-shadow: 2px 2px 5px rgba(0,0,0,0.2);
        }
        
        .image-wrapper:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        
        .item-image {
            width: 32px;
            height: 32px;
            cursor: pointer;
        }
        
        .info-modal {
            position: absolute;
            bottom: 110%;
            left: 50%;
            transform: translateX(-50%);
            background-color: rgba(90, 40, 0, 0.95);
            color: #fff9ef;
            padding: 10px 15px;
            border-radius: 6px;
            font-size: 11px;
            white-space: nowrap;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
            z-index: 1000;
            min-width: 200px;
            text-align: left;
        }
        
        .item-name {
            text-align: center;
            margin-top: 5px;
            font-size: 10px;
            color: #5a2800;
            font-weight: bold;
        }
        
        .category-title {
            text-align: center;
            color: #5a2800;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        
        .no-items {
            text-align: center;
            color: #666;
            font-style: italic;
            margin-top: 50px;
        }
        
        .search-header {
            text-align: center;
            color: #5a2800;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 10px;
        }
    </style>

    <div class="items-container">
        
        
        <!-- Search -->
        <div class="items-search" role="search" aria-label="Search items">
            <input type="text" id="items-search-input" placeholder="Search item by name..." aria-label="Search item by name" />
            <button type="button" id="items-search-clear" aria-label="Clear search">Clear</button>
        </div>

        <!-- Category tabs -->
        <div class="tabs-container">
            <?php $first = true; foreach ($categorizedItems as $category => $items): ?>
                <button class="tab-button <?= $first ? 'active' : '' ?>" onclick="showTab('<?= str_replace([' ', '&'], ['_', 'and'], $category) ?>')">
                    <?= $category ?>
                </button>
                <?php $first = false; ?>
            <?php endforeach; ?>
            <button id="search-tab-button" class="tab-button" style="display:none;" onclick="showTab('search-results')">Search</button>
        </div>

        <!-- Tabs content -->
        <?php $first = true; foreach ($categorizedItems as $category => $items): ?>
            <div id="<?= str_replace([' ', '&'], ['_', 'and'], $category) ?>" class="tab-content <?= $first ? 'active' : '' ?>">
                <div class="category-title"><?= $category ?></div>
                
                <?php if (empty($items)): ?>
                    <div class="no-items">No items found in this category.</div>
                <?php else: ?>
                    <div class="items-grid">
                        <?php foreach ($items as $item): ?>
                            <div class="image-wrapper" data-name="<?= htmlspecialchars(strtolower($item['name'])) ?>">
                                <img src="images/items_shop/items/<?= $item['id'] ?>.png" 
                                     alt="<?= htmlspecialchars($item['name']) ?>" 
                                     class="item-image"
                                     onerror="this.onerror=null; if(this.src.includes('.png')) { this.src='images/items_shop/items/<?= $item['id'] ?>.gif'; } else { this.style.display='none'; this.nextElementSibling.style.display='block'; }">
                                <div class="info-modal">
                                    <?= $processor->generateItemHover($item) ?>
                                </div>
                                <div class="item-name"><?= htmlspecialchars($item['name']) ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php $first = false; ?>
        <?php endforeach; ?>

        <!-- Search results -->
        <div id="search-results" class="tab-content"></div>
    </div>

    <script>
        // Tabs system
        let lastActiveTabId = null;
        function showTab(tabName) {
            // Hide all tabs
            const tabContents = document.querySelectorAll('.tab-content');
            const tabButtons = document.querySelectorAll('.tab-button');
            
            tabContents.forEach(content => content.classList.remove('active'));
            tabButtons.forEach(button => button.classList.remove('active'));
            
            // Show selected tab
            const selected = document.getElementById(tabName);
            if (!selected) return;
            if (tabName !== 'search-results') {
                lastActiveTabId = tabName;
            }
            selected.classList.add('active');
            if (event && event.target && event.target.classList.contains('tab-button')) {
                event.target.classList.add('active');
            } else {
                // activate corresponding tab button when navigated programmatically
                const btns = Array.from(document.querySelectorAll('.tab-button'));
                const matchBtn = btns.find(b => b.getAttribute('onclick') && b.getAttribute('onclick').includes("'"+tabName+"'"));
                if (matchBtn) matchBtn.classList.add('active');
            }
        }

        // Reusable delayed hover
        function bindHover(wrapper) {
            const image = wrapper.querySelector('.item-image');
            const modal = wrapper.querySelector('.info-modal');
            if (!image || !modal) return;
            let hoverTimeout;
            wrapper.addEventListener('mouseenter', () => {
                hoverTimeout = setTimeout(() => {
                    modal.style.opacity = '1';
                }, 500);
            });
            wrapper.addEventListener('mouseleave', () => {
                clearTimeout(hoverTimeout);
                modal.style.opacity = '0';
            });
        }

        document.querySelectorAll('.image-wrapper').forEach(bindHover);

        // Search by name with results tab
        const searchInput = document.getElementById('items-search-input');
        const searchClear = document.getElementById('items-search-clear');
        const searchTabButton = document.getElementById('search-tab-button');
        const searchResults = document.getElementById('search-results');

        function performSearch(query) {
            const q = (query || '').trim().toLowerCase();
            if (q.length < 2) {
                // hide results and return to last tab
                searchResults.innerHTML = '';
                searchTabButton.style.display = 'none';
                if (lastActiveTabId) {
                    showTab(lastActiveTabId);
                }
                return;
            }

            // collect wrappers from all tabs (except results)
            const allWrappers = document.querySelectorAll('.tab-content:not(#search-results) .image-wrapper');
            const matches = [];
            allWrappers.forEach(w => {
                const name = (w.dataset.name || '').toLowerCase();
                if (name.includes(q)) {
                    matches.push(w);
                }
            });

            // build results content
            const grid = document.createElement('div');
            grid.className = 'items-grid';
            matches.forEach(w => {
                const clone = w.cloneNode(true);
                grid.appendChild(clone);
                bindHover(clone);
            });

            searchResults.innerHTML = '';
            const header = document.createElement('div');
            header.className = 'search-header';
            header.textContent = `Results for \"${q}\" (${matches.length} items)`;
            searchResults.appendChild(header);
            searchResults.appendChild(grid);

            // show search tab
            searchTabButton.style.display = 'inline-block';
            // update tabs state
            const tabButtons = document.querySelectorAll('.tab-button');
            tabButtons.forEach(button => button.classList.remove('active'));
            searchTabButton.classList.add('active');
            const contents = document.querySelectorAll('.tab-content');
            contents.forEach(c => c.classList.remove('active'));
            searchResults.classList.add('active');
        }

        if (searchInput) {
            searchInput.addEventListener('input', (e) => {
                performSearch(e.target.value);
            });
        }
        if (searchClear) {
            searchClear.addEventListener('click', () => {
                searchInput.value = '';
                performSearch('');
                // focus input
                searchInput.focus();
            });
        }
    </script>

    <div style="clear:both;"></div>
    <br>
    <img src="templates/tibiana/images/line_body.gif" align="center" height="7" width="100%">
    <img src="templates/tibiana/images/blank.gif">
    
    <div align="center" style="font-face:verdana; font-size:10px">
    </div>
</div>
