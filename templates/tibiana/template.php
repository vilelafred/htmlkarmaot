 
<?php
defined('MYAAC') or die('Direct access not allowed!');

if(!version_compare(MYAAC_VERSION, '0.7', '>=')) {
	echo 'MyAAC 0.7.0 is required.';
	exit;
}

$menus = get_template_menus();
foreach($menus as $cat => &$_menus) {
	foreach($_menus as &$menu) {
		$link_full = strpos(trim($menu['link']), 'http') === 0 ? $menu['link'] : getLink($menu['link']);
		$menu['link_full'] = $link_full;
	}
}

if(count($menus) === 0) {
	$text = "Please install the $template_name template in Admin Panel, so the menus will be imported too.";
	if(version_compare(MYAAC_VERSION, '0.8.0', '>=')) {
		throw new RuntimeException($text);
	}
	else {
		echo $text;
		exit;
	}
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
		<?= template_place_holder('head_start') ?>
		<link rel="stylesheet" type="text/css" href="<?= $template_path ?>/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="<?= $template_path ?>/css/main.css" />
		<link rel="stylesheet" type="text/css" href="<?= $template_path ?>/css/menu.css" />
		<link rel="stylesheet" type="text/css" href="<?= $template_path ?>/css/default.css" />
		<link rel="stylesheet" type="text/css" href="<?= $template_path ?>/css/search-styles.css" />
		<link rel="stylesheet" type="text/css" href="<?= $template_path ?>/image-popup.css" />		
		<link href="<?= $template_path ?>/images/favicon.ico" rel="shortcut icon" />
		<style>
			#google_translate_element {
				position: fixed;
				bottom: 1cm;
				right: 1cm;
				z-index: 1000;
				font-size: 10px;
			}

			.tooltip-item { position: relative; cursor: pointer; }
			.tooltip-item:hover .tooltip-text { display: block; }
			.tooltip-text {
				display: none;
				position: absolute;
				z-index: 100;
				background: rgba(15, 15, 15, 0.95);
				color: #fff;
				font-size: 11px;
				padding: 6px 8px;
				border: 1px solid #444;
				border-radius: 3px;
				top: 100%;
				left: 50%;
				transform: translateX(-50%);
				white-space: pre-line;
				text-align: left;
				max-width: 200px;
				pointer-events: none;
				font-family: Verdana, sans-serif;
			}

			.social-icons { display: flex; gap: 10px; justify-content: center; align-items: center; }
			.social-icons a { display: inline-flex; width: 28px; height: 28px; }
			.social-icons img { width: 100%; height: 100%; object-fit: contain; display: block; }
		</style>
		<?= template_place_holder('head_end') ?>
  </head>
   <body>
   <center><div class="top-bar">
		<a href="<?= getLink('account/create') ?>">
		</a>
	</div></center>
	<?= template_place_holder('body_start') ?>
	<div id="google_translate_element"></div>

	


	<div id="pandaac">
	<div class="sidebar-right">
		<div class="players-online-wrapper">
		  <a href="?subtopic=creatures&creature=<?php echo $config['logo_monster'] ?>"><span class="c-monster"
																								 style="background: url(/images/monsters/<?= logo_monster() ?>.gif);"></span></a>
		  <div class="players-online-w">
			<div class="players-online-l">
				<?php if($status['online']) { ?>
					<a href="<?= getLink('online') ?>" style="color: lightgreen; text-decoration: none;">ONLINE</a>
				<?php } else { ?>
					<span style="color: red; text-decoration: none;">OFFLINE</span>
				<?php } ?>
			</div>
			 <div class="players-online-n">
			  <span class="p-online" onClick="window.location = '<?= getLink('online') ?>';"><?= $status['players']?>
			   </span> /<span class="p-total"><?= $status['playersMax']?></span>
			</div>
		  </div>
		</div>
		  <div class="box-side-wrapper download-wrapper">
		  <div class="download-wrapper-header register-wrapper-header"></div>
		  <div class="box-side-header"></div>
		  <div class="box-side-middle text-center">
			<a class="martel btn-download btn-criar-conta" href="<?= getLink('account/create') ?>">Register</a>
		  </div>
		  <div class="box-side-footer"></div>
		</div>
		<div class="box-side-wrapper download-wrapper" style="margin-top: 10px;">
		  <div class="download-wrapper-header"></div>
		  <div class="box-side-header"></div>
		  <div class="box-side-middle text-center">
			<a class="martel btn-download" href="<?= getLink('downloads') ?>">Download Client</a>
		  </div>
		  <div class="box-side-footer"></div>
		</div>
		<!-- Social Icons (under Downloads) -->
		<div class="box-side-wrapper download-wrapper" style="margin-top: 10px;">
		<div class="box-side-header"></div>
		  <div class="box-side-middle text-center">
			<div class="social-icons">
				<a href="https://discord.gg/rNaqunRp" target="_blank" aria-label="Discord" title="Discord">
					<img src="/images/discordd.png" alt="Discord">
				</a>
				<a href="https://www.instagram.com/karmaglobal74" target="_blank" aria-label="Instagram" title="Instagram @karmaglobal74">
					<img src="/images/instagram.png" alt="Instagram">
				</a>
				<a href="https://www.youtube.com/@karmaglobalserver" target="_blank" aria-label="YouTube" title="YouTube @karmaglobalserver">
					<img src="/images/youtube.png" alt="YouTube">
				</a>
				<a href="https://chat.whatsapp.com/Cv6leQQIdAJ7gyLj2FYFKN?mode=ems_copy_c" target="_blank" aria-label="WhatsApp" title="WhatsApp Group">
					<img src="/images/whatsapp.png" alt="WhatsApp">
				</a>
				<a href="https://www.tiktok.com/@karmaglobal74" target="_blank" aria-label="TikTok" title="TikTok @karmaglobal74">
					<img src="/images/tiktok.png" alt="TikTok">
				</a>
			</div>
		  </div>
		  <div class="box-side-footer"></div>
		</div>
	<!-- Search pages removed by request -->

				
		
		<div class="box-side-wrapper market-wrapper box-face" style="margin-top: 1px;">
    <div class=""></div>
    <div class="box-side-header"></div>
    <div class="box-side-middle text-center">
        <?php
        // Sua configuração de conexão com o banco de dados já deve estar incluída

        // Consultar os monstros da tabela boostedMonsters
        $sql = "SELECT monster_name FROM boostedMonsters";
        $stmt = $db->query($sql);

