<!-- New Player Guide – header with icons + intro + Level Rewards CTA -->
<div style="max-width:800px;margin:0 auto 12px;font-family:Verdana,Tahoma,Helvetica,sans-serif;">
  <h1 style="text-align:center;color:#333333;font-size:16px;margin:8px 0;">
    <img src="/images/items_shop/items/6010.png" style="vertical-align:middle;image-rendering:pixelated;width:22px;height:22px;margin-right:6px;"> NEW PLAYER GUIDE <img src="/images/items_shop/items/6010.png" style="vertical-align:middle;image-rendering:pixelated;width:22px;height:22px;margin-left:6px;">
  </h1>
  <div style="border:1px solid #c7b48a;background:#d4c0a1;padding:10px 12px;">
    <div style="font-size:12px;line-height:1.5;margin-bottom:8px;">
      Welcome to KarmaOT. This compact guide helps you get started: hunt routes by city/level, essential quests, custom systems (Forge, Craft), daily bosses, and practical tips — all in the oldschool Tibia style.
    </div>
    <div style="background:#f1e0c6;border:1px solid #c7b48a;padding:8px 10px;">
      <div style="font-weight:bold;margin-bottom:4px;">How it works — Level Rewards</div>
      <div style="font-size:12px;line-height:1.45;">
        When you reach specific levels, each vocation receives a one-time reward. Rewards are organized by vocation and required level, with item icons displayed vertically for clarity.
      </div>
      <div style="text-align:center;margin-top:8px;">
        <a href="/?leveladv" style="padding:6px 10px;background:#b08f58;color:#fff;border:1px solid #8f6e3a;text-decoration:none;display:inline-block;">See rewards by vocation</a>
      </div>
    </div>
  </div>
