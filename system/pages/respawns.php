
<!-- Page Title - Oldschool style with icons -->
<div style="max-width:800px;margin:0 auto 8px;font-family:Verdana,Tahoma,Helvetica,sans-serif;">
  <h1 style="text-align:center;color:#333333;font-size:16px;margin:8px 0;">
    <img src="/images/items_shop/items/6010.png" style="vertical-align:middle;image-rendering:pixelated;width:22px;height:22px;margin-right:6px;"> RESPAWNS <img src="/images/items_shop/items/6010.png" style="vertical-align:middle;image-rendering:pixelated;width:22px;height:22px;margin-left:6px;">
  </h1>
  <div style="height:2px;background:#4a4a45;box-shadow:#000 0 0 4px;opacity:.6;"></div>
</div>

<!-- Container principal centralizado -->
<div style="max-width: 800px; margin: 0 auto; padding: 20px; font-family: Verdana, Tahoma, Helvetica, sans-serif;">

  <!-- Custom Respawns Hub (Quick Start) -->
  <div style="margin-bottom: 24px;">
    <div style="background:#f1e0c6; border:1px solid #c7b48a; padding:10px 12px; font-weight:bold; text-align:center;">Custom Respawns Hub</div>
    <div style="background:#d4c0a1; border:1px solid #c7b48a; padding:10px 12px;">
      Welcome to KarmaOT's custom respawns. This hub helps new players quickly find hunts by level and city, with short tips and videos when available.
      Use the filters below or jump straight to the tabs.
    </div>
    <div style="background:#d4c0a1; border:1px solid #c7b48a; padding:10px 12px; margin-top:8px;">
      <div style="display:flex; gap:8px; flex-wrap:wrap; align-items:center; justify-content:center;">
        <input id="hub-search" type="text" placeholder="Search by name..." style="padding:6px; min-width:220px;" oninput="filterHub()">
        <select id="hub-level" style="padding:6px;" onchange="filterHub()">
          <option value="">Level (any)</option>
          <option>50+</option>
          <option>100+</option>
          <option>150+</option>
          <option>200+</option>
          <option>250+</option>
          <option>300+</option>
          <option>350+</option>
          <option>400+</option>
          <option>450+</option>
        </select>
        <select id="hub-city" style="padding:6px;" onchange="filterHub()">
          <option value="">City (any)</option>
          <option>Alva</option>
          <option>Carlin</option>
          <option>Darashia</option>
          <option>Liberty Bay</option>
          <option>Port Hope</option>
          <option>Rookgaard</option>
          <option>Svargrond</option>
          <option>Thais</option>
          <option>Venore</option>
          <option>Yalahar</option>
        </select>
        <button onclick="filterHub()" style="padding:6px 10px; background:#4a4a45; color:#fff; border:1px solid #333; cursor:pointer;">Filter</button>
        <button onclick="resetHub()" style="padding:6px 10px; background:#8f6e3a; color:#fff; border:1px solid #6f4e1a; cursor:pointer;">Reset</button>
      </div>
      <div id="hub-grid" style="display:grid; grid-template-columns: repeat(auto-fill, minmax(220px,1fr)); gap:10px; margin-top:10px; max-height: 360px; overflow:auto;">
        <!-- Minimal curated starters: you can add more later -->
        <div class="hub-card" data-name="DL Cave – Thais" data-level="150+" data-city="Thais" style="background:#f1e0c6; border:1px solid #c7b48a; padding:10px;">
          <div style="font-weight:bold;">DL Cave – Thais</div>
          <div style="font-size:12px;">150+ • City: Thais</div>
          <div style="margin-top:6px; display:flex; gap:8px;">
            <a href="/?dlthais">Page</a>
            <a href="https://www.youtube.com/watch?v=ZMaFUqbCmew" target="_blank">Video</a>
          </div>
        </div>
        <div class="hub-card" data-name="Warlock Invasion - Yalahar" data-level="100+" data-city="Yalahar" style="background:#f1e0c6; border:1px solid #c7b48a; padding:10px;">
          <div style="font-weight:bold;">Warlock Invasion - Yalahar</div>
          <div style="font-size:12px;">100+ • City: Yalahar</div>
          <div style="margin-top:6px; display:flex; gap:8px;">
            <a href="/?warlock">Page</a>
            <a href="https://www.youtube.com/watch?v=tKyVhK4h5pU" target="_blank">Video</a>
          </div>
        </div>
        <div class="hub-card" data-name="Barbarians Isle" data-level="450+" data-city="Svargrond" style="background:#f1e0c6; border:1px solid #c7b48a; padding:10px;">
          <div style="font-weight:bold;">Barbarians Isle</div>
          <div style="font-size:12px;">450+ • City: Svargrond</div>
          <div style="margin-top:6px; display:flex; gap:8px;">
            <a href="/?barbarian">Page</a>
            <a href="https://youtu.be/6KBJgVUCVSU" target="_blank">Video</a>
          </div>
        </div>
        <div class="hub-card" data-name="Hydra Pharaoh Temple" data-level="350+" data-city="Darashia" style="background:#f1e0c6; border:1px solid #c7b48a; padding:10px;">
          <div style="font-weight:bold;">Hydra Pharaoh Temple</div>
          <div style="font-size:12px;">350+ • City: Darashia</div>
          <div style="margin-top:6px; display:flex; gap:8px;">
            <a href="/?hydraph">Page</a>
          </div>
        </div>
      </div>
      
    </div>
  </div>

  <!-- Botões de navegação centralizados -->
  <div style="text-align: center; margin-bottom: 30px;">
    <button onclick="showTab('citiesTab')" style="margin: 5px; padding: 10px 20px; background-color: #4a4a45; color: white; border: none; border-radius: 5px; cursor: pointer; font-weight: bold;">City Respawns</button>
    <button onclick="showTab('specialsTab')" style="margin: 5px; padding: 10px 20px; background-color: #4a4a45; color: white; border: none; border-radius: 5px; cursor: pointer; font-weight: bold;">Special Areas</button>
    <button onclick="showTab('questsTab')" style="margin: 5px; padding: 10px 20px; background-color: #4a4a45; color: white; border: none; border-radius: 5px; cursor: pointer; font-weight: bold;">Quests</button>
  </div>

  <!-- Aba 1: Respawns por cidade -->
  <div id="citiesTab" style="text-align: center;">
    <p style="text-align: center; margin-bottom: 20px;"><em><span style="color: #333333; font-size: 16px;">Here are the cities and their respawns:</span></em></p>
    
    <div class="subsection">
      <div class="toggle-title" onclick="toggleSection('city_alva')">Alva</div>
      <div class="toggle-content" id="city_alva" style="display:none;">
        <table cellpadding="10" cellspacing="1" style="font-size: 13px; color: #5a2800; margin: 0 auto 10px; width: 95%; max-width: 600px; border-spacing: 1px; font-family: Verdana, Tahoma, Helvetica, sans-serif; box-shadow: #000000 1px 1px 10px;">
          <tbody>
            <tr bgcolor="#505050"><td style="color: #efefef; font-weight: bold; text-align: center;">Respawns</td></tr>
            <tr bgcolor="#D4C0A1"><td style="text-align: center;"><a href="/?Alva">Alva Respawns</a></td></tr>
          </tbody>
        </table>
      </div>
    </div>
    
    <div class="subsection">
      <div class="toggle-title" onclick="toggleSection('city_carlin')">Carlin</div>
      <div class="toggle-content" id="city_carlin" style="display:none;">
        <table cellpadding="10" cellspacing="1" style="font-size: 13px; color: #5a2800; margin: 0 auto 10px; width: 95%; max-width: 600px; border-spacing: 1px; font-family: Verdana, Tahoma, Helvetica, sans-serif; box-shadow: #000000 1px 1px 10px;">
          <tbody>
            <tr bgcolor="#505050"><td style="color: #efefef; font-weight: bold; text-align: center;">Respawns</td></tr>
            <tr bgcolor="#D4C0A1"><td style="text-align: center;"><a href="/?Carlin">Carlin Respawns</a></td></tr>
          </tbody>
        </table>
      </div>
    </div>
    
    <div class="subsection">
      <div class="toggle-title" onclick="toggleSection('city_darashia')">Darashia</div>
      <div class="toggle-content" id="city_darashia" style="display:none;">
        <table cellpadding="10" cellspacing="1" style="font-size: 13px; color: #5a2800; margin: 0 auto 10px; width: 95%; max-width: 600px; border-spacing: 1px; font-family: Verdana, Tahoma, Helvetica, sans-serif; box-shadow: #000000 1px 1px 10px;">
          <tbody>
            <tr bgcolor="#505050"><td style="color: #efefef; font-weight: bold; text-align: center;">Respawns</td></tr>
            <tr bgcolor="#D4C0A1"><td style="text-align: center;"><a href="/?Darashia">Darashia Respawns</a></td></tr>
          </tbody>
        </table>
      </div>
    </div>
    
    <div class="subsection">
      <div class="toggle-title" onclick="toggleSection('city_libertybay')">Liberty Bay</div>
      <div class="toggle-content" id="city_libertybay" style="display:none;">
        <table cellpadding="10" cellspacing="1" style="font-size: 13px; color: #5a2800; margin: 0 auto 10px; width: 95%; max-width: 600px; border-spacing: 1px; font-family: Verdana, Tahoma, Helvetica, sans-serif; box-shadow: #000000 1px 1px 10px;">
          <tbody>
            <tr bgcolor="#505050"><td style="color: #efefef; font-weight: bold; text-align: center;">Respawns</td></tr>
            <tr bgcolor="#D4C0A1"><td style="text-align: center;"><a href="/?LibertyBay">Liberty Bay Respawns</a></td></tr>
          </tbody>
        </table>
      </div>
    </div>
    
    <div class="subsection">
      <div class="toggle-title" onclick="toggleSection('city_porthope')">Port Hope</div>
      <div class="toggle-content" id="city_porthope" style="display:none;">
        <table cellpadding="10" cellspacing="1" style="font-size: 13px; color: #5a2800; margin: 0 auto 10px; width: 95%; max-width: 600px; border-spacing: 1px; font-family: Verdana, Tahoma, Helvetica, sans-serif; box-shadow: #000000 1px 1px 10px;">
          <tbody>
            <tr bgcolor="#505050"><td style="color: #efefef; font-weight: bold; text-align: center;">Respawns</td></tr>
            <tr bgcolor="#D4C0A1"><td style="text-align: center;"><a href="/?PortHope">Port Hope Respawns</a></td></tr>
          </tbody>
        </table>
      </div>
    </div>
    
    <div class="subsection">
      <div class="toggle-title" onclick="toggleSection('city_rook')">Rookgaard</div>
      <div class="toggle-content" id="city_rook" style="display:none;">
        <table cellpadding="10" cellspacing="1" style="font-size: 13px; color: #5a2800; margin: 0 auto 10px; width: 95%; max-width: 600px; border-spacing: 1px; font-family: Verdana, Tahoma, Helvetica, sans-serif; box-shadow: #000000 1px 1px 10px;">
          <tbody>
            <tr bgcolor="#505050"><td style="color: #efefef; font-weight: bold; text-align: center;">Respawns</td></tr>
            <tr bgcolor="#D4C0A1"><td style="text-align: center;"><a href="/?Rook">Rookgaard Respawns</a></td></tr>
          </tbody>
        </table>
      </div>
    </div>
    
    <div class="subsection">
      <div class="toggle-title" onclick="toggleSection('city_svargrond')">Svargrond</div>
      <div class="toggle-content" id="city_svargrond" style="display:none;">
        <table cellpadding="10" cellspacing="1" style="font-size: 13px; color: #5a2800; margin: 0 auto 10px; width: 95%; max-width: 600px; border-spacing: 1px; font-family: Verdana, Tahoma, Helvetica, sans-serif; box-shadow: #000000 1px 1px 10px;">
          <tbody>
            <tr bgcolor="#505050"><td style="color: #efefef; font-weight: bold; text-align: center;">Respawns</td></tr>
            <tr bgcolor="#D4C0A1"><td style="text-align: center;"><a href="/?Svargrond">Svargrond Respawns</a></td></tr>
          </tbody>
        </table>
      </div>
    </div>
    
    <div class="subsection">
      <div class="toggle-title" onclick="toggleSection('city_thais')">Thais</div>
      <div class="toggle-content" id="city_thais" style="display:none;">
        <table cellpadding="10" cellspacing="1" style="font-size: 13px; color: #5a2800; margin: 0 auto 10px; width: 95%; max-width: 600px; border-spacing: 1px; font-family: Verdana, Tahoma, Helvetica, sans-serif; box-shadow: #000000 1px 1px 10px;">
          <tbody>
            <tr bgcolor="#505050"><td style="color: #efefef; font-weight: bold; text-align: center;">Respawns</td></tr>
            <tr bgcolor="#D4C0A1"><td style="text-align: center;"><a href="/?Thais">Thais Respawns</a></td></tr>
          </tbody>
        </table>
      </div>
    </div>
    
    <div class="subsection">
      <div class="toggle-title" onclick="toggleSection('city_venore')">Venore</div>
      <div class="toggle-content" id="city_venore" style="display:none;">
        <table cellpadding="10" cellspacing="1" style="font-size: 13px; color: #5a2800; margin: 0 auto 10px; width: 95%; max-width: 600px; border-spacing: 1px; font-family: Verdana, Tahoma, Helvetica, sans-serif; box-shadow: #000000 1px 1px 10px;">
          <tbody>
            <tr bgcolor="#505050"><td style="color: #efefef; font-weight: bold; text-align: center;">Respawns</td></tr>
            <tr bgcolor="#D4C0A1"><td style="text-align: center;"><a href="/?Venore">Venore Respawns</a></td></tr>
          </tbody>
        </table>
      </div>
    </div>
    
    <div class="subsection">
      <div class="toggle-title" onclick="toggleSection('city_yalahar')">Yalahar</div>
      <div class="toggle-content" id="city_yalahar" style="display:none;">
        <table cellpadding="10" cellspacing="1" style="font-size: 13px; color: #5a2800; margin: 0 auto 10px; width: 95%; max-width: 600px; border-spacing: 1px; font-family: Verdana, Tahoma, Helvetica, sans-serif; box-shadow: #000000 1px 1px 10px;">
          <tbody>
            <tr bgcolor="#505050"><td style="color: #efefef; font-weight: bold; text-align: center;">Respawns</td></tr>
            <tr bgcolor="#D4C0A1"><td style="text-align: center;"><a href="/?Yalahar">Yalahar Respawns</a></td></tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Aba 2: Special Areas -->
  <div id="specialsTab" style="display:none; text-align: center;">
    <p style="text-align: center; margin-bottom: 20px;"><em><span style="color: #333333; font-size: 16px;">Check out these custom areas and systems organized by level:</span></em></p>
    
    <div class="subsection">
      <div class="toggle-title" onclick="toggleSection('specials_50+')">Level 50+</div>
      <div class="toggle-content" id="specials_50+" style="display:none;">
        <table cellpadding="10" cellspacing="1" style="font-size: 13px; color: #5a2800; margin: 0 auto 10px; width: 95%; max-width: 600px; border-spacing: 1px; font-family: Verdana, Tahoma, Helvetica, sans-serif; box-shadow: #000000 1px 1px 10px;">
          <tbody>
            <tr bgcolor="#505050"><td style="color: #efefef; font-weight: bold; text-align: center;">Name</td></tr>
            <tr bgcolor="#D4C0A1"><td style="text-align: center;"><a href="/?dlthais">DL Cave – Thais</a></td></tr>
          </tbody>
        </table>
      </div>
    </div>
    
    <div class="subsection">
      <div class="toggle-title" onclick="toggleSection('specials_100+')">Level 100+</div>
      <div class="toggle-content" id="specials_100+" style="display:none;">
        <table cellpadding="10" cellspacing="1" style="font-size: 13px; color: #5a2800; margin: 0 auto 10px; width: 95%; max-width: 600px; border-spacing: 1px; font-family: Verdana, Tahoma, Helvetica, sans-serif; box-shadow: #000000 1px 1px 10px;">
          <tbody>
            <tr bgcolor="#505050"><td style="color: #efefef; font-weight: bold; text-align: center;">Name</td></tr>
            <tr bgcolor="#D4C0A1"><td style="text-align: center;"><a href="/?fury">Fury Gate - Carlin</a></td></tr>
            <tr bgcolor="#F1E0C6"><td style="text-align: center;"><a href="/?warlock">Wyrm Invasion - Liberty Bay</a></td></tr>
          </tbody>
        </table>
      </div>
    </div>
    
    <div class="subsection">
      <div class="toggle-title" onclick="toggleSection('specials_150+')">Level 150+</div>
      <div class="toggle-content" id="specials_150+" style="display:none;">
        <table cellpadding="10" cellspacing="1" style="font-size: 13px; color: #5a2800; margin: 0 auto 10px; width: 95%; max-width: 600px; border-spacing: 1px; font-family: Verdana, Tahoma, Helvetica, sans-serif; box-shadow: #000000 1px 1px 10px;">
          <tbody>
            <tr bgcolor="#505050"><td style="color: #efefef; font-weight: bold; text-align: center;">Name</td></tr>
            <tr bgcolor="#D4C0A1"><td style="text-align: center;"><a href="/?bosslory">Daily Boss Lory Mistress - Darashia</a></td></tr>
            <tr bgcolor="#F1E0C6"><td style="text-align: center;"><a href="/?demona">Shortcut Demona - Carlin</a></td></tr>
            <tr bgcolor="#D4C0A1"><td style="text-align: center;"><a href="/?lorys">Lory Keeper - Darashia</a></td></tr>
            <tr bgcolor="#F1E0C6"><td style="text-align: center;"><a href="/?sea_north_carlin">Dangerous Cave – North of Carlin</a></td></tr>
            <tr bgcolor="#D4C0A1"><td style="text-align: center;"><a href="/?thaisdragon">Dragon Island - Thais</a></td></tr>
            <tr bgcolor="#F1E0C6"><td style="text-align: center;"><a href="/?warlock">Warlock Invasion - Yalahar</a></td></tr>
            <tr bgcolor="#D4C0A1"><td style="text-align: center;"><a href="/?frozen">Frozen Hero Invasion - Svargrond</a></td></tr>
            <tr bgcolor="#F1E0C6"><td style="text-align: center;"><a href="/?fastshop">Fast Shop &amp; DP</a></td></tr>
          </tbody>
        </table>
      </div>
    </div>
    
    <div class="subsection">
      <div class="toggle-title" onclick="toggleSection('specials_200+')">Level 200+</div>
      <div class="toggle-content" id="specials_200+" style="display:none;">
        <table cellpadding="10" cellspacing="1" style="font-size: 13px; color: #5a2800; margin: 0 auto 10px; width: 95%; max-width: 600px; border-spacing: 1px; font-family: Verdana, Tahoma, Helvetica, sans-serif; box-shadow: #000000 1px 1px 10px;">
          <tbody>
            <tr bgcolor="#505050"><td style="color: #efefef; font-weight: bold; text-align: center;">Name</td></tr>
            <tr bgcolor="#D4C0A1"><td style="text-align: center;"><a href="/?darkness">Darkness Dragon - Calcanea Island</a></td></tr>
            <tr bgcolor="#F1E0C6"><td style="text-align: center;"><a href="/?grimreaper">Grim Reaper - Deeper Drefia</a></td></tr>
            <tr bgcolor="#D4C0A1"><td style="text-align: center;"><a href="/?serpent">Serpent and Hellspawn - Goroma</a></td></tr>
            <tr bgcolor="#F1E0C6"><td style="text-align: center;"><a href="/?nokmirthais">Nokmir - West Thais</a></td></tr>			
          </tbody>
        </table>
      </div>
    </div>
    
    <div class="subsection">
      <div class="toggle-title" onclick="toggleSection('specials_250+')">Level 250+</div>
      <div class="toggle-content" id="specials_250+" style="display:none;">
        <table cellpadding="10" cellspacing="1" style="font-size: 13px; color: #5a2800; margin: 0 auto 10px; width: 95%; max-width: 600px; border-spacing: 1px; font-family: Verdana, Tahoma, Helvetica, sans-serif; box-shadow: #000000 1px 1px 10px;">
          <tbody>
            <tr bgcolor="#505050"><td style="color: #efefef; font-weight: bold; text-align: center;">Name</td></tr>
            <tr bgcolor="#D4C0A1"><td style="text-align: center;"><a href="/?balrog">Daily Boss Balrog - Kazz</a></td></tr>
            <tr bgcolor="#F1E0C6"><td style="text-align: center;"><a href="/?demon_knight">Demon Knight Area</a></td></tr>
            <tr bgcolor="#D4C0A1"><td style="text-align: center;"><a href="/?milenar">Milenar Dragon - Alzude</a></td></tr>
          </tbody>
        </table>
      </div>
    </div>
    
    <div class="subsection">
      <div class="toggle-title" onclick="toggleSection('specials_300')">Level 300+</div>
      <div class="toggle-content" id="specials_300" style="display:none;">
        <table class="respawn-table" style="font-size: 13px; color: #5a2800; margin: 0 auto 10px; width: 95%; max-width: 600px; border-spacing: 1px; font-family: Verdana, Tahoma, Helvetica, sans-serif; box-shadow: #000000 1px 1px 10px;">
          <tbody>
            <tr bgcolor="#505050"><td class="header" style="color: #efefef; font-weight: bold; text-align: center;">Name</td></tr>
            <tr bgcolor="#D4C0A1"><td class="center" style="text-align: center;"><a href="/?darktorturer">Dark Torturer Temple</a></td></tr>
            <tr bgcolor="#F1E0C6"><td class="center" style="text-align: center;"><a href="/?mystical">Mystical Tower</a></td></tr>
            <tr bgcolor="#D4C0A1"><td class="center" style="text-align: center;"><a href="/?skulldragon">Skull Dragon Castle</a></td></tr>
          </tbody>
        </table>
      </div>
    </div>
    
    <div class="subsection">
      <div class="toggle-title" onclick="toggleSection('specials_350')">Level 350+</div>
      <div class="toggle-content" id="specials_350" style="display:none;">
        <table class="respawn-table" style="font-size: 13px; color: #5a2800; margin: 0 auto 10px; width: 95%; max-width: 600px; border-spacing: 1px; font-family: Verdana, Tahoma, Helvetica, sans-serif; box-shadow: #000000 1px 1px 10px;">
          <tbody>
            <tr bgcolor="#505050"><td class="header" style="color: #efefef; font-weight: bold; text-align: center;">Name</td></tr>
            <tr bgcolor="#D4C0A1"><td class="center" style="text-align: center;"><a href="/?hydraph">Hydra Pharaoh Temple</a></td></tr>
            <tr bgcolor="#F1E0C6"><td class="center" style="text-align: center;"><a href="/?yalaharquarter">Yalahar Quarter (east)</a></td></tr>
            <tr bgcolor="#D4C0A1"><td class="center" style="text-align: center;"><a href="/?whitemagician">White Magician Island</a></td></tr>
          </tbody>
        </table>
      </div>
    </div>
    
    <div class="subsection">
      <div class="toggle-title" onclick="toggleSection('specials_400')">Level 400+</div>
      <div class="toggle-content" id="specials_400" style="display:none;">
        <table class="respawn-table" style="font-size: 13px; color: #5a2800; margin: 0 auto 10px; width: 95%; max-width: 600px; border-spacing: 1px; font-family: Verdana, Tahoma, Helvetica, sans-serif; box-shadow: #000000 1px 1px 10px;">
          <tbody>
            <tr bgcolor="#505050"><td class="header" style="color: #efefef; font-weight: bold; text-align: center;">Name</td></tr>
            <tr bgcolor="#D4C0A1"><td class="center" style="text-align: center;"><a href="/?queenmedusa">Queen Medusa</a></td></tr>
            <tr bgcolor="#F1E0C6"><td class="center" style="text-align: center;"><a href="/?spiderqueen">Spider Queen Isle</a></td></tr>
            <tr bgcolor="#D4C0A1"><td class="center" style="text-align: center;"><a href="/?whitemagiciantower">White Magician Tower</a></td></tr>
          </tbody>
        </table>
      </div>
    </div>
    
    <div class="subsection">
      <div class="toggle-title" onclick="toggleSection('specials_450')">Level 450+</div>
      <div class="toggle-content" id="specials_450" style="display:none;">
        <table class="respawn-table" style="font-size: 13px; color: #5a2800; margin: 0 auto 10px; width: 95%; max-width: 600px; border-spacing: 1px; font-family: Verdana, Tahoma, Helvetica, sans-serif; box-shadow: #000000 1px 1px 10px;">
          <tbody>
            <tr bgcolor="#505050"><td class="header" style="color: #efefef; font-weight: bold; text-align: center;">Name</td></tr>
            <tr bgcolor="#D4C0A1"><td class="center" style="text-align: center;"><a href="/?darapharao">Darashia Pharaoh Tomb</a></td></tr>
            <tr bgcolor="#F1E0C6"><td class="center" style="text-align: center;"><a href="/?banutaqueen">Banuta Queen</a></td></tr>
            <tr bgcolor="#D4C0A1"><td class="center" style="text-align: center;"><a href="/?barbarian">Barbarians Isle</a></td></tr>			
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Aba 3: Quests -->
  <div id="questsTab" style="display:none; text-align: center;">
    <p style="text-align: center; margin-bottom: 20px;"><em><span style="color: #333333; font-size: 16px;">Discover the available quests and legendary challenges organized by level:</span></em></p>
    
    <div class="subsection">
      <div class="toggle-title" onclick="toggleSection('quests_100+')">Level 100+</div>
      <div class="toggle-content" id="quests_100+" style="display:none;">
        <table cellpadding="10" cellspacing="1" style="font-size: 13px; color: #5a2800; margin: 0 auto 10px; width: 95%; max-width: 600px; border-spacing: 1px; font-family: Verdana, Tahoma, Helvetica, sans-serif; box-shadow: #000000 1px 1px 10px;">
          <tbody>
            <tr bgcolor="#505050"><td style="color: #efefef; font-weight: bold; text-align: center;">Name</td></tr>
            <tr bgcolor="#D4C0A1"><td style="text-align: center;"><a href="/?anihi">Anihilator Quest</a></td></tr>
          </tbody>
        </table>
      </div>
    </div>
    
    <div class="subsection">
      <div class="toggle-title" onclick="toggleSection('quests_150+')">Level 150+</div>
      <div class="toggle-content" id="quests_150+" style="display:none;">
        <table cellpadding="10" cellspacing="1" style="font-size: 13px; color: #5a2800; margin: 0 auto 10px; width: 95%; max-width: 600px; border-spacing: 1px; font-family: Verdana, Tahoma, Helvetica, sans-serif; box-shadow: #000000 1px 1px 10px;">
          <tbody>
            <tr bgcolor="#505050"><td style="color: #efefef; font-weight: bold; text-align: center;">Name</td></tr>
            <tr bgcolor="#D4C0A1"><td style="text-align: center;"><a href="/?bootswater">Boots of Waterwalking Quest</a></td></tr>
            <tr bgcolor="#F1E0C6"><td style="text-align: center;"><a href="/?karmaboots">Karma Boots +2 Quest</a></td></tr>
            <tr bgcolor="#D4C0A1"><td style="text-align: center;"><a href="/?poiquest">Pits of Inferno Quest</a></td></tr>
          </tbody>
        </table>
      </div>
    </div>
    
    <div class="subsection">
      <div class="toggle-title" onclick="toggleSection('quests_250+')">Level 250+</div>
      <div class="toggle-content" id="quests_250+" style="display:none;">
        <table cellpadding="10" cellspacing="1" style="font-size: 13px; color: #5a2800; margin: 0 auto 10px; width: 95%; max-width: 600px; border-spacing: 1px; font-family: Verdana, Tahoma, Helvetica, sans-serif; box-shadow: #000000 1px 1px 10px;">
          <tbody>
            <tr bgcolor="#505050"><td style="color: #efefef; font-weight: bold; text-align: center;">Name</td></tr>
            <tr bgcolor="#D4C0A1"><td style="text-align: center;"><a href="/?demonlegs">Demon Legs Quest</a></td></tr>
            <tr bgcolor="#F1E0C6"><td style="text-align: center;"><a href="/?horned_helmet">Horned Helmet Quest</a></td></tr>
            <tr bgcolor="#D4C0A1"><td style="text-align: center;"><a href="/?thunderhammer">Thunder Hammer Quest</a></td></tr>
            <tr bgcolor="#F1E0C6"><td style="text-align: center;"><a href="/?ferumbras">Karma Boots +3 Quest</a></td></tr>
            <tr bgcolor="#D4C0A1"><td style="text-align: center;"><a href="/?karmaring">Karma Ring +2 Quest</a></td></tr>			
          </tbody>
        </table>
      </div>
    </div>
    
    <div class="subsection">
      <div class="toggle-title" onclick="toggleSection('quests_450')">Level 450+</div>
      <div class="toggle-content" id="quests_450" style="display:none;">
        <table class="respawn-table" style="font-size: 13px; color: #5a2800; margin: 0 auto 10px; width: 95%; max-width: 600px; border-spacing: 1px; font-family: Verdana, Tahoma, Helvetica, sans-serif; box-shadow: #000000 1px 1px 10px;">
          <tbody>
            <tr bgcolor="#505050"><td class="header" style="color: #efefef; font-weight: bold; text-align: center;">Name</td></tr>
            <tr bgcolor="#D4C0A1"><td class="center" style="text-align: center;"><a href="/?karmaboots4">Karma Boots +4 Quest</a></td></tr>
            <tr bgcolor="#F1E0C6"><td class="center" style="text-align: center;"><a href="/?anihi2">Anihilator 2 Quest</a></td></tr>
            <tr bgcolor="#D4C0A1"><td class="center" style="text-align: center;"><a href="/?pharao">Great Pharaoh's Challenge</a></td></tr>
            <tr bgcolor="#F1E0C6"><td class="center" style="text-align: center;"><a href="/?yalahariquest">Yalahari Quest</a></td></tr>			
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>

