<?php
/**
 * Monster Data Parser para OTServ
 * Extrai informações dos arquivos XML de monstros
 */

class MonsterParser {
    private $monsterPath;
    private $monstersData = [];
    
    public function __construct($monsterPath = '/home/nekiro/data/monster/') {
        $this->monsterPath = $monsterPath;
    }
    
    /**
     * Carrega lista de monstros do monsters.xml
     */
    public function loadMonstersList() {
        $monstersXml = $this->monsterPath . 'monsters.xml';
        
        if (!file_exists($monstersXml)) {
            throw new Exception("Arquivo monsters.xml não encontrado em: $monstersXml");
        }
        
        $xml = simplexml_load_file($monstersXml);
        $monsters = [];
        
        foreach ($xml->monster as $monster) {
            $name = (string)$monster['name'];
            $file = (string)$monster['file'];
            $monsters[$name] = $file;
        }
        
        return $monsters;
    }
    
    /**
     * Extrai dados de um monstro específico
     */
    public function parseMonster($name, $file) {
        $monsterFile = $this->monsterPath . $file;
        
        if (!file_exists($monsterFile)) {
            return null;
        }
        
        $xml = simplexml_load_file($monsterFile);
        
        if (!$xml) {
            return null;
        }
        
        $monster = [
            'name' => $name,
            'file' => $file,
            'nameDescription' => (string)$xml['nameDescription'] ?: '',
            'race' => (string)$xml['race'] ?: '',
            'experience' => (int)$xml['experience'] ?: 0,
            'speed' => (int)$xml['speed'] ?: 0,
            'manacost' => (int)$xml['manacost'] ?: 0,
            'health' => [
                'now' => (int)$xml->health['now'] ?: 0,
                'max' => (int)$xml->health['max'] ?: 0
            ],
            'look' => [
                'type' => (int)$xml->look['type'] ?: 0,
                'corpse' => (int)$xml->look['corpse'] ?: 0
            ],
            'flags' => $this->parseFlags($xml->flags),
            'attacks' => $this->parseAttacks($xml->attacks),
            'defenses' => $this->parseDefenses($xml->defenses),
            'elements' => $this->parseElements($xml->elements),
            'immunities' => $this->parseImmunities($xml->immunities),
            'loot' => $this->parseLoot($xml->loot),
            'voices' => $this->parseVoices($xml->voices),
            'summons' => $this->parseSummons($xml->summons)
        ];
        
        return $monster;
    }
    
    /**
     * Extrai flags do monstro
     */
    private function parseFlags($flagsXml) {
        $flags = [];
        
        if ($flagsXml) {
            foreach ($flagsXml->flag as $flag) {
                foreach ($flag->attributes() as $key => $value) {
                    $flags[$key] = (int)$value;
                }
            }
        }
        
        return $flags;
    }
    
    /**
     * Extrai ataques do monstro
     */
    private function parseAttacks($attacksXml) {
        $attacks = [];
        
        if ($attacksXml) {
            foreach ($attacksXml->attack as $attack) {
                $attackData = [
                    'name' => (string)$attack['name'],
                    'skill' => (int)$attack['skill'] ?: 0,
                    'attack' => (int)$attack['attack'] ?: 0,
                    'chance' => (int)$attack['chance'] ?: 0,
                    'range' => (int)$attack['range'] ?: 0,
                    'radius' => (int)$attack['radius'] ?: 0,
                    'target' => (int)$attack['target'] ?: 0,
                    'min' => (int)$attack['min'] ?: 0,
                    'max' => (int)$attack['max'] ?: 0,
                    'length' => (int)$attack['length'] ?: 0,
                    'spread' => (int)$attack['spread'] ?: 0
                ];
                
                // Extrai atributos específicos do ataque
                if ($attack->attribute) {
                    $attackData['attributes'] = [];
                    foreach ($attack->attribute as $attr) {
                        $attackData['attributes'][(string)$attr['key']] = (string)$attr['value'];
                    }
                }
                
                $attacks[] = $attackData;
            }
        }
        
        return $attacks;
    }
    
