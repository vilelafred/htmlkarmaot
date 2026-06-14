<div id="content">
					<p><img src="/images/swamp.png" alt="" width="905" height="509"></p>
<h2 style="text-align: center;">
    <strong><em><br>Swamp Spider</em></strong>
    <strong style="font-size: 14px;"><em>(Boss Level 200+)</em></strong>
    <br><br>

    <strong style="font-size: 14px;">Rewards:&nbsp;&nbsp;</strong>

    <img src="images/items_shop/items/item_gifs/2160.gif" style="font-size: 14px;">
    <span style="font-size: 14px;">&nbsp;&nbsp;</span>

    <!-- itens com hover de 500ms trazendo informações dos itens -->
    <div class="image-wrapper" style="position: relative; display: inline-block;">
        <img src="images/items_shop/items/7549.png" alt="Item" class="item-image" style="cursor: pointer;">
        <div class="info-modal">
            You see a swamp hammer <br>(Atk:55, Def:30).</div>
    </div>

    <div class="image-wrapper" style="position: relative; display: inline-block;">
        <img src="images/items_shop/items/7598.png" alt="Item" class="item-image" style="cursor: pointer;">
        <div class="info-modal">
            You see a silkweaver bow <br>(Range:7, Hit%+30).</div>
    </div>

    <div class="image-wrapper" style="position: relative; display: inline-block;">
        <img src="images/items_shop/items/7724.png" alt="Item" class="item-image" style="cursor: pointer;">
        <div class="info-modal">
            You see a sacred tree amulet<br> (protection physical +60%, earth +40%)<br> that has 100~250 charge.</div>
    </div>

    <div class="image-wrapper" style="position: relative; display: inline-block;">
        <img src="images/items_shop/items/7636.png" alt="Item" class="item-image" style="cursor: pointer;">
        <div class="info-modal">
            You see a terran rainbow shield<br> (Def:47, protection earth +10%).</div>
    </div>

    <div class="image-wrapper" style="position: relative; display: inline-block;">
        <img src="images/items_shop/items/5830.png" alt="Item" class="item-image" style="cursor: pointer;">
        <div class="info-modal">
            You see a green blood herb.</div>
    </div>

    <div class="image-wrapper" style="position: relative; display: inline-block;">
        <img src="images/items_shop/items/7615.png" alt="Item" class="item-image" style="cursor: pointer;">
        <div class="info-modal">
            You see a swamp armor<br>(Arm:15, protection earth +15%).</div>
    </div>

    <div class="image-wrapper" style="position: relative; display: inline-block;">
        <img src="images/items_shop/items/6692.png" alt="Item" class="item-image" style="cursor: pointer;">
        <div class="info-modal">
            You see a casino ticket.</div>
    </div>
</h2>

<script>
    // Aplica a lógica do modal a todos os .image-wrapper na página
    document.querySelectorAll('.image-wrapper').forEach(wrapper => {
        const image = wrapper.querySelector('.item-image');

        // Cria e estiliza o modal se ele ainda não existir
        let modal = wrapper.querySelector('.info-modal');
        if (!modal) {
            modal = document.createElement('div');
            modal.className = 'info-modal';
            modal.textContent = 'Informações sobre o item';
            wrapper.appendChild(modal);
        }

        Object.assign(modal.style, {
            position: 'absolute',
            bottom: '110%',
            left: '20%',
            transform: 'translateX(-50%)',
            backgroundColor: 'rgba(30, 60, 200, 0.6)',
            color: '#ffffff',
            padding: '8px 12px',
            borderRadius: '6px',
            fontSize: '10px',
            whiteSpace: 'nowrap',
            opacity: '0',
            pointerEvents: 'none',
            transition: 'opacity 0.3s ease',
            zIndex: '10'
        });

        // Garante estilos básicos
        wrapper.style.position = 'relative';
        wrapper.style.display = 'inline-block';

        let hoverTimeout;

        wrapper.addEventListener('mouseenter', () => {
            hoverTimeout = setTimeout(() => {
                modal.style.opacity = '1';
            }, 500);
        });

        wrapper.addEventListener('mouseleave', () => {
            clearTimeout(hoverTimeout);
            modal.style.opacity = '0';
        });
    });
