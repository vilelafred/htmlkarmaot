<?php

/**
 * Sistema de Doação - Tibia
 * Sistema de steps dinâmico sem recarregar a página
 *
 * @package   MyAAC
 * @author    Gesior <jerzyskalski@wp.pl>
 * @author    Slawkens <slawkens@gmail.com>
 * @copyright 2019 MyAAC
 * @link      https://my-aac.org
 */
defined('MYAAC') or die('Direct access not allowed!');
$title = 'Doacao';

if (!$logged) {
	header('Location: /?account/manage');
	exit;
}

// Configurações do sistema
$g_Services = [193, 194, 195, 196, 197, 198, 199];
$g_PaymentMethodCategories = [11, 21, 22, 31, 32, 90];

// Dados dos produtos
$products = $config['products'];

// Métodos de pagamento
$paymentMethods = [
	1 => ['name' => 'PIX', 'system' => 'pagarme', 'image' => 'pix.webp', 'speed' => 'very fast'],
	2 => ['name' => 'Stripe', 'system' => 'stripe', 'image' => 'stripe.gif', 'speed' => 'very fast']
];

// Moedas disponíveis para Stripe
$currencies = [
	'BRL' => ['symbol' => 'R$', 'name' => 'Real Brasileiro'],
	'USD' => ['symbol' => '$', 'name' => 'Dólar Americano'],
	'EUR' => ['symbol' => '€', 'name' => 'Euro']
];

// Processamento de formulário (se necessário)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// Aqui você pode processar os dados do formulário
	$step = $_POST['step'] ?? 1;
	$system = $_POST['system'] ?? '';
	$itemCount = $_POST['itemCount'] ?? '';
	$cpf = $_POST['cpf'] ?? '';
	$currency = $_POST['currency'] ?? 'BRL';

	// Lógica de processamento baseada no step
	switch ($step) {
		case 2:
			// Processar seleção de método de pagamento
			break;
		case 3:
			// Processar seleção de produto
			break;
		case 4:
			// Finalizar pedido
			break;
	}
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sistema de Doação - Tibia</title>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
	<style>
		/* Estilos básicos para o sistema */
		.Border_2 {
			border: 2px solid #8B4513;
			margin: 20px 0;
		}

		.Border_3 {
			border: 1px solid #D2B48C;
			margin: 2px;
		}

		.BoxContent {
			padding: 20px;
			background-color: #FFF8DC;
			background-image: url('templates/myaac/images/content/scroll.gif');
		}

		.PMCID_CP_Icon {
			max-width: 70px;
		}

		/* Progress Bar Styles */
		#ProgressBar {
			margin: 20px 0;
			text-align: center;
		}

		#MainContainer {
			position: relative;
			display: inline-block;
			width: 100%;
			max-width: 800px;
		}

		#BackgroundContainer {
			display: flex;
			align-items: center;
			height: 40px;
			margin-bottom: 10px;
		}

		#BackgroundContainerCenter {
			flex: 1;
			height: 100%;
		}

		#BackgroundContainerCenterImage {
			width: 100%;
			height: 100%;
			background-repeat: repeat-x;
		}

		#StepsContainer1 {
			display: flex;
			justify-content: space-between;
			margin-top: 10px;
		}

		#StepsContainer2 {
			display: flex;
			width: 100%;
		}

		.Steps {
			display: flex;
			flex-direction: column;
			align-items: center;
			position: relative;
		}

		.SingleStepContainer {
			display: flex;
			flex-direction: column;
			align-items: center;
			text-align: center;
		}

		.StepIcon {
			width: 32px;
			height: 32px;
			margin-bottom: 5px;
		}

		.StepText {
			font-size: 12px;
			color: #333;
		}

		.TubeContainer {
			width: 100%;
			height: 20px;
			display: flex;
			align-items: center;
			margin-bottom: 10px;
		}

		.Tube {
			width: 100%;
			height: 8px;
		}

		/* Customer Identification */
		.CustomerIdentification {
			margin: 20px 0;
			padding: 10px;
			background-color: #E6E6FA;
			border: 1px solid #DDD;
			text-align: center;
		}

		.CaptionEdgeLeftTop,
		.CaptionEdgeRightTop,
		.CaptionEdgeLeftBottom,
		.CaptionEdgeRightBottom {
			position: absolute;
			width: 10px;
			height: 10px;
			background-size: contain;
		}

		.CaptionEdgeLeftTop {
			top: 0;
			left: 0;
		}

		.CaptionEdgeRightTop {
			top: 0;
			right: 0;
		}

		.CaptionEdgeLeftBottom {
			bottom: 0;
			left: 0;
		}

		.CaptionEdgeRightBottom {
			bottom: 0;
			right: 0;
		}

		.Table5 {
			width: 100%;
			border-collapse: collapse;
		}

		.InnerTableTab {
			background-color: #D2B48C;
			padding: 10px;
			margin-bottom: 10px;
			text-align: center;
			border-radius: 5px;
			position: relative;
		}

		.ActiveInnerTableTab {
			background-color: #8B4513;
			color: white;
		}

		/* Form Styles */
		.form-group {
			margin: 15px 0;
		}

		.form-group label {
			display: block;
			margin-bottom: 5px;
			font-weight: bold;
		}

		.form-group input,
		.form-group select,
		.form-group textarea {
			width: 100%;
			padding: 8px;
			border: 1px solid #DDD;
			border-radius: 4px;
			font-size: 14px;
			box-sizing: border-box;
		}

		/* Summary Styles */
		.summary-item {
			display: flex;
			justify-content: space-between;
			padding: 10px 0;
			border-bottom: 1px solid #EEE;
		}

		.summary-total {
			font-weight: bold;
			font-size: 18px;
			color: #8B4513;
			border-top: 2px solid #8B4513;
			padding-top: 10px;
			margin-top: 10px;
		}

		/* Payment Method Styles */
		.OptionsContainer {
			display: flex;
			justify-content: center;
			gap: 20px;
			flex-wrap: wrap;
			padding: 20px;
		}

		.PMCID_Icon_Container,
		.ServiceID_Icon_Container {
			position: relative;
			cursor: pointer;
			margin: 10px;
		}

		.PMCID_Icon,
		.ServiceID_Icon {
			width: 150px;
			height: 100px;
			border: 2px solid #DDD;
			border-radius: 8px;
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
			background-color: white;
			transition: all 0.3s ease;
			position: relative;
			/* background-image: url('templates/myaac/images/payment/pmcid_icon_normal.png'); */
			background-size: cover;
		}

		.ServiceID_Icon_Container_Background {
			/* background-image: url('templates/myaac/images/payment/serviceid_icon_normal.png'); */
			background-size: cover;
			border-radius: 8px;
		}

		.PMCID_Icon:hover,
		.ServiceID_Icon:hover {
			border-color: #8B4513;
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
		}

		.PMCID_Icon.selected,
		.ServiceID_Icon.selected {
			border-color: #8B4513;
			background-color: #FFF8DC;
			box-shadow: 0 0 10px rgba(139, 69, 19, 0.5);
		}

		.PMCID_Icon_Selected,
		.ServiceID_Icon_Selected {
			position: absolute;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			/* background-image: url('templates/myaac/images/payment/pmcid_icon_selected.png'); */
			background-size: cover;
			display: none;
		}

		.PMCID_Icon.selected .PMCID_Icon_Selected,
		.ServiceID_Icon.selected .ServiceID_Icon_Selected {
			display: block;
		}

		.PMCID_Icon_Over,
		.ServiceID_Icon_Over {
			position: absolute;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			background-size: cover;
			opacity: 0;
			transition: opacity 0.3s ease;
		}

		.PMCID_Icon:hover .PMCID_Icon_Over,
		.ServiceID_Icon:hover .ServiceID_Icon_Over {
			opacity: 1;
			/* background-image: url('templates/myaac/images/payment/pmcid_icon_over.png'); */
		}

		.PMCID_CP_Label,
		.ServiceIDLabelContainer {
			text-align: center;
			font-weight: bold;
			z-index: 10;
			position: relative;
		}

		.ServiceIDPriceContainer {
			margin-top: 5px;
			font-size: 14px;
			color: #8B4513;
			font-weight: bold;
			z-index: 10;
			position: relative;
		}

		.PMCID_QuicknessIndicator {
			position: absolute;
			bottom: 5px;
			right: 5px;
			font-size: 10px;
			color: #666;
			z-index: 10;
		}

		/* Button Styles */
		.BigButton {
			display: inline-block;
			margin: 20px 0;
			position: relative;
			background-image: url('templates/myaac/images/global/buttons/sbutton.gif');
			background-size: cover;
		}

		.BigButtonOver {
			position: absolute;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			background-image: url('templates/myaac/images/global/buttons/sbutton_over.gif');
			background-size: cover;
			visibility: hidden;
		}

		.BigButtonText {
			background: none;
			border: none;
			color: white;
			padding: 15px 30px;
			font-size: 16px;
			font-weight: bold;
			cursor: pointer;
			position: relative;
			z-index: 10;
		}

		.BigButtonText:disabled {
			color: #CCC;
			cursor: not-allowed;
		}

		/* Step Content Styles */
		.step-content {
			display: none;
		}

		.step-content.active {
			display: block;
		}

		/* Navigation Buttons */
		.navigation-buttons {
			text-align: center;
			margin: 30px 0;
		}

		.nav-button {
			background-color: #8B4513;
			color: white;
			border: none;
			padding: 12px 25px;
			margin: 0 10px;
			border-radius: 5px;
			cursor: pointer;
			font-size: 14px;
			transition: background-color 0.3s ease;
		}

		.nav-button:hover:not(:disabled) {
			background-color: #A0522D;
		}

		.nav-button:disabled {
			background-color: #CCC;
			cursor: not-allowed;
		}

		/* Responsive */
		@media (max-width: 768px) {
			.OptionsContainer {
				flex-direction: column;
				align-items: center;
			}

			.PMCID_Icon,
			.ServiceID_Icon {
				width: 200px;
			}

			#StepsContainer2 {
				flex-direction: column;
				gap: 10px;
			}

			.Steps {
				width: 100% !important;
			}
		}

		/* CPF Field Styles */
		.cpf-field {
			margin: 20px 0;
			padding: 15px;
			background-color: #f9f9f9;
			border-radius: 5px;
			border: 1px solid #ddd;
		}

		.cpf-field h3 {
			margin-top: 0;
			color: #8B4513;
		}

		/* Currency Selector Styles */
		.currency-selector {
			margin: 15px 0;
			padding: 10px;
			background-color: #f5f5f5;
			border-radius: 5px;
			display: none;
		}

		.currency-selector.active {
			display: block;
		}

		.currency-selector label {
			display: block;
			margin-bottom: 8px;
			font-weight: bold;
			color: #555;
		}

		.currency-selector select {
			width: 100%;
			padding: 8px;
			border: 1px solid #ddd;
			border-radius: 4px;
			background-color: white;
		}

		.exchange-rate-info {
			font-size: 12px;
			color: #666;
			margin-top: 5px;
			font-style: italic;
		}
	</style>