</div>
<!-- Removed video list table; items distributed into sections below to keep consistent pattern -->

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
      <div class="gcard" data-name="Annihilator I & II" data-type="Quest" style="background:#f1e0c6; border:1px solid #c7b48a; padding:10px;">
        <div style="font-weight:bold;">Annihilator I & II</div>
        <div style="font-size:12px;">Quest</div>
        <div style="margin-top:6px; display:flex; gap:8px;"><a href="?subtopic=anihi">Page</a><a href="https://youtu.be/G4KcweUNGyM" target="_blank">Video</a></div>
      </div>
      <div class="gcard" data-name="Demon Helmet" data-type="Quest" style="background:#f1e0c6; border:1px solid #c7b48a; padding:10px;">
        <div style="font-weight:bold;">Demon Helmet</div>
        <div style="font-size:12px;">Quest</div>
        <div style="margin-top:6px; display:flex; gap:8px;"><a href="?subtopic=demonhelmet">Page</a><a href="https://youtu.be/ggDhfy8cXG4" target="_blank">Video</a></div>
      </div>
      <div class="gcard" data-name="Barbarian Hunt" data-type="Hunt" style="background:#f1e0c6; border:1px solid #c7b48a; padding:10px;">
        <div style="font-weight:bold;">Barbarian Hunt</div>
        <div style="font-size:12px;">Hunt</div>
        <div style="margin-top:6px; display:flex; gap:8px;"><a href="?subtopic=barbarian">Page</a><a href="https://youtu.be/6KBJgVUCVSU" target="_blank">Video</a></div>
      </div>
      <div class="gcard" data-name="Forge System" data-type="System" style="background:#f1e0c6; border:1px solid #c7b48a; padding:10px;">
        <div style="font-weight:bold;">Forge System</div>
        <div style="font-size:12px;">System</div>
        <div style="margin-top:6px; display:flex; gap:8px;"><a href="?subtopic=forgesystem">Page</a><a href="https://www.youtube.com/watch?v=saqwEFwY_v8" target="_blank">Video</a></div>
      </div>
      <div class="gcard" data-name="Craft System" data-type="System" style="background:#f1e0c6; border:1px solid #c7b48a; padding:10px;">
        <div style="font-weight:bold;">Craft System</div>
        <div style="font-size:12px;">System</div>
        <div style="margin-top:6px; display:flex; gap:8px;"><a href="?subtopic=craft">Page</a><a href="https://www.youtube.com/watch?v=GR_KvD2v1HQ" target="_blank">Video</a></div>
      </div>
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
      <th style="padding: 4px; color: #efefef; font-weight: bold; text-align: center;">Page</th>
      <th style="padding: 4px; color: #efefef; font-weight: bold; text-align: center;">Video</th>
    </tr>
    <tr bgcolor="#f1e0c6">
      <td style="padding: 4px; text-align: center;">Annihilator I & II</td>
      <td style="padding: 4px; text-align: center;"><a href="?subtopic=anihi">Open</a></td>
      <td style="padding: 4px; text-align: center;"><a href="https://youtu.be/G4KcweUNGyM" target="_blank">Watch</a></td>
    </tr>
    <tr bgcolor="#d4c0a1">
      <td style="padding: 4px; text-align: center;">Demon Helmet</td>
      <td style="padding: 4px; text-align: center;"><a href="?subtopic=demonhelmet">Open</a></td>
      <td style="padding: 4px; text-align: center;"><a href="https://youtu.be/ggDhfy8cXG4" target="_blank">Watch</a></td>
    </tr>
    <tr bgcolor="#f1e0c6">
      <td style="padding: 4px; text-align: center;">Horned Helmet</td>
      <td style="padding: 4px; text-align: center;"><a href="?subtopic=horned_helmet">Open</a></td>
      <td style="padding: 4px; text-align: center;"><a href="https://youtu.be/ontMAj35bpw" target="_blank">Watch</a></td>
    </tr>
    <tr bgcolor="#d4c0a1">
      <td style="padding: 4px; text-align: center;">Golden Helmet</td>
      <td style="padding: 4px; text-align: center;"><a href="?subtopic=goldenhelmet_quest">Open</a></td>
      <td style="padding: 4px; text-align: center;"><a href="https://youtu.be/wKuijncYtr0" target="_blank">Watch</a></td>
    </tr>
    <tr bgcolor="#f1e0c6">
      <td style="padding: 4px; text-align: center;">Angel Backpack & Golden Doll</td>
      <td style="padding: 4px; text-align: center;"><a href="?subtopic=angelbp">Open</a></td>
      <td style="padding: 4px; text-align: center;"><a href="https://www.youtube.com/watch?v=_mR3-PvBh8s" target="_blank">Watch</a></td>
    </tr>
    <tr bgcolor="#d4c0a1">
      <td style="padding: 4px; text-align: center;">Boots of Waterwalking</td>
      <td style="padding: 4px; text-align: center;"><a href="?subtopic=bootswaterwalking">Open</a></td>
      <td style="padding: 4px; text-align: center;"><a href="https://youtu.be/tHTQJpTejDM" target="_blank">Watch</a></td>
    </tr>
    <tr bgcolor="#f1e0c6">
      <td style="padding: 4px; text-align: center;">Pits of Inferno (POI)</td>
      <td style="padding: 4px; text-align: center;"><a href="?subtopic=poiquest">Open</a></td>
      <td style="padding: 4px; text-align: center;"><a href="https://youtu.be/mmw7df9wO44" target="_blank">Watch</a></td>
    </tr>
  </tbody>
</table>