// Exibir os monstros boostados na mesma estrutura
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $monsterName = $row['monster_name'];
    $cleanMonsterName = str_replace(' ', '', $monsterName); // Remover espaços do nome do arquivo
    $monsterImageURL = "/images/monsters/" . $cleanMonsterName . ".gif";
    ?>
    <!-- Adicione este bloco onde deseja exibir os monstros boostados -->
    <img src="<?= $monsterImageURL ?>" alt="<?= $monsterName ?>">
        <?php
        }
        ?>
        <a class="martel btn" href="<?= getLink('index') ?>">Boosted Monster</a>
		<span style="font-size: 10px; font-weight: bold; color: red; text-decoration: none;">50% Extra Exp<br> Double Loot</b></span></p>
    </div>
    <div class="box-side-footer"></div>
</div>


		
		
		<div class="box-side-wrapper download-wrapper box-face">
		  <div class="network-wrapper-header"></div>
		  <div class="box-side-header"></div>
		  <div class="box-side-middle text-center">
	   <div id="fb-root"></div>
					<div class="bar"></div>
					<span style="font-size: 20px; font-weight: bold;">Server Save in
					<br><span id="sshours"></span>:<span id="ssminutes"></span>:<span id="ssseconds"></span></span>
					<div class="bar"></div>
	   </div>
		  <div class="box-side-footer"></div>
		</div>
	</div>
	
	
	
	<!-- <a href="https://chat.whatsapp.com/FnHLx8lz3raFUOcKnzi33b" style="position:fixed;width:60px;height:60px;bottom:40px;right:40px;background-color:#25d366;color:#FFF;border-radius:50px;text-align:center;font-size:30px;box-shadow: 1px 1px 2px #888;
  z-index:1000;" target="_blank">
		<svg viewBox="0 0 32 32" class="whatsapp-ico">
			<path d=" M19.11 17.205c-.372 0-1.088 1.39-1.518 1.39a.63.63 0 0 1-.315-.1c-.802-.402-1.504-.817-2.163-1.447-.545-.516-1.146-1.29-1.46-1.963a.426.426 0 0 1-.073-.215c0-.33.99-.945.99-1.49 0-.143-.73-2.09-.832-2.335-.143-.372-.214-.487-.6-.487-.187 0-.36-.043-.53-.043-.302 0-.53.115-.746.315-.688.645-1.032 1.318-1.06 2.264v.114c-.015.99.472 1.977 1.017 2.78 1.23 1.82 2.506 3.41 4.554 4.34.616.287 2.035.888 2.722.888.817 0 2.15-.515 2.478-1.318.13-.33.244-.73.244-1.088 0-.058 0-.144-.03-.215-.1-.172-2.434-1.39-2.678-1.39zm-2.908 7.593c-1.747 0-3.48-.53-4.942-1.49L7.793 24.41l1.132-3.337a8.955 8.955 0 0 1-1.72-5.272c0-4.955 4.04-8.995 8.997-8.995S25.2 10.845 25.2 15.8c0 4.958-4.04 8.998-8.998 8.998zm0-19.798c-5.96 0-10.8 4.842-10.8 10.8 0 1.964.53 3.898 1.546 5.574L5 27.176l5.974-1.92a10.807 10.807 0 0 0 16.03-9.455c0-5.958-4.842-10.8-10.802-10.8z" fill-rule="evenodd" fill="white"></path>
		</svg>
	</a> -->
	
		<a href="?news" id="header"></a>
		<div id="topbar">
			<ul>
				<?= tibiana_get_links(MENU_CATEGORY_TOP) ?>
			</ul>
		</div>
		<div id="content-container">
			<div id="sidebar">
				<div id="sidebar-links">
					<?php if (admin()) { ?>
				 <div class="line"></div>
					<div class="line wide"></div>
						<a href="/admin" target="_blank" class="martel"><font color="#FF0000">Admin Panel</font></a>
					<?php } ?>
				  <div class="line"></div>
					<div class="line wide"></div>
					<ul class="my-account-sidebar">
					<li>
						<a href="<?= getLink('account/manage') ?>" class="martel"><font color="#90EE90">My Account</font></a>

						<?php if($logged) { ?>
							<a href="<?= getLink('account/logout') ?>" class="martel">Logout</a>
						<?php } ?>
					<br>
				  </ul>
				  
				  
				   <div class="line"></div>
					<div class="line wide"></div>
					<span class="martel" style="font-size: 20px;"><font color="#e38b3d">Library</font></span>
						<ul><li><a href="<?= getLink('serverinfo') ?>" style="color: #ffecdb;">Server Info</a></li><li><a href="<?= getLink('economy') ?>" style="color: #FFD700;">Economy</a></li><li><a href="<?= getLink('commands') ?>" style="color: #ffecdb;">Commands</a></li><li><a href="<?= getLink('spells') ?>" style="color: #ffecdb;">Spells</a></li><li><a href="<?= getLink('items') ?>" style="color: #ffecdb;">Items</a></li><li><a href="<?= getLink('bugbounty') ?>" style="color: #FF0000;">BUG BOUNTY</a></li></ul>
					<div class="line wide"></div>
					<span class="martel" style="font-size: 20px;"><font color="#7270e0">Game Wiki</font></span>
					<ul><li><a href="<?= getLink('guides') ?>" style="color: #e38b3d;">New Player Guide</a></li><li><a href="<?= getLink('Respawns') ?>" style="color: #FF3333;">Respawns</a></li><li><a href="<?= getLink('features') ?>" style="color:rgb(244, 252, 18);">FEATURES</a></li>
