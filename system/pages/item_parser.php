<?php
/**
 * Item Data Parser para OTServ
 * Extrai informações dos arquivos XML de itens
 */

class ItemParser {
    private $itemsPath;
    
    public function __construct($itemsPath = '/home/nekiro/data/items/items.xml') {
        $this->itemsPath = $itemsPath;
    }
    
    /**
     * Carrega dados dos itens do items.xml
     */
    public function parseItems() {
        if (!file_exists($this->itemsPath)) {
            return [];
        }
        
        // Para arquivos grandes, vamos usar XMLReader para melhor performance
        $reader = new XMLReader();
        $reader->open($this->itemsPath);
        
        $items = [];
        
        while ($reader->read()) {
            if ($reader->nodeType == XMLReader::ELEMENT && $reader->localName == 'item') {
                $item = $reader->expand();
                
                $id = (int)$item->getAttribute('id');
                $name = $item->getAttribute('name') ?: 'Unknown Item';
                $article = $item->getAttribute('article') ?: '';
                
                $items[$id] = [
                    'id' => $id,
                    'name' => $name,
                    'article' => $article,
                    'displayName' => $article ? $article . ' ' . $name : $name
                ];
            }
        }
        
        $reader->close();
        return $items;
    }
    
    /**
     * Salva dados dos itens em cache JSON
     */
    public function cacheItems($cacheFile = '/var/www/html/items_cache.json') {
        $items = $this->parseItems();
        file_put_contents($cacheFile, json_encode($items, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        return count($items);
    }
    
    /**
     * Carrega dados dos itens do cache
     */
    public function loadFromCache($cacheFile = '/var/www/html/items_cache.json') {
        if (file_exists($cacheFile)) {
            return json_decode(file_get_contents($cacheFile), true);
        }
        return [];
    }
    
    /**
     * Busca item por ID
     */
    public function getItemById($id, $items = null) {
        if ($items === null) {
            $items = $this->loadFromCache();
        }
        
        return isset($items[$id]) ? $items[$id] : ['id' => $id, 'name' => 'Unknown Item #' . $id, 'displayName' => 'Unknown Item #' . $id];
    }
}

// Se executado diretamente, gera o cache
if (php_sapi_name() === 'cli') {
    try {
        $parser = new ItemParser();
        $count = $parser->cacheItems();
        echo "Cache de itens gerado com sucesso! {$count} itens processados.\n";
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage() . "\n";
    }
}
?>