<h2 style="text-align: center; font-family: Verdana; font-size: 14px; color: #5a2800;">Hunts</h2>
<table style="font-size: 13px; margin: 10px auto 20px; width: 720px; border-spacing: 1px; box-shadow: #000000 1px 1px 10px; font-family: Verdana, Tahoma, Helvetica, sans-serif;" cellspacing="1" cellpadding="5">
  <tbody>
    <tr bgcolor="#505050">
      <th style="padding: 4px; color: #efefef; font-weight: bold; text-align: center;">Hunt</th>
      <th style="padding: 4px; color: #efefef; font-weight: bold; text-align: center;">Page</th>
      <th style="padding: 4px; color: #efefef; font-weight: bold; text-align: center;">Video</th>
    </tr>
    <tr bgcolor="#f1e0c6">
      <td style="padding: 4px; text-align: center;">Demona Warlock & Magician Cave</td>
      <td style="padding: 4px; text-align: center;"><a href="?subtopic=demona">Open</a></td>
      <td style="padding: 4px; text-align: center;"><a href="https://www.youtube.com/watch?v=NvWxqzZBxP0" target="_blank">Watch</a></td>
    </tr>
    <tr bgcolor="#d4c0a1">
      <td style="padding: 4px; text-align: center;">Fury Gate – Carlin</td>
      <td style="padding: 4px; text-align: center;"><a href="?subtopic=fury">Open</a></td>
      <td style="padding: 4px; text-align: center;"><a href="https://www.youtube.com/watch?v=9HGor72Zpbc" target="_blank">Watch</a></td>
    </tr>
    <tr bgcolor="#f1e0c6">
      <td style="padding: 4px; text-align: center;">Yalahar Warlock Cave</td>
      <td style="padding: 4px; text-align: center;"><a href="?subtopic=warlock">Open</a></td>
      <td style="padding: 4px; text-align: center;"><a href="https://www.youtube.com/watch?v=tKyVhK4h5pU" target="_blank">Watch</a></td>
    </tr>
    <tr bgcolor="#d4c0a1">
      <td style="padding: 4px; text-align: center;">Hydras Port Hope + Extension</td>
      <td style="padding: 4px; text-align: center;"><a href="?subtopic=hydraph">Open</a></td>
      <td style="padding: 4px; text-align: center;"><a href="https://www.youtube.com/watch?v=ZMaFUqbCmew" target="_blank">Watch</a></td>
    </tr>
    <tr bgcolor="#f1e0c6">
      <td style="padding: 4px; text-align: center;">Hydras in Hydrana</td>
      <td style="padding: 4px; text-align: center;"><a href="?subtopic=hydraph">Open</a></td>
      <td style="padding: 4px; text-align: center;"><a href="https://www.youtube.com/watch?v=7s3bkSWxLko" target="_blank">Watch</a></td>
    </tr>
    <tr bgcolor="#d4c0a1">
      <td style="padding: 4px; text-align: center;">Royal Castle Island</td>
      <td style="padding: 4px; text-align: center;"><a href="?subtopic=royalcastle">Open</a></td>
      <td style="padding: 4px; text-align: center;"><a href="https://www.youtube.com/watch?v=gp2XHitslg0" target="_blank">Watch</a></td>
    </tr>
  </tbody>
</table>

