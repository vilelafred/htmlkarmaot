<div id="content">
<p><img src="templates/tibiana/images/line_body.gif" align="center" height="7" width="100%"></p>

<table style="font-size: 13px; color: #5a2800; margin: 10px auto 0; width: 520px; border-spacing: 1px; font-family: Verdana, Tahoma, Helvetica, sans-serif; background-color: #102129; box-shadow: #000000 1px 1px 10px;" cellspacing="1" cellpadding="8">
  <tbody>
    <tr>
      <td style="padding: 6px; background: #505050; color: #efefef; font-weight: bold; text-align: center;">Calculadora de Experiência Party</td>
    </tr>
    <tr bgcolor="#F1E0C6">
      <td style="padding: 10px; background: #f1e0c6; text-align: center;">
        <div style="margin-bottom:8px;">
          <a href="?experiencetable" style="font-weight:bold; color:#3b3b3b; text-decoration:none;">Calc de Experiência</a>
          &nbsp;|&nbsp;
          <a href="?experienceparty" style="font-weight:bold; color:#3b3b3b; text-decoration:none;">EXP Party</a>
        </div>

        <table style="margin: 8px auto; border-spacing:1px; width: 100%;">
          <tbody>
            <tr>
              <td style="text-align:center; padding:6px;">Qual o personagem de nível mais alto da sua party?</td>
            </tr>
            <tr>
              <td style="text-align:center; padding:6px;">
                <input id="partymaxlvl" type="number" min="1" step="1" placeholder="Ex: 150" style="width: 220px; padding:4px;"> 
                <input id="calc" type="button" value="Calcular" style="padding:4px 10px;" onclick="calcMinLVLParty();">
              </td>
            </tr>
            <tr>
              <td style="text-align:center; padding:8px;">
                <div id="trResultparty" style="display:none; margin-top:6px; font-weight:bold;"></div>
              </td>
            </tr>
          </tbody>
        </table>

        <div style="margin-top:8px; font-size:12px; color:#6a5a45;">
          Regra oficial: todos que desejam compartilhar EXP devem ter nível ≥ 2/3 do maior nível do grupo.
        </div>
      </td>
    </tr>
  </tbody>
  </table>

<p><img src="templates/tibiana/images/line_body.gif" align="center" height="7" width="100%"></p>

<script>
function calcMinLVLParty() {
  var input = document.getElementById('partymaxlvl');
  var out = document.getElementById('trResultparty');
  var raw = (input && input.value) ? String(input.value).trim() : '';
  var max = parseInt(raw, 10);

  if (!raw || isNaN(max) || max < 1) {
    out.style.display = 'block';
    out.style.color = '#a00';
    out.textContent = 'Informe um nível válido (mínimo 1).';
    return;
  }

  var min = Math.ceil(max * 2 / 3);
  out.style.display = 'block';
  out.style.color = '#2a2a2a';
  out.innerHTML = 'Maior nível: <b>' + max + '</b> &nbsp;|&nbsp; Nível mínimo para compartilhar: <b>' + min + '</b>';
}
</script>

</div>