<!-- Estilos CSS centralizados -->
<style>
.toggle-title {
    background-color: #4a4a45;
    color: white;
    padding: 12px;
    margin: 10px auto;
    width: 300px;
    max-width: 90%;
    font-weight: bold;
    font-family: Verdana, Tahoma, Helvetica, sans-serif;
    cursor: pointer;
    text-align: center;
    box-shadow: #000000 1px 1px 5px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.toggle-title:hover {
    background-color: #5a5a55;
}

.subsection {
    margin-bottom: 20px;
}

.toggle-content {
    margin: 0 auto;
    max-width: 600px;
}

.respawn-table {
    font-size: 13px;
    color: #5a2800;
    margin: 0 auto 10px;
    width: 95%;
    max-width: 600px;
    border-spacing: 1px;
    font-family: Verdana, Tahoma, Helvetica, sans-serif;
    box-shadow: #000000 1px 1px 10px;
}

.respawn-table .header {
    color: #efefef;
    font-weight: bold;
    text-align: center;
}

.respawn-table .center {
    text-align: center;
}
</style>

<!-- Scripts JavaScript -->
<script>
  function showTab(tabId) {
    document.getElementById("citiesTab").style.display = "none";
    document.getElementById("specialsTab").style.display = "none";
    document.getElementById("questsTab").style.display = "none";
    document.getElementById(tabId).style.display = "block";
  }

  function toggleSection(id) {
    var x = document.getElementById(id);
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
  }