</script>
<table style="border-collapse: collapse; width: 100%;" border="1">
<tbody>
<tr style="background-color: #f1e0c6;">
<td style="width: 100%; text-align: center; height: 35px;"><a href="/?casino"><img src="images/items_shop/items/6692.png" width="32" height="32">&nbsp;<span style="color: #008000;"><strong></strong></span>Casino</a></td>
</tr>
<tr style="background-color: #d4c0a1;">
<td style="width: 100%; height: 18px; text-align: center;"><strong>Requeriments</strong>: Solo or up to 3 players. Pay Magic Sulphur per player to pull the lever.</td>
</tr>
<tr style="background-color: #f1e0c6;">
<td style="width: 100%; height: 18px; text-align: center;"><strong>Time Limit to kill the Boss</strong>: 15 minutes.</td>
</tr>
<tr style="background-color: #d4c0a1;">
<td style="width: 100%; height: 18px; text-align: center;"><strong>Location</strong>: Alva Swamp - Alva <span style="color: #008000;"><strong><a style="color: #008000;" href="" target="_blank" rel="noopener"></a></strong></span></td>
</tr>
<tr style="background-color: #f1e0c6;">
<td style="width: 100%; height: 18px; text-align: center;"><br>There is no specific <em>mechanic</em> to face the boss.<br> Take advantage of the available space, run and cause as much damage as possible together with your team.<br> Be prepared or <strong>death</strong> will find you.<br>
<h5><span style="color: #1c1c1c;"><em>You can kill the boss every 20 hours.</em></span></h5>
<em><strong><span style="color: #008000;">You can receive from 1 to 8 items at once.</span></strong></em></td>
</tr>
</tbody>
</table><br><br>
	<p><img src="/images/Dreadfiend.png" alt="" width="905" height="509"></p>
<h2 style="text-align: center;">
    <strong><em><br>Dreadfiend</em></strong>
    <strong style="font-size: 14px;"><em>(Boss Level 300+)</em></strong>
    <br><br>

    <strong style="font-size: 14px;">Rewards:&nbsp;&nbsp;</strong>

    <img src="images/items_shop/items/item_gifs/2160.gif" style="font-size: 14px;">
    <span style="font-size: 14px;">&nbsp;&nbsp;</span>

    <!-- itens com hover de 500ms trazendo informações dos itens -->
    <div class="image-wrapper" style="position: relative; display: inline-block;">
        <img src="images/items_shop/items/item_gifs/7637.gif" alt="Item" class="item-image" style="cursor: pointer;">
        <div class="info-modal">
            You see an undead rod.<br> Atk:120~130 (Death).
        </div>
    </div>

    <div class="image-wrapper" style="position: relative; display: inline-block;">
        <img src="images/items_shop/items/5855.png" alt="Item" class="item-image" style="cursor: pointer;">
        <div class="info-modal">
            You see a smoke bag (Vol:40).
        </div>
    </div>

    <div class="image-wrapper" style="position: relative; display: inline-block;">
        <img src="images/items_shop/items/item_gifs/7594.gif" alt="Item" class="item-image" style="cursor: pointer;">
        <div class="info-modal">
            You see the ironworker <br>(Range:7, Atk+25, Hit%+20).
        </div>
    </div>

    <div class="image-wrapper" style="position: relative; display: inline-block;">
        <img src="images/items_shop/items/6217.png" alt="Item" class="item-image" style="cursor: pointer;">
        <div class="info-modal">
            You see a dreadfiend boots.<br> Fast Regen (5hp/s 5mp/s)
        </div>
    </div>

    <div class="image-wrapper" style="position: relative; display: inline-block;">
        <img src="images/items_shop/items/7600.png" alt="Item" class="item-image" style="cursor: pointer;">
        <div class="info-modal">
            You see a dreafiend cape <br>(Arm:15, protection physical +9%).
        </div>
    </div>

    <div class="image-wrapper" style="position: relative; display: inline-block;">
        <img src="images/items_shop/items/6166.png" alt="Item" class="item-image" style="cursor: pointer;">
        <div class="info-modal">
            You see a ultimate dreafiend cape<br> (Arm:15, protection physical +9%, fire +12%).
        </div>
    </div>

    <div class="image-wrapper" style="position: relative; display: inline-block;">
        <img src="images/items_shop/items/6692.png" alt="Item" class="item-image" style="cursor: pointer;">
        <div class="info-modal">
            You see a casino ticket.
        </div>
    </div>
</h2>

<script>
    // Aplica a lógica do modal a todos os .image-wrapper na página
    document.querySelectorAll('.image-wrapper').forEach(wrapper => {
        const image = wrapper.querySelector('.item-image');

        let modal = wrapper.querySelector('.info-modal');
        if (!modal) {
            modal = document.createElement('div');
            modal.className = 'info-modal';
            modal.textContent = 'Informações sobre o item';
            wrapper.appendChild(modal);
        }

        Object.assign(modal.style, {
            position: 'absolute',
            bottom: '110%',
            left: '20%',
            transform: 'translateX(-50%)',
            backgroundColor: 'rgba(30, 60, 200, 0.6)',
            color: '#ffffff',
            padding: '8px 12px',
            borderRadius: '6px',
            fontSize: '10px',
            whiteSpace: 'nowrap',
            opacity: '0',
            pointerEvents: 'none',
            transition: 'opacity 0.3s ease',
            zIndex: '10'
        });

        wrapper.style.position = 'relative';
        wrapper.style.display = 'inline-block';

        let hoverTimeout;

        wrapper.addEventListener('mouseenter', () => {
            hoverTimeout = setTimeout(() => {
                modal.style.opacity = '1';
            }, 500);
        });

        wrapper.addEventListener('mouseleave', () => {
            clearTimeout(hoverTimeout);
            modal.style.opacity = '0';
        });
    });
