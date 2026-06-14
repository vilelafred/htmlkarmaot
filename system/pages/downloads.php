<?php
defined('MYAAC') or die('Direct access not allowed!');
$title = 'Downloads';

$clientUrl = BASE_URL . 'downloads/KarmaOT-Client.zip';
$serverIp = $config['lua']['ip'];
$serverPort = $config['lua']['loginProtocolPort'] ?? 7171;
?>
<div style="max-width:720px;margin:0 auto;padding:16px;">
	<h1 style="text-align:center;">Karma OT Client</h1>
	<p style="text-align:center;">Baixe o client oficial, extraia e execute <strong>otclient_gl.exe</strong> (OpenGL) ou <strong>otclient_dx.exe</strong> (DirectX).</p>
	<p style="text-align:center;margin:24px 0;">
		<a href="<?= $clientUrl ?>" style="display:inline-block;padding:14px 28px;background:#2d5016;color:#fff;font-weight:bold;text-decoration:none;border-radius:6px;font-size:18px;">
			Baixar KarmaOT Client (ZIP)
		</a>
	</p>
	<table style="width:100%;margin-top:24px;border-collapse:collapse;">
		<tr><td style="padding:8px;border:1px solid #ccc;"><strong>IP do servidor</strong></td><td style="padding:8px;border:1px solid #ccc;"><?= htmlspecialchars($serverIp) ?></td></tr>
		<tr><td style="padding:8px;border:1px solid #ccc;"><strong>Porta</strong></td><td style="padding:8px;border:1px solid #ccc;"><?= (int)$serverPort ?></td></tr>
		<tr><td style="padding:8px;border:1px solid #ccc;"><strong>Client</strong></td><td style="padding:8px;border:1px solid #ccc;">7.72 (Karma OTClient)</td></tr>
	</table>
	<p style="margin-top:20px;text-align:center;">
		<a href="<?= getLink('account/create') ?>">Criar conta</a> &nbsp;|&nbsp;
		<a href="<?= getLink('account/manage') ?>">Login no site</a>
	</p>
</div>