</ul>
					<div class="line wide"></div>
				<span class="martel" style="font-size: 20px;"><font color="#53dce0">Community</font></span>
				<ul><li><a href="<?= getLink('characters') ?>" style="color: #eefeff;">Characters</a></li><li><a href="<?= getLink('bans') ?>" style="color: #eefeff;">Players Ban</a></li><li><a href="<?= getLink('lastkills') ?>" style="color: #eefeff;">Last Kills</a></li><li><a href="<?= getLink('guilds') ?>" style="color: #eefeff;">Guilds</a></li><li><a href="<?= getLink('streamers') ?>" style="color: #6441a5; font-weight: bold;">Streamers</a></li><li><a href="<?= getLink('dcsupport') ?>" style="color: #5865F2; font-weight: bold;">Discord Support</a></li><li><a href="<?= getLink('whatsapp') ?>" style="color: #25D366; font-weight: bold;">WhatsApp</a></li>
</ul>
				<div class="line wide"></div>
				<span class="martel" style="font-size: 20px;"><font color="#d3e014">Store</font></span>
				<ul><li><a href="<?= getLink('termos') ?>" style="color: #ff8000;">Donate</a></li><li><a href="<?= getLink('Store') ?>" style="color: #f6f686;">Shop Items</a></li></ul>
					
					  <div class="line wide"></div>
					   <div class="line"></div>
					 </div>
				   <div id="sidebar-misc">
						<a href="<?= getLink('online') ?>">
						</a>
					<br>
				</div>
			</div>
			<div id="main">
				<div id="content">
					<?php
					if(PAGE === 'news') {
						?>
						<div id="karma-fixed-banner" style="text-align: center; margin-bottom: 8px;">
							<div style="display:inline-block; width:96%; max-width:880px;">
								<a href="<?= getLink('guides') ?>"><img src="/images/shop/meetup.png" alt="Karma Banner" style="width:100%; height: auto; box-shadow: #000000 1px 1px 6px;"></a>
								<a href="https://discord.gg/hzSBCdjTTU" target="_blank"><img src="/images/shop/discordmeet.png" alt="Join our Discord" style="width:100%; height: auto; margin-top:6px; box-shadow: #000000 1px 1px 6px;"></a>
							</div>
						</div>
						<?php
					}
					echo tickers() . template_place_holder('center_top');

					if(PAGE === 'news') {
						echo '<table style="width: 100%"><div id="news">';
					}

					echo $content;

					if(PAGE === 'news') {
						echo '</div></table>';
					}
					?>
					<div style="clear:both;"></div>
					<br/>
						<tr>
							<img src="<?= $template_path ?>/images/line_body.gif" align="center" height="7"
								 width="100%">
							<td><img src="<?= $template_path ?>/images/blank.gif"></td>
						</tr>

					<div align="center" style="font-face:verdana; font-size:10px">
						<?php echo template_footer();
						if($config['template_allow_change'])
							echo template_form();
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Bootstrap Core JavaScript -->
	<script src="<?= $template_path ?>/js/bootstrap.min.js"></script>

	<?php
	// Don't touch this, 2524608000 is 1 Jan 2050 in seconds (random day in distant future)
	// *1000 because javascript script (js/serversave.js) works with timestamp in milliseconds
	$save_timestamp = (2524608000 + (($config['save_hour'] * 60 * 60) + ($config['save_minute'] * 60))) * 1000;
	?>
	<script type="text/javascript">
		var target_date =  <?php echo $save_timestamp; ?>;
	</script>

	<!-- Bootstrap Core JavaScript -->
	<script src="<?= $template_path ?>/js/serversave.js"></script>
	<script src="<?= $template_path ?>/js/search.js"></script>
	<script src="<?= $template_path ?>/image-popup.js"></script>	
	<script type="text/javascript">
		function googleTranslateElementInit() {
			new google.translate.TranslateElement({ pageLanguage: 'en', includedLanguages: 'en,es,pt' }, 'google_translate_element');
		}
	</script>
	<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
	<?= template_place_holder('body_end') ?>



</body>
</html>
<?php
function logo_monster()
{
	global $config;
	return str_replace(" ", "", trim(strtolower($config['logo_monster'])));
}

function tibiana_get_links($category)
{
	global $menus;

	$ret = '';
	foreach ($menus[$category] as $menu) {
		$ret .= '<li><a href="' . $menu['link_full'] . '" ' . ($menu['blank'] ? ' target="_blank"' :
				'') . (strlen($menu['color']) == 0 ? '' : 'style="color: #' . $menu['color']) . ';">' .
			$menu['name'] . '</a></li>';
	}

	return $ret;
}