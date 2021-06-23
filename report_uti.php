<?php	

	include_once("conexao.php");
		
	$html = '<table border=1 align = "center">';	
	$html .= '<thead>';
	$html .= '<tr>';
	$html .= '<th><h3>CENTRO DE SAÚDE</h3></th>';
	$html .= '<th><h3>ENDEREÇO</h3></th>';
	$html .= '<th><h3>CIDADE</h3></th>';
	$html .= '<th><h3>LEITOS DE UTI</h3></th>';
	$html .= '<th><h3>LEITOS OCUPADOS</h3></th>';
	$html .= '</tr>';
	$html .= '</thead>';
	$html .= '<tbody>';
	
	$result_transacoes = "SELECT centro_saude.nome_cent_saud,
								 endereco_cent_saud.logr_ende_cent_saud,
								 endereco_cent_saud.cida_ende_cent_saud,
								 centro_saude.max_leit_cent_saud,
								 COUNT(paciente_internado.pk_paci_inte)
						 FROM centro_saude
						 JOIN endereco_cent_saud
						 ON centro_saude.fk_ende_cent_saud = endereco_cent_saud.pk_ende_cent_saud
						 JOIN paciente_internado
						 ON paciente_internado.fk_cent_saud = centro_saude.pk_cent_saud
						 GROUP BY centro_saude.nome_cent_saud";
	$resultado_trasacoes = mysqli_query($conexao, $result_transacoes);
	while($row_transacoes = mysqli_fetch_assoc($resultado_trasacoes)){
		$html .= '<tr><td width = "150 px"><p align = "center">'.$row_transacoes['nome_cent_saud'] . "</p></td>";
		$html .= '<td width = "150 px"><p align = "center">'.$row_transacoes['logr_ende_cent_saud'] . "</p></td>";
		$html .= '<td width = "150 px"><p align = "center">'.$row_transacoes['cida_ende_cent_saud'] . "</p></td>";
		$html .= '<td width = "100 px"><p align = "center">'.$row_transacoes['max_leit_cent_saud'] . "</p></td>";
		$html .= '<td width = "100 px"><p align = "center">'.$row_transacoes['COUNT(paciente_internado.pk_paci_inte)'] . "</p></td></tr>";
	}
	
	$html .= '</tbody>';
	$html .= '</table>';

	
	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();
	
	// Carrega seu HTML
	$dompdf->load_html('
			<h1 style="text-align: center;">RELATÓRIO DE VAGAS DE UTI</h1><br><br>
			'. $html .'
		');

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"relatorio.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>