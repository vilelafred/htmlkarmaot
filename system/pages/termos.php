<?php
if (!$logged) {
  $was_before = $config['friendly_urls'];
  $config['friendly_urls'] = true;

  echo '<div style="text-align: center; font-family: Verdana, sans-serif; color: #5a2800; padding: 30px;">
          <strong>You need to be logged in to donate.</strong><br><br>' .
          generateLink(getLink('?subtopic=accountmanagement') . '&redirect=' . urlencode(BASE_URL . '?termos'), 'Click here to log in') .
        '</div>';

  $config['friendly_urls'] = $was_before;
  return;
}
?>



<?php
defined('MYAAC') or die('Direct access not allowed!');
$title = 'Termos de Uso - KarmaOT';
?>

<style>
	.terms-container { max-width: 900px; margin: 0 auto; }
	.terms-box { border: 1px solid #b9a06a; background: #f8f2e0; padding: 12px; height: 340px; overflow: auto; }
	.actions { margin-top: 12px; display: flex; align-items: center; justify-content: space-between; gap: 12px; }
	.actions .left { display: flex; align-items: center; gap: 8px; }
	.actions button { padding: 8px 14px; cursor: pointer; }
	.small-muted { color: #6b6b6b; font-size: 12px; }
</style>

<div class="terms-container">
	<div class="SmallBox">
		<div class="MessageContainer">
			<div class="BoxFrameHorizontal" style="background-image:url(templates/myaac/images/global/content/box-frame-horizontal.gif);"></div>
			<div class="BoxFrameEdgeLeftTop" style="background-image:url(templates/myaac/images/global/content/box-frame-edge.gif);"></div>
			<div class="BoxFrameEdgeRightTop" style="background-image:url(templates/myaac/images/global/content/box-frame-edge.gif);"></div>
			<div class="Message">
				<div class="BoxFrameVerticalLeft" style="background-image:url(templates/myaac/images/global/content/box-frame-vertical.gif);"></div>
				<div class="BoxFrameVerticalRight" style="background-image:url(templates/myaac/images/global/content/box-frame-vertical.gif);"></div>
				<table class="HintBox"><tbody><tr><td>
					<h3>Termos de Contribuições Voluntárias — KarmaOT</h3>
					<div class="terms-box" id="termsBox">
						<p>Ao prosseguir, você declara que leu e concorda com estes Termos, que disciplinam contribuições voluntárias realizadas em favor do ambiente virtual denominado KarmaOT, atualmente em fase experimental.</p>
						<p><b>1. Natureza e Objeto</b><br>
						1.1. O KarmaOT consiste em ambiente digital privado, de caráter experimental e em evolução contínua, sujeito a ajustes técnicos, interrupções e descontinuidade sem aviso prévio.<br>
						1.2. O presente instrumento regula contribuições voluntárias, de caráter gratuito, irrevogável e irretratável, realizadas pelos apoiadores do projeto para custeio de infraestrutura tecnológica e de desenvolvimento do ambiente.<br>
						1.3. As contribuições não configuram aquisição de produto ou contratação de serviço com correspectivo econômico individualizado, tendo finalidade exclusiva de apoio institucional à manutenção e ao aprimoramento do ambiente experimental.</p>
						<p><b>2. Contribuições Voluntárias e Irreversibilidade</b><br>
						2.1. As contribuições são antecipadas e não reembolsáveis, dado o seu caráter de liberalidade, sendo destinadas a despesas correntes (servidores, banda, armazenagem, ferramentas de desenvolvimento, entre outras) e a investimentos técnicos do projeto.<br>
						2.2. A eventual alteração de valores sugeridos para contribuição não confere ao contribuinte direito adquirido à manutenção de parâmetros pretéritos.</p>
						<p><b>3. Incentivos Digitais de Estímulo</b><br>
						3.1. O projeto poderá disponibilizar incentivos digitais de estímulo (tais como rótulos de reconhecimento, faixas de prioridade em filas, sinalizadores visuais, acesso preferencial a funcionalidades de testes, ou outros instrumentos análogos) com a exclusiva finalidade de incentivar a cultura de apoio ao ambiente experimental.<br>
						3.2. Tais incentivos têm caráter acessório, precário e não essencial, não possuem valor de face, não são conversíveis em moeda, não são transferíveis e podem ser modificados, limitados, suspensos ou extintos a qualquer tempo, inclusive por razões técnicas, de balanceamento, segurança ou conformidade.<br>
						3.3. Os incentivos não representam contraprestação individual e não asseguram desempenho específico, vantagem competitiva permanente, expectativa de ganho econômico ou continuidade operacional.</p>
						<p><b>4. Disponibilidade, Continuidade e Alterações do Ambiente</b><br>
						4.1. Dada a natureza experimental, o ambiente poderá apresentar instabilidades, perda de dados, interrupções programadas ou não programadas e alterações substanciais de regras, mapas, progressões, bases de dados, itens ou mecânicas.<br>
						4.2. O projeto não assume obrigação de resultado nem garante tempo de atividade, desempenho, suporte ininterrupto, preservação de itens virtuais, progressão ou registros históricos.<br>
						4.3. A equipe poderá alterar, incluir ou remover funcionalidades, mecânicas e incentivos, a seu exclusivo critério técnico, sem geração de crédito, indenização, ressarcimento ou expectativa de permanência de estados anteriores do ambiente.</p>
						<p><b>5. Processamento das Contribuições</b><br>
						5.1. As contribuições poderão ser realizadas por meios de pagamento eletrônico disponibilizados no site ou nos canais oficiais. Eventuais tarifas de processamento, estornos por chargeback ou fraudes poderão ensejar bloqueio preventivo do acesso aos incentivos até a regularização.<br>
						5.2. Em caso de indícios ou fundada suspeita de chargeback, fraude, uso indevido de meios de pagamento, abuso de sistema ou violação das regras, a equipe do projeto poderá, por decisão própria e sem aviso prévio, adotar medidas preventivas ou definitivas, incluindo, sem se limitar a: (i) suspensão temporária de acesso; (ii) banimento; (iii) exclusão definitiva da conta; e (iv) remoção/bloqueio de acesso por endereço IP e/ou por outros identificadores técnicos associados ao responsável.<br>
						5.3. As medidas acima poderão ser adotadas com base em critérios de segurança, integridade do ambiente, prevenção a fraudes e conformidade, observando-se a proporcionalidade e a minimização de impactos a terceiros não envolvidos. Poderão ser preservados registros e logs estritamente necessários para fins de auditoria e segurança, nos termos da legislação aplicável.<br>
						5.4. Direito de recurso interno: o titular afetado poderá submeter pedido de revisão à Staff, pelos canais oficiais indicados, o qual será avaliado caso a caso, à luz dos elementos técnicos disponíveis e das regras vigentes. A decisão interna da Staff possui natureza discricionária, não implica obrigação de restabelecimento de acessos e poderá ser definitiva, sem prejuízo das medidas necessárias à preservação do ambiente experimental.<br>
						5.5. A adoção das medidas previstas nesta cláusula independe de apuração em outras esferas (cível, administrativa ou penal) e não gera direito a reembolso, crédito, compensação ou indenização, considerando a natureza de liberalidade das contribuições e a proteção do ambiente experimental.</p>
						<p><b>6. Conduta e Moderação</b><br>
						6.1. O acesso ao ambiente pressupõe observância às Regras de Convivência e políticas de moderação publicadas nos canais oficiais.<br>
						6.2. O uso de automatizações, exploração de falhas, hostilidade reiterada, práticas que impactem a estabilidade/sustentabilidade do ambiente ou violação das regras poderá resultar em advertência, suspensão ou exclusão de acesso, com revogação dos incentivos eventualmente associados, sem geração de qualquer obrigação de restituição.</p>
						<p><b>7. Responsabilidades e Limitações</b><br>
						7.1. Dentro dos limites legais aplicáveis, o projeto e seus mantenedores não respondem por: (i) indisponibilidade do ambiente; (ii) falhas de conexão, roteamento, hardware ou software do usuário; (iii) perdas indiretas, lucros cessantes ou expectativas de vantagem; (iv) corrupção/alteração de dados por fatores técnicos ou por caso fortuito/força maior.<br>
						7.2. O usuário é responsável por manter seus sistemas atualizados, seguros e conformes às boas práticas recomendadas.</p>
						<p><b>8. Dados e Privacidade</b><br>
						8.1. O tratamento de dados pessoais observará princípios de finalidade, necessidade e transparência, nos termos da legislação aplicável, conforme Política de Privacidade específica do projeto.<br>
						8.2. Poderão ser coletados dados de registro, logs de acesso, identificadores de pagamento (tokenizados), endereços IP e informações técnicas estritamente necessárias à operação, segurança e prevenção a fraudes.<br>
						8.3. O titular poderá exercer direitos de consulta, correção e eliminação nos canais indicados na Política de Privacidade, respeitados os limites legais e as salvaguardas de segurança.</p>
						<p><b>9. Comunicação Oficial</b><br>
						9.1. Comunicados sobre alterações relevantes destes Termos, regras do ambiente e políticas correlatas serão publicados nos canais oficiais informados na página do projeto.<br>
						9.2. É de responsabilidade do usuário acompanhar as comunicações oficiais. A continuidade de uso do ambiente após a publicação das alterações implica concordância com os novos termos.</p>
						<p><b>10. Disposições Finais</b><br>
						10.1. A eventual tolerância quanto ao descumprimento de quaisquer condições não implicará novação ou renúncia de direitos.<br>
						10.2. Caso alguma cláusula seja considerada inválida ou inexequível, as demais permanecem válidas, produzindo efeitos na máxima extensão permitida.<br>
						10.3. Foro: para dirimir controvérsias decorrentes destes Termos, fica eleito o foro da Comarca de São Paulo/SP, com aplicação das leis brasileiras.</p>
						<p><b>11. Contato</b><br>
						Em caso de dúvidas institucionais, contate: karmaotdonate@gmail.com. Questões relativas a dados pessoais deverão observar os canais indicados na Política de Privacidade.</p>
						<p>Ao prosseguir, você declara ciência de que as contribuições têm natureza voluntária e não reembolsável, destinadas ao custeio e desenvolvimento do ambiente experimental KarmaOT, e que incentivos eventualmente disponibilizados possuem caráter acessório, precário e não econômico.</p>
					</div>
					<div class="actions">
						<label class="left"><input type="checkbox" id="agreeChk"> Li e concordo com os Termos de Uso</label>
						<button id="continueBtn" disabled>Continuar</button>
					</div>
				</td></tr></tbody></table>
			</div>
			<div class="BoxFrameHorizontal" style="background-image:url(templates/myaac/images/global/content/box-frame-horizontal.gif);"></div>
			<div class="BoxFrameEdgeRightBottom" style="background-image:url(templates/myaac/images/global/content/box-frame-edge.gif);"></div>
			<div class="BoxFrameEdgeLeftBottom" style="background-image:url(templates/myaac/images/global/content/box-frame-edge.gif);"></div>
		</div>
	</div>
</div>

<script>
	(function(){
		var agree = document.getElementById('agreeChk');
		var btn = document.getElementById('continueBtn');
		if(agree && btn){
			agree.addEventListener('change', function(){ btn.disabled = !this.checked; });
			btn.addEventListener('click', function(){ window.location.href = '/?doacao'; });
		}
	})();
</script>
