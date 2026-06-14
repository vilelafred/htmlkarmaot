<?php
// Configuração das categorias (rótulo, ícone, imagem principal, imagem buy opcional, usar buy?)
$storeBase = '/store/';
$storeCategories = [
  // 1) Tickets
  [
    'label' => 'Tickets',
    'icon' => $storeBase . 'ticketsicon.png',
    'image' => $storeBase . 'tickets.png',
    'buy'  => null,
    'useBuy' => false,
  ],
  // 2) Items
  [
    'label' => 'Items',
    'icon' => $storeBase . 'itemsicon.png',
    'image' => $storeBase . 'items.png',
    'buy'  => null,
    'useBuy' => false,
  ],
  // 3) Scrolls and VIP
  [
    'label' => 'Scrolls & VIP',
    'icon' => $storeBase . 'scrollsicon.png',
    'image' => $storeBase . 'scrolls.png',
    'buy'  => null,
    'useBuy' => false,
  ],
  // 4) Training Weapons
  [
    'label' => 'Training Weapons',
    'icon' => $storeBase . 'trainingicon.png',
    'image' => $storeBase . 'icontraining.png',
    'buy'  => $storeBase . 'trainingbuy.png',
    'useBuy' => true,
  ],
  // 5) Utilities
  [
    'label' => 'Utilities',
    'icon' => $storeBase . 'utilidades.png',
    'image' => $storeBase . 'utilidades.png',
    'buy'  => $storeBase . 'utilidadesbuy.png',
    'useBuy' => true,
  ],
  // 6) Outfits
  [
    'label' => 'Outfits',
    'icon' => $storeBase . 'outfiticon.png',
    'image' => $storeBase . 'outfits.png',
    'buy'  => null,
    'useBuy' => false,
  ],
  // 7) Life Quality
  [
    'label' => 'Life Quality',
    'icon' => $storeBase . 'lifequality.png',
    'image' => $storeBase . 'lifequality.png',
    'buy'  => $storeBase . 'lifequalitybuy.png',
    'useBuy' => true,
  ],
  // 8) Decoration
  [
    'label' => 'Decoration',
    'icon' => $storeBase . 'decoicon.png',
    'image' => $storeBase . 'decoration.png',
    'buy'  => null,
    'useBuy' => false,
  ],
];

?>

<div id="content">
  <h2 style="text-align: center; color: #5a2800;">
    <strong><em>Karma In-Game Store</em></strong>
    <br><span style="font-size: 14px; color: #333;">Shop directly inside the game, quickly and easily!</span>
  </h2>

  <div style="border: 2px solid #d4c0a1; background-color: #fdf5e6; padding: 20px; margin: 30px auto; max-width: 880px; font-family: Verdana, Tahoma, sans-serif; font-size: 14px; color: #333; box-shadow: 2px 2px 10px rgba(0,0,0,0.1); text-align: justify;">
    <p>
      Our store is <strong>inside the game client</strong>. Use the <strong>Store button</strong> in Tibia to browse and purchase. This page is only a
      <strong>visual preview</strong> of categories and offerings.
    </p>
    <p>
      <strong style="color: #d9534f;">✔ Fast, easy, and secure.</strong><br>
      <strong style="color: #d9534f;">✔ All transactions happen in-game.</strong>
    </p>
  </div>

  <div style="border: 2px solid #d4c0a1; background-color: #fdf5e6; padding: 16px; margin: 20px auto; max-width: 980px; font-family: Verdana, Tahoma, sans-serif; color: #333;">
    <div style="display:flex; justify-content: space-between; align-items:center; gap:10px;">
      <strong style="color:#5a2800;">Store cover & PIX info</strong>
      <button type="button" aria-expanded="false" aria-controls="store-cover" onclick="(function(btn){var s=document.getElementById('store-cover');var open=s.style.display!=='none';s.style.display=open?'none':'block';btn.setAttribute('aria-expanded',(!open).toString());btn.textContent=open?'Show more':'Hide';})(this)" style="cursor:pointer; padding:4px 10px; font-size:12px; border:1px solid #d4c0a1; background:#f1e0c6; color:#5a2800; border-radius:4px;">
        Show more
      </button>
    </div>
    <div id="store-cover" style="display:none; margin-top: 12px; text-align: center;">
      <a href="<?php echo htmlspecialchars($storeBase . 'shop.png'); ?>" onclick="if(window.imagePopup){ imagePopup.open('<?php echo htmlspecialchars($storeBase . 'shop.png'); ?>','Store Cover',''); return false; }" title="Store Cover">
        <img src="<?php echo htmlspecialchars($storeBase . 'shop.png'); ?>" alt="Karma Store Cover" style="width: 100%; max-width: 476px; height: auto; border: 2px solid #d36e0f; border-radius: 5px; box-shadow: 2px 2px 5px rgba(0,0,0,0.2);">
      </a>
      <div style="text-align: left; margin-top: 12px; font-size: 14px;">
        <strong>PIX in‑game donation (automatic):</strong>
        <ul style="margin: 8px 0 0 18px; padding: 0; list-style: disc;">
          <li>Select the amount inside the Store.</li>
          <li>Scan the QR code with your banking app.</li>
          <li>Confirm the PIX to KarmaOT.</li>
          <li>Your points are credited instantly. You don’t even need to leave KarmaOT.</li>
        </ul>
      </div>
    </div>
  </div>

  <div style="border: 2px solid #d4c0a1; background-color: #f1e0c6; padding: 16px; margin: 20px auto; max-width: 980px; font-family: Verdana, Tahoma, sans-serif; color: #333;">
    <h3 style="margin: 0 0 12px 0; color: #5a2800; text-align: center;">Browse Store Categories (Preview)</h3>
    <p style="margin: 0 0 14px 0; font-size: 13px; text-align: center;">
      Click an icon to open a large preview. Want to change labels/order or open the “buy” version instead of the common one? Tell us which categories to update.
    </p>

    <style>
      .store-card { border: 1px solid #d4c0a1; background: #fdf5e6; padding: 10px; text-align: center; display: flex; flex-direction: column; align-items: center; border-radius: 5px; box-shadow: 2px 2px 5px rgba(0,0,0,0.2); }
      .store-thumb {
        width: 190px; height: 40px; display: block; margin: 0 auto;
        object-fit: contain; image-rendering: auto;
        border: 2px solid #d36e0f; border-radius: 5px;
        box-shadow: 2px 2px 5px rgba(0,0,0,0.2);
        transition: transform 0.2s;
        background: #ece5d8;
      }
      .store-thumb:hover { transform: scale(1.02); }
    </style>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 14px; justify-items: center;">
      <?php foreach ($storeCategories as $cat): ?>
        <?php
          $openImage = ($cat['useBuy'] && !empty($cat['buy'])) ? $cat['buy'] : $cat['image'];
        ?>
        <div class="store-card">
          <a href="<?php echo htmlspecialchars($openImage); ?>" onclick="if(window.imagePopup){ imagePopup.open('<?php echo htmlspecialchars($openImage); ?>','<?php echo htmlspecialchars($cat['label']); ?>',''); return false; }" title="<?php echo htmlspecialchars($cat['label']); ?>">
            <img src="<?php echo htmlspecialchars($cat['icon']); ?>" alt="<?php echo htmlspecialchars($cat['label']); ?>" class="store-thumb">
          </a>
          <div style="margin-top: 6px; font-weight: bold; font-size: 12px; color: #5a2800;">
            <?php echo htmlspecialchars($cat['label']); ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <img src="templates/tibiana/images/line_body.gif" align="center" height="7" width="100%">
</div>