</script>
<table style="border-collapse: collapse; width: 100%;" border="1">
<tbody>
<tr style="background-color: #f1e0c6;">
<td style="width: 100%; text-align: center; height: 35px;"><a href="/?casino"><img src="images/items_shop/items/6692.png" width="32" height="32">&nbsp;<span style="color: #008000;"><strong></strong></span>Casino</a></td>
</tr>
<tr style="background-color: #d4c0a1;">
<td style="width: 100%; height: 18px; text-align: center;"><strong>Requeriments</strong>: Solo or up to 4 players. Pay 2 Magic Sulphur per player to pull the lever.</td>
</tr>
<tr style="background-color: #f1e0c6;">
<td style="width: 100%; height: 18px; text-align: center;"><strong>Time Limit to kill the Boss</strong>: 10 minutes.</td>
</tr>
<tr style="background-color: #d4c0a1;">
<td style="width: 100%; height: 18px; text-align: center;"><strong>Location</strong>:  North Port Hope <span style="color: #008000;"><strong><a style="color: #008000;" href="" target="_blank" rel="noopener"></a></strong></span></td>
</tr>
<tr style="background-color: #f1e0c6;">
<td style="width: 100%; height: 18px; text-align: center;"><br>There is no specific <em>mechanic</em> to face the boss.<br> Take advantage of the available space, run and cause as much damage as possible together with your team.<br> Be prepared or <strong>death</strong> will find you.<br>
<h5><span style="color: #1c1c1c;"><em>You can kill the boss every 20 hours.</em></span></h5>
<em><strong><span style="color: #008000;">You can receive from 1 to 8 items at once.</span></strong></em></td>
</tr>
</tbody>
</table>
<br>
	<p><img src="/images/Mozradek.png" alt="" width="905" height="509"></p>
<h2 style="text-align: center;">
    <strong><em><br>Mozradek</em></strong>
    <strong style="font-size: 14px;"><em>(Boss Level 400+)</em></strong>
    <br><br>

    <strong style="font-size: 14px;">Rewards:&nbsp;&nbsp;</strong>

    <img src="images/items_shop/items/item_gifs/2160.gif" style="font-size: 14px;">
    <span style="font-size: 14px;">&nbsp;&nbsp;</span>

    <!-- itens com hover de 500ms trazendo informações dos itens -->
    <div class="image-wrapper" style="position: relative; display: inline-block;">
        <img src="images/items_shop/items/5787.png" alt="Item" class="item-image" style="cursor: pointer;">
        <div class="info-modal">
            You see redborn boots <br>(protection fire +15%).
        </div>
    </div>

    <div class="image-wrapper" style="position: relative; display: inline-block;">
        <img src="images/items_shop/items/6771.png" alt="Item" class="item-image" style="cursor: pointer;">
        <div class="info-modal">
            You see a devil draptor backpack (Vol:40).
        </div>
    </div>

    <div class="image-wrapper" style="position: relative; display: inline-block;">
        <img src="images/items_shop/items/7581.png" alt="Item" class="item-image" style="cursor: pointer;">
        <div class="info-modal">
            You see a greatfire axe (Atk:65, Def:29).
        </div>
    </div>

    <div class="image-wrapper" style="position: relative; display: inline-block;">
        <img src="images/items_shop/items/6114.png" alt="Item" class="item-image" style="cursor: pointer;">
        <div class="info-modal">
            You see a redteaser sword (Atk:63, Def:25). <br>It is the Sword of Teaser.
        </div>
    </div>

    <div class="image-wrapper" style="position: relative; display: inline-block;">
        <img src="images/items_shop/items/item_gifs/8179.gif" alt="Item" class="item-image" style="cursor: pointer;">
        <div class="info-modal">
            You see a redborn robe <br>(Arm:12, magic level +5, protection fire +10%).
        </div>
    </div>

    <div class="image-wrapper" style="position: relative; display: inline-block;">
        <img src="images/items_shop/items/item_gifs/7661.gif" alt="Item" class="item-image" style="cursor: pointer;">
        <div class="info-modal">
            You see a redborn armor <br>(Arm:17, shielding +15, protection physical +7%, fire +7%)..
        </div>
    </div>

    <div class="image-wrapper" style="position: relative; display: inline-block;">
        <img src="images/items_shop/items/6692.png" alt="Item" class="item-image" style="cursor: pointer;">
        <div class="info-modal">
            You see a casino ticket.
        </div>
    </div>
