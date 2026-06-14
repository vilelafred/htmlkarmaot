<?php
$online_otservlist = 0;
try {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://otarchive.com/server/651df19a2510c61078a1453e");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return data inplace of echoing on screen
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true); // Skip SSL Verification
    curl_setopt($ch, CURLOPT_ENCODING , "");
    $site = curl_exec($ch);
    curl_close($ch);
    preg_match('/Informed Players (\d+) \(\d+\)/', $site, $matches);
    // preg_match('/There are: <strong>([0-9]*)<\/strong>/', $site, $matches);
    $doc = new DOMDocument();
    @$doc->loadHTML($site);

    $xpath = new DOMXPath($doc);

    // Find the <th> element with the text "Informed Players"
    $thElement = $xpath->query('//th[contains(text(), "Informed Players")]')->item(0);
    if ($thElement) {
        // Find the element <td> sibling of <th> that contains the number of online players
        $tdElement = $thElement->nextSibling;
        if ($tdElement && $tdElement->nodeName === 'td') {
            $playersOnlineText = $tdElement->nodeValue;
            // Use a regular expression to extract just the number
            if (preg_match('/(\d+)/', $playersOnlineText, $matches)) {
                $playersOnline = $matches[1];
            }
        }
    }
    $online_otservlist = $matches[1];
} catch(Exception $e) {}
$online_discord = 0;
try {
    $online_discord = json_decode(file_get_contents("https://discord.com/api/guilds/1136264192232525964/widget.json "))->presence_count;
} catch(Exception $e) {}

$response = array(
    "online" => "$online_otservlist Players online",
    "discord_online" => $online_discord,
    "discord_link" => "https://discord.gg/sx2mBCvdBm"
);
echo json_encode($response);
?>