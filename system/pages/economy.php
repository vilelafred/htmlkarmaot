<?php
function formatGold($amount) {
    $coins = (int) floor(((float) $amount) / 1000000);
    return number_format($coins, 0, ',', '.') . " Jasmin Coins";
}
?>

<div id="content">
  <div style="max-width:800px;margin:0 auto 8px;font-family:Verdana,Tahoma,Helvetica,sans-serif;">
    <h1 style="text-align:center;color:#333333;font-size:16px;margin:8px 0;">
      <img src="/images/items_shop/items/6010.png" style="vertical-align:middle;image-rendering:pixelated;width:22px;height:22px;margin-right:6px;"> SERVER ECONOMY <img src="/images/items_shop/items/6010.png" style="vertical-align:middle;image-rendering:pixelated;width:22px;height:22px;margin-left:6px;">
    </h1>
  </div>
  <div style="text-align:center; font-size: 12px; font-family: Verdana, Tahoma, Helvetica, sans-serif; margin: 6px 0 12px; color:#333;">
  </div>

  <table style="border-collapse: collapse; width: 100%; font-size: 18px; border: 2px solid #7B3F00;" border="1">
    <tbody>
      <tr style="background-color: #f1e0c6;">
        <td style="text-align: center; height: 35px;">
          <img src="images/items_shop/items/item_gifs/2148.gif" width="32" height="32">
          <img src="images/items_shop/items/item_gifs/2152.gif" width="32" height="32">
          <img src="images/items_shop/items/item_gifs/2160.gif" width="32" height="32">   
        </td>
      </tr>
      <tr style="background-color: #d4c0a1;">
        <td style="text-align: center; padding: 20px;">
          <strong>Total in circulation:</strong><br><br>
          <span style="color: #FFD700; font-size: 28px; font-weight: bold;">
            <?php
            $query = "
              SELECT 
                (IFNULL((SELECT SUM(
                  CASE 
                    WHEN itemtype = 2148 THEN count
                    WHEN itemtype = 2152 THEN count * 100
                    WHEN itemtype = 2160 THEN count * 10000
                    WHEN itemtype = 8238 THEN count * 1000000
                    ELSE 0
                  END
                ) FROM player_items), 0)
                +
                IFNULL((SELECT SUM(
                  CASE 
                    WHEN itemtype = 2148 THEN count
                    WHEN itemtype = 2152 THEN count * 100
                    WHEN itemtype = 2160 THEN count * 10000
                    WHEN itemtype = 8238 THEN count * 1000000
                    ELSE 0
                  END
                ) FROM player_depotitems), 0)
                +
                IFNULL((SELECT SUM(balance) FROM players), 0)
              ) AS totalGold
            ";
            $result = $SQL->query($query)->fetch();
            echo formatGold($result['totalGold']);
            ?>
          </span>
          <br><br>
          <span style="font-size: 12px; color: #555;">
            Last update: <?php echo date("Y-m-d H:i:s"); ?>
          </span>
        </td>
      </tr>
    </tbody>
  </table>

  <h3 style="text-align: center; margin-top: 50px; font-size: 22px; color: #8B0000; font-family: 'Georgia', serif;">
    <em>Top 10 Richest Players</em>
  </h3>

  <table style="border-collapse: collapse; width: 100%; font-size: 16px; border: 2px solid #333;">
    <thead>
      <tr style="background-color: #7B3F00; color: white;">
        <th style="padding: 10px;">Rank</th>
        <th style="padding: 10px;">Player</th>
        <th style="padding: 10px;">Total Wealth</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $topQuery = "
        SELECT 
          p.name,
          (
            p.balance +
            IFNULL((SELECT SUM(
              CASE 
                WHEN pi.itemtype = 2148 THEN pi.count
                WHEN pi.itemtype = 2152 THEN pi.count * 100
                WHEN pi.itemtype = 2160 THEN pi.count * 10000
                WHEN pi.itemtype = 8238 THEN pi.count * 1000000
                ELSE 0
              END
            ) FROM player_items pi WHERE pi.player_id = p.id), 0) +
            IFNULL((SELECT SUM(
              CASE 
                WHEN pd.itemtype = 2148 THEN pd.count
                WHEN pd.itemtype = 2152 THEN pd.count * 100
                WHEN pd.itemtype = 2160 THEN pd.count * 10000
                WHEN pd.itemtype = 8238 THEN pd.count * 1000000
                ELSE 0
              END
            ) FROM player_depotitems pd WHERE pd.player_id = p.id), 0)
          ) AS total_wealth
        FROM players p
        WHERE p.deleted = 0 AND p.group_id < 3
        ORDER BY total_wealth DESC
        LIMIT 10
      ";

      $topResult = $SQL->query($topQuery)->fetchAll();
      $rank = 1;

      foreach ($topResult as $row) {
        $bgColor = ($rank % 2 == 0) ? "#f8f0e3" : "#e7d3b0";

        switch ($rank) {
          case 1: $bgColor = "#FFD700"; break;
          case 2: $bgColor = "#C0C0C0"; break;
          case 3: $bgColor = "#CD7F32"; break;
        }

        echo "<tr style='background-color: {$bgColor}; text-align: center; font-weight: " . ($rank <= 3 ? "bold" : "normal") . ";'>
                <td style='padding: 8px;'>{$rank}</td>
                <td style='padding: 8px;'>
                  <a href='/?characters/" . urlencode($row['name']) . "' style='color: #8B0000; text-decoration: none; font-weight: bold;'>
                    " . htmlspecialchars($row['name']) . "
                  </a>
                </td>
                <td style='padding: 8px;'>" . formatGold($row['total_wealth']) . "</td>
              </tr>";
        $rank++;
      }
      ?>
    </tbody>
  </table>
</div>