</h2>

<script>
    // Aplica a lógica do modal a todos os .image-wrapper na página
    document.querySelectorAll('.image-wrapper').forEach(wrapper => {
        const image = wrapper.querySelector('.item-image');

        let modal = wrapper.querySelector('.info-modal');
        if (!modal) {
            modal = document.createElement('div');
            modal.className = 'info-modal';
            modal.textContent = 'Informações sobre o item';
            wrapper.appendChild(modal);
        }

        Object.assign(modal.style, {
            position: 'absolute',
            bottom: '110%',
            left: '20%',
            transform: 'translateX(-50%)',
            backgroundColor: 'rgba(30, 60, 200, 0.6)',
            color: '#ffffff',
            padding: '8px 12px',
            borderRadius: '6px',
            fontSize: '10px',
            whiteSpace: 'nowrap',
            opacity: '0',
            pointerEvents: 'none',
            transition: 'opacity 0.3s ease',
            zIndex: '10'
        });

        wrapper.style.position = 'relative';
        wrapper.style.display = 'inline-block';

        let hoverTimeout;

        wrapper.addEventListener('mouseenter', () => {
            hoverTimeout = setTimeout(() => {
                modal.style.opacity = '1';
            }, 500);
        });

        wrapper.addEventListener('mouseleave', () => {
            clearTimeout(hoverTimeout);
            modal.style.opacity = '0';
        });
    });
</script>
<table style="border-collapse: collapse; width: 100%;" border="1">
<tbody>
<tr style="background-color: #f1e0c6;">
<td style="width: 100%; text-align: center; height: 35px;"><a href="/?casino"><img src="images/items_shop/items/6692.png" width="32" height="32">&nbsp;<span style="color: #008000;"><strong></strong></span>Casino</a></td>
</tr>
<tr style="background-color: #d4c0a1;">
<td style="width: 100%; height: 18px; text-align: center;"><strong>Requeriments</strong>: Solo or up to 4 players. Pay 3 Magic Sulphur per player to pull the lever.</td>
</tr>
<tr style="background-color: #f1e0c6;">
<td style="width: 100%; height: 18px; text-align: center;"><strong>Time Limit to kill the Boss</strong>: 15 minutes.</td>
</tr>
<tr style="background-color: #d4c0a1;">
<td style="width: 100%; height: 18px; text-align: center;"><strong>Location</strong>: Catacombs - East Darashia <span style="color: #008000;"><strong><a style="color: #008000;" href="" target="_blank" rel="noopener"></a></strong></span></td>
</tr>
<tr style="background-color: #f1e0c6;">
<td style="width: 100%; height: 18px; text-align: center;"><br>There is no specific <em>mechanic</em> to face the boss.<br> Take advantage of the available space, run and cause as much damage as possible together with your team.<br> Be prepared or <strong>death</strong> will find you.<br>
<h5><span style="color: #1c1c1c;"><em>You can kill the boss every 20 hours.</em></span></h5>
<em><strong><span style="color: #008000;">You can receive from 1 to 8 items at once.</span></strong></em></td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>					<div style="clear:both;"></div>


<br>
	<p><img src="/images/Terragor.png" alt="" width="905" height="509"></p>
<h2 style="text-align: center;">
    <strong><em><br>Terragor</em></strong>
    <strong style="font-size: 14px;"><em>(Boss Level 500+)</em></strong>
    <br><br>

    <strong style="font-size: 14px;">Rewards:&nbsp;&nbsp;</strong>

    <img src="images/items_shop/items/item_gifs/2160.gif" style="font-size: 14px;">
    <span style="font-size: 14px;">&nbsp;&nbsp;</span>

    <!-- itens com hover de 500ms trazendo informações dos itens -->
    <div class="image-wrapper" style="position: relative; display: inline-block;">
        <img src="images/items_shop/items/6610.png" alt="Item" class="item-image" style="cursor: pointer;">
        <div class="info-modal">
            You see a ultimate surprise bag <br>(Chance drop: Karma hat, Karma armor, Karma legs, Karma spellbook +10ML, Karma bow or Karma crossbow).
        </div>
    </div>

    <div class="image-wrapper" style="position: relative; display: inline-block;">
        <img src="images/items_shop/items/6692.png" alt="Item" class="item-image" style="cursor: pointer;">
        <div class="info-modal">
            You see a casino ticket.
        </div>
    </div>
