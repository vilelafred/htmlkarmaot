<?php
// Item Attribute Guide (completo)
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Item Attribute Guide</title>
  <style>
    body {
      background-color: #0e0e0e;
      color: #5a2800;
      font-family: Verdana, sans-serif;
      margin: 20px;
    }
    button {
      background-color: #333;
      color: white;
      border: none;
      padding: 10px 20px;
      margin: 5px;
      cursor: pointer;
      border-radius: 5px;
    }
    button:hover {
      background-color: #555;
    }
    .tab-content {
      display: none;
      margin-top: 20px;
    }
    table.attribute-table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }
    .attribute-table th, .attribute-table td {
      padding: 10px;
      border: 1px solid #444;
      text-align: left;
    }
    .item-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(60px, 1fr));
      gap: 10px;
      margin-top: 15px;
    }
    .item {
      text-align: center;
      font-size: 11px;
    }
    .item img {
      width: 40px;
      height: 40px;
    }
  </style>
</head>
<body>

<div style="text-align:center; margin-bottom: 10px;">
<button onclick="showTab('attackTab')">Attack</button>
<button onclick="showTab('defenseTab')">Defense</button>
<button onclick="showTab('critchanceTab')">Crit Chance</button>
<button onclick="showTab('fireresistanceTab')">Fire Resistance</button>
<button onclick="showTab('iceresistanceTab')">Ice Resistance</button>
<button onclick="showTab('armorTab')">Armor</button>
<button onclick="showTab('accuracyTab')">Accuracy</button>
<button onclick="showTab('rangeTab')">Range</button>
<button onclick="showTab('chargesTab')">Charges</button>
<button onclick="showTab('durationTab')">Duration</button>
<button onclick="showTab('firedamageTab')">Fire Damage</button>
<button onclick="showTab('icedamageTab')">Ice Damage</button>
<button onclick="showTab('energydamageTab')">Energy Damage</button>
</div>


<div id="attackTab" class="tab-content" style="display:none;">
  <h2>🔸 Attribute: Attack</h2>
  <p><strong>Applies to:</strong> Weapons</p>
  <table class="attribute-table">
    <tr><th>Rarity</th><th>Value</th></tr>
    <tr><td>Common</td><td>+1</td></tr>
<tr><td>Rare</td><td>+2</td></tr>
<tr><td>Epic</td><td>+3</td></tr>
<tr><td>Legendary</td><td>+5</td></tr>
  </table>
  <h3>Compatible Items</h3>
  <div class="item-grid"><div class="item"><img src="/images/items_shop/items/2392.png"><br>Fire Sword</div>
<div class="item"><img src="/images/items_shop/items/2414.png"><br>Dragon Lance</div></div>
</div>

<div id="defenseTab" class="tab-content" style="display:none;">
  <h2>🔸 Attribute: Defense</h2>
  <p><strong>Applies to:</strong> Shields</p>
  <table class="attribute-table">
    <tr><th>Rarity</th><th>Value</th></tr>
    <tr><td>Common</td><td>+1</td></tr>
<tr><td>Rare</td><td>+2</td></tr>
<tr><td>Epic</td><td>+3</td></tr>
<tr><td>Legendary</td><td>+4</td></tr>
  </table>
  <h3>Compatible Items</h3>
  <div class="item-grid"><div class="item"><img src="/images/items_shop/items/2514.png"><br>Mastermind Shield</div>
<div class="item"><img src="/images/items_shop/items/2542.png"><br>Tempest Shield</div></div>
</div>

<div id="critchanceTab" class="tab-content" style="display:none;">
  <h2>🔸 Attribute: Crit Chance</h2>
  <p><strong>Applies to:</strong> Weapons & Armors</p>
  <table class="attribute-table">
    <tr><th>Rarity</th><th>Value</th></tr>
    <tr><td>Common</td><td>1%</td></tr>
<tr><td>Rare</td><td>2%</td></tr>
<tr><td>Epic</td><td>3%</td></tr>
<tr><td>Legendary</td><td>4%</td></tr>
  </table>
  <h3>Compatible Items</h3>
