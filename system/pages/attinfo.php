<?php
// Coloque este arquivo como pages/atributos-itens.php (ou similar) no MyAAC.
// Se o seu tema requer cabeçalho/rodapé via template, remova <!DOCTYPE...> e <html>... e mantenha somente o conteúdo interno do <div id="content">.

?><!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<title>Atributos dos Itens - Guia</title>
<style>
/* Paleta oldschool tibiana */
.box-title { background:#f1e0c6; border:1px solid #c7b48a; padding:8px 12px; font-weight:bold; text-align:center; }
.box-row   { background:#d4c0a1; border:1px solid #c7b48a; padding:10px 12px; }
.table-os  { width:100%; border-collapse:collapse; }
.table-os td{ border:1px solid #c7b48a; padding:8px; }
.badge { background:#2f4858; color:#fff; padding:2px 6px; border-radius:4px; font-size:11px; }
.note  { color:#1c1c1c; font-style:italic; }
.center { text-align:center; }

/* Hovers de itens */
.image-wrapper { position:relative; display:inline-block; margin:0 6px 8px 0; }
.item-image    { cursor:pointer; image-rendering: pixelated; }
.info-modal {
  position:absolute; bottom:110%; left:20%; transform:translateX(-50%);
  background:rgba(30,60,200,0.6); color:#fff; padding:8px 12px; border-radius:6px;
  font-size:10px; white-space:nowrap; opacity:0; pointer-events:none; transition:opacity .3s ease; z-index:10;
}
.hr-os { display:block; width:100%; height:7px; background:url('templates/tibiana/images/line_body.gif') repeat-x; border:none; margin:12px 0; }
/* Abas */
.tabs { margin: 10px 0 14px; }
.tab-btn { background:#b08f58; color:#fff; border:1px solid #8f6e3a; padding:6px 10px; margin:0 4px 6px 0; cursor:pointer; font-weight:bold; border-radius:4px; }
.tab-btn.active { background:#8f6e3a; }
.tab-panel { display:none; }
/* Listas de itens: capitalização */
.item-list li { text-transform: capitalize; }
/* Ícones dos itens */4
.item-list li { display:flex; align-items:center; gap:6px; }
.item-icon { width:18px; height:18px; image-rendering: pixelated; }
/* Skills layout */
.skill-groups { display:grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap:12px; }
.skill-heading { background:#f1e0c6; border:1px solid #c7b48a; padding:6px 8px; font-weight:bold; margin:6px 0; }
.cols-2 { columns:2; -webkit-columns:2; -moz-columns:2; }
.cols-3 { columns:3; -webkit-columns:3; -moz-columns:3; }
</style>
</head>
<body>
  <div class="box-title">Mapa por Atributo (Nomes de Itens)</div>
  <div class="box-row">Selecione uma aba e use a busca para encontrar itens pelo nome. A lista mostra exemplos reais de itens que podem rolar cada atributo. Os nomes estão capitalizados e acompanhados de ícones. Este é um guia visual rápido.</div>
  <br class="hr-os"><span class="hr-os"></span>

  

  <br>
  <div class="tabs center">
    <button class="tab-btn active" data-tab="tab-spell">Spell Damage</button>
    <button class="tab-btn" data-tab="tab-crit">Crit Chance</button>
    <button class="tab-btn" data-tab="tab-res">Resistências</button>
    <button class="tab-btn" data-tab="tab-skills">Skills</button>
    <button class="tab-btn" data-tab="tab-multi">Multi Shot</button>
    <button class="tab-btn" data-tab="tab-manaleech">Mana Leech</button>
    <button class="tab-btn" data-tab="tab-lifeleech">Life Leech</button>
  </div>

  <div id="tab-spell" class="tab-panel" style="display:block;">
  <div class="box-title">Spell Damage</div>
  <div class="box-row">
    <input id="spell-filter" type="text" placeholder="Buscar item..." oninput="filterList('spell-filter','spell-list')" style="width:100%;padding:6px;margin-bottom:8px;">
    <ul id="spell-list" class="item-list" style="columns:3; -webkit-columns:3; -moz-columns:3; list-style:none; padding-left:0;">
      <li><img class="item-icon" src="images/items_shop/items/5791.png" onerror="this.style.display='none'">karma crossbow</li>
      <li><img class="item-icon" src="images/items_shop/items/6174.png" onerror="this.style.display='none'">karma bow</li>
      <li><img class="item-icon" src="images/items_shop/items/6221.png" onerror="this.style.display='none'">karma club</li>
      <li><img class="item-icon" src="images/items_shop/items/6118.png" onerror="this.style.display='none'">karma sword</li>
      <li><img class="item-icon" src="images/items_shop/items/6225.png" onerror="this.style.display='none'">karma axe</li>
      <li><img class="item-icon" src="images/items_shop/items/5803.png" onerror="this.style.display='none'">karma ring +2</li>
      <li><img class="item-icon" src="images/items_shop/items/6181.png" onerror="this.style.display='none'">mana amulet</li>
      <li><img class="item-icon" src="images/items_shop/items/7630.png" onerror="this.style.display='none'">karma spellbook</li>
      <li><img class="item-icon" src="images/items_shop/items/6128.png" onerror="this.style.display='none'">karma shield</li>
          <li><img class="item-icon" src="images/items_shop/items/7549.png" onerror="this.style.display='none'">swamp hammer</li>
          <li><img class="item-icon" src="images/items_shop/items/6144.png" onerror="this.style.display='none'">swamp armor</li>
      <li><img class="item-icon" src="images/items_shop/items/7636.png" onerror="this.style.display='none'">terran rainbow shield</li>
      <li><img class="item-icon" src="images/items_shop/items/7615.png" onerror="this.style.display='none'">sacred tree amulet</li>
      <li><img class="item-icon" src="images/items_shop/items/7637.png" onerror="this.style.display='none'">undead rod</li>
      <li><img class="item-icon" src="images/items_shop/items/7594.png" onerror="this.style.display='none'">the ironworker</li>
      <li><img class="item-icon" src="images/items_shop/items/6217.png" onerror="this.style.display='none'">dreadfiend cape</li>
      <li><img class="item-icon" src="images/items_shop/items/7600.png" onerror="this.style.display='none'">ultimate dreadfiend cape</li>
      <li><img class="item-icon" src="images/items_shop/items/6166.png" onerror="this.style.display='none'">dreadfiend boots</li>
      <li><img class="item-icon" src="images/items_shop/items/6114.png" onerror="this.style.display='none'">lightning axe</li>
      <li><img class="item-icon" src="images/items_shop/items/item_gifs/8179.gif" onerror="this.style.display='none'">redborn robe</li>
      <li><img class="item-icon" src="images/items_shop/items/7723.png" onerror="this.style.display='none'">karma torch</li>
      <li><img class="item-icon" src="images/items_shop/items/6176.png" onerror="this.style.display='none'">karma legs</li>
      <li><img class="item-icon" src="images/items_shop/items/6127.png" onerror="this.style.display='none'">karma armor</li>
      <li><img class="item-icon" src="images/items_shop/items/6167.png" onerror="this.style.display='none'">karma hat</li>
      <li><img class="item-icon" src="images/items_shop/items/8323.png" onerror="this.style.display='none'">lucky ring</li>
      <li><img class="item-icon" src="images/items_shop/items/8324.png" onerror="this.style.display='none'">lucky ring+2</li>
      <li><img class="item-icon" src="images/items_shop/items/2499.png" onerror="this.style.display='none'">Amazon Helmet</li>
      <li><img class="item-icon" src="images/items_shop/items/2500.png" onerror="this.style.display='none'">Amazon Armor</li>
      <li><img class="item-icon" src="images/items_shop/items/2523.png" onerror="this.style.display='none'">blessed shield</li>
      <li><img class="item-icon" src="images/items_shop/items/2496.png" onerror="this.style.display='none'">Horned Helmet</li>
      <li><img class="item-icon" src="images/items_shop/items/6116.png" onerror="this.style.display='none'">firewalker boots</li>
      <li><img class="item-icon" src="images/items_shop/items/5901.png" onerror="this.style.display='none'">black demon legs</li>
      <li><img class="item-icon" src="images/items_shop/items/5903.png" onerror="this.style.display='none'">winged boots</li>
      <li><img class="item-icon" src="images/items_shop/items/8321.png" onerror="this.style.display='none'">karma boots +4</li>
      <li><img class="item-icon" src="images/items_shop/items/5780.png" onerror="this.style.display='none'">red robe</li>
      <li><img class="item-icon" src="images/items_shop/items/8240.png" onerror="this.style.display='none'">karma boots +3</li>
      <li><img class="item-icon" src="images/items_shop/items/2123.png" onerror="this.style.display='none'">Ring of the Sky</li>
      <li><img class="item-icon" src="images/items_shop/items/5795.png" onerror="this.style.display='none'">Magic Helmet of Ancients</li>
    </ul>
  </div>
  </div>

  <br class="hr-os"><span class="hr-os"></span>
  <div class="box-row" style="text-align:center; font-weight:bold;">
    Este guia é apenas um spoiler — há mais itens que funcionam com os atributos do que os listados aqui. Descubra-os jogando!
  </div>

  <div id="tab-manaleech" class="tab-panel">
  <div class="box-title">Mana Leech</div>
  <div class="box-row">
    <div class="note">Chance de recuperar mana ao causar dano. A quantidade recuperada depende do nível do jogador (valores fixos por faixa).</div>
    <input id="ml-filter" type="text" placeholder="Buscar item..." oninput="filterList('ml-filter','ml-list')" style="width:100%;padding:6px;margin-bottom:8px;">
    <ul id="ml-list" class="item-list cols-3" style="list-style:none; padding-left:0;">
      <li><img class="item-icon" src="images/items_shop/items/7630.png" onerror="this.style.display='none'">karma spellbook</li>
      <li><img class="item-icon" src="images/items_shop/items/6128.png" onerror="this.style.display='none'">karma shield</li>
      <li><img class="item-icon" src="images/items_shop/items/6181.png" onerror="this.style.display='none'">mana amulet</li>
      <li><img class="item-icon" src="images/items_shop/items/6114.png" onerror="this.style.display='none'">lightning axe</li>
      <li><img class="item-icon" src="images/items_shop/items/7724.png" onerror="this.style.display='none'">swamp armor</li>
      <li><img class="item-icon" src="images/items_shop/items/7598.png" onerror="this.style.display='none'">swamp hammer</li>
      <li><img class="item-icon" src="images/items_shop/items/7636.png" onerror="this.style.display='none'">terran rainbow shield</li>
      <li><img class="item-icon" src="images/items_shop/items/7615.png" onerror="this.style.display='none'">sacred tree amulet</li>
      <li><img class="item-icon" src="images/items_shop/items/7637.png" onerror="this.style.display='none'">undead rod</li>
      <li><img class="item-icon" src="images/items_shop/items/7594.png" onerror="this.style.display='none'">the ironworker</li>
      <li><img class="item-icon" src="images/items_shop/items/6217.png" onerror="this.style.display='none'">dreadfiend cape</li>
      <li><img class="item-icon" src="images/items_shop/items/6166.png" onerror="this.style.display='none'">dreadfiend boots</li>
      <li><img class="item-icon" src="images/items_shop/items/8323.png" onerror="this.style.display='none'">lucky ring</li>
      <li><img class="item-icon" src="images/items_shop/items/6176.png" onerror="this.style.display='none'">karma legs</li>
      <li><img class="item-icon" src="images/items_shop/items/6127.png" onerror="this.style.display='none'">karma armor</li>
    </ul>
          </div>
          </div>

  <div id="tab-lifeleech" class="tab-panel">
  <div class="box-title">Life Leech</div>
  <div class="box-row">
    <div class="note">Chance de recuperar vida ao causar dano. A quantidade recuperada depende do nível do jogador (valores fixos por faixa).</div>
    <input id="ll-filter" type="text" placeholder="Buscar item..." oninput="filterList('ll-filter','ll-list')" style="width:100%;padding:6px;margin-bottom:8px;">
    <ul id="ll-list" class="item-list cols-3" style="list-style:none; padding-left:0;">
      <li><img class="item-icon" src="images/items_shop/items/7630.png" onerror="this.style.display='none'">karma spellbook</li>
      <li><img class="item-icon" src="images/items_shop/items/6128.png" onerror="this.style.display='none'">karma shield</li>
      <li><img class="item-icon" src="images/items_shop/items/6181.png" onerror="this.style.display='none'">mana amulet</li>
      <li><img class="item-icon" src="images/items_shop/items/6114.png" onerror="this.style.display='none'">lightning axe</li>
      <li><img class="item-icon" src="images/items_shop/items/7724.png" onerror="this.style.display='none'">swamp armor</li>
      <li><img class="item-icon" src="images/items_shop/items/7598.png" onerror="this.style.display='none'">swamp hammer</li>
      <li><img class="item-icon" src="images/items_shop/items/7636.png" onerror="this.style.display='none'">terran rainbow shield</li>
      <li><img class="item-icon" src="images/items_shop/items/7615.png" onerror="this.style.display='none'">sacred tree amulet</li>
      <li><img class="item-icon" src="images/items_shop/items/7637.png" onerror="this.style.display='none'">undead rod</li>
      <li><img class="item-icon" src="images/items_shop/items/7594.png" onerror="this.style.display='none'">the ironworker</li>
      <li><img class="item-icon" src="images/items_shop/items/6217.png" onerror="this.style.display='none'">dreadfiend cape</li>
      <li><img class="item-icon" src="images/items_shop/items/6166.png" onerror="this.style.display='none'">dreadfiend boots</li>
      <li><img class="item-icon" src="images/items_shop/items/8324.png" onerror="this.style.display='none'">lucky ring (+2)</li>
      <li><img class="item-icon" src="images/items_shop/items/6127.png" onerror="this.style.display='none'">karma armor</li>
      <li><img class="item-icon" src="images/items_shop/items/6176.png" onerror="this.style.display='none'">karma legs</li>
    </ul>
          </div>
          </div>

  <div id="tab-crit" class="tab-panel">
  <div class="box-title">Crit Chance</div>
  <div class="box-row">
    <input id="crit-filter" type="text" placeholder="Buscar item..." oninput="filterList('crit-filter','crit-list')" style="width:100%;padding:6px;margin-bottom:8px;">
    <ul id="crit-list" class="item-list" style="columns:3; -webkit-columns:3; -moz-columns:3; list-style:none; padding-left:0;">
      <li><img class="item-icon" src="images/items_shop/items/5818.png" onerror="this.style.display='none'">karma spellbook</li>
      <li><img class="item-icon" src="images/items_shop/items/6128.png" onerror="this.style.display='none'">karma shield</li>
          <li><img class="item-icon" src="images/items_shop/items/7549.png" onerror="this.style.display='none'">swamp hammer</li>
          <li><img class="item-icon" src="images/items_shop/items/6144.png" onerror="this.style.display='none'">swamp armor</li>
      <li><img class="item-icon" src="images/items_shop/items/7636.png" onerror="this.style.display='none'">terran rainbow shield</li>
      <li><img class="item-icon" src="images/items_shop/items/7615.png" onerror="this.style.display='none'">sacred tree amulet</li>
      <li><img class="item-icon" src="images/items_shop/items/7637.png" onerror="this.style.display='none'">undead rod</li>
      <li><img class="item-icon" src="images/items_shop/items/7594.png" onerror="this.style.display='none'">the ironworker</li>
      <li><img class="item-icon" src="images/items_shop/items/6217.png" onerror="this.style.display='none'">dreadfiend cape</li>
      <li><img class="item-icon" src="images/items_shop/items/7600.png" onerror="this.style.display='none'">ultimate dreadfiend cape</li>
      <li><img class="item-icon" src="images/items_shop/items/6166.png" onerror="this.style.display='none'">dreadfiend boots</li>
      <li><img class="item-icon" src="images/items_shop/items/6114.png" onerror="this.style.display='none'">lightning axe</li>
      <li><img class="item-icon" src="images/items_shop/items/item_gifs/8179.gif" onerror="this.style.display='none'">redborn robe</li>
      <li><img class="item-icon" src="images/items_shop/items/7723.png" onerror="this.style.display='none'">karma torch</li>
      <li><img class="item-icon" src="images/items_shop/items/6127.png" onerror="this.style.display='none'">karma armor</li>
      <li><img class="item-icon" src="images/items_shop/items/6167.png" onerror="this.style.display='none'">karma hat</li>
      <li><img class="item-icon" src="images/items_shop/items/8323.png" onerror="this.style.display='none'">lucky ring</li>
      <li><img class="item-icon" src="images/items_shop/items/8324.png" onerror="this.style.display='none'">lucky ring+2</li>
      <li><img class="item-icon" src="images/items_shop/items/2499.png" onerror="this.style.display='none'">Amazon Helmet</li>
      <li><img class="item-icon" src="images/items_shop/items/2500.png" onerror="this.style.display='none'">Amazon Armor</li>
      <li><img class="item-icon" src="images/items_shop/items/2523.png" onerror="this.style.display='none'">blessed shield</li>
      <li><img class="item-icon" src="images/items_shop/items/2496.png" onerror="this.style.display='none'">Horned Helmet</li>
      <li><img class="item-icon" src="images/items_shop/items/5790.png" onerror="this.style.display='none'">dragon crossbow</li>
      <li><img class="item-icon" src="images/items_shop/items/6175.png" onerror="this.style.display='none'">bow of flame</li>
      <li><img class="item-icon" src="images/items_shop/items/6115.png" onerror="this.style.display='none'">magic robe</li>
      <li><img class="item-icon" src="images/items_shop/items/5783.png" onerror="this.style.display='none'">red magician axe</li>
      <li><img class="item-icon" src="images/items_shop/items/2124.png" onerror="this.style.display='none'">Crystal Ring</li>
      <li><img class="item-icon" src="images/items_shop/items/2125.png" onerror="this.style.display='none'">Crystal Necklace</li>
      <li><img class="item-icon" src="images/items_shop/items/6116.png" onerror="this.style.display='none'">firewalker boots</li>
      <li><img class="item-icon" src="images/items_shop/items/5901.png" onerror="this.style.display='none'">black demon legs</li>
      <li><img class="item-icon" src="images/items_shop/items/5903.png" onerror="this.style.display='none'">winged boots</li>
      <li><img class="item-icon" src="images/items_shop/items/8321.png" onerror="this.style.display='none'">karma boots +4</li>
      <li><img class="item-icon" src="images/items_shop/items/5780.png" onerror="this.style.display='none'">red robe</li>
      <li><img class="item-icon" src="images/items_shop/items/2498.png" onerror="this.style.display='none'">Royal Helmet</li>
      <li><img class="item-icon" src="images/items_shop/items/2133.png" onerror="this.style.display='none'">Ruby Necklace</li>
      <li><img class="item-icon" src="images/items_shop/items/2123.png" onerror="this.style.display='none'">Ring of the Sky</li>
    </ul>
          </div>
          </div>

  <div id="tab-res" class="tab-panel">
  <div class="box-title">Resistências (todas as escolas)</div>
  <div class="box-row">
    <div class="note">Os itens abaixo podem rolar resistências Physical/Fire/Ice/Energy/Poison/Death (varia por rolagem).</div>
    <input id="res-filter" type="text" placeholder="Buscar item..." oninput="filterList('res-filter','res-list')" style="width:100%;padding:6px;margin-bottom:8px;">
    <ul id="res-list" class="item-list" style="columns:3; -webkit-columns:3; -moz-columns:3; list-style:none; padding-left:0;">
      <li><img class="item-icon" src="images/items_shop/items/5818.png" onerror="this.style.display='none'">karma spellbook</li>
      <li><img class="item-icon" src="images/items_shop/items/6128.png" onerror="this.style.display='none'">karma shield</li>
      <li><img class="item-icon" src="images/items_shop/items/7598.png" onerror="this.style.display='none'">swamp hammer</li>
      <li><img class="item-icon" src="images/items_shop/items/6144.png" onerror="this.style.display='none'">swamp armor</li>
      <li><img class="item-icon" src="images/items_shop/items/7636.png" onerror="this.style.display='none'">terran rainbow shield</li>
      <li><img class="item-icon" src="images/items_shop/items/7724.png" onerror="this.style.display='none'">sacred tree amulet</li>
      <li><img class="item-icon" src="images/items_shop/items/7637.png" onerror="this.style.display='none'">undead rod</li>
      <li><img class="item-icon" src="images/items_shop/items/7594.png" onerror="this.style.display='none'">the ironworker</li>
      <li><img class="item-icon" src="images/items_shop/items/6217.png" onerror="this.style.display='none'">dreadfiend cape</li>
      <li><img class="item-icon" src="images/items_shop/items/6166.png" onerror="this.style.display='none'">dreadfiend boots</li>
      <li><img class="item-icon" src="images/items_shop/items/6114.png" onerror="this.style.display='none'">lightning axe</li>
      <li><img class="item-icon" src="images/items_shop/items/item_gifs/8179.gif" onerror="this.style.display='none'">redborn robe</li>
      <li><img class="item-icon" src="images/items_shop/items/7723.png" onerror="this.style.display='none'">karma torch</li>
      <li><img class="item-icon" src="images/items_shop/items/6176.png" onerror="this.style.display='none'">karma legs</li>
      <li><img class="item-icon" src="images/items_shop/items/6127.png" onerror="this.style.display='none'">karma armor</li>
      <li><img class="item-icon" src="images/items_shop/items/6167.png" onerror="this.style.display='none'">karma hat</li>
      <li><img class="item-icon" src="images/items_shop/items/8323.png" onerror="this.style.display='none'">lucky ring</li>
      <li><img class="item-icon" src="images/items_shop/items/8324.png" onerror="this.style.display='none'">lucky ring+2</li>
      <li><img class="item-icon" src="images/items_shop/items/2499.png" onerror="this.style.display='none'">Amazon Helmet</li>
      <li><img class="item-icon" src="images/items_shop/items/2500.png" onerror="this.style.display='none'">Amazon Armor</li>
      <li><img class="item-icon" src="images/items_shop/items/2523.png" onerror="this.style.display='none'">blessed shield</li>
      <li><img class="item-icon" src="images/items_shop/items/2496.png" onerror="this.style.display='none'">Horned Helmet</li>
      <li><img class="item-icon" src="images/items_shop/items/6175.png" onerror="this.style.display='none'">bow of flame</li>
      <li><img class="item-icon" src="images/items_shop/items/6115.png" onerror="this.style.display='none'">magic robe</li>
      <li><img class="item-icon" src="images/items_shop/items/5783.png" onerror="this.style.display='none'">red magician axe</li>
      <li><img class="item-icon" src="images/items_shop/items/2124.png" onerror="this.style.display='none'">Crystal Ring</li>
      <li><img class="item-icon" src="images/items_shop/items/2125.png" onerror="this.style.display='none'">Crystal Necklace</li>
      <li><img class="item-icon" src="images/items_shop/items/6116.png" onerror="this.style.display='none'">firewalker boots</li>
      <li><img class="item-icon" src="images/items_shop/items/5901.png" onerror="this.style.display='none'">black demon legs</li>
      <li><img class="item-icon" src="images/items_shop/items/5903.png" onerror="this.style.display='none'">winged boots</li>
      <li><img class="item-icon" src="images/items_shop/items/8321.png" onerror="this.style.display='none'">karma boots +4</li>
      <li><img class="item-icon" src="images/items_shop/items/5780.png" onerror="this.style.display='none'">red robe</li>
      <li><img class="item-icon" src="images/items_shop/items/2498.png" onerror="this.style.display='none'">Royal Helmet</li>
      <li><img class="item-icon" src="images/items_shop/items/2472.png" onerror="this.style.display='none'">Magic Plate Armor</li>
      <li><img class="item-icon" src="images/items_shop/items/2466.png" onerror="this.style.display='none'">Golden Armor</li>
      <li><img class="item-icon" src="images/items_shop/items/3968.png" onerror="this.style.display='none'">Leopard Armor</li>
      <li><img class="item-icon" src="images/items_shop/items/2655.png" onerror="this.style.display='none'">Red Robe</li>
      <li><img class="item-icon" src="images/items_shop/items/2123.png" onerror="this.style.display='none'">Ring of the Sky</li>
      <li><img class="item-icon" src="images/items_shop/items/2133.png" onerror="this.style.display='none'">Ruby Necklace</li>
      <li><img class="item-icon" src="images/items_shop/items/2135.png" onerror="this.style.display='none'">Scarab Amulet</li>
      <li><img class="item-icon" src="images/items_shop/items/3971.png" onerror="this.style.display='none'">Charmer's Tiara</li>
      <li><img class="item-icon" src="images/items_shop/items/3972.png" onerror="this.style.display='none'">Beholder Helmet</li>
      <li><img class="item-icon" src="images/items_shop/items/2664.png" onerror="this.style.display='none'">Wood Cape</li>
      <li><img class="item-icon" src="images/items_shop/items/3982.png" onerror="this.style.display='none'">Crocodile Boots</li>
    </ul>
          </div>
          </div>

  <div id="tab-skills" class="tab-panel">
  <div class="box-title">Melee Skills / Distance Skill</div>
  <div class="box-row">
    <div class="note">Além dos itens gerais acima, alguns itens específicos rolam skills:</div>
    <div class="skill-groups">
      <div>
        <div class="skill-heading">Sword Skill</div>
        <ul class="item-list" style="list-style:none; padding-left:0;">
          <li><img class="item-icon" src="images/items_shop/items/7616.png" onerror="this.style.display='none'">Fireborn</li>
          <li><img class="item-icon" src="images/items_shop/items/7663.png" onerror="this.style.display='none'">Shield of Corruption</li>
        </ul>
        <div class="skill-heading">Axe Skill</div>
        <ul class="item-list" style="list-style:none; padding-left:0;">
          <li><img class="item-icon" src="images/items_shop/items/7617.png" onerror="this.style.display='none'">Earthborn</li>
        </ul>
        <div class="skill-heading">Club Skill</div>
        <ul class="item-list" style="list-style:none; padding-left:0;">
          <li><img class="item-icon" src="images/items_shop/items/7618.png" onerror="this.style.display='none'">Windborn</li>
        </ul>
          </div>
      <div>
        <div class="skill-heading">Melee Skills</div>
        <ul class="item-list cols-2" style="list-style:none; padding-left:0;">
          <li><img class="item-icon" src="images/items_shop/items/5818.png" onerror="this.style.display='none'">karma spellbook</li>
          <li><img class="item-icon" src="images/items_shop/items/6128.png" onerror="this.style.display='none'">karma shield</li>
          <li><img class="item-icon" src="images/items_shop/items/7549.png" onerror="this.style.display='none'">swamp hammer</li>
          <li><img class="item-icon" src="images/items_shop/items/6144.png" onerror="this.style.display='none'">swamp armor</li>
          <li><img class="item-icon" src="images/items_shop/items/7636.png" onerror="this.style.display='none'">terran rainbow shield</li>
          <li><img class="item-icon" src="images/items_shop/items/7615.png" onerror="this.style.display='none'">sacred tree amulet</li>
          <li><img class="item-icon" src="images/items_shop/items/7637.png" onerror="this.style.display='none'">undead rod</li>
          <li><img class="item-icon" src="images/items_shop/items/7594.png" onerror="this.style.display='none'">the ironworker</li>
          <li><img class="item-icon" src="images/items_shop/items/6217.png" onerror="this.style.display='none'">dreadfiend cape</li>
          <li><img class="item-icon" src="images/items_shop/items/6166.png" onerror="this.style.display='none'">dreadfiend boots</li>
          <li><img class="item-icon" src="images/items_shop/items/6114.png" onerror="this.style.display='none'">lightning axe</li>
          <li><img class="item-icon" src="images/items_shop/items/item_gifs/8179.gif" onerror="this.style.display='none'">redborn robe</li>
          <li><img class="item-icon" src="images/items_shop/items/6176.png" onerror="this.style.display='none'">karma legs</li>
          <li><img class="item-icon" src="images/items_shop/items/6127.png" onerror="this.style.display='none'">karma armor</li>
          <li><img class="item-icon" src="images/items_shop/items/6167.png" onerror="this.style.display='none'">karma hat</li>
          <li><img class="item-icon" src="images/items_shop/items/8324.png" onerror="this.style.display='none'">lucky ring (+2)</li>
          <li><img class="item-icon" src="images/items_shop/items/8321.png" onerror="this.style.display='none'">karma boots (+2/+3/+4)</li>
          <li>HOTA</li>
          <li>Golden Helmet</li>
          <li>Ornate Armor/Legs</li>
          <li>Demon Armor</li>
          <li>Albino Plate</li>
          <li>Amazon/Great/Nightmare shields</li>
        </ul>
          </div>
      <div>
        <div class="skill-heading">Distance Skill</div>
        <ul class="item-list cols-2" style="list-style:none; padding-left:0;">
          <li><img class="item-icon" src="images/items_shop/items/5818.png" onerror="this.style.display='none'">karma spellbook</li>
          <li><img class="item-icon" src="images/items_shop/items/6128.png" onerror="this.style.display='none'">karma shield</li>
          <li><img class="item-icon" src="images/items_shop/items/7549.png" onerror="this.style.display='none'">swamp hammer</li>
          <li><img class="item-icon" src="images/items_shop/items/6144.png" onerror="this.style.display='none'">swamp armor</li>
          <li><img class="item-icon" src="images/items_shop/items/7636.png" onerror="this.style.display='none'">terran rainbow shield</li>
          <li><img class="item-icon" src="images/items_shop/items/7615.png" onerror="this.style.display='none'">sacred tree amulet</li>
          <li><img class="item-icon" src="images/items_shop/items/7637.png" onerror="this.style.display='none'">undead rod</li>
          <li><img class="item-icon" src="images/items_shop/items/7594.png" onerror="this.style.display='none'">the ironworker</li>
        </ul>
          </div>
          </div>
    <div class="note">Como conseguir: drop de monstros (raridade) e forja (chance de vir com atributo).</div>
          </div>
  </div>

  <div id="tab-multi" class="tab-panel">
  <div class="box-title">Multi Shot</div>
  <div class="box-row">
    <div class="note">Presente em itens de distância. Requer munições suportadas no slot para acionar. Valores por raridade: Rare(+1), Epic(+2), Legendary(+3).</div>
    <ul id="multi-list" class="item-list" style="columns:3; -webkit-columns:3; -moz-columns:3; list-style:none; padding-left:0;">
      <li><img class="item-icon" src="images/items_shop/items/7594.png" onerror="this.style.display='none'">The Ironworker</li>
      <li><img class="item-icon" src="images/items_shop/items/5791.png" onerror="this.style.display='none'">Karma Crossbow</li>
      <li><img class="item-icon" src="images/items_shop/items/6174.png" onerror="this.style.display='none'">Karma Bow</li>
    </ul>
  </div>
</div>
<script>
// Filtro simples por texto para listas de itens
function filterList(inputId, listId) {
  const q = document.getElementById(inputId).value.toLowerCase();
  document.querySelectorAll('#' + listId + ' li').forEach(li => {
    li.style.display = li.textContent.toLowerCase().includes(q) ? '' : 'none';
  });
}

// Abas
document.querySelectorAll('.tab-btn').forEach(btn => {
  btn.addEventListener('click', () => {
    document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    const tab = btn.getAttribute('data-tab');
    document.querySelectorAll('.tab-panel').forEach(p => p.style.display = 'none');
    document.getElementById(tab).style.display = 'block';
  });
});
</script>

<script>
// Aplica o hover com atraso de 500ms em todos os itens
document.querySelectorAll('.image-wrapper').forEach(wrapper => {
  const modal = wrapper.querySelector('.info-modal');
  let t;
  wrapper.addEventListener('mouseenter', () => { t = setTimeout(() => { modal.style.opacity = '1'; }, 500); });
  wrapper.addEventListener('mouseleave', () => { clearTimeout(t); modal.style.opacity = '0'; });
});
</script>
</body>
</html>