    /**
     * Extrai defesas do monstro
     */
    private function parseDefenses($defensesXml) {
        $defenses = [
            'armor' => 0,
            'defense' => 0,
            'defenses' => []
        ];
        
        if ($defensesXml) {
            $defenses['armor'] = (int)$defensesXml['armor'] ?: 0;
            $defenses['defense'] = (int)$defensesXml['defense'] ?: 0;
            
            foreach ($defensesXml->defense as $defense) {
                $defenseData = [
                    'name' => (string)$defense['name'],
                    'chance' => (int)$defense['chance'] ?: 0,
                    'min' => (int)$defense['min'] ?: 0,
                    'max' => (int)$defense['max'] ?: 0
                ];
                
                if ($defense->attribute) {
                    $defenseData['attributes'] = [];
                    foreach ($defense->attribute as $attr) {
                        $defenseData['attributes'][(string)$attr['key']] = (string)$attr['value'];
                    }
                }
                
                $defenses['defenses'][] = $defenseData;
            }
        }
        
        return $defenses;
    }
    
    /**
     * Extrai elementos do monstro
     */
    private function parseElements($elementsXml) {
        $elements = [];
        
        if ($elementsXml) {
            foreach ($elementsXml->element as $element) {
                foreach ($element->attributes() as $key => $value) {
                    $elements[$key] = (int)$value;
                }
            }
        }
        
        return $elements;
    }
    
    /**
     * Extrai imunidades do monstro
     */
    private function parseImmunities($immunitiesXml) {
        $immunities = [];
        
        if ($immunitiesXml) {
            foreach ($immunitiesXml->immunity as $immunity) {
                foreach ($immunity->attributes() as $key => $value) {
                    $immunities[$key] = (int)$value;
                }
            }
        }
        
        return $immunities;
    }
    
    /**
     * Extrai loot do monstro
     */
    private function parseLoot($lootXml) {
        $loot = [];
        
        if ($lootXml) {
            foreach ($lootXml->item as $item) {
                $itemData = [
                    'id' => (int)$item['id'],
                    'chance' => (int)$item['chance'] ?: 0,
                    'countmax' => (int)$item['countmax'] ?: 1,
                    'countmin' => (int)$item['countmin'] ?: 1
                ];
                
                $loot[] = $itemData;
            }
        }
        
        return $loot;
    }
    
    /**
     * Extrai vozes do monstro
     */
    private function parseVoices($voicesXml) {
        $voices = [];
        
        if ($voicesXml) {
            foreach ($voicesXml->voice as $voice) {
                $voiceData = [
                    'sentence' => (string)$voice['sentence'],
                    'yell' => (int)$voice['yell'] ?: 0
                ];
                
                $voices[] = $voiceData;
            }
        }
        
        return $voices;
    }
    
    /**
     * Extrai summons do monstro
     */
    private function parseSummons($summonsXml) {
        $summons = [
            'maxSummons' => 0,
            'summons' => []
        ];
        
        if ($summonsXml) {
            $summons['maxSummons'] = (int)$summonsXml['maxSummons'] ?: 0;
            
            foreach ($summonsXml->summon as $summon) {
                $summonData = [
                    'name' => (string)$summon['name'],
                    'chance' => (int)$summon['chance'] ?: 0,
                    'max' => (int)$summon['max'] ?: 1
                ];
                
                $summons['summons'][] = $summonData;
            }
        }
        
        return $summons;
    }
    
    /**
     * Processa todos os monstros e retorna array com dados
     */
    public function parseAllMonsters() {
        $monstersList = $this->loadMonstersList();
        $allMonsters = [];
        
        foreach ($monstersList as $name => $file) {
            $monsterData = $this->parseMonster($name, $file);
            if ($monsterData) {
                $allMonsters[] = $monsterData;
            }
        }
        
        return $allMonsters;
    }
    
    /**
     * Salva dados dos monstros em cache JSON
     */
    public function cacheMonsters($cacheFile = '/var/www/html/monsters_cache.json') {
        $monsters = $this->parseAllMonsters();
        file_put_contents($cacheFile, json_encode($monsters, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        return count($monsters);
    }
    
    /**
     * Carrega dados dos monstros do cache
     */
    public function loadFromCache($cacheFile = '/var/www/html/monsters_cache.json') {
        if (file_exists($cacheFile)) {
            return json_decode(file_get_contents($cacheFile), true);
        }
        return [];
    }
}

// Se executado diretamente, gera o cache
if (php_sapi_name() === 'cli') {
    try {
        $parser = new MonsterParser();
        $count = $parser->cacheMonsters();
        echo "Cache gerado com sucesso! {$count} monstros processados.\n";
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage() . "\n";
    }
}
?>