<div class="item-grid">
  <div class="item"><img src="/images/items_shop/items/6116.png"><br>Firewalker Boots</div>
  <div class="item"><img src="/images/items_shop/items/5901.png"><br>Black Demon Legs</div>
  <div class="item"><img src="/images/items_shop/items/5903.png"><br>Winged Boots</div>
  <div class="item"><img src="/images/items_shop/items/8321.png"><br>Karma Boots +4</div>
  <div class="item"><img src="/images/items_shop/items/5780.png"><br>Red Robe</div>
  <div class="item"><img src="/images/items_shop/items/8240.png"><br>Karma Boots +3</div>
  <div class="item"><img src="/images/items_shop/items/2518.png"><br>Beholder Shield</div>
  <div class="item"><img src="/images/items_shop/items/5973.png"><br>Black Dh Helmet</div>
  <div class="item"><img src="/images/items_shop/items/6185.png"><br>Red Ring Of The Sky</div>
  <div class="item"><img src="/images/items_shop/items/2640.png"><br>Karma Boots</div>
  <div class="item"><img src="/images/items_shop/items/8239.png"><br>Karma Boots +2</div>
  <div class="item"><img src="/images/items_shop/items/2535.png"><br>Castle Shield</div>
  <div class="item"><img src="/images/items_shop/items/2540.png"><br>Scarab Shield</div>
  <div class="item"><img src="/images/items_shop/items/2479.png"><br>Strange Helmet</div>
  <div class="item"><img src="/images/items_shop/items/3971.png"><br>Charmer'S Tiara</div>
  <div class="item"><img src="/images/items_shop/items/3972.png"><br>Beholder Helmet</div>
  <div class="item"><img src="/images/items_shop/items/2664.png"><br>Wood Cape</div>
  <div class="item"><img src="/images/items_shop/items/3982.png"><br>Crocodile Boots</div>
  <div class="item"><img src="/images/items_shop/items/2123.png"><br>Ring Of The Sky</div>
  <div class="item"><img src="/images/items_shop/items/2135.png"><br>Scarab Amulet</div>
  <div class="item"><img src="/images/items_shop/items/2508.png"><br>Native Armor</div>
  <div class="item"><img src="/images/items_shop/items/2414.png"><br>Dragon Lance</div>
  <div class="item"><img src="/images/items_shop/items/2444.png"><br>Hammer Of Wrath</div>
  <div class="item"><img src="/images/items_shop/items/2514.png"><br>Mastermind Shield</div>
  <div class="item"><img src="/images/items_shop/items/2542.png"><br>Tempest Shield</div>
  <div class="item"><img src="/images/items_shop/items/2424.png"><br>Silver Mace</div>
  <div class="item"><img src="/images/items_shop/items/5795.png"><br>Magic Helmet Of Ancients</div>
</div>

<div id="fireresistanceTab" class="tab-content" style="display:none;">
  <h2>🔸 Attribute: Fire Resistance</h2>
  <p><strong>Applies to:</strong> Armors</p>
  <table class="attribute-table">
    <tr><th>Rarity</th><th>Value</th></tr>
    <tr><td>Common</td><td>2%</td></tr>
<tr><td>Rare</td><td>4%</td></tr>
<tr><td>Epic</td><td>6%</td></tr>
<tr><td>Legendary</td><td>10%</td></tr>
  </table>
  <h3>Compatible Items</h3>
  <div class="item-grid"><div class="item"><img src="/images/items_shop/items/6116.png"><br>Firewalker Boots</div>
<div class="item"><img src="/images/items_shop/items/5901.png"><br>Black Demon Legs</div>
<div class="item"><img src="/images/items_shop/items/5903.png"><br>Winged Boots</div>
<div class="item"><img src="/images/items_shop/items/8321.png"><br>Karma Boots +4</div>
<div class="item"><img src="/images/items_shop/items/5780.png"><br>Red Robe</div>
<div class="item"><img src="/images/items_shop/items/8240.png"><br>Karma Boots +3</div>
<div class="item"><img src="/images/items_shop/items/5973.png"><br>Black DH Helmet</div>
<div class="item"><img src="/images/items_shop/items/6185.png"><br>Red Ring of the Sky</div>
<div class="item"><img src="/images/items_shop/items/2133.png"><br>Ruby Necklace</div></div>
</div>

<div id="iceresistanceTab" class="tab-content" style="display:none;">
  <h2>🔸 Attribute: Ice Resistance</h2>
  <p><strong>Applies to:</strong> Armors</p>
  <table class="attribute-table">
    <tr><th>Rarity</th><th>Value</th></tr>
    <tr><td>Common</td><td>2%</td></tr>