</head>

<body>
	<div class="Border_2">
		<div class="Border_3">
			<div class="BoxContent">

				<!-- Step 1: Select Payment Method -->
				<div id="step1" class="step-content active">
					<div class="TableContainer">
						<div class="CaptionContainer">
							<div class="CaptionInnerContainer">
								<span class="CaptionEdgeLeftTop" style="background-image:url(templates/myaac/images/global/content/box-frame-edge.gif);"></span>
								<span class="CaptionEdgeRightTop" style="background-image:url(templates/myaac/images/global/content/box-frame-edge.gif);"></span>
								<span class="CaptionBorderTop" style="background-image:url(templates/myaac/images/global/content/table-headline-border.gif);"></span>
								<span class="CaptionVerticalLeft" style="background-image:url(templates/myaac/images/global/content/box-frame-vertical.gif);"></span>
								<div class="Text">Selecionar método de pagamento</div>
								<span class="CaptionVerticalRight" style="background-image:url(templates/myaac/images/global/content/box-frame-vertical.gif);"></span>
								<span class="CaptionBorderBottom" style="background-image:url(templates/myaac/images/global/content/table-headline-border.gif);"></span>
								<span class="CaptionEdgeLeftBottom" style="background-image:url(templates/myaac/images/global/content/box-frame-edge.gif);"></span>
								<span class="CaptionEdgeRightBottom" style="background-image:url(templates/myaac/images/global/content/box-frame-edge.gif);"></span>
							</div>
						</div>
						<table class="Table5" cellpadding="0" cellspacing="0">
							<tbody>
								<tr>
									<td>
										<div class="InnerTableContainer">
											<table style="width:100%;">
												<tbody>
													<tr>
														<td>
															<span class="HelperDivIndicator" onmouseover="ActivateHelperDiv($(this), 'Métodos de Pagamento', 'Selecione o método de pagamento de sua preferência.', 'PaymentMethodHelperDiv');" onmouseout="$('#HelperDivContainer').hide();">
																<div class="InnerTableTab WideTab ActiveInnerTableTab">
																	<div id="PaymentMethodHelperDiv" class="ProductCategoryHelperDiv"></div>
																	<div style="color: inherit; text-decoration: none; cursor: default;">
																		<div class="InnerTableTabLabel">Métodos de Pagamento</div>
																	</div>
																</div>
															</span>
														</td>
													</tr>
													<tr>
														<td>
															<div class="TableShadowContainerRightTop">
																<div class="TableShadowRightTop" style="background-image:url(templates/myaac/images/global/content/table-shadow-rt.gif);"></div>
															</div>
															<div class="TableContentContainer">
																<table class="TableContent" width="100%" style="border:1px solid #faf0d7;">
																	<tbody>
																		<tr>
																			<td style="text-align: center;" align="center">
																				<div class="OptionsContainer">
																					<?php foreach ($paymentMethods as $id => $method): ?>
																						<div class="PMCID_Icon_Container" id="PMCID_Icon_Container_<?php echo $id; ?>">
																							<div class="PMCID_Icon" id="PMCID_Icon_<?php echo $id; ?>" onclick="ChangePMC(<?php echo $id; ?>, '<?php echo $method['system']; ?>');" onmouseover="MouseOverPMCID(<?php echo $id; ?>);" onmouseout="MouseOutPMCID(<?php echo $id; ?>);">
																								<div class="PMCID_Icon_Selected" id="PMCID_Icon_Selected_<?php echo $id; ?>"></div>
																								<div class="PMCID_Icon_Over" id="PMCID_Icon_Over_<?php echo $id; ?>"></div>
																								<div class="PMCID_QuicknessIndicator">
																									<span class="HelperDivIndicator" onmouseover="ActivateHelperDiv($(this), 'Tempo de Processamento:', 'Normalmente leva alguns minutos até você receber o produto se usar este método de pagamento.', '');" onmouseout="$('#HelperDivContainer').hide();">
																										<div class="PMCID_QuicknessIndicatorLabelContainer">
																											<div class="PMCID_QuicknessIndicatorLabel">Tempo:<br><?php echo $method['speed']; ?></div>
																										</div>
																									</span>
																								</div>
																								<img class="PMCID_CP_Icon" src="images/<?php echo $method['image']; ?>" alt="<?php echo $method['name']; ?>">
																								<div class="PMCID_CP_Label">
																									<input type="radio" id="PMCID_<?php echo $id; ?>" name="system" value="<?php echo $method['system']; ?>" style="display: none;">
																									<label for="PMCID_<?php echo $id; ?>"><?php echo $method['name']; ?></label>
																								</div>
																							</div>
																						</div>
																					<?php endforeach; ?>
																				</div>
																			</td>
																		</tr>
																		<tr>
																			<td>
																				<!-- Seletor de moeda (aparece apenas para Stripe) -->
																				<div id="currency-selector" class="currency-selector">
																					<label for="currency">Selecione a moeda para pagamento:</label>
																					<select id="currency" name="currency" onchange="updateCurrency(this.value)">
																						<?php foreach ($currencies as $code => $currency): ?>
																							<option value="<?php echo $code; ?>" <?php echo $code === 'BRL' ? 'selected' : ''; ?>>
																								<?php echo $currency['name']; ?> (<?php echo $currency['symbol']; ?>)
																							</option>
																						<?php endforeach; ?>
																					</select>
																					<div id="exchange-rate-info" class="exchange-rate-info">
																						Taxa de câmbio: 1 BRL = 1 BRL
																					</div>
																				</div>
																			</td>
																		</tr>
																		<tr>
																			<td>
																				<small style="padding:10px; display:block;">
																					<div style="float: left; margin-right: 5px;">*</div>
																					<div style="float: left;">
																						<div id="ExchangeRateNote">Preços diferentes podem ser aplicados dependendo do método de pagamento selecionado.</div>
																					</div>
																				</small>
																			</td>
																		</tr>
																	</tbody>
																</table>
															</div>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

				<!-- Step 2: Select Product -->
				<div id="step2" class="step-content">
					<div class="TableContainer">
						<div class="CaptionContainer">
							<div class="CaptionInnerContainer">
								<span class="CaptionEdgeLeftTop" style="background-image:url(templates/myaac/images/global/content/box-frame-edge.gif);"></span>
								<span class="CaptionEdgeRightTop" style="background-image:url(templates/myaac/images/global/content/box-frame-edge.gif);"></span>
								<span class="CaptionBorderTop" style="background-image:url(templates/myaac/images/global/content/table-headline-border.gif);"></span>
								<span class="CaptionVerticalLeft" style="background-image:url(templates/myaac/images/global/content/box-frame-vertical.gif);"></span>
								<div class="Text">Selecionar produto</div>
								<span class="CaptionVerticalRight" style="background-image:url(templates/myaac/images/global/content/box-frame-vertical.gif);"></span>
								<span class="CaptionBorderBottom" style="background-image:url(templates/myaac/images/global/content/table-headline-border.gif);"></span>
								<span class="CaptionEdgeLeftBottom" style="background-image:url(templates/myaac/images/global/content/box-frame-edge.gif);"></span>
								<span class="CaptionEdgeRightBottom" style="background-image:url(templates/myaac/images/global/content/box-frame-edge.gif);"></span>
							</div>
						</div>
						<table class="Table5" cellpadding="0" cellspacing="0">
							<tbody>
								<tr>
									<td>
										<div class="InnerTableContainer">
											<table style="width:100%;">
												<tbody>
													<tr>
														<td>
															<span class="HelperDivIndicator" onmouseover="ActivateHelperDiv($(this), 'Karma Points<br/><small>(transferable)</small>', 'Karma Points são a moeda do Tibia para comprar produtos exclusivos na Loja.<br/><br/>Transferable Karma Points podem ser presenteadas para outras contas, negociadas via Market e usadas para comprar todos os produtos oferecidos por Karma Points na Loja, ex. montarias, outfits, Premium Time, boosts ou itens de decoração.<br/><br/>', 'ProductCategoryHelperDiv_19');" onmouseout="$('#HelperDivContainer').hide();">
																<div class="InnerTableTab WideTab ActiveInnerTableTab">
																	<div id="ProductCategoryHelperDiv_19" class="ProductCategoryHelperDiv"></div>
																	<div style="color: inherit; text-decoration: none; cursor: default;">
																		<img src="templates/myaac/images/global/content/tab_wide_active.png" alt="">
																		<div class="InnerTableTabLabel">Karma Points</div>
																	</div>
																</div>
															</span>
														</td>
													</tr>
													<tr>
														<td>
															<div class="TableShadowContainerRightTop">
																<div class="TableShadowRightTop" style="background-image:url(templates/myaac/images/global/content/table-shadow-rt.gif);"></div>
															</div>
															<div class="TableContentContainer">
																<table class="TableContent" width="100%" style="border:1px solid #faf0d7;">
																	<tbody>
																		<tr>
																			<td style="text-align: center;" align="center">
																				<div class="OptionsContainer">
																					<?php foreach ($products as $serviceId => $product): ?>
																						<div class="ServiceID_Icon_Container" id="ServiceID_Icon_Container<?php echo $serviceId; ?>">
																							<div class="ServiceID_Icon_Container_Background">
																								<div class="ServiceID_Icon" id="ServiceID_Icon_<?php echo $serviceId; ?>" onclick="ChangeService(<?php echo $serviceId; ?>, <?php echo $product['coins']; ?>, <?php echo $product['price']; ?>);" onmouseover="MouseOverServiceID(<?php echo $serviceId; ?>);" onmouseout="MouseOutServiceID(<?php echo $serviceId; ?>);">
																									<div class="PermanentDeactivated ServiceID_Deactivated_ByChoice" id="ServiceID_NotAllowed<?php echo $serviceId; ?>" style="display: none;">
																										<span class="HelperDivIndicator" onmouseover="ActivateHelperDiv($(this), 'Informação do Serviço:', 'O produto não está disponível para o método de pagamento selecionado!', '');" onmouseout="$('#HelperDivContainer').hide();">
																											<div class="ServiceID_Deactivated"></div>
																										</span>
																									</div>
																									<div class="ServiceID_Icon_New" id="ServiceID_Icon_New<?php echo $serviceId; ?>"></div>
																									<div class="ServiceID_Icon_Selected" id="ServiceID_Icon_Selected_<?php echo $serviceId; ?>"></div>
																									<div class="ServiceID_Icon_Over" id="ServiceID_Icon_Over_<?php echo $serviceId; ?>"></div>
																									<label for="ServiceID<?php echo $serviceId; ?>">
																										<div class="ServiceIDLabelContainer">
																											<div class="ServiceIDLabel"><?php echo $product['coins']; ?> Karma Points</div>
																										</div>
																										<div class="ServiceIDPriceContainer">
																											<span class="ServiceIDPrice" id="PD<?php echo $serviceId; ?>" data-price-brl="<?php echo $product['price']; ?>">R$<?php echo number_format($product['price'], 2, ',', '.'); ?></span> *
																										</div>
																									</label>
																								</div>
																							</div>
																						</div>
																					<?php endforeach; ?>
																				</div>
																			</td>
																		</tr>
																		<tr>
																			<td>
																				<small style="padding:10px; display:block;">
																					<div style="float: left; margin-right: 5px;">*</div>
																					<div style="float: left;">
																						<div id="ExchangeRateNote">Preços diferentes podem ser aplicados dependendo do método de pagamento selecionado.</div>
																					</div>
																				</small>
																			</td>
																		</tr>
																	</tbody>
																</table>
															</div>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

				<!-- Step 3: Confirm Order -->
				<div id="step3" class="step-content">
					<div class="TableContainer">
						<div class="CaptionContainer">
							<div class="CaptionInnerContainer">
								<span class="CaptionEdgeLeftTop" style="background-image:url(templates/myaac/images/global/content/box-frame-edge.gif);"></span>
								<span class="CaptionEdgeRightTop" style="background-image:url(templates/myaac/images/global/content/box-frame-edge.gif);"></span>
								<span class="CaptionBorderTop" style="background-image:url(templates/myaac/images/global/content/table-headline-border.gif);"></span>
								<span class="CaptionVerticalLeft" style="background-image:url(templates/myaac/images/global/content/box-frame-vertical.gif);"></span>
								<div class="Text">Confirmar seu pedido</div>
								<span class="CaptionVerticalRight" style="background-image:url(templates/myaac/images/global/content/box-frame-vertical.gif);"></span>
								<span class="CaptionBorderBottom" style="background-image:url(templates/myaac/images/global/content/table-headline-border.gif);"></span>
								<span class="CaptionEdgeLeftBottom" style="background-image:url(templates/myaac/images/global/content/box-frame-edge.gif);"></span>
								<span class="CaptionEdgeRightBottom" style="background-image:url(templates/myaac/images/global/content/box-frame-edge.gif);"></span>
							</div>
						</div>
						<table class="Table5" cellpadding="0" cellspacing="0">
							<tbody>
								<tr>
									<td>
										<div class="InnerTableContainer">
											<div class="InnerTableTab WideTab ActiveInnerTableTab">
												<div class="InnerTableTabLabel">Confirmação do Pedido</div>
											</div>
											<div class="TableContent" style="padding:20px;">
												<div id="order-confirmation" style="padding-right: 36px;">
													<div class="cpf-field" id="cpf-field-container">
														<h3>Informações do Cliente</h3>
														<div class="form-group">
															<label for="cpf">CPF (somente números):</label>
															<input type="text" id="cpf" name="cpf" placeholder="Digite seu CPF" required maxlength="14">
														</div>
													</div>

													<h3>Detalhes do Pedido:</h3>
													<div class="summary-item">
														<span>Método de Pagamento:</span>
														<span id="selected-payment-display">-</span>
													</div>
													<div class="summary-item">
														<span>Moeda:</span>
														<span id="selected-currency-display">BRL (R$)</span>
													</div>
													<div class="summary-item">
														<span>Produto:</span>
														<span id="selected-product-display">-</span>
													</div>
													<div class="summary-item">
														<span>Quantidade de Points:</span>
														<span id="selected-coins-display">-</span>
													</div>
													<div class="summary-item summary-total">
														<span>Total:</span>
														<span id="selected-price-display">-</span>
													</div>
												</div>
											</div>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

				<!-- Step 4: Summary -->
				<div id="step4" class="step-content">
					<div class="TableContainer">
						<div class="CaptionContainer">
							<div class="CaptionInnerContainer">
								<span class="CaptionEdgeLeftTop" style="background-image:url(templates/myaac/images/global/content/box-frame-edge.gif);"></span>
								<span class="CaptionEdgeRightTop" style="background-image:url(templates/myaac/images/global/content/box-frame-edge.gif);"></span>
								<span class="CaptionBorderTop" style="background-image:url(templates/myaac/images/global/content/table-headline-border.gif);"></span>
								<span class="CaptionVerticalLeft" style="background-image:url(templates/myaac/images/global/content/box-frame-vertical.gif);"></span>
								<div class="Text">Resumo Final</div>
								<span class="CaptionVerticalRight" style="background-image:url(templates/myaac/images/global/content/box-frame-vertical.gif);"></span>
								<span class="CaptionBorderBottom" style="background-image:url(templates/myaac/images/global/content/table-headline-border.gif);"></span>
								<span class="CaptionEdgeLeftBottom" style="background-image:url(templates/myaac/images/global/content/box-frame-edge.gif);"></span>
								<span class="CaptionEdgeRightBottom" style="background-image:url(templates/myaac/images/global/content/box-frame-edge.gif);"></span>
							</div>
						</div>
						<table class="Table5" cellpadding="0" cellspacing="0">
							<tbody>
								<tr>
									<td>
										<div class="InnerTableContainer">
											<div class="InnerTableTab WideTab ActiveInnerTableTab">
												<div class="InnerTableTabLabel">Pedido Finalizado</div>
											</div>
											<div class="TableContent" style="padding:20px; text-align:center;">
												<div id="final-summary" style="padding-right: 50px;">
													<h2 style="color:#8B4513;">✓ Pedido Processado com Sucesso!</h2>
													<p>Obrigado por sua compra! Seu pedido foi processado e você receberá suas Karma Points em breve.</p>

													<div style="background-color:#f9f9f9; padding:20px; margin:20px 0; border-radius:8px; text-align:left;">
														<h3>Resumo do Pedido:</h3>
														<div class="summary-item">
															<span>CPF:</span>
															<span id="final-cpf-display">-</span>
														</div>
														<div class="summary-item">
															<span>Método de Pagamento:</span>
															<span id="final-payment-display">-</span>
														</div>
														<div class="summary-item">
															<span>Moeda:</span>
															<span id="final-currency-display">BRL (R$)</span>
														</div>
														<div class="summary-item">
															<span>Produto:</span>
															<span id="final-product-display">-</span>
														</div>
														<div class="summary-item">
															<span>Quantidade de Points:</span>
															<span id="final-coins-display">-</span>
														</div>
														<div class="summary-item summary-total">
															<span>Total a ser Pago:</span>
															<span id="final-price-display">-</span>
														</div>
													</div>

													<p style="color:#666; font-size:14px;">
														As Karma Points serão creditadas em sua conta logo após o pagamento dentro de alguns minutos.
													</p>

													<div style="margin-top:30px;">
														<button class="nav-button" onclick="startNewOrder();">Fazer Novo Pedido</button>
														<button class="nav-button" onclick="window.location.href='/';">Voltar ao Site</button>
													</div>
												</div>
											</div>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

				<!-- Navigation Buttons -->
				<div class="navigation-buttons">
					<button id="prevBtn" class="nav-button" onclick="previousStep();" disabled>Anterior</button>
					<button id="nextBtn" class="nav-button" onclick="nextStep();">Próximo</button>
					<button id="submitBtn" class="nav-button" onclick="submitOrder();" style="display:none;">Finalizar Pedido</button>
				</div>

				<!-- Hidden Form for Final Submission -->
				<form id="finalForm" action="https://Tibia.com.br/?points/step" method="post" style="display:none;">
					<input type="hidden" name="step" value="4">
					<input type="hidden" name="system" id="form-system" value="">
					<input type="hidden" name="itemCount" id="form-itemCount" value="">
					<input type="hidden" name="cpf" id="form-cpf" value="">
					<input type="hidden" name="currency" id="form-currency" value="BRL">
					<input type="hidden" name="redirect" value="">
					<input type="hidden" name="notes" id="form-notes" value="">
				</form>
			</div>
		</div>
	</div>

	<script>
		// Variáveis globais
		var g_Services = <?php echo json_encode($g_Services); ?>;
		var g_PaymentMethodCategories = <?php echo json_encode($g_PaymentMethodCategories); ?>;
		var products = <?php echo json_encode($products); ?>;
		var paymentMethods = <?php echo json_encode($paymentMethods); ?>;
		var currencies = <?php echo json_encode($currencies); ?>;

		let currentStep = 1;
		let selectedPaymentMethod = null;
		let selectedPaymentSystem = null;
		let selectedProduct = null;
		let selectedCoins = null;
		let selectedPrice = null;
		let selectedCurrency = 'BRL';
		var exchangeRates = {
			BRL: 1,
			USD: <?php echo isset($exchangeRates['USD']) ? $exchangeRates['USD'] : 5.0; ?>,
			EUR: <?php echo isset($exchangeRates['EUR']) ? $exchangeRates['EUR'] : 5.5; ?>
		};
		let orderData = {};

		// Máscara para CPF
		$(document).ready(function() {
			$('#cpf').mask('000.000.000-00', {
				reverse: true
			});

			// Carrega as taxas de câmbio ao iniciar
			fetchExchangeRates();
		});

		function toggleCPFField() {
			const cpfContainer = document.getElementById('cpf-field-container');
			if (selectedPaymentSystem === 'stripe') {
				cpfContainer.style.display = 'none';
			} else {
				cpfContainer.style.display = 'block';
			}
		}

		// Função para buscar taxas de câmbio em tempo real
		function fetchExchangeRates() {

			function formatDate(date) {
				return `${date.getMonth() + 1}-${date.getDate()}-${date.getFullYear()}`;
			}

			function fetchWithFallback(date) {
				const dateStr = formatDate(date);

				return fetch(`https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoDolarDia(dataCotacao=@dataCotacao)?@dataCotacao='${dateStr}'&$top=100&$format=json`)
					.then(response => response.json())
					.then(data => {
						if (data.value && data.value[0] && data.value[0].cotacaoCompra) {
							exchangeRates.USD = parseFloat(data.value[0].cotacaoCompra);
						} else {
							// Se não encontrou, tenta o dia anterior
							const prevDate = new Date(date);
							prevDate.setDate(prevDate.getDate() - 1);
							return fetchWithFallback(prevDate);
						}
					})
					.then(() => {
						// Agora busca Euro na mesma data encontrada
						const dateStrEuro = formatDate(date);
						return fetch(`https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoMoedaDia(moeda=@moeda,dataCotacao=@dataCotacao)?@moeda='EUR'&@dataCotacao='${dateStrEuro}'&$top=100&$format=json`);
					})
					.then(response => response.json())
					.then(data => {
						if (data.value && data.value[0] && data.value[0].cotacaoCompra) {
							exchangeRates.EUR = parseFloat(data.value[0].cotacaoCompra);
						}
						updateExchangeRateInfo();
						updatePricesForCurrency(selectedCurrency);
					})
					.catch(error => {
						console.error('Erro ao buscar cotações:', error);
						updateExchangeRateInfo();
					});
			}

			// começa pela data de hoje
			fetchWithFallback(new Date());
		}


		// Atualiza a informação de taxa de câmbio exibida
		// Função para atualizar a informação de taxa de câmbio exibida
		function updateExchangeRateInfo() {
			const infoElement = document.getElementById('exchange-rate-info');
			if (infoElement) {
				// Formata as taxas com 4 casas decimais
				const usdRate = exchangeRates.USD.toFixed(4);
				const eurRate = exchangeRates.EUR.toFixed(4);

				// Calcula as taxas inversas (quantos BRL valem 1 USD/EUR)
				const inverseUsd = (1 / exchangeRates.USD).toFixed(4);
				const inverseEur = (1 / exchangeRates.EUR).toFixed(4);

				infoElement.innerHTML = `
					<div><strong>Taxas de Câmbio BCB (atualizado em ${new Date().toLocaleTimeString()}):</strong></div>
					<div>1 USD = R$${usdRate} | 1 EUR = R$${eurRate}</div>
					<div>1 BRL = $${inverseUsd} | 1 BRL = €${inverseEur}</div>
					<small>Fonte: Banco Central do Brasil</small>
				`;
			}

			// Atualiza também o tooltip de cada preço
			document.querySelectorAll('.ServiceIDPrice').forEach(priceElement => {
				const priceBRL = parseFloat(priceElement.getAttribute('data-price-brl'));

				// Cria o texto com todas as conversões
				const tooltipText = `
					Preço em diferentes moedas:
					BRL: R$${priceBRL.toFixed(2)}
					USD: $${(priceBRL / exchangeRates.USD).toFixed(2)}
					EUR: €${(priceBRL / exchangeRates.EUR).toFixed(2)}
				`;

				// Atualiza o título (tooltip) do elemento
				priceElement.title = tooltipText;
			});
		}

		// Atualiza os preços exibidos com base na moeda selecionada
		function updatePricesForCurrency(currency) {
			const currencyInfo = currencies[currency] || currencies['BRL'];
			const currencySymbol = currencyInfo.symbol;
			const decimalSeparator = currency === 'BRL' ? ',' : '.';
			const thousandsSeparator = currency === 'BRL' ? '.' : ',';

			// Atualiza todos os preços dos produtos
			Object.keys(products).forEach(productId => {
				const priceElement = document.getElementById(`PD${productId}`);
				if (priceElement) {
					const priceBRL = parseFloat(priceElement.getAttribute('data-price-brl'));
					let convertedPrice;

					// Calcula o preço na moeda selecionada
					if (currency === 'BRL') {
						convertedPrice = priceBRL;
					} else {
						convertedPrice = priceBRL / exchangeRates[currency];
					}

					// Formata o preço de acordo com a moeda
					const formattedPrice = formatCurrency(convertedPrice, currency);
					priceElement.textContent = formattedPrice;

					// Atualiza o tooltip com os valores em todas as moedas
					updatePriceTooltip(priceElement, priceBRL);
				}
			});

			// Se já tiver um produto selecionado, atualiza o preço na confirmação
			if (selectedProduct) {
				updateConfirmationData();
			}
		}

		// Atualiza o tooltip de um elemento de preço
		function updatePriceTooltip(element, priceBRL) {
			const usdPrice = priceBRL / exchangeRates['USD'];
			const eurPrice = priceBRL / exchangeRates['EUR'];

			element.title = `Valores equivalentes:\n
			BRL: R$${priceBRL.toFixed(2).replace('.', ',')}\n
			USD: $${usdPrice.toFixed(2)}\n
			EUR: €${eurPrice.toFixed(2)}`;
		}

		function formatCurrency(value, currency) {
			const currencyInfo = currencies[currency] || currencies['BRL'];
			const options = {
				style: 'currency',
				currency: currency,
				minimumFractionDigits: 2,
				maximumFractionDigits: 2
			};

			// Formatação específica para BRL (R$ 1.234,56)
			if (currency === 'BRL') {
				return 'R$' + value.toLocaleString('pt-BR', {
					minimumFractionDigits: 2,
					maximumFractionDigits: 2
				});
			}
			// Formatação para USD ($1,234.56)
			else if (currency === 'USD') {
				return '$' + value.toLocaleString('en-US', {
					minimumFractionDigits: 2,
					maximumFractionDigits: 2
				});
			}
			// Formatação para EUR (€1.234,56)
			else if (currency === 'EUR') {
				return '€' + value.toLocaleString('de-DE', {
					minimumFractionDigits: 2,
					maximumFractionDigits: 2
				});
			}

			// Fallback genérico
			return currencyInfo.symbol + value.toFixed(2);
		}

		// Função chamada quando a moeda é alterada
		function updateCurrency(currency) {
			selectedCurrency = currency;
			document.getElementById('form-currency').value = currency;

			// Atualiza o símbolo da moeda na confirmação
			const currencyDisplay = document.getElementById('selected-currency-display');
			if (currencyDisplay) {
				currencyDisplay.textContent = `${currency} (${currencies[currency]?.symbol || 'R$'})`;
			}

			// Atualiza os preços exibidos
			updatePricesForCurrency(currency);
		}

		// Função para validar CPF
		function validateCPF(cpf) {
			cpf = cpf.replace(/[^\d]+/g, '');
			if (cpf == '') return false;

			// Elimina CPFs invalidos conhecidos
			if (cpf.length != 11 ||
				cpf == "00000000000" ||
				cpf == "11111111111" ||
				cpf == "22222222222" ||
				cpf == "33333333333" ||
				cpf == "44444444444" ||
				cpf == "55555555555" ||
				cpf == "66666666666" ||
				cpf == "77777777777" ||
				cpf == "88888888888" ||
				cpf == "99999999999")
				return false;

			// Valida 1o digito
			let add = 0;
			for (let i = 0; i < 9; i++)
				add += parseInt(cpf.charAt(i)) * (10 - i);
			let rev = 11 - (add % 11);
			if (rev == 10 || rev == 11)
				rev = 0;
			if (rev != parseInt(cpf.charAt(9)))
				return false;

			// Valida 2o digito
			add = 0;
			for (let i = 0; i < 10; i++)
				add += parseInt(cpf.charAt(i)) * (11 - i);
			rev = 11 - (add % 11);
			if (rev == 10 || rev == 11)
				rev = 0;
			if (rev != parseInt(cpf.charAt(10)))
				return false;

			return true;
		}

		// Função para selecionar método de pagamento
		function ChangePMC(a_PaymentMethodID, system) {
			// Remove seleção anterior
			$('.PMCID_Icon_Selected').css('background-image', '');
			document.querySelectorAll('.PMCID_Icon').forEach(icon => {
				icon.classList.remove('selected');
			});

			selectedPaymentMethod = a_PaymentMethodID;
			selectedPaymentSystem = system;

			// Mostra ou esconde o campo CPF baseado no método de pagamento
			toggleCPFField();

			// Adiciona seleção atual
			//$('#PMCID_Icon_Selected_' + a_PaymentMethodID).css('background-image', 'url(templates/myaac/images/payment/pmcid_icon_selected.png)');
			document.getElementById('PMCID_Icon_' + a_PaymentMethodID).classList.add('selected');
			document.getElementById("PMCID_" + a_PaymentMethodID).checked = true;

			selectedPaymentMethod = a_PaymentMethodID;
			selectedPaymentSystem = system;

			// Mostra ou esconde o seletor de moeda baseado no método de pagamento
			const currencySelector = document.getElementById('currency-selector');
			if (system === 'stripe') {
				currencySelector.classList.add('active');
			} else {
				currencySelector.classList.remove('active');
				// Reseta para BRL se não for Stripe
				if (selectedCurrency !== 'BRL') {
					document.getElementById('currency').value = 'BRL';
					updateCurrency('BRL');
				}
			}

			// Atualiza botão próximo
			updateNavigationButtons();
		}

		// Função para selecionar produto
		function ChangeService(a_ServiceID, point, price) {
			// Remove seleção anterior
			$('.ServiceID_Icon_Selected').css('background-image', '');
			document.querySelectorAll('.ServiceID_Icon').forEach(icon => {
				icon.classList.remove('selected');
			});

			// Adiciona seleção atual
			//$('#ServiceID_Icon_Selected_' + a_ServiceID).css('background-image', 'url(templates/myaac/images/payment/serviceid_icon_selected.png)');
			document.getElementById('ServiceID_Icon_' + a_ServiceID).classList.add('selected');

			selectedProduct = a_ServiceID;
			selectedCoins = point;

			// Obtém o preço em BRL do atributo data
			const priceElement = document.getElementById(`PD${a_ServiceID}`);
			const priceBRL = parseFloat(priceElement.getAttribute('data-price-brl'));

			// Cálculo correto da conversão
			let convertedPrice;
			if (selectedCurrency === 'BRL') {
				convertedPrice = priceBRL;
			} else {
				convertedPrice = priceBRL / exchangeRates[selectedCurrency];
			}

			selectedPrice = formatCurrency(convertedPrice, selectedCurrency);

			updateNavigationButtons();
		}

		// Formata o preço de acordo com a moeda
		function formatPrice(price, currency) {
			const symbol = currencies[currency]?.symbol || 'R$';

			if (currency === 'BRL') {
				return `${symbol}${price.toFixed(2).replace('.', ',')}`;
			} else {
				return `${symbol}${price.toFixed(2)}`;
			}
		}

		// Efeitos de mouse
		// function MouseOverPMCID(a_PMCID) {
		// 	$('#PMCID_Icon_Over_' + a_PMCID).css('background-image', 'url(templates/myaac/images/payment/pmcid_icon_over.png)');
		// }

		function MouseOutPMCID(a_PMCID) {
			$('#PMCID_Icon_Over_' + a_PMCID).css('background-image', '');
		}

		// function MouseOverServiceID(a_ServiceID) {
		// 	$('#ServiceID_Icon_Over_' + a_ServiceID).css('background-image', 'url(templates/myaac/images/payment/serviceid_icon_over.png)');
		// }

		function MouseOutServiceID(a_ServiceID) {
			$('#ServiceID_Icon_Over_' + a_ServiceID).css('background-image', '');
		}

		function ActivateHelperDiv(element, title, content, id) {
			// Implementação básica para tooltips se necessário
			console.log('Helper div:', title, content);
		}

		// Função para ir para o próximo step
		function nextStep() {
			if (currentStep < 4) {
				if (validateCurrentStep()) {
					currentStep++;
					showStep(currentStep);
					updateNavigationButtons();

					// Se chegou no step 3, atualiza os dados de confirmação
					if (currentStep === 3) {
						updateConfirmationData();
					}
				}
			}
		}

		// Função para ir para o step anterior
		function previousStep() {
			if (currentStep > 1) {
				currentStep--;
				showStep(currentStep);
				updateNavigationButtons();
			}
		}

		// Função para validar o step atual
		function validateCurrentStep() {
			switch (currentStep) {
				case 1:
					if (!selectedPaymentMethod) {
						alert('Por favor, selecione um método de pagamento.');
						return false;
					}
					break;
				case 2:
					if (!selectedProduct) {
						alert('Por favor, selecione um produto.');
						return false;
					}
					break;
				case 3:
					// Não valida CPF se for pagamento via Stripe
					if (selectedPaymentSystem !== 'stripe') {
						const cpfInput = document.getElementById('cpf');
						const cpf = cpfInput.value.replace(/[^\d]+/g, '');

						if (!cpf) {
							alert('Por favor, informe seu CPF.');
							cpfInput.focus();
							return false;
						}

						if (!validateCPF(cpf)) {
							alert('Por favor, informe um CPF válido.');
							cpfInput.focus();
							return false;
						}
					}
					break;
			}
			return true;
		}

		// Função para mostrar o step específico
		function showStep(step) {
			// Esconde todos os steps
			document.querySelectorAll('.step-content').forEach(content => {
				content.classList.remove('active');
			});

			// Mostra o step atual
			document.getElementById('step' + step).classList.add('active');
		}

		// Função para atualizar botões de navegação
		function updateNavigationButtons() {
			const prevBtn = document.getElementById('prevBtn');
			const nextBtn = document.getElementById('nextBtn');
			const submitBtn = document.getElementById('submitBtn');

			// Botão anterior
			prevBtn.disabled = (currentStep === 1);

			// Botão próximo e submit
			if (currentStep === 4) {
				nextBtn.style.display = 'none';
				submitBtn.style.display = 'none'; // Esconde no step final
			} else if (currentStep === 3) {
				nextBtn.style.display = 'none';
				submitBtn.style.display = 'inline-block';
			} else {
				nextBtn.style.display = 'inline-block';
				submitBtn.style.display = 'none';

				// Habilita/desabilita baseado na seleção
				if (currentStep === 1) {
					nextBtn.disabled = !selectedPaymentMethod;
				} else if (currentStep === 2) {
					nextBtn.disabled = !selectedProduct;
				} else {
					nextBtn.disabled = false;
				}
			}
		}

		// Função para atualizar dados de confirmação
		function updateConfirmationData() {
			const paymentName = paymentMethods[selectedPaymentMethod]?.name || '-';
			const currencyInfo = currencies[selectedCurrency] || currencies['BRL'];

			// Obtém o preço em BRL do produto selecionado
			const priceElement = document.getElementById(`PD${selectedProduct}`);
			const priceBRL = parseFloat(priceElement.getAttribute('data-price-brl'));

			// Calcula o valor convertido corretamente
			let convertedValue;
			if (selectedCurrency === 'BRL') {
				convertedValue = priceBRL;
			} else {
				// Conversão correta: divide pelo valor da moeda estrangeira
				convertedValue = priceBRL / exchangeRates[selectedCurrency];
			}

			// Formata o valor final
			selectedPrice = formatCurrency(convertedValue, selectedCurrency);

			// Atualiza a exibição
			document.getElementById('selected-payment-display').textContent = paymentName;
			document.getElementById('selected-currency-display').textContent = `${selectedCurrency} (${currencyInfo.symbol})`;
			document.getElementById('selected-product-display').textContent = selectedCoins + ' Karma Points';
			document.getElementById('selected-coins-display').textContent = selectedCoins;
			document.getElementById('selected-price-display').textContent = selectedPrice;

			// Atualiza também no resumo final
			document.getElementById('final-payment-display').textContent = paymentName;
			document.getElementById('final-currency-display').textContent = `${selectedCurrency} (${currencyInfo.symbol})`;
			document.getElementById('final-product-display').textContent = selectedCoins + ' Karma Points';
			document.getElementById('final-coins-display').textContent = selectedCoins;
			document.getElementById('final-price-display').textContent = selectedPrice;
		}
		
		function verificarPagamento(paymentId) {
			const postData = {
				paymentId: paymentId
				}
				
				
			$.ajax({
				url: '/?verificarpagamento',
				type: 'POST',
				dataType: 'json',
				contentType: 'application/json',
				data: JSON.stringify(postData),
				success: function(response) {
					if(response == true){
						alert("Doação aprovada!");
						window.location.href = "/?account/manage";
					}else{
						setTimeout(function() {
							verificarPagamento(paymentId);
						}, 10000); // 10000 milissegundos = 10 segundos
					}
					
				},
				error: function(xhr, status, error) {
					// Trata erros da requisição
					
				}
			});
		}


		// Função para finalizar pedido
		function submitOrder() {
			// Valida CPF novamente antes de enviar
			if (selectedPaymentSystem !== 'stripe') {
				const cpfInput = document.getElementById('cpf');
				const cpf = cpfInput.value.replace(/[^\d]+/g, '');

				if (!validateCPF(cpf)) {
					alert('Por favor, informe um CPF válido.');
					cpfInput.focus();
					return;
				}
			}

			// Simula processamento do pedido
			const loadingText = 'Processando pedido...';
			const submitBtn = document.getElementById('submitBtn');
			const originalText = submitBtn.textContent;

			submitBtn.textContent = loadingText;
			submitBtn.disabled = true;

			// Prepara os dados do pedido
			const now = new Date();
			const orderId = 'RBT' + now.getTime().toString().slice(-8);

			// Obtém o preço em BRL do produto selecionado
			const priceElement = document.getElementById(`PD${selectedProduct}`);
			const priceBRL = parseFloat(priceElement.getAttribute('data-price-brl'));

			// Converte para a moeda selecionada
			const convertedPrice = priceBRL * exchangeRates[selectedCurrency];
			const finalPrice = convertedPrice.toFixed(2);

			orderData = {
				paymentMethod: selectedPaymentMethod,
				paymentSystem: selectedPaymentSystem,
				product: selectedProduct,
				coins: selectedCoins,
				price: selectedPrice,
				priceBRL: priceBRL,
				priceConverted: finalPrice,
				currency: selectedCurrency,
				cpf: cpf,
				date: new Date().toLocaleString('pt-BR'),
				orderId: orderId
			};

			let convertedValue;
			if (selectedCurrency === 'BRL') {
				convertedValue = priceBRL;
			} else {
				// Conversão correta: divide pelo valor da moeda estrangeira
				convertedValue = priceBRL / exchangeRates[selectedCurrency];
			}

			// Dados que serão enviados para a API
			const postData = {
				payment_method: paymentMethods[selectedPaymentMethod].name,
				payment_system: selectedPaymentSystem,
				product_id: selectedProduct,
				coins_amount: selectedCoins,
				price_brl: priceBRL,
				price_converted: convertedValue,
				currency: selectedCurrency,
				order_id: orderId
			};

			if (selectedPaymentSystem !== 'stripe') {
				const cpfInput = document.getElementById('cpf');
				const cpf = cpfInput.value.replace(/[^\d]+/g, '');
				postData.cpf = cpf;
			}

			// URL da API - substitua pela sua rota real
			const apiUrl = selectedPaymentMethod == 1 ?
				'/?polopag' :
				'/?stripe';

			// Faz a requisição AJAX
			$.ajax({
				url: apiUrl,
				type: 'POST',
				dataType: 'json',
				contentType: 'application/json',
				data: JSON.stringify(postData),
				success: function(response) {
					// Processa a resposta bem-sucedida
					if (response.pix_code || response.payment_id) {
						setTimeout(function() {
							verificarPagamento(response.payment_id);
						}, 5000); // 5000 milissegundos = 5 segundos
						// Atualiza os campos do formulário oculto
						document.getElementById('form-system').value = selectedPaymentSystem;
						document.getElementById('form-itemCount').value = selectedCoins;
						document.getElementById('form-cpf').value = cpf;
						document.getElementById('form-currency').value = selectedCurrency;

						// Adiciona dados da resposta ao orderData
						orderData.paymentResponse = response;
						orderData.valor = response.valor || finalPrice;
						orderData.produto = response.produto || (selectedCoins + ' Karma Points');

						// Atualiza dados finais com a resposta da API
						updateFinalSummary(response);

						// Se for PIX, mostra o QR Code ou código
						if (selectedPaymentMethod == 1 && response.pix_qr_code) {
							showPixPayment(response);
						}
						// Se for Stripe, redireciona ou mostra o link
						else if (selectedPaymentMethod == 2 && response.payment_url) {
							showStripePayment(response);
						}

						// Vai para o step final
						currentStep = 4;
						showStep(currentStep);
						updateNavigationButtons();
					} else {
						// Mostra mensagem de erro
						alert('Erro no processamento: Resposta da API não contém dados esperados');
						submitBtn.textContent = originalText;
						submitBtn.disabled = false;
					}
				},
				error: function(xhr, status, error) {
					// Trata erros da requisição
					let errorMessage = 'Erro ao processar o pagamento.';
					if (xhr.responseJSON && xhr.responseJSON.message) {
						errorMessage = xhr.responseJSON.message;
					} else if (xhr.statusText) {
						errorMessage += ' ' + xhr.statusText;
					}
					alert(errorMessage);
					submitBtn.textContent = originalText;
					submitBtn.disabled = false;
				}
			});
		}

		// Função para atualizar resumo final com dados da API
		function updateFinalSummary(apiResponse) {
			const paymentName = paymentMethods[selectedPaymentMethod].name;
			const valor = apiResponse?.valor || apiResponse.valor_convertido;
			const produto = apiResponse?.produto || (selectedCoins + ' Karma Points');
			const currencySymbol = currencies[selectedCurrency]?.symbol || 'R$';

			document.getElementById('final-payment-display').textContent = paymentName;
			document.getElementById('final-product-display').textContent = produto;
			document.getElementById('final-coins-display').textContent = selectedCoins;
			document.getElementById('final-price-display').textContent = `${currencySymbol}${parseFloat(valor).toFixed(2)}`;

			if (selectedPaymentSystem !== 'stripe') {
				const cpfInput = document.getElementById('cpf');
				const cpf = cpfInput.value.replace(/[^\d]+/g, '');
				document.getElementById('final-cpf-display').textContent = cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
			} else {
				document.getElementById('final-cpf-display').textContent = 'Não exigido para Stripe';
			}

			// Adiciona o ID do pagamento se existir
			// if (apiResponse?.payment_id) {
			// 	const paymentIdElement = document.createElement('div');
			// 	paymentIdElement.className = 'summary-item';
			// 	paymentIdElement.innerHTML = `
			//         <span>ID do Pagamento:</span>
			//         <span>${apiResponse.payment_id}</span>
			//     `;
			// 	const summaryContainer = document.querySelector('#final-summary div');
			// 	summaryContainer.insertBefore(paymentIdElement, summaryContainer.querySelector('.summary-total'));
			// }
		}

		// Função para mostrar detalhes do pagamento PIX
		function showPixPayment(pixData) {
			// Limpa qualquer conteúdo anterior
			const existingContainer = document.querySelector('.pix-payment-container');
			if (existingContainer) {
				existingContainer.remove();
			}

			// Cria o container principal
			const pixContainer = document.createElement('div');
			pixContainer.className = 'pix-payment-container';
			pixContainer.style.textAlign = 'center';
			pixContainer.style.margin = '20px 0';
			pixContainer.style.padding = '20px';
			pixContainer.style.backgroundColor = '#f8f9fa';
			pixContainer.style.borderRadius = '8px';
			pixContainer.style.border = '1px solid #ddd';

			// Título
			const title = document.createElement('h3');
			title.textContent = 'Pagamento via PIX';
			title.style.color = '#8B4513';
			title.style.marginTop = '0';
			pixContainer.appendChild(title);

			// Container do QR Code
			const qrCodeContainer = document.createElement('div');
			qrCodeContainer.style.margin = '15px 0';

			// Verifica se temos o QR Code em base64
			if (pixData.pix_qr_code) {
				// Cria a imagem do QR Code
				const qrCodeImg = document.createElement('img');
				qrCodeImg.src = `data:image/png;base64,${pixData.pix_qr_code}`;
				qrCodeImg.alt = 'QR Code PIX';
				qrCodeImg.style.maxWidth = '250px';
				qrCodeImg.style.height = 'auto';
				qrCodeImg.style.border = '1px solid #eee';
				qrCodeImg.style.padding = '10px';
				qrCodeImg.style.backgroundColor = 'white';

				qrCodeContainer.appendChild(qrCodeImg);
			} else {
				const noQrCode = document.createElement('p');
				noQrCode.textContent = 'QR Code não disponível';
				noQrCode.style.color = '#dc3545';
				qrCodeContainer.appendChild(noQrCode);
			}

			pixContainer.appendChild(qrCodeContainer);

			// Código PIX copiável
			if (pixData.pix_code) {
				const codeContainer = document.createElement('div');
				codeContainer.style.margin = '15px 0';
				codeContainer.style.padding = '10px';
				codeContainer.style.backgroundColor = '#f1f1f1';
				codeContainer.style.borderRadius = '4px';

				const codeLabel = document.createElement('p');
				codeLabel.textContent = 'Código PIX:';
				codeLabel.style.marginBottom = '5px';
				codeLabel.style.fontWeight = 'bold';
				codeContainer.appendChild(codeLabel);

				const codeValue = document.createElement('div');
				codeValue.textContent = pixData.pix_code;
				codeValue.style.wordBreak = 'break-all';
				codeValue.style.userSelect = 'all';
				codeValue.style.padding = '8px';
				codeValue.style.backgroundColor = 'white';
				codeValue.style.border = '1px solid #ddd';
				codeValue.style.borderRadius = '4px';
				codeContainer.appendChild(codeValue);

				// Botão para copiar
				const copyBtn = document.createElement('button');
				copyBtn.textContent = 'Copiar Código';
				copyBtn.style.marginTop = '10px';
				copyBtn.style.padding = '8px 15px';
				copyBtn.style.backgroundColor = '#8B4513';
				copyBtn.style.color = 'white';
				copyBtn.style.border = 'none';
				copyBtn.style.borderRadius = '4px';
				copyBtn.style.cursor = 'pointer';
				copyBtn.onclick = function() {
					navigator.clipboard.writeText(pixData.pix_code)
						.then(() => {
							copyBtn.textContent = 'Copiado!';
							setTimeout(() => {
								copyBtn.textContent = 'Copiar Código';
							}, 2000);
						})
						.catch(err => {
							console.error('Erro ao copiar:', err);
						});
				};
				codeContainer.appendChild(copyBtn);

				pixContainer.appendChild(codeContainer);
			}

			// Valor do pagamento
			const valorDiv = document.createElement('div');
			valorDiv.style.margin = '15px 0';
			valorDiv.style.fontSize = '18px';
			valorDiv.innerHTML = `<strong>Valor:</strong> R$${pixData.valor || orderData.priceBRL.toFixed(2).replace('.', ',')}`;
			pixContainer.appendChild(valorDiv);

			// Instruções
			const instructions = document.createElement('div');
			instructions.style.textAlign = 'left';
			instructions.style.marginTop = '15px';
			instructions.style.padding = '15px';
			instructions.style.backgroundColor = '#e9ecef';
			instructions.style.borderRadius = '5px';

			const instructionsTitle = document.createElement('h4');
			instructionsTitle.textContent = 'Como pagar:';
			instructionsTitle.style.marginTop = '0';
			instructions.appendChild(instructionsTitle);

			const steps = document.createElement('ol');
			steps.style.paddingLeft = '20px';
			steps.style.marginBottom = '0';
			steps.innerHTML = `
                <li>Abra o aplicativo do seu banco ou carteira digital</li>
                <li>Selecione a opção <strong>Pagar com PIX</strong></li>
                <li>Escaneie o QR Code ou cole o código PIX</li>
                <li>Confira o valor e confirme o pagamento</li>
                <li>Seu pagamento será processado automaticamente</li>
            `;
			instructions.appendChild(steps);

			pixContainer.appendChild(instructions);

			// Adiciona ao DOM
			const finalSummary = document.getElementById('final-summary');
			const summaryDiv = finalSummary.querySelector('div');
			finalSummary.insertBefore(pixContainer, summaryDiv.nextSibling);
		}

		// Função para mostrar detalhes do pagamento Stripe
		function showStripePayment(stripeData) {
			// Limpa qualquer conteúdo anterior
			const existingContainer = document.querySelector('.stripe-payment-container');
			if (existingContainer) {
				existingContainer.remove();
			}

			// Cria elementos para o link de pagamento Stripe
			const stripeContainer = document.createElement('div');
			stripeContainer.className = 'stripe-payment-container';
			stripeContainer.style.textAlign = 'center';
			stripeContainer.style.margin = '20px 0';
			stripeContainer.style.padding = '15px';
			stripeContainer.style.backgroundColor = '#f5f5f5';
			stripeContainer.style.borderRadius = '8px';

			// Título
			const title = document.createElement('h3');
			title.textContent = 'Pagamento via Stripe';
			title.style.color = '#8B4513';
			title.style.marginTop = '0';
			stripeContainer.appendChild(title);

			// Valor
			const valorDiv = document.createElement('div');
			valorDiv.style.margin = '10px 0';
			valorDiv.style.fontSize = '16px';
			// Formata para 2 casas decimais
			const valorFormatado = parseFloat(stripeData.valor_convertido).toFixed(2);

			valorDiv.innerHTML = `<strong>Valor:</strong> ${currencies[selectedCurrency]?.symbol || '$'}${valorFormatado}`;
			stripeContainer.appendChild(valorDiv);


			// ID do pagamento
			// if (stripeData.payment_id) {
			// 	const paymentIdDiv = document.createElement('div');
			// 	paymentIdDiv.style.margin = '10px 0';
			// 	paymentIdDiv.style.fontSize = '14px';
			// 	paymentIdDiv.innerHTML = `<strong>ID do Pagamento:</strong> ${stripeData.payment_id}`;
			// 	stripeContainer.appendChild(paymentIdDiv);
			// }

			// Mensagem explicativa
			const message = document.createElement('p');
			message.textContent = 'Clique no botão abaixo para ser redirecionado ao checkout seguro:';
			message.style.margin = '15px 0';
			stripeContainer.appendChild(message);

			// Botão de redirecionamento
			const paymentBtn = document.createElement('button');
			paymentBtn.textContent = 'Pagar com Stripe';
			paymentBtn.className = 'nav-button';
			paymentBtn.style.padding = '12px 30px';
			paymentBtn.style.fontSize = '16px';
			paymentBtn.style.marginBottom = '10px';
			paymentBtn.onclick = function() {
				// Abre a URL de pagamento em nova aba
				if (stripeData.payment_url) {
					window.open(stripeData.payment_url, '_blank');
				} else {
					alert('URL de pagamento não disponível.');
				}
			};

			stripeContainer.appendChild(paymentBtn);

			// Adiciona instruções
			const instructions = document.createElement('p');
			instructions.textContent = 'Você será redirecionado para um ambiente seguro para finalizar seu pagamento.';
			instructions.style.fontSize = '14px';
			instructions.style.color = '#666';
			stripeContainer.appendChild(instructions);

			// Adiciona ao resumo final
			const finalSummary = document.getElementById('final-summary');
			const summaryDiv = finalSummary.querySelector('div');
			finalSummary.insertBefore(stripeContainer, summaryDiv.nextSibling);
		}

		// Função para iniciar novo pedido
		function startNewOrder() {
			// Reset todas as variáveis
			currentStep = 1;
			selectedPaymentMethod = null;
			selectedPaymentSystem = null;
			selectedProduct = null;
			selectedCoins = null;
			selectedPrice = null;
			selectedCurrency = 'BRL';
			orderData = {};

			// Remove todas as seleções visuais
			$('.PMCID_Icon_Selected').css('background-image', '');
			$('.ServiceID_Icon_Selected').css('background-image', '');
			document.querySelectorAll('.PMCID_Icon, .ServiceID_Icon').forEach(icon => {
				icon.classList.remove('selected');
			});

			// Desmarca os radio buttons de método de pagamento
			document.querySelectorAll('input[name="system"]').forEach(radio => {
				radio.checked = false;
			});

			// Reseta o seletor de moeda
			document.getElementById('currency-selector').classList.remove('active');
			document.getElementById('currency').value = 'BRL';
			updateCurrency('BRL'); // Força a atualização para BRL
			updateExchangeRateInfo();

			// Limpa campos do formulário
			document.getElementById('cpf').value = '';

			// Reseta os displays de confirmação
			document.getElementById('selected-payment-display').textContent = '-';
			document.getElementById('selected-currency-display').textContent = 'BRL (R$)';
			document.getElementById('selected-product-display').textContent = '-';
			document.getElementById('selected-coins-display').textContent = '-';
			document.getElementById('selected-price-display').textContent = '-';

			// Reseta os displays do resumo final
			document.getElementById('final-cpf-display').textContent = '-';
			document.getElementById('final-payment-display').textContent = '-';
			document.getElementById('final-currency-display').textContent = 'BRL (R$)';
			document.getElementById('final-product-display').textContent = '-';
			document.getElementById('final-coins-display').textContent = '-';
			document.getElementById('final-price-display').textContent = '-';

			// Remove qualquer container de pagamento específico (PIX/Stripe)
			const pixContainer = document.querySelector('.pix-payment-container');
			if (pixContainer) pixContainer.remove();

			const stripeContainer = document.querySelector('.stripe-payment-container');
			if (stripeContainer) stripeContainer.remove();

			// RESETA O BOTÃO DE SUBMIT
			const submitBtn = document.getElementById('submitBtn');
			submitBtn.textContent = 'Finalizar Pedido';
			submitBtn.disabled = false;
			submitBtn.style.display = 'none'; // Esconde o botão pois voltamos para o step 1

			// RESETA O BOTÃO PRÓXIMO
			const nextBtn = document.getElementById('nextBtn');
			nextBtn.disabled = false;
			nextBtn.style.display = 'inline-block';

			// Volta para o primeiro step
			showStep(currentStep);
			updateNavigationButtons();

			// Atualiza os preços para a moeda padrão (BRL)
			updatePricesForCurrency('BRL');
		}

		// Inicialização
		$(document).ready(function() {
			toggleCPFField();
			showStep(currentStep);
			updateNavigationButtons();
		});
	</script>
</body>

</html>