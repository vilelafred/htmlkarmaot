<?php
defined('MYAAC') or die('Direct access not allowed!');
$title = 'Video Tutorials';

$channelUrl = 'https://www.youtube.com/@KarmaGlobalServer';

$tutorials = [
	['id' => 'uw7rwCVbrtU', 'cat' => 'Systems', 'page' => 'craft', 'duration' => '6:24'],
	['id' => 'mmw7df9wO44', 'cat' => 'Quests', 'page' => 'poiquest', 'duration' => '8:50'],
	['id' => '6KBJgVUCVSU', 'cat' => 'Hunts', 'page' => 'barbarian', 'duration' => '3:24'],
	['id' => 'wKuijncYtr0', 'cat' => 'Quests', 'page' => 'goldenhelmet_quest', 'duration' => '1:55'],
	['id' => '_mR3-PvBh8s', 'cat' => 'Quests', 'page' => 'angelbp', 'duration' => '3:54'],
	['id' => 'tHTQJpTejDM', 'cat' => 'Quests', 'page' => 'bootswater', 'duration' => '3:02'],
	['id' => 'ontMAj35bpw', 'cat' => 'Quests', 'page' => 'horned_helmet', 'duration' => '4:33'],
	['id' => 'ggDhfy8cXG4', 'cat' => 'Quests', 'page' => 'demonhelmet', 'duration' => '1:18'],
	['id' => 'G4KcweUNGyM', 'cat' => 'Quests', 'page' => 'anihi', 'duration' => '4:13'],
	['id' => 'O2rxwuxzQ7s', 'cat' => 'Systems', 'page' => 'forgesystem', 'duration' => '4:26'],
	['id' => 'wtTXi6rttts', 'cat' => 'Server', 'page' => '', 'duration' => '0:44'],
	['id' => 'pS_Vd_q3Baw', 'cat' => 'Bosses', 'page' => '', 'duration' => '2:05'],
	['id' => 'VTQyCnz5LH4', 'cat' => 'Quests', 'page' => '', 'duration' => '1:49'],
	['id' => 'iAdRW0paabo', 'cat' => 'Bosses', 'page' => '', 'duration' => '1:24'],
	['id' => '8Zxul_wu4Eg', 'cat' => 'Quests', 'page' => '', 'duration' => '2:23'],
	['id' => 'MKXt--sIqDU', 'cat' => 'Quests', 'page' => 'anihi', 'duration' => '3:50'],
	['id' => 'WcFuxWFUMwg', 'cat' => 'Quests', 'page' => '', 'duration' => '1:39'],
	['id' => 'cC0sNWyWgBk', 'cat' => 'Bosses', 'page' => '', 'duration' => '1:24'],
	['id' => 'zhseFy9brfY', 'cat' => 'Server', 'page' => '', 'duration' => '2:08'],
	['id' => 'PT0VxUgKcyo', 'cat' => 'Server', 'page' => '', 'duration' => '1:33'],
	['id' => 'HobETN_kcow', 'cat' => 'Bosses', 'page' => '', 'duration' => '2:11'],
	['id' => 'UNRAmMUnhuA', 'cat' => 'Hunts', 'page' => 'grimreaper', 'duration' => '1:05'],
	['id' => '4lmfGSuuRd8', 'cat' => 'Hunts', 'page' => 'darktorturer', 'duration' => '1:42'],
	['id' => 'saqwEFwY_v8', 'cat' => 'Systems', 'page' => 'forgesystem', 'duration' => '3:29'],
	['id' => 'GR_KvD2v1HQ', 'cat' => 'Systems', 'page' => 'craft', 'duration' => '3:24'],
	['id' => 'NvWxqzZBxP0', 'cat' => 'Hunts', 'page' => 'demona', 'duration' => '0:58'],
	['id' => '9HGor72Zpbc', 'cat' => 'Hunts', 'page' => 'fury', 'duration' => '1:04'],
	['id' => 'tKyVhK4h5pU', 'cat' => 'Hunts', 'page' => 'warlock', 'duration' => '0:42'],
	['id' => 'ZMaFUqbCmew', 'cat' => 'Hunts', 'page' => 'hydraph', 'duration' => '1:01'],
	['id' => '7s3bkSWxLko', 'cat' => 'Hunts', 'page' => 'hydraph', 'duration' => '0:59'],
	['id' => 'gp2XHitslg0', 'cat' => 'Hunts', 'page' => 'royalcastle', 'duration' => '0:47'],
];

$selectedId = isset($_GET['v']) ? preg_replace('/[^a-zA-Z0-9_-]/', '', $_GET['v']) : '';
if ($selectedId === '' && count($tutorials) > 0) {
	$selectedId = $tutorials[0]['id'];
}

$titles = [];
foreach ($tutorials as &$video) {
	$cacheFile = CACHE . 'youtube_' . $video['id'] . '.txt';
	if (is_readable($cacheFile) && (time() - filemtime($cacheFile)) < 86400 * 30) {
		$video['title'] = trim(file_get_contents($cacheFile));
	} else {
		$ctx = stream_context_create(['http' => ['timeout' => 4]]);
		$json = @file_get_contents('https://www.youtube.com/oembed?url=https://www.youtube.com/watch?v=' . $video['id'] . '&format=json', false, $ctx);
		$data = $json ? json_decode($json, true) : null;
		$video['title'] = $data['title'] ?? 'Karma OT Tutorial';
		if (!is_dir(CACHE)) {
			@mkdir(CACHE, 0755, true);
		}
		@file_put_contents($cacheFile, $video['title']);
	}
	$titles[$video['id']] = $video['title'];
}
unset($video);