<tr><td>Rare</td><td>4%</td></tr>
<tr><td>Epic</td><td>6%</td></tr>
<tr><td>Legendary</td><td>10%</td></tr>
  </table>
  <h3>Compatible Items</h3>
  <div class="item-grid"><div class="item"><img src="/images/items_shop/items/6116.png"><br>Firewalker Boots</div>
<div class="item"><img src="/images/items_shop/items/5901.png"><br>Black Demon Legs</div>
<div class="item"><img src="/images/items_shop/items/5903.png"><br>Winged Boots</div>
<div class="item"><img src="/images/items_shop/items/8321.png"><br>Karma Boots +4</div>
<div class="item"><img src="/images/items_shop/items/5780.png"><br>Red Robe</div>
<div class="item"><img src="/images/items_shop/items/8240.png"><br>Karma Boots +3</div></div>
</div>

<div id="armorTab" class="tab-content" style="display:none;">
  <h2>🔸 Attribute: Armor</h2>
  <p><strong>Applies to:</strong> Armors</p>
  <table class="attribute-table">
    <tr><th>Rarity</th><th>Value</th></tr>
    <tr><td>Common</td><td>+1</td></tr>
<tr><td>Rare</td><td>+2</td></tr>
<tr><td>Epic</td><td>+3</td></tr>
<tr><td>Legendary</td><td>+4</td></tr>
  </table>
  <h3>Compatible Items</h3>
  <div class="item-grid"><div class="item"><img src="/images/items_shop/items/2508.png"><br>Native Armor</div>
<div class="item"><img src="/images/items_shop/items/5780.png"><br>Red Robe</div></div>
</div>

<div id="accuracyTab" class="tab-content" style="display:none;">
  <h2>🔸 Attribute: Accuracy</h2>
  <p><strong>Applies to:</strong> Weapons</p>
  <table class="attribute-table">
    <tr><th>Rarity</th><th>Value</th></tr>
    <tr><td>Common</td><td>+1</td></tr>
<tr><td>Rare</td><td>+2</td></tr>
<tr><td>Epic</td><td>+3</td></tr>
<tr><td>Legendary</td><td>+4</td></tr>
  </table>
  <h3>Compatible Items</h3>
  <div class="item-grid"><div class="item"><img src="/images/items_shop/items/2392.png"><br>Fire Sword</div>
<div class="item"><img src="/images/items_shop/items/2414.png"><br>Dragon Lance</div></div>
</div>

<div id="rangeTab" class="tab-content" style="display:none;">
  <h2>🔸 Attribute: Range</h2>
  <p><strong>Applies to:</strong> Distance Weapons</p>
  <table class="attribute-table">
    <tr><th>Rarity</th><th>Value</th></tr>
    <tr><td>Common</td><td>+1</td></tr>
<tr><td>Rare</td><td>+2</td></tr>
<tr><td>Epic</td><td>+3</td></tr>
<tr><td>Legendary</td><td>+4</td></tr>
  </table>
  <h3>Compatible Items</h3>
  <div class="item-grid"><div class="item"><img src="/images/items_shop/items/5793.png"><br>Royal Helmet</div>
<div class="item"><img src="/images/items_shop/items/7592.png"><br>Royal Crossbow</div></div>
</div>

<div id="chargesTab" class="tab-content" style="display:none;">
  <h2>🔸 Attribute: Charges</h2>
  <p><strong>Applies to:</strong> Rings & Necklaces</p>
  <table class="attribute-table">
    <tr><th>Rarity</th><th>Value</th></tr>
    <tr><td>Common</td><td>+1</td></tr>
<tr><td>Rare</td><td>+2</td></tr>
<tr><td>Epic</td><td>+3</td></tr>
<tr><td>Legendary</td><td>+4</td></tr>
  </table>
  <h3>Compatible Items</h3>
  <div class="item-grid"><div class="item"><img src="/images/items_shop/items/2123.png"><br>Ring of the Sky</div>
<div class="item"><img src="/images/items_shop/items/2133.png"><br>Ruby Necklace</div></div>
</div>