</h2>

<script>
    // Aplica a lógica do modal a todos os .image-wrapper na página
    document.querySelectorAll('.image-wrapper').forEach(wrapper => {
        const image = wrapper.querySelector('.item-image');

        let modal = wrapper.querySelector('.info-modal');
        if (!modal) {
            modal = document.createElement('div');
            modal.className = 'info-modal';
            modal.textContent = 'Informações sobre o item';
            wrapper.appendChild(modal);
        }

        Object.assign(modal.style, {
            position: 'absolute',
            bottom: '110%',
            left: '20%',
            transform: 'translateX(-50%)',
            backgroundColor: 'rgba(30, 60, 200, 0.6)',
            color: '#ffffff',
            padding: '8px 12px',
            borderRadius: '6px',
            fontSize: '10px',
            whiteSpace: 'nowrap',
            opacity: '0',
            pointerEvents: 'none',
            transition: 'opacity 0.3s ease',
            zIndex: '10'
        });

        wrapper.style.position = 'relative';
        wrapper.style.display = 'inline-block';

        let hoverTimeout;

        wrapper.addEventListener('mouseenter', () => {
            hoverTimeout = setTimeout(() => {
                modal.style.opacity = '1';
            }, 500);
        });

        wrapper.addEventListener('mouseleave', () => {
            clearTimeout(hoverTimeout);
            modal.style.opacity = '0';
        });
    });
</script>
<table style="border-collapse: collapse; width: 100%;" border="1">
<tbody>
<tr style="background-color: #f1e0c6;">
<td style="width: 100%; text-align: center; height: 35px;"><a href="/?casino"><img src="images/items_shop/items/6692.png" width="32" height="32">&nbsp;<span style="color: #008000;"><strong></strong></span>Casino</a></td>
</tr>
<tr style="background-color: #d4c0a1;">
<td style="width: 100%; height: 18px; text-align: center;"><strong>Requeriments</strong>: Solo or up to 4 players. Pay 4 Magic Sulphur per player to pull the lever.</td>
</tr>
<tr style="background-color: #f1e0c6;">
<td style="width: 100%; height: 18px; text-align: center;"><strong>Time Limit to kill the Boss</strong>: 25 minutes.</td>
</tr>
<tr style="background-color: #d4c0a1;">
<td style="width: 100%; height: 18px; text-align: center;"><strong>Location</strong>: Alzude - Westside <span style="color: #008000;"><strong><a style="color: #008000;" href="" target="_blank" rel="noopener"></a></strong></span></td>
</tr>
<tr style="background-color: #f1e0c6;">
<td style="width: 100%; height: 18px; text-align: center;"><br>There is no specific <em>mechanic</em> to face the boss.<br> Take advantage of the available space, run and cause as much damage as possible together with your team.<br> Be prepared or <strong>death</strong> will find you.<br>
<h5><span style="color: #1c1c1c;"><em>You can kill the boss every 20 hours.</em></span></h5>
<em><strong><span style="color: #008000;">You can receive from 1 to 4 items at once.</span></strong></em></td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>					<div style="clear:both;"></div>


<br>
	<p><img src="/images/dreadlord.png" alt="" width="905" height="509"></p>
<h2 style="text-align: center;">
    <strong><em><br>Infernal Dreadlord</em></strong>
    <strong style="font-size: 14px;"><em>(Boss Level 600+)</em></strong>
    <br><br>

    <strong style="font-size: 14px;">Rewards:&nbsp;&nbsp;</strong>

    <img src="images/items_shop/items/item_gifs/2160.gif" style="font-size: 14px;">
    <span style="font-size: 14px;">&nbsp;&nbsp;</span>

<!-- itens com hover de 500ms trazendo informações dos itens -->
<div class="image-wrapper" style="position: relative; display: inline-block;">
  <img src="images/items_shop/items/6127.png" alt="Karma Armor" class="item-image" style="cursor: pointer;">
  <div class="info-modal">
    You see a karma armor <br>(Arm:24, club fighting +10, sword fighting +10, axe fighting +10, distance fighting +10, shielding +10, protection all +8%).
  </div>
</div>

<div class="image-wrapper" style="position: relative; display: inline-block;">
  <img src="images/items_shop/items/6167.png" alt="Karma Hat" class="item-image" style="cursor: pointer;">
  <div class="info-modal">
    You see a karma hat <br>(Arm:15, protection all +5%).<br>It weighs 98.00 oz.
  </div>
</div>