$categories = ['All', 'Systems', 'Quests', 'Hunts', 'Bosses', 'Server'];
?>
<div style="max-width:900px;margin:0 auto 12px;font-family:Verdana,Tahoma,Helvetica,sans-serif;">
	<h1 style="text-align:center;color:#333;font-size:16px;margin:8px 0;">
		<img src="/images/youtube.png" alt="" style="vertical-align:middle;width:22px;height:22px;margin-right:6px;">
		VIDEO TUTORIALS — KARMA OT
		<img src="/images/youtube.png" alt="" style="vertical-align:middle;width:22px;height:22px;margin-left:6px;">
	</h1>
	<div style="border:1px solid #c7b48a;background:#d4c0a1;padding:10px 12px;font-size:12px;line-height:1.5;text-align:center;">
		Tutoriais oficiais do canal
		<a href="<?= htmlspecialchars($channelUrl) ?>" target="_blank" rel="noopener" style="color:#b00000;font-weight:bold;">@KarmaGlobalServer</a>.
		Quests, hunts, sistemas e bosses explicados em vídeo.
	</div>
</div>

<div style="max-width:900px;margin:0 auto 14px;font-family:Verdana,Tahoma,Helvetica,sans-serif;">
	<div id="tutorial-player-wrap" style="background:#111;border:2px solid #7B3F00;padding:8px;">
		<iframe id="tutorial-player" width="100%" height="420" style="display:block;max-width:100%;"
			src="https://www.youtube.com/embed/<?= htmlspecialchars($selectedId) ?>?rel=0&modestbranding=1"
			title="Karma OT Tutorial" frameborder="0"
			allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
			allowfullscreen></iframe>
		<div id="tutorial-player-title" style="color:#ffecdb;font-size:13px;padding:8px 4px 2px;text-align:center;font-weight:bold;">
			<?= htmlspecialchars($titles[$selectedId] ?? 'Karma OT Tutorial') ?>
		</div>
	</div>
</div>

<div style="max-width:900px;margin:0 auto 16px;font-family:Verdana,Tahoma,Helvetica,sans-serif;">
	<div style="background:#f1e0c6;border:1px solid #c7b48a;padding:10px 12px;">
		<div style="display:flex;gap:8px;flex-wrap:wrap;align-items:center;justify-content:center;margin-bottom:8px;">
			<input id="tutorial-search" type="text" placeholder="Buscar tutorial..." style="padding:6px;min-width:220px;" oninput="filterTutorials()">
			<select id="tutorial-cat" style="padding:6px;" onchange="filterTutorials()">
				<?php foreach ($categories as $cat): ?>
				<option value="<?= $cat === 'All' ? '' : htmlspecialchars($cat) ?>"><?= htmlspecialchars($cat === 'All' ? 'Todas categorias' : $cat) ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div id="tutorial-grid" style="display:grid;grid-template-columns:repeat(auto-fill,minmax(260px,1fr));gap:10px;">
			<?php foreach ($tutorials as $i => $video):
				$vid = $video['id'];
				$titleText = htmlspecialchars($video['title']);
				$rowBg = ($i % 2 === 0) ? '#f1e0c6' : '#d4c0a1';
			?>
			<div class="tutorial-card" data-id="<?= htmlspecialchars($vid) ?>" data-title="<?= strtolower($titleText) ?>" data-cat="<?= htmlspecialchars($video['cat']) ?>"
				style="background:<?= $rowBg ?>;border:1px solid #c7b48a;padding:8px;cursor:pointer;"
				onclick="playTutorial('<?= htmlspecialchars($vid) ?>', <?= json_encode($video['title'], JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT) ?>)">
				<img src="https://img.youtube.com/vi/<?= htmlspecialchars($vid) ?>/mqdefault.jpg" alt="" style="width:100%;height:auto;display:block;border:1px solid #8f6e3a;">
				<div style="font-size:11px;color:#666;margin-top:4px;"><?= htmlspecialchars($video['cat']) ?> · <?= htmlspecialchars($video['duration']) ?></div>
				<div style="font-size:12px;font-weight:bold;margin-top:4px;line-height:1.35;"><?= $titleText ?></div>
				<div style="margin-top:6px;display:flex;gap:8px;flex-wrap:wrap;font-size:11px;">
					<?php if (!empty($video['page'])): ?>
					<a href="<?= getLink($video['page']) ?>" onclick="event.stopPropagation();" style="color:#5a2800;">Guia no site</a>
					<?php endif; ?>
					<a href="https://www.youtube.com/watch?v=<?= htmlspecialchars($vid) ?>" target="_blank" rel="noopener" onclick="event.stopPropagation();" style="color:#b00000;">YouTube</a>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>

<script>
function playTutorial(id, title) {
	var player = document.getElementById('tutorial-player');
	var titleEl = document.getElementById('tutorial-player-title');
	if (player) {
		player.src = 'https://www.youtube.com/embed/' + id + '?rel=0&modestbranding=1&autoplay=1';
	}
	if (titleEl) {
		titleEl.textContent = title;
	}
	if (window.history && window.history.replaceState) {
		var url = new URL(window.location.href);
		url.searchParams.set('v', id);
		window.history.replaceState({}, '', url.toString());
	}
	document.getElementById('tutorial-player-wrap').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

function filterTutorials() {
	var q = (document.getElementById('tutorial-search').value || '').toLowerCase();
	var cat = document.getElementById('tutorial-cat').value;
	document.querySelectorAll('.tutorial-card').forEach(function(card) {
		var matchQ = !q || card.getAttribute('data-title').indexOf(q) !== -1;
		var matchC = !cat || card.getAttribute('data-cat') === cat;
		card.style.display = (matchQ && matchC) ? '' : 'none';
	});
}
</script>
