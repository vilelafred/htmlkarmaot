<?php
// Karma OT - Casino Prizes (Full Structured Page)
?>
<div id="content">
    <style>
        .casino-section {
            margin-bottom: 10px;
        }
        .casino-title {
            background-color: #4a4a45;
            color: white;
            padding: 10px;
            cursor: pointer;
            font-weight: bold;
            text-align: center;
            font-family: Verdana, Tahoma, Helvetica, sans-serif;
        }
        .casino-content {
            display: none;
            animation: fadeIn 0.3s ease-in-out;
        }
        @keyframes fadeIn {
            from {opacity: 0;}
            to {opacity: 1;}
        }
    </style>
    <script>
        function toggleCasino(id) {
            var content = document.getElementById(id);
            content.style.display = content.style.display === "none" ? "table" : "none";
        }
    </script>

    <p>
        <img style="display: block; margin-left: auto; margin-right: auto;" src="https://classicot.com/layout/images/line_body.gif" width="100%" height="7">
        <img style="display: block; margin-left: 330px;" src="/images/casino.png">
        <img style="display: block; margin-left: auto; margin-right: auto;" src="https://classicot.com/layout/images/line_body.gif" width="100%" height="7">
    </p>


    <a href="/images/casino.gif" data-description="KarmaOT @ 2025"><img style="display: block; margin-left: auto; margin-right: auto; border: 3px solid orange;"
         src="/images/casino.gif" width="750" height="306"></a>

    <div class="casino-section">
        <div class="casino-title" onclick="toggleCasino('casino1')">Casino 1 - Original (Requires 2x Casino Ticket)</div>
        <table id="casino1" class="casino-content" style="font-size: 13px; color: #5a2800;
            margin: 0 auto 20px; border-spacing: 1px; font-family: Verdana, Tahoma, Helvetica, sans-serif;
            width: 700px; box-shadow: #000000 1px 1px 10px;" cellspacing="1" cellpadding="10">
            <tr>
         <tr style="background-color: #d4c0a1;">
         <td><a href="images/items_shop/items/6846.png" data-description="KarmaOT @ 2025"><img src="images/items_shop/items/6846.png"></a><br>Magic Sulphur</td>
         <td><a href="images/items_shop/items/2160.png" data-description="KarmaOT @ 2025"><img src="images/items_shop/items/2160.png"></a><br>Crystal Coins</td>
         <td><a href="images/items_shop/items/5804.png" data-description="KarmaOT @ 2025"><img src="images/items_shop/items/5804.png"></a><br>Karma Ring</td>
         <td><a href="images/items_shop/items/6768.png" data-description="KarmaOT @ 2025"><img src="images/items_shop/items/6768.png"></a><br>Smoky Backpack</td>
         <td><a href="images/items_shop/items/6840.png" data-description="KarmaOT @ 2025"><img src="images/items_shop/items/6840.png"></a><br>Surprise Chest</td>
     </tr>
         <tr style="background-color: #f1e0c6;">
         <td><a href="images/items_shop/items/6762.png" data-description="KarmaOT @ 2025"><img src="images/items_shop/items/6762.png"></a><br>Nocturnal Backpack</td>
         <td><a href="images/items_shop/items/6699.png" data-description="KarmaOT @ 2025"><img src="images/items_shop/items/6699.png"></a><br>Citizen Outfit</td>
         <td><a href="images/items_shop/items/6832.png" data-description="KarmaOT @ 2025"><img src="images/items_shop/items/6832.png"></a><br>Multi Tool</td>
         <td><a href="images/items_shop/items/2268.png" data-description="KarmaOT @ 2025"><img src="images/items_shop/items/2268.png"></a><br>SD Rune (100x)</td>
         <td><a href="images/items_shop/items/2152.png" data-description="KarmaOT @ 2025"><img src="images/items_shop/items/2152.png"></a><br>Platinum Coins</td>
     </tr>
         <tr style="background-color: #d4c0a1;">
         <td><a href="images/items_shop/items/7731.png" data-description="KarmaOT @ 2025"><img src="images/items_shop/items/7731.png"></a><br>Food Fluid</td>
         <td><a href="images/items_shop/items/8206.png" data-description="KarmaOT @ 2025"><img src="images/items_shop/items/8206.png"></a><br>Mining Pick</td>
         <td><a href="images/items_shop/items/6088.png" data-description="KarmaOT @ 2025"><img src="images/items_shop/items/6088.png"></a><br>Bless Checker</td>
         <td><a href="images/items_shop/items/6477.png" data-description="KarmaOT @ 2025"><img src="images/items_shop/items/6477.png"></a><br>Karma Ticket</td>
     </tr>
         <tr style="background-color: #f1e0c6;">
         <td><a href="images/items_shop/items/6818.png" data-description="KarmaOT @ 2025"><img src="images/items_shop/items/6818.png"></a><br>Temple Scroll</td>
         <td><a href="images/items_shop/items/66988.png" data-description="KarmaOT @ 2025"><img src="images/items_shop/items/66988.png"></a><br>EXP Scroll</td>
         <td><a href="images/items_shop/items/6009.png" data-description="KarmaOT @ 2025"><img src="images/items_shop/items/6009.png"></a><br>Casino Ticket</td>
         <td><a href="images/items_shop/items/6838.png" data-description="KarmaOT @ 2025"><img src="images/items_shop/items/6838.png"></a><br>Blessing Scroll</td>
         <td><a href="images/items_shop/items/6562.png" data-description="KarmaOT @ 2025"><img src="images/items_shop/items/6562.png"></a><br>Smithing Hammer</td>
     </tr>
    </tr>
        </table>
    </div>
    
    <div class="casino-section">
        <div class="casino-title" onclick="toggleCasino('casino2')">Casino 2 - Novice (Requires 2x Casino Tickets)</div>
        <table id="casino2" class="casino-content" style="font-size: 13px; color: #5a2800;
            margin: 0 auto 20px; border-spacing: 1px; font-family: Verdana, Tahoma, Helvetica, sans-serif;
            width: 700px; box-shadow: #000000 1px 1px 10px;" cellspacing="1" cellpadding="10">
            <tr>
         <tr style="background-color: #d4c0a1;">
         <td><a href="images/items_shop/items/6832.png" data-description="KarmaOT @ 2025"><img src="images/items_shop/items/6832.png"></a><br>Multi Tool</td>
         <td><a href="images/items_shop/items/6155.png" data-description="KarmaOT @ 2025"><img src="images/items_shop/items/6155.png"></a><br>Training Staff</td>
         <td><a href="images/items_shop/items/item_gifs/6698.gif" data-description="KarmaOT @ 2025"><img src="images/items_shop/items/item_gifs/6698.gif"></a><br>EXP Boost</td>
         <td><a href="images/items_shop/items/6838.png" data-description="KarmaOT @ 2025"><img src="images/items_shop/items/6838.png"></a><br>Bless Scroll</td>
         <td><a href="images/items_shop/items/6846.png" data-description="KarmaOT @ 2025"><img src="images/items_shop/items/6846.png"></a><br>Magic Sulphur</td>
     </tr>
         <tr style="background-color: #f1e0c6;">
         <td><a href="images/items_shop/items/5903.png" data-description="KarmaOT @ 2025"><img src="images/items_shop/items/5903.png"></a><br>Winged Boots</td>
         <td><a href="images/items_shop/items/2640.png" data-description="KarmaOT @ 2025"><img src="images/items_shop/items/2640.png"></a><br>Karma Boots</td>
         <td><a href="images/items_shop/items/7282.png" data-description="KarmaOT @ 2025"><img src="images/items_shop/items/7282.png"></a><br>Feather Aura</td>
         <td><a href="images/items_shop/items/6818.png" data-description="KarmaOT @ 2025"><img src="images/items_shop/items/6818.png"></a><br>Temple Scroll</td>
         <td><a href="images/items_shop/items/6692.png" data-description="KarmaOT @ 2025"><img src="images/items_shop/items/6692.png"></a><br>Casino Ticket</td>
     </tr>
         <tr style="background-color: #d4c0a1;">
         <td><a href="images/items_shop/items/5804.png" data-description="KarmaOT @ 2025"><img src="images/items_shop/items/5804.png"></a><br>Karma Ring</td>
         <td><a href="images/items_shop/items/2160.png" data-description="KarmaOT @ 2025"><img src="images/items_shop/items/2160.png"></a><br>Crystal Coins</td>
         <td colspan="2"><a href="images/items_shop/items/6009.png" data-description="KarmaOT @ 2025"><img src="images/items_shop/items/6009.png"></a><br>Try your luck!</td>
     </tr>
    </tr>
        </table>
    </div>
    
    <div class="casino-section">
        <div class="casino-title" onclick="toggleCasino('casino3')"> Casino 3 - Supreme (Requires 2x Casino Tickets)</div>
        <table id="casino3" class="casino-content" style="font-size: 13px; color: #5a2800;
            margin: 0 auto 20px; border-spacing: 1px; font-family: Verdana, Tahoma, Helvetica, sans-serif;
            width: 700px; box-shadow: #000000 1px 1px 10px;" cellspacing="1" cellpadding="10">
            <tr>
         <tr style="background-color: #d4c0a1;">
         <td><a href="images/items_shop/items/6181.png" data-description="KarmaOT @ 2025"><img src="images/items_shop/items/6181.png"></a><br>Mana Amulet</td>
         <td><a href="images/items_shop/items/6155.png" data-description="KarmaOT @ 2025"><img src="images/items_shop/items/6155.png"></a><br>Training Book</td>
         <td><a href="images/items_shop/items/item_gifs/6698.gif" data-description="KarmaOT @ 2025"><img src="images/items_shop/items/item_gifs/6698.gif"></a><br>EXP Boost</td>
         <td><a href="images/items_shop/items/6800.png" data-description="KarmaOT @ 2025"><img src="images/items_shop/items/6800.png"></a><br>Dragon Slayer Outfit</td>
     </tr>
         <tr style="background-color: #f1e0c6;">
         <td><a href="images/items_shop/items/6784.png" data-description="KarmaOT @ 2025"><img src="images/items_shop/items/6784.png"></a><br>Demon Knight Outfit</td>
         <td><a href="images/items_shop/items/2474.png" data-description="KarmaOT @ 2025"><img src="images/items_shop/items/2474.png"></a><br>Winged Helmet</td>
         <td><a href="images/items_shop/items/6818.png" data-description="KarmaOT @ 2025"><img src="images/items_shop/items/6818.png"></a><br>Temple Scroll</td>
         <td><a href="images/items_shop/items/6692.png" data-description="KarmaOT @ 2025"><img src="images/items_shop/items/6692.png"></a><br>Casino Ticket</td>
     </tr>
         <tr style="background-color: #d4c0a1;">
         <td><a href="images/items_shop/items/5806.png" data-description="KarmaOT @ 2025"><img src="images/items_shop/items/5806.png"></a><br>Love Ring</td>
         <td><a href="images/items_shop/items/7632.png" data-description="KarmaOT @ 2025"><img src="images/items_shop/items/7632.png"></a><br>Rainbow Shield</td>
         <td><a href="images/items_shop/items/item_gifs/2160.gif" data-description="KarmaOT @ 2025"><img src="images/items_shop/items/item_gifs/2160.gif"></a><br>Crystal Coins</td>
         <td><a href="images/items_shop/items/6836.png" data-description="KarmaOT @ 2025"><img src="images/items_shop/items/6836.png"></a><br>100 Karma Points</td>		
         <td colspan="2"></td>
     </tr>
    </tr>
        </table>
    </div>
    
    <div class="casino-section">
        <div class="casino-title" onclick="toggleCasino('casino4')"> Casino 4 - Ultimate  (Requires 2x Casino Tickets)</div>
        <table id="casino4" class="casino-content" style="font-size: 13px; color: #5a2800;
            margin: 0 auto 20px; border-spacing: 1px; font-family: Verdana, Tahoma, Helvetica, sans-serif;
            width: 700px; box-shadow: #000000 1px 1px 10px;" cellspacing="1" cellpadding="10">
            <tr>
         <tr style="background-color: #d4c0a1;">
         <td><a href="images/items_shop/items/item_gifs/6698.gif" data-description="KarmaOT @ 2025"><img src="images/items_shop/items/item_gifs/6698.gif"></a><br>EXP Boost</td>
         <td><a href="images/items_shop/items/6838.png" data-description="KarmaOT @ 2025"><img src="images/items_shop/items/6838.png"></a><br>Bless Scroll</td>
         <td><a href="images/items_shop/items/6613.png" data-description="KarmaOT @ 2025"><img src="images/items_shop/items/6613.png"></a><br>Royal Customer Outfit</td>
         <td><a href="images/items_shop/items/item_gifs/2160.gif" data-description="KarmaOT @ 2025"><img src="images/items_shop/items/item_gifs/2160.gif"></a><br>Crystal Coins <br>(15-30x)</td>			
     </tr>
         <tr style="background-color: #f1e0c6;">
         <td><a href="images/items_shop/items/6610.png" data-description="KarmaOT @ 2025"><img src="images/items_shop/items/6610.png"></a><br>Ultimate Surprise Bag</td>
         <td><a href="images/items_shop/items/6836.png" data-description="KarmaOT @ 2025"><img src="images/items_shop/items/6836.png"></a><br>100 Karma Points</td>
         <td><a href="images/items_shop/items/7308.png" data-description="KarmaOT @ 2025"><img src="images/items_shop/items/7308.png"></a><br>Lucky Ring (+20% Loot)</td>
         <td><a href="images/items_shop/items/item_gifs/2160.gif" data-description="KarmaOT @ 2025"><img src="images/items_shop/items/item_gifs/2160.gif"></a><br>Crystal Coins <br>(10-15x)</td>		
     </tr>
         <tr style="background-color: #d4c0a1;">
         <td><a href="images/items_shop/items/item_gifs/5838.gif" data-description="KarmaOT @ 2025"><img src="images/items_shop/items/item_gifs/5838.gif"></a><br>Magic Powder</td>
         <td><a href="images/items_shop/items/6692.png" data-description="KarmaOT @ 2025"><img src="images/items_shop/items/6692.png"></a><br>Casino Ticket</td>
         <td><a href="images/items_shop/items/5807.png" data-description="KarmaOT @ 2025"><img src="images/items_shop/items/5807.png"></a><br>Blessed Ring (1500 HP, CD 8min)</td>
         <td><a href="images/items_shop/items/2523.png" data-description="KarmaOT @ 2025"><img src="images/items_shop/items/2523.png"></a><br>Rainbow Shield</td>
 
     </tr>
    </tr>
        </table>
    </div>
    
</div>