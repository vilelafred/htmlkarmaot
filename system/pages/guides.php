<?php
$guidesPath = __DIR__ . '/../../data/guides.json';
$guidesData = null;
if (is_readable($guidesPath)) {
    $guidesData = json_decode(file_get_contents($guidesPath), true);
}

if (!$guidesData) {
    echo '<p style="text-align:center;color:#900;">Guides data unavailable.</p>';
    return;
}

function guides_h($value) {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

function guides_level($value) {
    return $value ? guides_h($value) : '—';
}

$intro = guides_h($guidesData['intro'] ?? '');
$levelRewards = $guidesData['levelRewards'] ?? [];
$guides = $guidesData['guides'] ?? [];
$cityHunts = $guidesData['cityHunts'] ?? [];
$levelHunts = $guidesData['levelHunts'] ?? [];
$youtubeChannel = guides_h($guidesData['youtubeChannel'] ?? '');

$quests = array_values(array_filter($guides, function($g) { return ($g['type'] ?? '') === 'Quest'; }));
$hunts = array_values(array_filter($guides, function($g) { return ($g['type'] ?? '') === 'Hunt'; }));
$systems = array_values(array_filter($guides, function($g) { return ($g['type'] ?? '') === 'System'; }));
$hubGuides = array_merge($quests, $hunts, $systems);
?>
<!-- New Player Guide – header with icons + intro + Level Rewards CTA -->
<div style="max-width:800px;margin:0 auto 12px;font-family:Verdana,Tahoma,Helvetica,sans-serif;">
  <h1 style="text-align:center;color:#333333;font-size:16px;margin:8px 0;">
    <img src="/images/items_shop/items/6010.png" style="vertical-align:middle;image-rendering:pixelated;width:22px;height:22px;margin-right:6px;"> NEW PLAYER GUIDE <img src="/images/items_shop/items/6010.png" style="vertical-align:middle;image-rendering:pixelated;width:22px;height:22px;margin-left:6px;">
  </h1>
  <div style="border:1px solid #c7b48a;background:#d4c0a1;padding:10px 12px;">
    <div style="font-size:12px;line-height:1.5;margin-bottom:8px;">
      <?= $intro ?>
    </div>
    <div style="background:#f1e0c6;border:1px solid #c7b48a;padding:8px 10px;">
      <div style="font-weight:bold;margin-bottom:4px;"><?= guides_h($levelRewards['title'] ?? 'Level Rewards') ?></div>
      <div style="font-size:12px;line-height:1.45;">
        <?= guides_h($levelRewards['description'] ?? '') ?>
      </div>
      <div style="text-align:center;margin-top:8px;">
        <a href="<?= guides_h($levelRewards['pageUrl'] ?? '/?leveladv') ?>" style="padding:6px 10px;background:#b08f58;color:#fff;border:1px solid #8f6e3a;text-decoration:none;display:inline-block;">See rewards by vocation</a>
      </div>
    </div>
  </div>
</div>

<!-- Guides Hub (filters + quick cards) -->
<div style="max-width: 800px; margin: 0 auto; padding: 10px; font-family: Verdana, Tahoma, Helvetica, sans-serif;">
  <div style="background:#f1e0c6; border:1px solid #c7b48a; padding:8px 12px; font-weight:bold; text-align:center;">Guides Hub</div>
  <div style="background:#d4c0a1; border:1px solid #c7b48a; padding:10px 12px;">
    Filter and open the main guides quickly. This includes Quests, Hunts and Systems with videos where available.
  </div>
  <div style="background:#d4c0a1; border:1px solid #c7b48a; padding:10px 12px; margin-top:8px;">
    <div style="display:flex; gap:8px; flex-wrap:wrap; align-items:center; justify-content:center;">
      <input id="guides-search" type="text" placeholder="Search guide..." style="padding:6px; min-width:220px;" oninput="filterGuidesHub()">
      <select id="guides-type" style="padding:6px;" onchange="filterGuidesHub()">
        <option value="">Type (any)</option>
        <option>Quest</option>
        <option>Hunt</option>
        <option>System</option>
      </select>
    </div>
    <div id="guides-grid" style="display:grid; grid-template-columns: repeat(auto-fill, minmax(220px,1fr)); gap:10px; margin-top:10px;">
      <?php foreach ($hubGuides as $guide): ?>
      <div class="gcard" data-name="<?= guides_h($guide['name']) ?>" data-type="<?= guides_h($guide['type']) ?>" style="background:#f1e0c6; border:1px solid #c7b48a; padding:10px;">
        <div style="font-weight:bold;"><?= guides_h($guide['name']) ?></div>
        <div style="font-size:12px;"><?= guides_h($guide['type']) ?></div>
        <div style="margin-top:6px; display:flex; gap:8px;">
          <?php if (!empty($guide['pageUrl'])): ?><a href="<?= guides_h($guide['pageUrl']) ?>">Page</a><?php endif; ?>
          <?php if (!empty($guide['videoUrl'])): ?><a href="<?= guides_h($guide['videoUrl']) ?>" target="_blank">Video</a><?php endif; ?>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <div style="text-align:center; margin-top:8px;">
      <button id="guides-toggle" onclick="toggleGuidesCollapse()" style="padding:6px 10px; background:#b08f58; color:#fff; border:1px solid #8f6e3a; cursor:pointer;">Show more</button>
    </div>
  </div>

<h2 style="text-align: center; font-family: Verdana; font-size: 14px; color: #5a2800;">Quests</h2>
<table style="font-size: 13px; margin: 10px auto 20px; width: 720px; border-spacing: 1px; box-shadow: #000000 1px 1px 10px; font-family: Verdana, Tahoma, Helvetica, sans-serif;" cellspacing="1" cellpadding="5">
  <tbody>
    <tr bgcolor="#505050">
      <th style="padding: 4px; color: #efefef; font-weight: bold; text-align: center;">Quest</th>
      <th style="padding: 4px; color: #efefef; font-weight: bold; text-align: center;">Level</th>
      <th style="padding: 4px; color: #efefef; font-weight: bold; text-align: center;">Page</th>
      <th style="padding: 4px; color: #efefef; font-weight: bold; text-align: center;">Video</th>
    </tr>
    <?php $i = 0; foreach ($quests as $guide): $bg = ($i % 2 === 0) ? '#f1e0c6' : '#d4c0a1'; $i++; ?>
    <tr bgcolor="<?= $bg ?>">
      <td style="padding: 4px; text-align: center;"><?= guides_h($guide['name']) ?></td>
      <td style="padding: 4px; text-align: center;"><?= guides_level($guide['level'] ?? null) ?></td>
      <td style="padding: 4px; text-align: center;"><?php if (!empty($guide['pageUrl'])): ?><a href="<?= guides_h($guide['pageUrl']) ?>">Open</a><?php endif; ?></td>
      <td style="padding: 4px; text-align: center;"><?php if (!empty($guide['videoUrl'])): ?><a href="<?= guides_h($guide['videoUrl']) ?>" target="_blank">Watch</a><?php endif; ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<h2 style="text-align: center; font-family: Verdana; font-size: 14px; color: #5a2800;">Hunts</h2>
<table style="font-size: 13px; margin: 10px auto 20px; width: 720px; border-spacing: 1px; box-shadow: #000000 1px 1px 10px; font-family: Verdana, Tahoma, Helvetica, sans-serif;" cellspacing="1" cellpadding="5">
  <tbody>
    <tr bgcolor="#505050">
      <th style="padding: 4px; color: #efefef; font-weight: bold; text-align: center;">Hunt</th>
      <th style="padding: 4px; color: #efefef; font-weight: bold; text-align: center;">Level</th>
      <th style="padding: 4px; color: #efefef; font-weight: bold; text-align: center;">Page</th>
      <th style="padding: 4px; color: #efefef; font-weight: bold; text-align: center;">Video</th>
    </tr>
    <?php $i = 0; foreach ($hunts as $guide): $bg = ($i % 2 === 0) ? '#f1e0c6' : '#d4c0a1'; $i++; ?>
    <tr bgcolor="<?= $bg ?>">
      <td style="padding: 4px; text-align: center;"><?= guides_h($guide['name']) ?></td>
      <td style="padding: 4px; text-align: center;"><?= guides_level($guide['level'] ?? null) ?></td>
      <td style="padding: 4px; text-align: center;"><?php if (!empty($guide['pageUrl'])): ?><a href="<?= guides_h($guide['pageUrl']) ?>">Open</a><?php endif; ?></td>
      <td style="padding: 4px; text-align: center;"><?php if (!empty($guide['videoUrl'])): ?><a href="<?= guides_h($guide['videoUrl']) ?>" target="_blank">Watch</a><?php endif; ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<h3 style="text-align:center; font-family: Verdana; font-size: 13px; color:#5a2800; margin-top:28px;">Hunts – City Respawns</h3>
<table style="font-size: 13px; margin: 10px auto 20px; width: 720px; border-spacing: 1px; box-shadow: #000000 1px 1px 10px; font-family: Verdana, Tahoma, Helvetica, sans-serif;" cellspacing="1" cellpadding="5">
  <tbody>
    <tr bgcolor="#505050">
      <th style="padding: 4px; color: #efefef; font-weight: bold; text-align: center;">City</th>
      <th style="padding: 4px; color: #efefef; font-weight: bold; text-align: center;">Page</th>
    </tr>
    <?php $i = 0; foreach ($cityHunts as $city): $bg = ($i % 2 === 0) ? '#f1e0c6' : '#d4c0a1'; $i++; ?>
    <tr bgcolor="<?= $bg ?>">
      <td style="padding: 4px; text-align: center;"><?= guides_h($city['city']) ?></td>
      <td style="padding: 4px; text-align: center;"><a href="<?= guides_h($city['pageUrl']) ?>">Open</a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<h3 style="text-align:center; font-family: Verdana; font-size: 13px; color:#5a2800;">Hunts – Special Areas (by level)</h3>
<table style="font-size: 13px; margin: 10px auto 20px; width: 720px; border-spacing: 1px; box-shadow: #000000 1px 1px 10px; font-family: Verdana, Tahoma, Helvetica, sans-serif;" cellspacing="1" cellpadding="5">
  <tbody>
    <tr bgcolor="#505050">
      <th style="padding: 4px; color: #efefef; font-weight: bold; text-align: center;">Hunt</th>
      <th style="padding: 4px; color: #efefef; font-weight: bold; text-align: center;">Page</th>
      <th style="padding: 4px; color: #efefef; font-weight: bold; text-align: center;">Level</th>
    </tr>
    <?php $i = 0; foreach ($levelHunts as $hunt): $bg = ($i % 2 === 0) ? '#f1e0c6' : '#d4c0a1'; $i++; ?>
    <tr bgcolor="<?= $bg ?>">
      <td style="text-align:center; padding:4px;"><?= guides_h($hunt['name']) ?></td>
      <td style="text-align:center; padding:4px;"><a href="<?= guides_h($hunt['pageUrl']) ?>">Open</a></td>
      <td style="text-align:center; padding:4px;"><?= guides_h($hunt['level']) ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<h2 style="text-align: center; font-family: Verdana; font-size: 14px; color: #5a2800;">Systems</h2>
<table style="font-size: 13px; margin: 10px auto 20px; width: 720px; border-spacing: 1px; box-shadow: #000000 1px 1px 10px; font-family: Verdana, Tahoma, Helvetica, sans-serif;" cellspacing="1" cellpadding="5">
  <tbody>
    <tr bgcolor="#505050">
      <th style="padding: 4px; color: #efefef; font-weight: bold; text-align: center;">System</th>
      <th style="padding: 4px; color: #efefef; font-weight: bold; text-align: center;">Page</th>
      <th style="padding: 4px; color: #efefef; font-weight: bold; text-align: center;">Video</th>
    </tr>
    <?php $i = 0; foreach ($systems as $guide): $bg = ($i % 2 === 0) ? '#f1e0c6' : '#d4c0a1'; $i++; ?>
    <tr bgcolor="<?= $bg ?>">
      <td style="padding: 4px; text-align: center;"><?= guides_h($guide['name']) ?></td>
      <td style="padding: 4px; text-align: center;"><?php if (!empty($guide['pageUrl'])): ?><a href="<?= guides_h($guide['pageUrl']) ?>">Open</a><?php endif; ?></td>
      <td style="padding: 4px; text-align: center;"><?php if (!empty($guide['videoUrl'])): ?><a href="<?= guides_h($guide['videoUrl']) ?>" target="_blank">Watch</a><?php endif; ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<h2 style="text-align: center; font-family: Verdana; font-size: 14px; color: #5a2800;">Guides</h2>
<p style="text-align: center; font-size: 12px; font-family: Verdana, Tahoma, Helvetica, sans-serif;">
  Explore more content on our official YouTube channel:
  <a href="<?= $youtubeChannel ?>" target="_blank">Karma Global Server</a>
</p>

<script>
  function filterGuidesHub(){
    var q = (document.getElementById('guides-search').value || '').toLowerCase();
    var type = document.getElementById('guides-type').value;
    document.querySelectorAll('.gcard').forEach(function(card){
      var name = (card.getAttribute('data-name')||'').toLowerCase();
      var ctype = card.getAttribute('data-type')||'';
      var okText = !q || name.indexOf(q) !== -1;
      var okType = !type || ctype === type;
      card.style.display = (okText && okType) ? '' : 'none';
    });
  }
  (function(){ try { filterGuidesHub(); } catch(e){} })();

  function toggleGuidesCollapse(){
    var grid = document.getElementById('guides-grid');
    var btn = document.getElementById('guides-toggle');
    var collapsed = grid.getAttribute('data-collapsed') === '1';
    if (collapsed){
      grid.style.maxHeight = '';
      grid.style.overflow = '';
      grid.setAttribute('data-collapsed','0');
      if (btn) btn.textContent = 'Show less';
    } else {
      grid.style.maxHeight = '260px';
      grid.style.overflow = 'hidden';
      grid.setAttribute('data-collapsed','1');
      if (btn) btn.textContent = 'Show more';
    }
  }
  (function initGuidesCollapse(){
    try {
      var g = document.getElementById('guides-grid');
      if (g){ g.setAttribute('data-collapsed','0'); toggleGuidesCollapse(); }
    } catch(e){}
  })();
</script>