<h3 style="text-align:center; font-family: Verdana; font-size: 13px; color:#5a2800; margin-top:28px;">Hunts – City Respawns</h3>
<table style="font-size: 13px; margin: 10px auto 20px; width: 720px; border-spacing: 1px; box-shadow: #000000 1px 1px 10px; font-family: Verdana, Tahoma, Helvetica, sans-serif;" cellspacing="1" cellpadding="5">
  <tbody>
    <tr bgcolor="#505050">
      <th style="padding: 4px; color: #efefef; font-weight: bold; text-align: center;">City</th>
      <th style="padding: 4px; color: #efefef; font-weight: bold; text-align: center;">Page</th>
    </tr>
    <tr bgcolor="#f1e0c6"><td style="padding: 4px; text-align: center;">Alva</td><td style="padding: 4px; text-align: center;"><a href="/?Alva">Open</a></td></tr>
    <tr bgcolor="#d4c0a1"><td style="padding: 4px; text-align: center;">Carlin</td><td style="padding: 4px; text-align: center;"><a href="/?Carlin">Open</a></td></tr>
    <tr bgcolor="#f1e0c6"><td style="padding: 4px; text-align: center;">Darashia</td><td style="padding: 4px; text-align: center;"><a href="/?Darashia">Open</a></td></tr>
    <tr bgcolor="#d4c0a1"><td style="padding: 4px; text-align: center;">Liberty Bay</td><td style="padding: 4px; text-align: center;"><a href="/?LibertyBay">Open</a></td></tr>
    <tr bgcolor="#f1e0c6"><td style="padding: 4px; text-align: center;">Port Hope</td><td style="padding: 4px; text-align: center;"><a href="/?PortHope">Open</a></td></tr>
    <tr bgcolor="#d4c0a1"><td style="padding: 4px; text-align: center;">Rookgaard</td><td style="padding: 4px; text-align: center;"><a href="/?Rook">Open</a></td></tr>
    <tr bgcolor="#f1e0c6"><td style="padding: 4px; text-align: center;">Svargrond</td><td style="padding: 4px; text-align: center;"><a href="/?Svargrond">Open</a></td></tr>
    <tr bgcolor="#d4c0a1"><td style="padding: 4px; text-align: center;">Thais</td><td style="padding: 4px; text-align: center;"><a href="/?Thais">Open</a></td></tr>
    <tr bgcolor="#f1e0c6"><td style="padding: 4px; text-align: center;">Venore</td><td style="padding: 4px; text-align: center;"><a href="/?Venore">Open</a></td></tr>
    <tr bgcolor="#d4c0a1"><td style="padding: 4px; text-align: center;">Yalahar</td><td style="padding: 4px; text-align: center;"><a href="/?Yalahar">Open</a></td></tr>
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
    <tr bgcolor="#f1e0c6"><td style="text-align:center; padding:4px;">DL Cave – Thais</td><td style="text-align:center; padding:4px;"><a href="/?dlthais">Open</a></td><td style="text-align:center; padding:4px;">50+</td></tr>
    <tr bgcolor="#d4c0a1"><td style="text-align:center; padding:4px;">Fury Gate - Carlin</td><td style="text-align:center; padding:4px;"><a href="/?fury">Open</a></td><td style="text-align:center; padding:4px;">100+</td></tr>
    <tr bgcolor="#f1e0c6"><td style="text-align:center; padding:4px;">Wyrm Invasion - Liberty Bay</td><td style="text-align:center; padding:4px;"><a href="/?warlock">Open</a></td><td style="text-align:center; padding:4px;">100+</td></tr>
    <tr bgcolor="#d4c0a1"><td style="text-align:center; padding:4px;">Daily Boss Lory Mistress - Darashia</td><td style="text-align:center; padding:4px;"><a href="/?bosslory">Open</a></td><td style="text-align:center; padding:4px;">150+</td></tr>
    <tr bgcolor="#f1e0c6"><td style="text-align:center; padding:4px;">Shortcut Demona - Carlin</td><td style="text-align:center; padding:4px;"><a href="/?demona">Open</a></td><td style="text-align:center; padding:4px;">150+</td></tr>
    <tr bgcolor="#d4c0a1"><td style="text-align:center; padding:4px;">Lory Keeper - Darashia</td><td style="text-align:center; padding:4px;"><a href="/?lorys">Open</a></td><td style="text-align:center; padding:4px;">150+</td></tr>
    <tr bgcolor="#f1e0c6"><td style="text-align:center; padding:4px;">Dangerous Cave – North of Carlin</td><td style="text-align:center; padding:4px;"><a href="/?sea_north_carlin">Open</a></td><td style="text-align:center; padding:4px;">150+</td></tr>
    <tr bgcolor="#d4c0a1"><td style="text-align:center; padding:4px;">Dragon Island - Thais</td><td style="text-align:center; padding:4px;"><a href="/?thaisdragon">Open</a></td><td style="text-align:center; padding:4px;">150+</td></tr>
    <tr bgcolor="#f1e0c6"><td style="text-align:center; padding:4px;">Warlock Invasion - Yalahar</td><td style="text-align:center; padding:4px;"><a href="/?warlock">Open</a></td><td style="text-align:center; padding:4px;">150+</td></tr>
    <tr bgcolor="#d4c0a1"><td style="text-align:center; padding:4px;">Frozen Hero Invasion - Svargrond</td><td style="text-align:center; padding:4px;"><a href="/?frozen">Open</a></td><td style="text-align:center; padding:4px;">150+</td></tr>
    <tr bgcolor="#f1e0c6"><td style="text-align:center; padding:4px;">Fast Shop & DP</td><td style="text-align:center; padding:4px;"><a href="/?fastshop">Open</a></td><td style="text-align:center; padding:4px;">150+</td></tr>
    <tr bgcolor="#d4c0a1"><td style="text-align:center; padding:4px;">Darkness Dragon - Calcanea Island</td><td style="text-align:center; padding:4px;"><a href="/?darkness">Open</a></td><td style="text-align:center; padding:4px;">200+</td></tr>
    <tr bgcolor="#f1e0c6"><td style="text-align:center; padding:4px;">Grim Reaper - Deeper Drefia</td><td style="text-align:center; padding:4px;"><a href="/?grimreaper">Open</a></td><td style="text-align:center; padding:4px;">200+</td></tr>
    <tr bgcolor="#d4c0a1"><td style="text-align:center; padding:4px;">Serpent and Hellspawn - Goroma</td><td style="text-align:center; padding:4px;"><a href="/?serpent">Open</a></td><td style="text-align:center; padding:4px;">200+</td></tr>
    <tr bgcolor="#f1e0c6"><td style="text-align:center; padding:4px;">Nokmir - West Thais</td><td style="text-align:center; padding:4px;"><a href="/?nokmirthais">Open</a></td><td style="text-align:center; padding:4px;">200+</td></tr>
    <tr bgcolor="#d4c0a1"><td style="text-align:center; padding:4px;">Daily Boss Balrog - Kazz</td><td style="text-align:center; padding:4px;"><a href="/?balrog">Open</a></td><td style="text-align:center; padding:4px;">250+</td></tr>
    <tr bgcolor="#f1e0c6"><td style="text-align:center; padding:4px;">Demon Knight Area</td><td style="text-align:center; padding:4px;"><a href="/?demon_knight">Open</a></td><td style="text-align:center; padding:4px;">250+</td></tr>
    <tr bgcolor="#d4c0a1"><td style="text-align:center; padding:4px;">Milenar Dragon - Alzude</td><td style="text-align:center; padding:4px;"><a href="/?milenar">Open</a></td><td style="text-align:center; padding:4px;">250+</td></tr>
    <tr bgcolor="#f1e0c6"><td style="text-align:center; padding:4px;">Dark Torturer Temple</td><td style="text-align:center; padding:4px;"><a href="/?darktorturer">Open</a></td><td style="text-align:center; padding:4px;">300+</td></tr>
    <tr bgcolor="#d4c0a1"><td style="text-align:center; padding:4px;">Mystical Tower</td><td style="text-align:center; padding:4px;"><a href="/?mystical">Open</a></td><td style="text-align:center; padding:4px;">300+</td></tr>
    <tr bgcolor="#f1e0c6"><td style="text-align:center; padding:4px;">Skull Dragon Castle</td><td style="text-align:center; padding:4px;"><a href="/?skulldragon">Open</a></td><td style="text-align:center; padding:4px;">300+</td></tr>
    <tr bgcolor="#d4c0a1"><td style="text-align:center; padding:4px;">Hydra Pharaoh Temple</td><td style="text-align:center; padding:4px;"><a href="/?hydraph">Open</a></td><td style="text-align:center; padding:4px;">350+</td></tr>
    <tr bgcolor="#f1e0c6"><td style="text-align:center; padding:4px;">Yalahar Quarter (east)</td><td style="text-align:center; padding:4px;"><a href="/?yalaharquarter">Open</a></td><td style="text-align:center; padding:4px;">350+</td></tr>
    <tr bgcolor="#d4c0a1"><td style="text-align:center; padding:4px;">White Magician Island</td><td style="text-align:center; padding:4px;"><a href="/?whitemagician">Open</a></td><td style="text-align:center; padding:4px;">350+</td></tr>
    <tr bgcolor="#f1e0c6"><td style="text-align:center; padding:4px;">Queen Medusa</td><td style="text-align:center; padding:4px;"><a href="/?queenmedusa">Open</a></td><td style="text-align:center; padding:4px;">400+</td></tr>
    <tr bgcolor="#d4c0a1"><td style="text-align:center; padding:4px;">Spider Queen Isle</td><td style="text-align:center; padding:4px;"><a href="/?spiderqueen">Open</a></td><td style="text-align:center; padding:4px;">400+</td></tr>
    <tr bgcolor="#f1e0c6"><td style="text-align:center; padding:4px;">White Magician Tower</td><td style="text-align:center; padding:4px;"><a href="/?whitemagiciantower">Open</a></td><td style="text-align:center; padding:4px;">400+</td></tr>
    <tr bgcolor="#d4c0a1"><td style="text-align:center; padding:4px;">Darashia Pharaoh Tomb</td><td style="text-align:center; padding:4px;"><a href="/?darapharao">Open</a></td><td style="text-align:center; padding:4px;">450+</td></tr>
    <tr bgcolor="#f1e0c6"><td style="text-align:center; padding:4px;">Banuta Queen</td><td style="text-align:center; padding:4px;"><a href="/?banutaqueen">Open</a></td><td style="text-align:center; padding:4px;">450+</td></tr>
    <tr bgcolor="#d4c0a1"><td style="text-align:center; padding:4px;">Barbarians Isle</td><td style="text-align:center; padding:4px;"><a href="/?barbarian">Open</a></td><td style="text-align:center; padding:4px;">450+</td></tr>
  </tbody>
