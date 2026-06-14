<?php
require_once __DIR__ . '/monster_parser.php';
require_once __DIR__ . '/item_parser.php';

// Carrega dados do cache
$monsterParser = new MonsterParser();
$itemParser = new ItemParser();

$monsters = $monsterParser->loadFromCache();
$items = $itemParser->loadFromCache();

// Obtém o nome do monstro da URL
$monsterName = isset($_GET['name']) ? trim($_GET['name']) : '';

if (empty($monsterName)) {
    header('Location: ?subtopic=monsters');
    exit;
}

// Busca o monstro
$monster = null;
foreach ($monsters as $m) {
    if ($m['name'] === $monsterName) {
        $monster = $m;
        break;
    }
}

if (!$monster) {
    header('Location: ?subtopic=monsters');
    exit;
}

// Funções auxiliares
function formatChance($chance) {
    if ($chance >= 100000) return "100%";
    if ($chance >= 10000) return number_format($chance / 1000, 1) . "%";
    if ($chance >= 1000) return number_format($chance / 1000, 2) . "%";
    return "0." . str_pad($chance, 3, '0', STR_PAD_LEFT) . "%";
}

function formatAttackType($attack) {
    $types = [
        'melee' => 'Melee',
        'fire' => 'Fire',
        'energy' => 'Energy',
        'earth' => 'Earth',
        'ice' => 'Ice',
        'holy' => 'Holy',
        'death' => 'Death',
        'physical' => 'Physical',
        'manadrain' => 'Mana Drain',
        'lifedrain' => 'Life Drain',
        'firefield' => 'Fire Field'
    ];
    
    return isset($types[$attack]) ? $types[$attack] : ucfirst($attack);
}

function formatResistance($percent) {
    if ($percent == 0) return 'Normal';
    if ($percent > 0) return 'Strong (' . $percent . '%)';
    return 'Weak (' . abs($percent) . '%)';
}
?>

