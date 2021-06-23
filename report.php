<?php	

	include_once("conexao.php");
		
	$html = '<table border=1 align = "center">';	
	$html .= '<thead>';
	$html .= '<tr>';
	$html .= '<th><h2>CIDADE</h2></th>';
	$html .= '<th><h2>BAIRRO</h2></th>';
	$html .= '<th><h2>DOENÇA</h2></th>';
	$html .= '<th><h2>N° DE CASOS</h2></th>';
	$html .= '</tr>';
	$html .= '</thead>';
	$html .= '<tbody>';
	
	$result_transacoes = "SELECT ep.cida_ende_paci, ep.bair_ende_paci, d.nome_doen, COUNT(d.nome_doen) 
						  FROM paciente AS p 
						  JOIN endereco_paciente AS ep
						  ON ep.pk_ende_paci = p.fk_ende_paci
						  JOIN doenca AS d
						  ON d.pk_doen = p.fk_doen
						  GROUP BY d.pk_doen,
                          ep.bair_ende_paci";
	$resultado_trasacoes = mysqli_query($conexao, $result_transacoes);
	while($row_transacoes = mysqli_fetch_assoc($resultado_trasacoes)){
		$html .= '<tr><td width = "200 px"><p align = "center">'.$row_transacoes['cida_ende_paci'] . "</p></td>";
		$html .= '<td width = "200 px"><p align = "center">'.$row_transacoes['bair_ende_paci'] . "</p></td>";
		$html .= '<td width = "150 px"><p align = "center">'.$row_transacoes['nome_doen'] . "</p></td>";
		$html .= '<td width = "150 px"><p align = "center">'.$row_transacoes['COUNT(d.nome_doen)'] . "</p></td></tr>";
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
			<h1 style="text-align: center;">RELATÓRIO BAIRRO x QTDE DE CASOS</h1><br><br>
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