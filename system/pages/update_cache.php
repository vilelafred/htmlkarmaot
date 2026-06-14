<?php
/**
 * Script para atualizar cache dos monstros e itens
 * Pode ser executado via CLI ou web
 */

require_once __DIR__ . '/monster_parser.php';
require_once __DIR__ . '/item_parser.php';

function updateCache() {
    $results = [];
    
    try {
        // Atualizar cache de itens
        $itemParser = new ItemParser();
        $itemCount = $itemParser->cacheItems();
        $results['items'] = [
            'success' => true,
            'count' => $itemCount,
            'message' => "Cache de itens atualizado com sucesso! {$itemCount} itens processados."
        ];
    } catch (Exception $e) {
        $results['items'] = [
            'success' => false,
            'error' => $e->getMessage(),
            'message' => "Erro ao atualizar cache de itens: " . $e->getMessage()
        ];
    }
    
    try {
        // Atualizar cache de monstros
        $monsterParser = new MonsterParser();
        $monsterCount = $monsterParser->cacheMonsters();
        $results['monsters'] = [
            'success' => true,
            'count' => $monsterCount,
            'message' => "Cache de monstros atualizado com sucesso! {$monsterCount} monstros processados."
        ];
    } catch (Exception $e) {
        $results['monsters'] = [
            'success' => false,
            'error' => $e->getMessage(),
            'message' => "Erro ao atualizar cache de monstros: " . $e->getMessage()
        ];
    }
    
    return $results;
}

// Se executado via CLI
if (php_sapi_name() === 'cli') {
    echo "Atualizando cache...\n\n";
    
    $results = updateCache();
    
    foreach ($results as $type => $result) {
        echo "{$result['message']}\n";
    }
    
    echo "\nAtualização concluída!\n";
}
// Se executado via web
else {
    $isAjax = isset($_GET['ajax']) && $_GET['ajax'] === '1';
    
    if (isset($_POST['update']) || $isAjax) {
        $results = updateCache();
        
        if ($isAjax) {
            header('Content-Type: application/json');
            echo json_encode($results);
            exit;
        }
    }
    
    if (!$isAjax) {
        ?>
        <!DOCTYPE html>
        <html lang="pt-BR">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Atualizar Cache - OTServ Database</title>
            <style>
                body {
                    font-family: 'Courier New', monospace;
                    background: #1a1a1a;
                    color: #cccccc;
                    font-size: 12px;
                    padding: 20px;
                }
                
                .container {
                    max-width: 600px;
                    margin: 0 auto;
                    background: #2d2d2d;
                    border: 2px solid #555;
                    border-radius: 5px;
                    padding: 20px;
                }
                
                h1 {
                    color: #ffdd44;
                    text-align: center;
                    margin-bottom: 20px;
                }
                
                .btn {
                    background: linear-gradient(45deg, #4a5c2a, #6a7c4a);
                    border: 1px solid #8a9c6a;
                    color: #fff;
                    padding: 10px 20px;
                    border-radius: 3px;
                    cursor: pointer;
                    font-family: inherit;
                    font-size: 14px;
                    transition: all 0.3s;
                    display: block;
                    margin: 0 auto;
                }
                
                .btn:hover {
                    background: linear-gradient(45deg, #6a7c4a, #8a9c6a);
                    transform: translateY(-1px);
                }
                
                .btn:disabled {
                    opacity: 0.5;
                    cursor: not-allowed;
                }
                
                .results {
                    margin-top: 20px;
                    padding: 15px;
                    background: #1a1a1a;
                    border: 1px solid #555;
                    border-radius: 3px;
                }
                
                .success {
                    color: #00ff00;
                }
                
                .error {
                    color: #ff6666;
                }
                
                .loading {
                    text-align: center;
                    color: #ffdd44;
                }
                
                .back-link {
                    display: inline-block;
                    color: #aaccff;
                    text-decoration: none;
                    margin-bottom: 20px;
                }
                
                .back-link:hover {
                    color: #ffdd44;
                }
                
                .info {
                    background: #333;
                    border: 1px solid #555;
                    padding: 15px;
                    border-radius: 3px;
                    margin-bottom: 20px;
                }
                
                .cache-info {
                    margin-top: 20px;
                    padding: 10px;
                    background: #333;
                    border-radius: 3px;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <a href="monsters.php" class="back-link">&lsaquo; Voltar às Criaturas</a>
                
                <h1>Atualizar Cache do Sistema</h1>
                
                <div class="info">
                    <p><strong>O que faz este script:</strong></p>
                    <ul>
                        <li>Reprocessa todos os arquivos XML de monstros</li>
                        <li>Reprocessa todos os arquivos XML de itens</li>
                        <li>Atualiza o cache para melhorar a performance</li>
                        <li>Deve ser executado após modificações nos arquivos XML</li>
                    </ul>
                </div>
                
                <?php
                $monstersCache = '/var/www/html/monsters_cache.json';
                $itemsCache = '/var/www/html/items_cache.json';
                ?>
                
                <div class="cache-info">
                    <p><strong>Status do Cache:</strong></p>
                    <p>Monstros: <?= file_exists($monstersCache) ? 'Criado em ' . date('d/m/Y H:i:s', filemtime($monstersCache)) : 'Não encontrado' ?></p>
                    <p>Itens: <?= file_exists($itemsCache) ? 'Criado em ' . date('d/m/Y H:i:s', filemtime($itemsCache)) : 'Não encontrado' ?></p>
                </div>
                
                <form method="POST" id="updateForm">
                    <button type="submit" name="update" id="updateBtn" class="btn">
                        Atualizar Cache
                    </button>
                </form>
                
                <div id="results" class="results" style="display: none;"></div>
            </div>
            
            <script>
                document.getElementById('updateForm').addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    const btn = document.getElementById('updateBtn');
                    const results = document.getElementById('results');
                    
                    btn.disabled = true;
                    btn.textContent = 'Atualizando...';
                    results.style.display = 'block';
                    results.innerHTML = '<div class="loading">Processando arquivos XML, aguarde...</div>';
                    
                    fetch('update_cache.php?ajax=1', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: 'update=1'
                    })
                    .then(response => response.json())
                    .then(data => {
                        let html = '';
                        
                        if (data.items) {
                            html += '<div class="' + (data.items.success ? 'success' : 'error') + '">';
                            html += data.items.message;
                            html += '</div>';
                        }
                        
                        if (data.monsters) {
                            html += '<div class="' + (data.monsters.success ? 'success' : 'error') + '">';
                            html += data.monsters.message;
                            html += '</div>';
                        }
                        
                        results.innerHTML = html;
                        
                        btn.disabled = false;
                        btn.textContent = 'Atualizar Cache';
                        
                        // Recarregar informações do cache
                        setTimeout(() => {
                            location.reload();
                        }, 2000);
                    })
                    .catch(error => {
                        results.innerHTML = '<div class="error">Erro: ' + error.message + '</div>';
                        btn.disabled = false;
                        btn.textContent = 'Atualizar Cache';
                    });
                });
            </script>
        </body>
        </html>
        <?php
    }
}
?>