<style>
        .details-table {
            width: 800px;
            border-spacing: 1px;
            font-family: Verdana, Tahoma, Helvetica, sans-serif;
            font-size: 13px;
            box-shadow: #000 1px 1px 10px;
            margin: 0 auto 20px auto;
        }
        .details-title {
            background: #4a4a45;
            color: #fff;
            padding: 8px;
            text-align: center;
            font-weight: bold;
        }
        .details-header {
            background: #505050;
            color: #efefef;
            font-weight: bold;
            text-align: center;
        }
        .details-row {
            background: #d4c0a1;
            text-align: left;
        }
        .details-row.alt {
            background: #f1e0c6;
        }
        .details-row td {
            padding: 8px;
        }
        .back-link {
            color: #5a2800;
            text-decoration: none;
            font-weight: bold;
            margin: 10px auto;
            display: block;
            text-align: center;
        }
        .loot-table {
            width: 800px;
            border-spacing: 1px;
            font-family: Verdana, Tahoma, Helvetica, sans-serif;
            font-size: 13px;
            box-shadow: #000 1px 1px 10px;
            margin: 0 auto 20px auto;
        }
        .chance-very-common { color: #228B22; font-weight: bold; }
        .chance-common { color: #32CD32; font-weight: bold; }
        .chance-uncommon { color: #FFD700; font-weight: bold; }
        .chance-rare { color: #FF8C00; font-weight: bold; }
        .chance-very-rare { color: #DC143C; font-weight: bold; }
</style>

<div id="content">
    <p><img style="display:block; margin-left:auto; margin-right:auto;" src="templates/tibiana/images/line_body.gif" width="100%" height="7"></p>

    <a href="?subtopic=monsters" class="back-link">&lsaquo; Back to Creatures List</a>

    <!-- Monster Title -->
    <table style="font-size:13px; color:#5a2800; margin:10px auto; width:800px; border-spacing:1px; font-family: Verdana, Tahoma, Helvetica, sans-serif; box-shadow:#000 1px 1px 10px;" cellspacing="1" cellpadding="10">
        <tbody>
            <tr style="background-color:#4a4a45;">
                <td style="text-align:center;"><span style="color:#ffffff;"><strong><?= strtoupper(htmlspecialchars($monster['name'])) ?></strong></span></td>
            </tr>
        </tbody>
    </table>

    <table style="font-size:13px; color:#5a2800; margin:0 auto 10px; width:800px; border-spacing:1px; font-family: Verdana, Tahoma, Helvetica, sans-serif; box-shadow:#000 1px 1px 10px;" cellspacing="1" cellpadding="10">
        <tbody>
            <tr style="background-color:#d4c0a1;">
                <td style="padding:15px;">
                    <p><strong><?= htmlspecialchars($monster['nameDescription']) ?></strong></p>
                </td>
            </tr>
        </tbody>
    </table>

    <!-- Basic Information -->
    <table class="details-table" cellspacing="1" cellpadding="8">
        <tr><td colspan="2" class="details-title">BASIC INFORMATION</td></tr>
        <tr class="details-header">
            <td style="width:200px;">Attribute</td>
            <td>Value</td>
        </tr>
        <tr class="details-row">
            <td><strong>Health Points</strong></td>
            <td><?= number_format($monster['health']['max']) ?> HP</td>
        </tr>
        <tr class="details-row alt">
            <td><strong>Experience</strong></td>
            <td><?= number_format($monster['experience']) ?> exp</td>
        </tr>
        <tr class="details-row">
            <td><strong>Speed</strong></td>
            <td><?= $monster['speed'] ?></td>
        </tr>
        <tr class="details-row alt">
            <td><strong>Armor</strong></td>
            <td><?= $monster['armor'] ?></td>
        </tr>
        <tr class="details-row">
            <td><strong>Defense</strong></td>
            <td><?= $monster['defense'] ?></td>
        </tr>
    </table>

    <!-- Resistances -->
    <table class="details-table" cellspacing="1" cellpadding="8">
        <tr><td colspan="2" class="details-title">ELEMENTAL RESISTANCES</td></tr>
        <tr class="details-header">
            <td style="width:200px;">Element</td>
            <td>Resistance</td>
        </tr>
        <tr class="details-row">
            <td><strong>Physical</strong></td>
            <td><?= formatResistance($monster['elements']['physical']) ?></td>
        </tr>
        <tr class="details-row alt">
            <td><strong>Fire</strong></td>
            <td><?= formatResistance($monster['elements']['fire']) ?></td>
        </tr>
        <tr class="details-row">
            <td><strong>Energy</strong></td>
            <td><?= formatResistance($monster['elements']['energy']) ?></td>
        </tr>
        <tr class="details-row alt">
            <td><strong>Earth</strong></td>
            <td><?= formatResistance($monster['elements']['earth']) ?></td>
        </tr>
        <tr class="details-row">
            <td><strong>Ice</strong></td>
            <td><?= formatResistance($monster['elements']['ice']) ?></td>
        </tr>
        <tr class="details-row alt">
            <td><strong>Holy</strong></td>
            <td><?= formatResistance($monster['elements']['holy']) ?></td>
        </tr>
        <tr class="details-row">
            <td><strong>Death</strong></td>
            <td><?= formatResistance($monster['elements']['death']) ?></td>
        </tr>
    </table>

    <?php if (!empty($monster['immunities'])): ?>
    <!-- Immunities -->
    <table class="details-table" cellspacing="1" cellpadding="8">
        <tr><td class="details-title">IMMUNITIES</td></tr>
        <tr class="details-row">
            <td style="padding:15px;">
                <?php 
                $immunityList = [];
                foreach ($monster['immunities'] as $immunity) {
                    $immunityList[] = ucfirst($immunity);
                }
                echo implode(', ', $immunityList);
                ?>
            </td>
        </tr>
    </table>
    <?php endif; ?>

    <?php if (!empty($monster['attacks'])): ?>
    <!-- Attacks -->
    <table class="details-table" cellspacing="1" cellpadding="8">
        <tr><td colspan="3" class="details-title">ATTACKS</td></tr>
        <tr class="details-header">
            <td style="width:150px;">Type</td>
            <td style="width:100px;">Min Damage</td>
            <td>Max Damage</td>
        </tr>
        <?php 
        $rowCount = 0;
        foreach ($monster['attacks'] as $attack): 
            $rowClass = ($rowCount % 2 == 0) ? 'details-row' : 'details-row alt';
            $rowCount++;
        ?>
        <tr class="<?= $rowClass ?>">
            <td><strong><?= formatAttackType($attack['name']) ?></strong></td>
            <td><?= isset($attack['min']) ? $attack['min'] : '0' ?></td>
            <td><?= isset($attack['max']) ? $attack['max'] : 'Unknown' ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php endif; ?>

    <?php if (!empty($monster['voices'])): ?>
    <!-- Voices -->
    <table class="details-table" cellspacing="1" cellpadding="8">
        <tr><td class="details-title">VOICES</td></tr>
        <?php 
        $rowCount = 0;
        foreach ($monster['voices'] as $voice): 
            $rowClass = ($rowCount % 2 == 0) ? 'details-row' : 'details-row alt';
            $rowCount++;
        ?>
        <tr class="<?= $rowClass ?>">
            <td style="font-style:italic; padding:10px;">"<?= htmlspecialchars($voice['text']) ?>"</td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php endif; ?>

    <?php if (!empty($monster['loot'])): ?>
    <!-- Loot -->
    <table class="loot-table" cellspacing="1" cellpadding="8">
        <tr><td colspan="4" class="details-title">LOOT (<?= count($monster['loot']) ?> items)</td></tr>
        <tr class="details-header">
            <td style="width:300px;">Item</td>
            <td style="width:100px;">Quantity</td>
            <td style="width:100px;">Chance</td>
            <td>Rarity</td>
        </tr>
        <?php 
        // Sort loot by chance (highest first)
        $sortedLoot = $monster['loot'];
        usort($sortedLoot, function($a, $b) {
            return $b['chance'] - $a['chance'];
        });
        
        $rowCount = 0;
        foreach ($sortedLoot as $lootItem):
            $item = $itemParser->getItemById($lootItem['id'], $items);
            $chance = $lootItem['chance'];
            $chanceClass = '';
            $rarityText = '';
            
            if ($chance >= 50000) { 
                $chanceClass = 'chance-very-common'; 
                $rarityText = 'Very Common';
            }
            elseif ($chance >= 20000) { 
                $chanceClass = 'chance-common'; 
                $rarityText = 'Common';
            }
            elseif ($chance >= 5000) { 
                $chanceClass = 'chance-uncommon'; 
                $rarityText = 'Uncommon';
            }
            elseif ($chance >= 1000) { 
                $chanceClass = 'chance-rare'; 
                $rarityText = 'Rare';
            }
            else { 
                $chanceClass = 'chance-very-rare'; 
                $rarityText = 'Very Rare';
            }
            
            $rowClass = ($rowCount % 2 == 0) ? 'details-row' : 'details-row alt';
            $rowCount++;
        ?>
        <tr class="<?= $rowClass ?>">
            <td>
                <strong><?= htmlspecialchars($item['name']) ?></strong>
                <br><small>ID: <?= $lootItem['id'] ?></small>
            </td>
            <td>
                <?php if ($lootItem['countmax'] > 1): ?>
                    <?= $lootItem['countmin'] ?>-<?= $lootItem['countmax'] ?>
                <?php else: ?>
                    1
                <?php endif; ?>
            </td>
            <td class="<?= $chanceClass ?>">
                <?= formatChance($chance) ?>
            </td>
            <td><?= $rarityText ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php endif; ?>

    <p><img style="display:block; margin-left:auto; margin-right:auto;" src="templates/tibiana/images/line_body.gif" width="100%" height="7"></p>
</div>