</table>


<h2 style="text-align: center; font-family: Verdana; font-size: 14px; color: #5a2800;">Guides</h2>
<p style="text-align: center; font-size: 12px; font-family: Verdana, Tahoma, Helvetica, sans-serif;">
  Explore more content on our official YouTube channel: 
  <a href="https://www.youtube.com/@KarmaGlobalServer" target="_blank">Karma Global Server</a>
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

  // Auto-build more cards from Quests and Hunts tables
  (function buildGuidesCards(){
    try {
      var grid = document.getElementById('guides-grid');
      if (!grid) return;
      var existing = new Set();
      grid.querySelectorAll('.gcard').forEach(function(c){ existing.add((c.getAttribute('data-name')||'') + '::' + (c.getAttribute('data-type')||'')); });

      function add(name, type, pageHref, videoHref){
        var key = name + '::' + type;
        if (existing.has(key)) return;
        existing.add(key);
        var card = document.createElement('div');
        card.className = 'gcard';
        card.setAttribute('data-name', name);
        card.setAttribute('data-type', type);
        card.style.background = '#f1e0c6';
        card.style.border = '1px solid #c7b48a';
        card.style.padding = '10px';
        var t = document.createElement('div'); t.style.fontWeight = 'bold'; t.textContent = name; card.appendChild(t);
        var meta = document.createElement('div'); meta.style.fontSize = '12px'; meta.textContent = type; card.appendChild(meta);
        var links = document.createElement('div'); links.style.marginTop = '6px'; links.style.display = 'flex'; links.style.gap = '8px';
        if (pageHref){ var a = document.createElement('a'); a.href = pageHref; a.textContent = 'Page'; links.appendChild(a); }
        if (videoHref){ var v = document.createElement('a'); v.href = videoHref; v.target = '_blank'; v.textContent = 'Video'; links.appendChild(v); }
        card.appendChild(links);
        grid.appendChild(card);
      }

      // From Quests table
      document.querySelectorAll('h2 + table tbody tr').forEach(function(row){
        var headers = document.querySelectorAll('h2');
      });
      // Quests section
      var questsTable = Array.from(document.querySelectorAll('h2')).find(h=>/Quests/i.test(h.textContent));
      if (questsTable){
        var t = questsTable.nextElementSibling; if (t && t.tagName==='TABLE'){
          t.querySelectorAll('tbody tr').forEach(function(tr,i){ if (i===0) return; var td = tr.querySelectorAll('td'); if (td.length){ var name = td[0].textContent.trim(); var page = td[1].querySelector('a'); var vid = td[2].querySelector('a'); add(name,'Quest',page?page.getAttribute('href'):'', vid?vid.getAttribute('href'):''); }});
        }
      }
      // Hunts section (first table under Hunts h2)
      var huntsH2 = Array.from(document.querySelectorAll('h2')).find(h=>/Hunts$/i.test(h.textContent.trim()));
      if (huntsH2){
        var table = huntsH2.nextElementSibling; if (table && table.tagName==='TABLE'){
          table.querySelectorAll('tbody tr').forEach(function(tr,i){ if (i===0) return; var td = tr.querySelectorAll('td'); if (td.length){ var name = td[0].textContent.trim(); var page = td[1].querySelector('a'); var vid = td[2] ? td[2].querySelector('a') : null; add(name,'Hunt', page?page.getAttribute('href'):'', vid?vid.getAttribute('href'):''); }});
        }
      }
    } catch(e){}
  })();

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
  // start collapsed
  (function initGuidesCollapse(){
    try {
      var g = document.getElementById('guides-grid');
      if (g){ g.setAttribute('data-collapsed','0'); toggleGuidesCollapse(); }
    } catch(e){}
  })();

  // Inject Level column into Quests and Hunts tables
  (function addLevelColumns(){
    try {
      // Mapping of required/recommended levels
      var levelByName = {
        // Quests
        'Annihilator I & II': '100+',
        'Demon Helmet': '120+',
        'Horned Helmet': '80+',
        'Golden Helmet': '150+',
        'Angel Backpack & Golden Doll': '—',
        'Boots of Waterwalking': '—',
        'Pits of Inferno (POI)': '120+',
        // Hunts
        'Demona Warlock & Magician Cave': '150+',
        'Fury Gate – Carlin': '100+',
        'Yalahar Warlock Cave': '150+',
        'Hydras Port Hope + Extension': '150+',
        'Hydras in Hydrana': '120+',
        'Royal Castle Island': '200+'
      };

      function inject(h2Regex){
        var h = Array.from(document.querySelectorAll('h2')).find(function(x){ return h2Regex.test((x.textContent||'').trim()); });
        if (!h) return;
        var table = h.nextElementSibling; if (!table || table.tagName !== 'TABLE') return;
        var tbody = table.querySelector('tbody'); if (!tbody) return;
        var rows = Array.from(tbody.querySelectorAll('tr'));
        if (!rows.length) return;
        // Insert header cell after first column (Quest/Hunt)
        var header = rows[0];
        var ths = header.querySelectorAll('th');
        if (ths.length && !Array.from(ths).some(function(th){ return /Level/i.test(th.textContent||''); })){
          var th = document.createElement('th');
          th.style.padding = '4px'; th.style.color = '#efefef'; th.style.fontWeight = 'bold'; th.style.textAlign = 'center';
          th.textContent = 'Level';
          header.insertBefore(th, ths[1] || null);
        }
        // Insert data cells for each row
        rows.slice(1).forEach(function(tr){
          var tds = tr.querySelectorAll('td');
          if (!tds.length) return;
          var name = (tds[0].textContent||'').trim();
          var level = levelByName[name] || '—';
          var td = document.createElement('td');
          td.style.padding = '4px'; td.style.textAlign = 'center';
          td.textContent = level;
          tr.insertBefore(td, tds[1] || null);
        });
      }

      inject(/Quests/i);
      inject(/Hunts$/i);
    } catch(e){}
  })();
</script>