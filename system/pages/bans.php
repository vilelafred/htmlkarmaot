<?php
/**
 * Bans
 *
 * @package   MyAAC
 * @author    Gesior <jerzyskalski@wp.pl>
 * @author    Slawkens <slawkens@gmail.com>
 * @copyright 2019 MyAAC
 * @link      https://my-aac.org
 */
defined('MYAAC') or die('Direct access not allowed!');
$title = 'Bans list';

// TFS 1.5 totalmente compatível com sistema de bans
// Verificação de versão removida - funciona em todas as versões modernas do TFS

// Garantir que a database está inicializada
if (!isset($db) || !$db) {
    require_once SYSTEM . 'libs/pot/OTS.php';
    $ots = POT::getInstance();
    require_once SYSTEM . 'database.php';
}

// Função para adicionar estatísticas dos bans
function getBanStats() {
    global $db;
    
    $stats = [];
    
    // Total de bans ativos
    $result = $db->query('SELECT COUNT(*) as total FROM account_bans WHERE (expires_at = -1 OR expires_at > UNIX_TIMESTAMP())')->fetch();
    $stats['active'] = $result['total'];
    
    // Total de bans permanentes
    $result = $db->query('SELECT COUNT(*) as total FROM account_bans WHERE expires_at = -1')->fetch();
    $stats['permanent'] = $result['total'];
    
    // Total de bans temporários ativos
    $result = $db->query('SELECT COUNT(*) as total FROM account_bans WHERE expires_at > UNIX_TIMESTAMP() AND expires_at != -1')->fetch();
    $stats['temporary'] = $result['total'];
    
    return $stats;
}

// Estatísticas simples no estilo oldschool
$ban_stats = getBanStats();
if($ban_stats['active'] > 0) {
    echo '<div style="text-align: center; margin-bottom: 15px; color: #8A0808; font-weight: bold;">';
    echo 'Currently showing ' . $ban_stats['active'] . ' active banishments';
    if($ban_stats['permanent'] > 0) {
        echo ' (' . $ban_stats['permanent'] . ' permanent)';
    }
    echo '</div>';
}

if(!$config['bans_display_all'])
	echo '<div style="text-align: center; color: #f1e0c6; margin-bottom: 15px;">Showing last ' . $config['bans_limit'] . ' banishments.</div>';

if($config['bans_display_all'])
{
	$_page = isset($_GET['page']) ? $_GET['page'] : 0;
	$offset = $_page * $config['bans_limit'] + 1;
}

// Query para buscar bans ativos usando a estrutura correta da database karma
$query = 'SELECT ab.*, 
          p1.name as banned_player_name,
          p2.name as banned_by_name,
          a.name as account_name
          FROM account_bans ab
          LEFT JOIN accounts a ON ab.account_id = a.id
          LEFT JOIN players p1 ON p1.account_id = ab.account_id
          LEFT JOIN players p2 ON p2.account_id = ab.banned_by
          WHERE (ab.expires_at = -1 OR ab.expires_at > UNIX_TIMESTAMP())
          ORDER BY ab.banned_at DESC 
          LIMIT ' . ($config['bans_limit'] + 1) . (isset($offset) ? ' OFFSET ' . $offset : '');

$bans = $db->query($query);
if(!$bans->rowCount())
{
?>
	<div style="text-align: center; padding: 20px; background: #1a1a1a; border: 1px solid #5a2800; color: #f1e0c6;">
		<h3 style="color: #e38b3d;">🛡️ No Banned Players</h3>
		<p>There are currently no active banishments on the server.</p>
	</div>
<?php
	return;
}
?>
<table border="0" cellspacing="1" cellpadding="4" width="100%">
	<tr align="center" bgcolor="<?php echo $config['vdarkborder']; ?>" class="white">
		<td><span style="color: white"><b>Name</b></span></td>
		<td><span style="color: white"><b>Expires</b></span></td>
		<td><span style="color: white"><b>Reason</b></span></td>
		<td><span style="color: white"><b>Banned by</b></span></td>
		<td><span style="color: white"><b>Date</b></span></td>
	</tr>
<?php
$i = 0;
foreach($bans as $ban)
{
	if($i++ >= $config['bans_limit'])
	{
		$next_page = true;
		break;
	}
	
?>
	<tr align="center" bgcolor="<?php echo getStyle($i); ?>">
		<td>
			<?php 
			if($ban['banned_player_name']) {
				echo getPlayerLink($ban['banned_player_name']); 
			} else {
				echo '<font color="#8A0808"><i>Unknown Player</i></font>';
			}
			?>
		</td>
		<td>
<?php
			if($ban['expires_at'] == -1) {
				echo '<font color="#8A0808"><b>Never</b></font>';
			} else {
				if($ban['expires_at'] > time()) {
					echo date("H:i:s", $ban['expires_at']) . '<br/>' . date("d M Y", $ban['expires_at']);
				} else {
					echo '<font color="#008A00">Expired</font>';
				}
			}
?>
		</td>
		<td><?php echo htmlspecialchars($ban['reason']); ?></td>
		<td>
			<?php 
			if($ban['banned_by'] == 0) {
				echo '<i>Autoban</i>';
			} else {
				echo $ban['banned_by_name'] ? getPlayerLink($ban['banned_by_name']) : 'Admin';
			}
			echo '<br/>' . date("d.m.Y", $ban['banned_at']);
			?>
		</td>
		<td><?php echo date("H:i:s", $ban['banned_at']) . '<br/>' . date("d M Y", $ban['banned_at']); ?></td>
	</tr>
<?php
}
?>
</table>
<table border="0" cellpadding="4" cellspacing="1" width="100%">
<?php
if($_page > 0)
	echo '<tr><td width="100%" align="right" valign="bottom"><a href="?subtopic=bans&page=' . ($_page - 1) . '" class="size_xxs">« Previous Page</a></td></tr>';

if(isset($next_page))
	echo '<tr><td width="100%" align="right" valign="bottom"><a href="?subtopic=bans&page=' . ($_page + 1) . '" class="size_xxs">Next Page »</a></td></tr>';
?>
</table>