<div class="image-wrapper" style="position: relative; display: inline-block;">
  <img src="images/items_shop/items/6196.png" alt="Karma Staff" class="item-image" style="cursor: pointer;">
  <div class="info-modal">
    You see a karma staff.<br>
    It can only be wielded properly by sorcerers, master sorcerers, druids and elder druids.<br>
    It weighs 27.00 oz.<br>
    It turns a weak staff into a powerful weapon. (Atk:210~300)
  </div>
</div>

<div class="image-wrapper" style="position: relative; display: inline-block;">
  <img src="images/items_shop/items/6221.png" alt="Karma Hammer" class="item-image" style="cursor: pointer;">
  <div class="info-modal">
    You see a karma hammer <br>(Atk:79, Def:35 +10, club fighting +15).<br>It weighs 110.00 oz.
  </div>
</div>

<div class="image-wrapper" style="position: relative; display: inline-block;">
  <img src="images/items_shop/items/6174.png" alt="Karma Bow" class="item-image" style="cursor: pointer;">
  <div class="info-modal">
    You see a karma bow <br>(Range:7, Atk+70, Hit%+100, distance fighting +20).
  </div>
</div>

<div class="image-wrapper" style="position: relative; display: inline-block;">
  <img src="images/items_shop/items/6118.png" alt="Karma Sword" class="item-image" style="cursor: pointer;">
  <div class="info-modal">
    You see a karma sword <br>(Atk:79, Def:35 +10, sword fighting +15).
  </div>
</div>

<div class="image-wrapper" style="position: relative; display: inline-block;">
  <img src="images/items_shop/items/6128.png" alt="Karma Shield" class="item-image" style="cursor: pointer;">
  <div class="info-modal">
    You see a karma shield <br>(Def:65, protection all +3%).
  </div>
</div>

<div class="image-wrapper" style="position: relative; display: inline-block;">
  <img src="images/items_shop/items/5791.png" alt="Karma Crossbow" class="item-image" style="cursor: pointer;">
  <div class="info-modal">
    You see a karma crossbow <br>(Range:7, Atk+100, Hit%+100).
  </div>
</div>

<div class="image-wrapper" style="position: relative; display: inline-block;">
  <img src="images/items_shop/items/7630.png" alt="Karma Spellbook" class="item-image" style="cursor: pointer;">
  <div class="info-modal">
    You see a karma spellbook <br>(Arm:25, magic level +10, protection all +3%).<br>
    It can only be wielded properly by sorcerers and druids.
  </div>
</div>

<div class="image-wrapper" style="position: relative; display: inline-block;">
  <img src="images/items_shop/items/6176.png" alt="Karma Legs" class="item-image" style="cursor: pointer;">
  <div class="info-modal">
    You see karma legs <br>(Arm:10, protection all +5%).
  </div>
</div>

<div class="image-wrapper" style="position: relative; display: inline-block;">
  <img src="images/items_shop/items/5818.png" alt="Karma Cape" class="item-image" style="cursor: pointer;">
  <div class="info-modal">
    You see a karma cape <br>(Arm:22, shielding +10, magic level +10, protection all +8%).<br>
    It can only be wielded properly by sorcerers and druids.
  </div>
</div>

<script>
    // Aplica a lógica do modal a todos os .image-wrapper na página
    document.querySelectorAll('.image-wrapper').forEach(wrapper => {
        const image = wrapper.querySelector('.item-image');

        let modal = wrapper.querySelector('.info-modal');
        if (!modal) {
            modal = document.createElement('div');
            modal.className = 'info-modal';
            modal.textContent = 'Informações sobre o item';
            wrapper.appendChild(modal);
        }

        Object.assign(modal.style, {
            position: 'absolute',
            bottom: '110%',
            left: '20%',
            transform: 'translateX(-50%)',
            backgroundColor: 'rgba(30, 60, 200, 0.6)',
            color: '#ffffff',
            padding: '8px 12px',
            borderRadius: '6px',
            fontSize: '10px',
            whiteSpace: 'nowrap',
            opacity: '0',
            pointerEvents: 'none',
            transition: 'opacity 0.3s ease',
            zIndex: '10'
        });

        wrapper.style.position = 'relative';
        wrapper.style.display = 'inline-block';

        let hoverTimeout;

        wrapper.addEventListener('mouseenter', () => {
            hoverTimeout = setTimeout(() => {
                modal.style.opacity = '1';
            }, 500);
        });

        wrapper.addEventListener('mouseleave', () => {
            clearTimeout(hoverTimeout);
            modal.style.opacity = '0';
        });
    });
