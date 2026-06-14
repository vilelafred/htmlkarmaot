<?php
/**
 * Experience stages
 *
 * @package   MyAAC
 * @link      https://my-aac.org
 */

defined('MYAAC') or die('Direct access not allowed!');

$title = 'Donation';

require_once LIBS . 'shop-system.php';
require_once PLUGINS . 'gesior-shop-system/config.php';
$twig->addGlobal('config', $config);

if (!$config['gifts_system']) {
    if (!admin()) {
        echo 'The gifts system is disabled there, sorry.';
        return;
    } else {
        warning("You're able to access this page but it is disabled for normal users.<br/>
        Its enabled for you so you can view/edit shop offers before displaying them to users.<br/>
        You can enable it by editing this line in myaac config.local.php file:<br/>
        <p style=\"margin-left: 3em;\"><b>\$config['gifts_system'] = true;</b></p>");
    }
}

if (GesiorShop::getDonationType() == 'coins' && !fieldExist('coins', 'accounts')) {
    error("Your server doesn't support accounts.coins. Please change back config.donation_type to points.");
    return;
}

if (!$logged) {
    $was_before = $config['friendly_urls'];
    $config['friendly_urls'] = true;

    echo 'To make a donation you need to be logged. ' . generateLink(
        getLink('?subtopic=accountmanagement') . '&redirect=' . urlencode(BASE_URL . '?subtopic=donation'),
        'Login first'
    ) . '.';

    $config['friendly_urls'] = $was_before;
    return;
}

// Verifica se o User-Agent contém "Opera" ou "OPR" (Opera Mini) para identificar os navegadores Opera e Opera GX
$isOpera = stripos($_SERVER['HTTP_USER_AGENT'], 'Opera') !== false || stripos($_SERVER['HTTP_USER_AGENT'], 'OPR') !== false;
$isOperaGX = stripos($_SERVER['HTTP_USER_AGENT'], 'Opera GX') !== false;

?>

<!DOCTYPE html>
<html>
<head>
    <title><?= $title ?></title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        #main{
            width: 75% !important;   
        }
        #topbar{
            width: 85.4% !important;
        }
        #topbar ul{
            padding: 0px !important;
        }
        body {
            background-color: black;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php
             if(!$isOpera && !$isOperaGX){
            ?>
            <form target="mercadopago" method="post" action="?mpteste">
                <input type="hidden" name="reference" value="<?= $account_logged->getCustomField("name"); ?>">
                <input type="hidden" name="ref_cod_pedido" value="<?= (int)date('ymdHism') . (int)$account_logged->getId(); ?>">
                <div class="container">
                    <div class="text-center">
                        <img src="<?= $template_path . "/images/mercado-pago3.png" ?>" class="img-fluid" alt="Mercado Pago">
                    </div>
                    <div class="text-center">
                        <strong>Escolha a quantidade de pontos que deseja DOAR.</strong>
                    </div>
                    <div class="row" style="margin-top: 30px; margin-left: 10%; margin-right: 10%; margin-bottom: 30px">
                        <div class="col-md-12 mb-2">
                            <span class="text-center">Account name:</span>
                            <strong class="text-center"><?= $account_logged->getCustomField("name"); ?></strong>
                        </div>
                        <div class="col-md-4">
                            <span class="text-center">Pontos</span>
                        </div>
                        <div class="col-md-6">
                            <input name="itemCount" type="number" min="1" class="form-control">
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success" name="submit">Donate</button>
                    </div>
                </div>
            </form>
            <?php
             }
            ?>
        </div>
        <?php
                        
            if($isOpera || $isOperaGX){
                echo '
                <div class="container">
                    <div class="alert alert-warning">
                        <h5 class="alert-heading">Atenção!</h5>
                        <p class="mb-0" style="font-size: 90%;">
                            Os navegadores <strong>Opera</strong> e <strong>Opera GX</strong> não são compatíveis com o serviço de pagamento do Mercado Pago. Para garantir a melhor experiência ao fazer doações, por favor, utilize um navegador compatível, como <a href="https://www.google.com/chrome/" target="_blank"><strong>Google Chrome</strong></a>, <a href="https://www.mozilla.org/pt-BR/firefox/new/" target="_blank"><strong>Mozilla Firefox</strong></a>, <a href="https://www.microsoft.com/pt-br/edge" target="_blank"><strong>Microsoft Edge</strong></a> ou <a href="https://brave.com/" target="_blank"><strong>Brave</strong></a>.
                        </p>
                    </div>
                </div>';
            }
        ?>
    </div>
</div>

</body>
</html>