</script>
<script>
  function filterHub(){
    const q = (document.getElementById('hub-search').value || '').toLowerCase();
    const lvl = document.getElementById('hub-level').value;
    const city = document.getElementById('hub-city').value;
    document.querySelectorAll('.hub-card').forEach(card => {
      const name = (card.getAttribute('data-name') || '').toLowerCase();
      const clvl = card.getAttribute('data-level') || '';
      const ccity = card.getAttribute('data-city') || '';
      const matchText = !q || name.includes(q);
      const matchLvl = !lvl || clvl === lvl;
      const matchCity = !city || ccity === city;
      card.style.display = (matchText && matchLvl && matchCity) ? '' : 'none';
    });
  }
  function resetHub(){
    document.getElementById('hub-search').value = '';
    document.getElementById('hub-level').value = '';
    document.getElementById('hub-city').value = '';
    filterHub();
  }
  function toggleHubCollapse(){
    var grid = document.getElementById('hub-grid');
    var btn = document.getElementById('hub-toggle');
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
  // init
  (function initHub(){
    try {
      filterHub();
      // start collapsed by default
      var g = document.getElementById('hub-grid');
      if (g){ g.setAttribute('data-collapsed','0'); toggleHubCollapse(); }
    } catch(e) {}
  })();

  // Build cards automatically from the sections below (Cities + Special Areas)
  (function buildRespawnsHubCards(){
    try {
      var grid = document.getElementById('hub-grid');
      if (!grid) return;
      var existing = new Set();
      grid.querySelectorAll('.hub-card').forEach(function(card){
        existing.add((card.getAttribute('data-name')||'') + '::' + (card.getAttribute('data-level')||'') + '::' + (card.getAttribute('data-city')||''));
      });

      function addCard(name, pageHref, level, city, videoHref){
        var key = name + '::' + (level||'') + '::' + (city||'');
        if (existing.has(key)) return;
        existing.add(key);
        var wrap = document.createElement('div');
        wrap.className = 'hub-card';
        wrap.setAttribute('data-name', name);
        if (level) wrap.setAttribute('data-level', level);
        if (city) wrap.setAttribute('data-city', city);
        wrap.style.background = '#f1e0c6';
        wrap.style.border = '1px solid #c7b48a';
        wrap.style.padding = '10px';
        var title = document.createElement('div');
        title.style.fontWeight = 'bold';
        title.textContent = name;
        var meta = document.createElement('div');
        meta.style.fontSize = '12px';
        meta.textContent = (level? (level + ' • ') : '') + (city? ('City: ' + city) : '');
        var links = document.createElement('div');
        links.style.marginTop = '6px';
        links.style.display = 'flex';
        links.style.gap = '8px';
        if (pageHref){ var a = document.createElement('a'); a.href = pageHref; a.textContent = 'Page'; links.appendChild(a); }
        if (videoHref){ var v = document.createElement('a'); v.href = videoHref; v.target = '_blank'; v.textContent = 'Video'; links.appendChild(v); }
        wrap.appendChild(title);
        wrap.appendChild(meta);
        wrap.appendChild(links);
        grid.appendChild(wrap);
      }

      // From Cities tab
      var citiesTab = document.getElementById('citiesTab');
      if (citiesTab){
        citiesTab.querySelectorAll('.subsection').forEach(function(sec){
          var titleEl = sec.querySelector('.toggle-title');
          var cityName = titleEl ? titleEl.textContent.trim() : '';
          var link = sec.querySelector('a[href]');
          if (cityName && link){ addCard(cityName + ' Respawns', link.getAttribute('href'), '', cityName, ''); }
        });
      }

      // From Special Areas (by level)
      var specialsTab = document.getElementById('specialsTab');
      if (specialsTab){
        specialsTab.querySelectorAll('.subsection').forEach(function(sec){
          var levelTitle = sec.querySelector('.toggle-title');
          var lvl = levelTitle ? levelTitle.textContent.trim().replace(/[^0-9+]/g,'') + '+' : '';
          sec.querySelectorAll('a[href]').forEach(function(a){
            var name = a.textContent.trim();
            var href = a.getAttribute('href');
            addCard(name, href, lvl, '', '');
          });
        });
      }
    } catch(e) {}
  })();
</script>
