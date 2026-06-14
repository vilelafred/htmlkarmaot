<?php
defined('MYAAC') or die('Direct access not allowed!');

$limit = 10; // Limitado para top 10
$type = $_REQUEST['type'] ?? '';

// Função para formatar números grandes (100000 = 1kk)
function format_number($value) {
    if ($value >= 1000000) {
        return number_format($value / 1000000, 1) . 'kk';
    } elseif ($value >= 1000) {
        return number_format($value / 1000, 1) . 'k';
    }
    return number_format($value);
}

// Função para colorir valores de experiência
function coloured_value($valuein) {
    $formatted = format_number($valuein);
    
    if ($valuein > 0) {
        return '<span style="color: #8B4513; font-weight: bold;">+' . $formatted . '</span>';
    } elseif ($valuein < 0) {
        return '<span style="color: #8B0000; font-weight: bold;">' . $formatted . '</span>';
    } else {
        return '<span style="color: #696969;">' . $formatted . '</span>';
    }
}

// Função para inicializar exphist_lastexp se necessário
function initialize_exphist_lastexp($db) {
    global $config;
    
    $deleted = 'deleted';
    if ($db->hasColumn('players', 'deletion')) {
        $deleted = 'deletion';
    }
    
    $addWhere = 'players.id NOT IN (' . implode(', ', $config['highscores_ids_hidden']) . ') AND players.' . $deleted . ' = 0 AND players.group_id < ' . $config['highscores_groups_hidden'];
    
    // Verifica se há jogadores com exphist_lastexp = 0 ou NULL
    $checkQuery = $db->query('SELECT COUNT(*) as count FROM ' . $db->tableName('players') . ' WHERE ' . $addWhere . ' AND (exphist_lastexp = 0 OR exphist_lastexp IS NULL)');
    $result = $checkQuery->fetch();
    
    if ($result['count'] > 0) {
        // Inicializa exphist_lastexp com a experiência atual
        $db->query('UPDATE ' . $db->tableName('players') . ' SET exphist_lastexp = experience WHERE ' . $addWhere . ' AND (exphist_lastexp = 0 OR exphist_lastexp IS NULL)');
        return true;
    }
    
    return false;
}

$playersOnline = [];
if ($db->hasTable('players_online')) {
    $query = $db->query('SELECT `player_id` FROM `players_online`')->fetchAll(PDO::FETCH_ASSOC);
    foreach ($query as $player) {
        $playersOnline[$player['player_id']] = true;
    }
}

$deleted = 'deleted';
if ($db->hasColumn('players', 'deletion')) {
    $deleted = 'deletion';
}

$addWhere = 'players.id NOT IN (' . implode(', ', $config['highscores_ids_hidden']) . ') AND players.' . $deleted . ' = 0 AND players.group_id < ' . $config['highscores_groups_hidden'];

// Inicializa exphist_lastexp se necessário
$initialized = initialize_exphist_lastexp($db);

if (empty($type)) {
    $players = $db->query('SELECT * FROM ' . $db->tableName('players') . ' WHERE ' . $addWhere . ' ORDER BY ' . $db->fieldName('experience') . '-' . $db->fieldName('exphist_lastexp') . ' DESC LIMIT ' . $limit)->fetchAll();
} elseif ($type == "sum") {
    $players = $db->query('SELECT * FROM ' . $db->tableName('players') . ' WHERE ' . $addWhere . ' ORDER BY ' . $db->fieldName('exphist1') . '+' . $db->fieldName('exphist2') . '+' . $db->fieldName('exphist3') . '+' . $db->fieldName('exphist4') . '+' . $db->fieldName('exphist5') . '+' . $db->fieldName('exphist6') . '+' . $db->fieldName('exphist7') . '+' . $db->fieldName('experience') . '-' . $db->fieldName('exphist_lastexp') . ' DESC LIMIT ' . $limit)->fetchAll();
} elseif ($type >= 1 && $type <= 7) {
    $players = $db->query('SELECT * FROM ' . $db->tableName('players') . ' WHERE ' . $addWhere . ' ORDER BY ' . $db->fieldName('exphist' . (int)$type) . ' DESC LIMIT ' . $limit)->fetchAll();
}

// CSS inline para design mais limpo
echo '<style>
.powergamers-table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    font-family: Arial, sans-serif;
    font-size: 12px;
}
.powergamers-table th {
    background-color: #8B4513;
    color: #F1E0C6;
    padding: 8px;
    text-align: center;
    font-weight: bold;
    border: 1px solid #D4C0A1;
}
.powergamers-table td {
    padding: 6px 8px;
    border: 1px solid #D4C0A1;
    text-align: center;
}
.powergamers-table tr:nth-child(even) {
    background-color: #F1E0C6;
}
.powergamers-table tr:nth-child(odd) {
    background-color: #D4C0A1;
}
.powergamers-table tr:hover {
    background-color: #E6D7B8;
}
.player-name {
    text-align: left;
    font-weight: bold;
}
.player-info {
    font-size: 10px;
    color: #696969;
    font-weight: normal;
}
.online-status {
    color: #228B22;
}
.offline-status {
    color: #8B0000;
}
.nav-link {
    color: #F1E0C6;
    text-decoration: none;
}
.nav-link:hover {
    color: #FFFFFF;
    text-decoration: underline;
}
.active-nav {
    background-color: #A0522D !important;
}
.page-title {
    text-align: center;
    color: #8B4513;
    font-size: 18px;
    font-weight: bold;
    margin: 20px 0;
    text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
}
.notice {
    background-color: #FFF3CD;
    border: 1px solid #FFEAA7;
    color: #856404;
    padding: 10px;
    margin: 10px 0;
    border-radius: 4px;
    text-align: center;
}
</style>';