</script>
<table style="border-collapse: collapse; width: 100%;" border="1">
<tbody>
<tr style="background-color: #f1e0c6;">
<td style="width: 100%; text-align: center; height: 35px;"><a href="/?casino"><img src="images/items_shop/items/6692.png" width="32" height="32">&nbsp;<span style="color: #008000;"><strong></strong></span>Casino</a></td>
</tr>
<tr style="background-color: #d4c0a1;">
<td style="width: 100%; height: 18px; text-align: center;"><strong>Requeriments</strong>: Solo or up to 4 players. Pay 5 Magic Sulphur per player to pull the lever.</td>
</tr>
<tr style="background-color: #f1e0c6;">
<td style="width: 100%; height: 18px; text-align: center;"><strong>Time Limit to kill the Boss</strong>: 30 minutes.</td>
</tr>
<tr style="background-color: #d4c0a1;">
<td style="width: 100%; height: 18px; text-align: center;"><strong>Location</strong>: Karma Boat - Hellfire line <span style="color: #008000;"><strong><a style="color: #008000;" href="" target="_blank" rel="noopener"></a></strong></span></td>
</tr>
<tr style="background-color: #f1e0c6;">
<td style="width: 100%; height: 18px; text-align: center;"><br>There is no specific <em>mechanic</em> to face the boss.<br> Take advantage of the available space, run and cause as much damage as possible together with your team.<br> Be prepared or <strong>death</strong> will find you.<br>
<h5><span style="color: #1c1c1c;"><em>You can kill the boss every 20 hours.</em></span></h5>
<em><strong><span style="color: #008000;">You can receive from 1 to 13 items at once.</span></strong></em></td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>					<div style="clear:both;"></div>


<br>
	<p><img src="/images/revenge.png" alt="" width="905" height="509"></p>
<h2 style="text-align: center;">
    <strong><em><br>Revenge Incarnate</em></strong>
    <strong style="font-size: 14px;"><em>(Boss Level 700+)</em></strong>
    <br><br>

    <strong style="font-size: 14px;">Rewards:&nbsp;&nbsp;</strong>

    <img src="images/items_shop/items/item_gifs/2160.gif" style="font-size: 14px;">
    <span style="font-size: 14px;">&nbsp;&nbsp;</span>

<!-- itens com hover de 500ms trazendo informações dos itens -->
<div class="image-wrapper" style="position: relative; display: inline-block;">
  <img src="images/items_shop/items/8243.png" alt="Magic Feather Aura" class="item-image" style="cursor: pointer;">
  <div class="info-modal">
    You see a magic feather aura.<br>This item heals your HP/Mana by 100%<br>(Cooldown: 120s). One time Use.
  </div>
</div>

<div class="image-wrapper" style="position: relative; display: inline-block;">
  <img src="images/items_shop/items/8238.png" alt="Jasmin Coin" class="item-image" style="cursor: pointer;">
  <div class="info-modal">
    You see jasmin coins.
  </div>
</div>

<div class="image-wrapper" style="position: relative; display: inline-block;">
  <img src="images/items_shop/items/8276.png" alt="Earth Buff" class="item-image" style="cursor: pointer;">
  <div class="info-modal">
    You see an earth buff.<br>Use on Karma Amulet and get 10%<br>of earth protection. Check time left: !karma
  </div>
</div>

<div class="image-wrapper" style="position: relative; display: inline-block;">
  <img src="images/items_shop/items/8277.png" alt="Physical Buff" class="item-image" style="cursor: pointer;">
  <div class="info-modal">
    You see a physical buff.<br>Use on Karma Amulet and get 10%<br>of physical protection. Check time left: !karma
  </div>
</div>

<div class="image-wrapper" style="position: relative; display: inline-block;">
  <img src="images/items_shop/items/8278.png" alt="Ice Buff" class="item-image" style="cursor: pointer;">
  <div class="info-modal">
    You see an ice buff.<br>Use on Karma Amulet and get 10%<br>of ice protection. Check time left: !karma
  </div>
</div>

<div class="image-wrapper" style="position: relative; display: inline-block;">
  <img src="images/items_shop/items/8279.png" alt="Holy Buff" class="item-image" style="cursor: pointer;">
  <div class="info-modal">
    You see a holy buff.<br>Use on Karma Amulet and get 10%<br>of holy protection. Check time left: !karma
  </div>
</div>

<div class="image-wrapper" style="position: relative; display: inline-block;">
  <img src="images/items_shop/items/8280.png" alt="Energy Buff" class="item-image" style="cursor: pointer;">
  <div class="info-modal">
    You see an energy buff.<br>Use on Karma Amulet and get 10%<br>of energy protection. Check time left: !karma
  </div>
</div>

<div class="image-wrapper" style="position: relative; display: inline-block;">
  <img src="images/items_shop/items/8281.png" alt="Cleansing Stone" class="item-image" style="cursor: pointer;">
  <div class="info-modal">
    You see a cleansing stone.<br>Use on a Karma Amulet to remove<br>all active Protection Stones.
  </div>
</div>

