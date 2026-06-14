<?PHP
$auctions = $SQL->query('SELECT `auction_system`.`player`, `auction_system`.`id`, `auction_system`.`item_name`, `auction_system`.`item_id`, `auction_system`.`count`, `auction_system`.`cost`, `auction_system`.`date`, `auction_system`.`extra_description`, `players`.`name` FROM `auction_system`, `players` WHERE `players`.`id` = `auction_system`.`player` ORDER BY `auction_system`.`id` ASC')->fetchAll();

$main_content = '';
$players = 0;

// AVISO EM VERMELHO
$main_content .= '
<center><h1 style="color: red;">⚠ Only items without attributes are accepted at the moment. ⚠</h1></center><br />';

// Cabeçalho
$main_content .= '
<TABLE BORDER=0 CELLSPACING=1 CELLPADDING=4 WIDTH=100%>
<TR BGCOLOR="'.$config['site']['vdarkborder'].'"><TD CLASS=white><b>Instruction</b></TD></TR>
<TR BGCOLOR='.$config['site']['darkborder'].'><TD><center>
<h2>Commands</h2>
<b>!offer add, itemName, itemPrice, itemCount</b><br />
<small>example: !offer add, plate armor, 500, 1</small><br /><br />
<b>!offer buy, AuctionID</b><br />
<small>example: !offer buy, 1943</small><br /><br />
<b>!offer remove, AuctionID</b><br />
<small>example: !offer remove, 1943</small><br /><br />
<b>!offer withdraw</b><br />
<small>Use this command to get money for sold items.</small>
</center></TD></TR></TABLE><br />
';

if (empty($auctions)) {
    $main_content .= '
    <TABLE BORDER=0 CELLSPACING=1 CELLPADDING=4 WIDTH=100%>
        <TR BGCOLOR="'.$config['site']['vdarkborder'].'"><TD CLASS=white><b>Auctions</b></TD></TR>
        <TR BGCOLOR='.$config['site']['darkborder'].'><TD>No active auctions at the moment.</TD></TR>
    </TABLE>';
} else {
    $table_content = '';

    foreach ($auctions as $auction) {
        $players++;
        $bgcolor = ($players % 2 == 0) ? $config['site']['lightborder'] : $config['site']['darkborder'];

        $cost = $auction['cost'];

        // Definir imagem da moeda (usando .gif)
        if ($cost < 100) {
            $coinImage = '<img src="images/items_shop/items/item_gifs/2148.gif" width="16" title="Gold Coin" />';
        } elseif ($cost < 10000) {
            $coinImage = '<img src="images/items_shop/items/item_gifs/2152.gif" width="16" title="Platinum Coin" />';
        } else {
            $coinImage = '<img src="images/items_shop/items/item_gifs/2160.gif" width="16" title="Crystal Coin" />';
        }

        // Valor formatado com sufixo
        if ($cost >= 1000000) {
            $formattedCost = round($cost / 1000000, 2) . 'kk';
        } elseif ($cost >= 1000) {
            $formattedCost = round($cost / 1000, 2) . 'k';
        } else {
            $formattedCost = $cost;
        }

        // Tooltip
        $tooltip = (!empty($auction['extra_description'])) ? htmlspecialchars($auction['extra_description']) : '';

        $table_content .= '
        <TR BGCOLOR='.$bgcolor.'>
            <TD><center>'.$auction['id'].'</center></TD>
            <TD><center><img src="images/items_shop/items/'.$auction['item_id'].'.png" width="32" title="'.$tooltip.'" /></center></TD>
            <TD><center>'.$auction['item_name'].'</center></TD>
            <TD><center><a href="?subtopic=characters&name='.urlencode($auction['name']).'">'.$auction['name'].'</a></center></TD>
            <TD><center>'.$auction['count'].'</center></TD>
            <TD><center>'.$coinImage.' '.$formattedCost.'</center></TD>
            <TD><center>!offer buy, '.$auction['id'].'</center></TD>
        </TR>';
    }

    $main_content .= '
    <TABLE BORDER=0 CELLSPACING=1 CELLPADDING=4 WIDTH=100%>
        <TR BGCOLOR="'.$config['site']['vdarkborder'].'">
            <TD CLASS=white><b><center>ID</center></b></TD>
            <TD CLASS=white><b><center>#</center></b></TD>
            <TD CLASS=white><b><center>Item Name</center></b></TD>
            <TD CLASS=white><b><center>Player</center></b></TD>
            <TD CLASS=white><b><center>Count</center></b></TD>
            <TD CLASS=white><b><center>Cost</center></b></TD>
            <TD CLASS=white><b><center>Buy</center></b></TD>
        </TR>
        '.$table_content.'
    </TABLE>';
}

$main_content .= '<br /><p align="right"><small>System reformulated by <a href="">Fred</a>.</small></p>';
?>