<div id="durationTab" class="tab-content" style="display:none;">
  <h2>🔸 Attribute: Duration</h2>
  <p><strong>Applies to:</strong> Rings, Buff Items</p>
  <table class="attribute-table">
    <tr><th>Rarity</th><th>Value</th></tr>
    <tr><td>Common</td><td>+10s</td></tr>
<tr><td>Rare</td><td>+20s</td></tr>
<tr><td>Epic</td><td>+30s</td></tr>
<tr><td>Legendary</td><td>+60s</td></tr>
  </table>
  <h3>Compatible Items</h3>
  <div class="item-grid"><div class="item"><img src="/images/items_shop/items/6840.png"><br>Daily Reward</div>
<div class="item"><img src="/images/items_shop/items/5792.png"><br>The Iron Worker</div></div>
</div>

<div id="critamountTab" class="tab-content" style="display:none;">
  <h2>🔸 Attribute: Crit Amount</h2>
  <p><strong>Applies to:</strong> Weapons & Spells</p>
  <table class="attribute-table">
    <tr><th>Rarity</th><th>Value</th></tr>
    <tr><td>Common</td><td>+10%</td></tr>
<tr><td>Rare</td><td>+20%</td></tr>
<tr><td>Epic</td><td>+30%</td></tr>
<tr><td>Legendary</td><td>+50%</td></tr>
  </table>
  <h3>Compatible Items</h3>
  <div class="item-grid"><div class="item"><img src="/images/items_shop/items/5813.png"><br>Giant Flameblade</div>
<div class="item"><img src="/images/items_shop/items/7423.png"><br>Haunted Blade</div></div>
</div>

<div id="firedamageTab" class="tab-content" style="display:none;">
  <h2>🔸 Attribute: Fire Damage</h2>
  <p><strong>Applies to:</strong> Weapons & Spells</p>
  <table class="attribute-table">
    <tr><th>Rarity</th><th>Value</th></tr>
    <tr><td>Common</td><td>+2%</td></tr>
<tr><td>Rare</td><td>+4%</td></tr>
<tr><td>Epic</td><td>+6%</td></tr>
<tr><td>Legendary</td><td>+10%</td></tr>
  </table>
  <h3>Compatible Items</h3>
  <div class="item-grid"><div class="item"><img src="/images/items_shop/items/2414.png"><br>Dragon Lance</div>
<div class="item"><img src="/images/items_shop/items/2444.png"><br>Hammer of Wrath</div></div>
</div>

<div id="icedamageTab" class="tab-content" style="display:none;">
  <h2>🔸 Attribute: Ice Damage</h2>
  <p><strong>Applies to:</strong> Weapons & Spells</p>
  <table class="attribute-table">
    <tr><th>Rarity</th><th>Value</th></tr>
    <tr><td>Common</td><td>+2%</td></tr>
<tr><td>Rare</td><td>+4%</td></tr>
<tr><td>Epic</td><td>+6%</td></tr>
<tr><td>Legendary</td><td>+10%</td></tr>
  </table>
  <h3>Compatible Items</h3>
  <div class="item-grid"><div class="item"><img src="/images/items_shop/items/7455.png"><br>Mythril Axe</div>
<div class="item"><img src="/images/items_shop/items/21696.png"><br>Icicle Bow</div></div>
</div>

<div id="energydamageTab" class="tab-content" style="display:none;">
  <h2>🔸 Attribute: Energy Damage</h2>
  <p><strong>Applies to:</strong> Weapons & Spells</p>
  <table class="attribute-table">
    <tr><th>Rarity</th><th>Value</th></tr>
    <tr><td>Common</td><td>+2%</td></tr>
<tr><td>Rare</td><td>+4%</td></tr>
<tr><td>Epic</td><td>+6%</td></tr>
<tr><td>Legendary</td><td>+10%</td></tr>
  </table>
  <h3>Compatible Items</h3>
  <div class="item-grid"><div class="item"><img src="/images/items_shop/items/2542.png"><br>Tempest Shield</div>
<div class="item"><img src="/images/items_shop/items/2539.png"><br>Phoenix Shield</div></div>
</div>

<script>
  function showTab(tabId) {
    const tabs = document.querySelectorAll('.tab-content');
    tabs.forEach(tab => tab.style.display = 'none');
    document.getElementById(tabId).style.display = 'block';
  }
  showTab('attackTab');
</script>

</body>
</html>