<div class="image-wrapper" style="position: relative; display: inline-block;">
  <img src="images/items_shop/items/8282.png" alt="Fire Buff" class="item-image" style="cursor: pointer;">
  <div class="info-modal">
    You see a fire buff.<br>Use on Karma Amulet and get 10%<br>of fire protection. Check time left: !karma
  </div>
</div>

<div class="image-wrapper" style="position: relative; display: inline-block;">
  <img src="images/items_shop/items/8283.png" alt="Death Buff" class="item-image" style="cursor: pointer;">
  <div class="info-modal">
    You see a death buff.<br>Use on Karma Amulet and get 10%<br>of death protection. Check time left: !karma
  </div>
</div>

<div class="image-wrapper" style="position: relative; display: inline-block;">
  <img src="images/items_shop/items/6610.png" alt="Ultimate Surprise Bag" class="item-image" style="cursor: pointer;">
  <div class="info-modal">
    You see an ultimate surprise bag <br>(Chance drop: Karma hat, Karma armor, Karma legs, Karma spellbook +10ML, Karma bow or Karma crossbow).
  </div>
</div>

<div class="image-wrapper" style="position: relative; display: inline-block;">
  <img src="images/items_shop/items/6692.png" alt="Casino Ticket" class="item-image" style="cursor: pointer;">
  <div class="info-modal">
    You see a casino ticket.
  </div>
</div>

<script>
    // Aplica a lógica do modal a todos os .image-wrapper na página
    document.querySelectorAll('.image-wrapper').forEach(wrapper => {
        const image = wrapper.querySelector('.item-image');

        let modal = wrapper.querySelector('.info-modal');
        if (!modal) {
            modal = document.createElement('div');
            modal.className = 'info-modal';
            modal.textContent = 'Informações sobre o item';
            wrapper.appendChild(modal);
        }

        Object.assign(modal.style, {
            position: 'absolute',
            bottom: '110%',
            left: '20%',
            transform: 'translateX(-50%)',
            backgroundColor: 'rgba(30, 60, 200, 0.6)',
            color: '#ffffff',
            padding: '8px 12px',
            borderRadius: '6px',
            fontSize: '10px',
            whiteSpace: 'nowrap',
            opacity: '0',
            pointerEvents: 'none',
            transition: 'opacity 0.3s ease',
            zIndex: '10'
        });

        wrapper.style.position = 'relative';
        wrapper.style.display = 'inline-block';

        let hoverTimeout;

        wrapper.addEventListener('mouseenter', () => {
            hoverTimeout = setTimeout(() => {
                modal.style.opacity = '1';
            }, 500);
        });

        wrapper.addEventListener('mouseleave', () => {
            clearTimeout(hoverTimeout);
            modal.style.opacity = '0';
        });
    });
</script>
<table style="border-collapse: collapse; width: 100%;" border="1">
<tbody>
<tr style="background-color: #f1e0c6;">
<td style="width: 100%; text-align: center; height: 35px;"><a href="/?casino"><img src="images/items_shop/items/6692.png" width="32" height="32">&nbsp;<span style="color: #008000;"><strong></strong></span>Casino</a></td>
</tr>
<tr style="background-color: #d4c0a1;">
<td style="width: 100%; height: 18px; text-align: center;"><strong>Requeriments</strong>: Solo or up to 4 players. Pay 7 Magic Sulphur per player to pull the lever.</td>
</tr>
<tr style="background-color: #f1e0c6;">
<td style="width: 100%; height: 18px; text-align: center;"><strong>Time Limit to kill the Boss</strong>: 30 minutes.</td>
</tr>
<tr style="background-color: #d4c0a1;">
<td style="width: 100%; height: 18px; text-align: center;"><strong>Location</strong>: Karma Boat - Spirit <span style="color: #008000;"><strong><a style="color: #008000;" href="" target="_blank" rel="noopener"></a></strong></span></td>
</tr>
<tr style="background-color: #f1e0c6;">
<td style="width: 100%; height: 18px; text-align: center;"><br>There is no specific <em>mechanic</em> to face the boss.<br> Take advantage of the available space, run and cause as much damage as possible together with your team.<br> Be prepared or <strong>death</strong> will find you.<br>
<h5><span style="color: #1c1c1c;"><em>You can kill the boss every 20 hours.</em></span></h5>
<em><strong><span style="color: #008000;">You can receive multiple items at once.</span></strong></em></td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>					<div style="clear:both;"></div>



					<br>
						
							<img src="templates/tibiana/images/line_body.gif" align="center" height="7" width="100%">
							<img src="templates/tibiana/images/blank.gif">
						

					<div align="center" style="font-face:verdana; font-size:10px">
				</div>
					</div>
					
					