echo '<div class="page-title">🏆 Ranking dos Powergamers</div>';

// Mostra aviso se foi inicializado
if ($initialized) {
    echo '<div class="notice">⚠️ Sistema de Powergamers inicializado! A partir de agora, apenas a experiência ganha diariamente será contabilizada.</div>';
}

echo '<table class="powergamers-table">';
echo '<tr>';
echo '<th>Rank</th>';
echo '<th>Jogador</th>';

// Cabeçalhos das colunas
if ($type == "sum") {
    echo '<th class="active-nav"><a href="?subtopic=powergamers&type=sum" class="nav-link">7 Dias Total</a></th>';
} else {
    echo '<th><a href="?subtopic=powergamers&type=sum" class="nav-link">7 Dias Total</a></th>';
}

for ($i = 7; $i >= 2; $i--) {
    if ($type == $i) {
        echo '<th class="active-nav"><a href="?subtopic=powergamers&type=' . $i . '" class="nav-link">' . $i . ' Dias</a></th>';
    } else {
        echo '<th><a href="?subtopic=powergamers&type=' . $i . '" class="nav-link">' . $i . ' Dias</a></th>';
    }
}

if ($type == 1) {
    echo '<th class="active-nav"><a href="?subtopic=powergamers&type=1" class="nav-link">1 Dia</a></th>';
} else {
    echo '<th><a href="?subtopic=powergamers&type=1" class="nav-link">1 Dia</a></th>';
}

if (empty($type)) {
    echo '<th class="active-nav"><a href="?subtopic=powergamers" class="nav-link">Hoje</a></th>';
} else {
    echo '<th><a href="?subtopic=powergamers" class="nav-link">Hoje</a></th>';
}

echo '</tr>';

$number_of_rows = 0;
foreach ($players as $player) {
    $number_of_rows++;
    echo '<tr>';
    echo '<td><strong>' . $number_of_rows . '</strong></td>';
    
    // Nome do jogador com status online/offline
    if (isPlayerOnline($player)) {
        echo '<td class="player-name"><a href="' . getPlayerLink($player['name'], false) . '" class="online-status">' . htmlspecialchars($player['name']) . '</a>';
    } else {
        echo '<td class="player-name"><a href="' . getPlayerLink($player['name'], false) . '" class="offline-status">' . htmlspecialchars($player['name']) . '</a>';
    }
    echo '<br><span class="player-info">Nível ' . $player['level'] . ' - ' . htmlspecialchars($config['vocations'][$player['vocation']]) . '</span></td>';
    
    // Valores de experiência
    echo '<td>' . coloured_value($player['exphist1'] + $player['exphist2'] + $player['exphist3'] + $player['exphist4'] + $player['exphist5'] + $player['exphist6'] + $player['exphist7'] + $player['experience'] - $player['exphist_lastexp']) . '</td>';
    echo '<td>' . coloured_value($player['exphist7']) . '</td>';
    echo '<td>' . coloured_value($player['exphist6']) . '</td>';
    echo '<td>' . coloured_value($player['exphist5']) . '</td>';
    echo '<td>' . coloured_value($player['exphist4']) . '</td>';
    echo '<td>' . coloured_value($player['exphist3']) . '</td>';
    echo '<td>' . coloured_value($player['exphist2']) . '</td>';
    echo '<td>' . coloured_value($player['exphist1']) . '</td>';
    echo '<td>' . coloured_value($player['experience'] - $player['exphist_lastexp']) . '</td>';
    echo '</tr>';
}

echo '</table>';

function isPlayerOnline($player) {
    global $db, $playersOnline;

    if ($db->hasTable('players_online')) {
        return isset($playersOnline[$player['id']]);
    }

    return $player['online'] == 1;
}tmlspecialchars($player['name']) . '</a>';
    } else {
        echo '<td class="player-name"><a href="' . getPlayerLink($player['name'], false) . '" class="offline-status">' . htmlspecialchars($player['name']) . '</a>';
    }
    echo '<br><span class="player-info">Level ' . $player['level'] . ' - ' . htmlspecialchars($config['vocations'][$player['vocation']]) . '</span></td>';
    
    // Experience values
    echo '<td>' . coloured_value($player['exphist1'] + $player['exphist2'] + $player['exphist3'] + $player['exphist4'] + $player['exphist5'] + $player['exphist6'] + $player['exphist7'] + $player['experience'] - $player['exphist_lastexp']) . '</td>';
    echo '<td>' . coloured_value($player['exphist7']) . '</td>';
    echo '<td>' . coloured_value($player['exphist6']) . '</td>';
    echo '<td>' . coloured_value($player['exphist5']) . '</td>';
    echo '<td>' . coloured_value($player['exphist4']) . '</td>';
    echo '<td>' . coloured_value($player['exphist3']) . '</td>';
    echo '<td>' . coloured_value($player['exphist2']) . '</td>';
    echo '<td>' . coloured_value($player['exphist1']) . '</td>';
    echo '<td>' . coloured_value($player['experience'] - $player['exphist_lastexp']) . '</td>';
    echo '</tr>';
}

echo '</table>';

function isPlayerOnline($player) {
    global $db, $playersOnline;

    if ($db->hasTable('players_online')) {
        return isset($playersOnline[$player['id']]);
    }

    return $player['online'] == 1;
}