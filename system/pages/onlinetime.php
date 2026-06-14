<?php
defined('MYAAC') or die('Direct access not allowed!');

$limit = 10; // Limitado para top 10
$type = $_REQUEST['type'] ?? '';

// Função para formatar tempo de forma mais legível
function format_time($seconds) {
    $hours = floor($seconds / 3600);
    $minutes = floor(($seconds % 3600) / 60);
    
    if ($hours >= 24) {
        $days = floor($hours / 24);
        $hours = $hours % 24;
        return $days . 'd ' . $hours . 'h ' . $minutes . 'm';
    } elseif ($hours >= 1) {
        return $hours . 'h ' . $minutes . 'm';
    } else {
        return $minutes . 'm';
    }
}

// Função para colorir tempo baseado na quantidade
function hours_and_minutes($value, $color = 1) {
    $formatted = format_time($value);
    
    if ($color != 1) {
        return '<span style="color: #696969;">' . $formatted . '</span>';
    } else {
        $hours = floor($value / 3600);
        if ($hours >= 12) {
            return '<span style="color: #8B0000; font-weight: bold;">' . $formatted . '</span>';
        } elseif ($hours >= 6) {
            return '<span style="color: #8B4513; font-weight: bold;">' . $formatted . '</span>';
        } else {
            return '<span style="color: #228B22;">' . $formatted . '</span>';
        }
    }
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

if (empty($type)) {
    $players = $db->query('SELECT * FROM ' . $db->tableName('players') . ' WHERE ' . $addWhere . ' ORDER BY ' . $db->fieldName('onlinetimetoday') . ' DESC LIMIT ' . $limit)->fetchAll();
} elseif ($type == "sum") {
    $players = $db->query('SELECT * FROM ' . $db->tableName('players') . ' WHERE ' . $addWhere . ' ORDER BY ' . $db->fieldName('onlinetime1') . '+' . $db->fieldName('onlinetime2') . '+' . $db->fieldName('onlinetime3') . '+' . $db->fieldName('onlinetime4') . '+' . $db->fieldName('onlinetime5') . '+' . $db->fieldName('onlinetime6') . '+' . $db->fieldName('onlinetime7') . '+' . $db->fieldName('onlinetimetoday') . ' DESC LIMIT ' . $limit)->fetchAll();
} elseif ($type >= 1 && $type <= 7) {
    $players = $db->query('SELECT * FROM ' . $db->tableName('players') . ' WHERE ' . $addWhere . ' ORDER BY ' . $db->fieldName('onlinetime' . (int)$type) . ' DESC LIMIT ' . $limit)->fetchAll();
}

// CSS inline para design mais limpo
echo '<style>
.onlinetime-table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    font-family: Arial, sans-serif;
    font-size: 12px;
}
.onlinetime-table th {
    background-color: #8B4513;
    color: #F1E0C6;
    padding: 8px;
    text-align: center;
    font-weight: bold;
    border: 1px solid #D4C0A1;
}
.onlinetime-table td {
    padding: 6px 8px;
    border: 1px solid #D4C0A1;
    text-align: center;
}
.onlinetime-table tr:nth-child(even) {
    background-color: #F1E0C6;
}
.onlinetime-table tr:nth-child(odd) {
    background-color: #D4C0A1;
}
.onlinetime-table tr:hover {
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
</style>';

echo '<div class="page-title">⏰ Ranking de Tempo Online</div>';

echo '<table class="onlinetime-table">';
echo '<tr>';
echo '<th>Rank</th>';
echo '<th>Jogador</th>';

// Cabeçalhos das colunas
if ($type == "sum") {
    echo '<th class="active-nav"><a href="?subtopic=onlinetime&type=sum" class="nav-link">Total Online</a></th>';
} else {
    echo '<th><a href="?subtopic=onlinetime&type=sum" class="nav-link">Total Online</a></th>';
}

for ($i = 7; $i >= 2; $i--) {
    if ($type == $i) {
        echo '<th class="active-nav"><a href="?subtopic=onlinetime&type=' . $i . '" class="nav-link">' . $i . ' Dias</a></th>';
    } else {
        echo '<th><a href="?subtopic=onlinetime&type=' . $i . '" class="nav-link">' . $i . ' Dias</a></th>';
    }
}

if ($type == 1) {
    echo '<th class="active-nav"><a href="?subtopic=onlinetime&type=1" class="nav-link">1 Dia</a></th>';
} else {
    echo '<th><a href="?subtopic=onlinetime&type=1" class="nav-link">1 Dia</a></th>';
}

if (empty($type)) {
    echo '<th class="active-nav"><a href="?subtopic=onlinetime" class="nav-link">Hoje</a></th>';
} else {
    echo '<th><a href="?subtopic=onlinetime" class="nav-link">Hoje</a></th>';
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
    
    // Valores de tempo online
    echo '<td>' . hours_and_minutes($player['onlinetime1'] + $player['onlinetime2'] + $player['onlinetime3'] + $player['onlinetime4'] + $player['onlinetime5'] + $player['onlinetime6'] + $player['onlinetime7'] + $player['onlinetimetoday'], 0) . '</td>';
    echo '<td>' . hours_and_minutes($player['onlinetime7']) . '</td>';
    echo '<td>' . hours_and_minutes($player['onlinetime6']) . '</td>';
    echo '<td>' . hours_and_minutes($player['onlinetime5']) . '</td>';
    echo '<td>' . hours_and_minutes($player['onlinetime4']) . '</td>';
    echo '<td>' . hours_and_minutes($player['onlinetime3']) . '</td>';
    echo '<td>' . hours_and_minutes($player['onlinetime2']) . '</td>';
    echo '<td>' . hours_and_minutes($player['onlinetime1']) . '</td>';
    echo '<td>' . hours_and_minutes($player['onlinetimetoday']) . '</td>';
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