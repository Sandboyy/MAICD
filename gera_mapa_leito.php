<?php
require("conexao.php");

function parseToXML($htmlStr){
	$xmlStr=str_replace('<','&lt;',$htmlStr);
	$xmlStr=str_replace('>','&gt;',$xmlStr);
	$xmlStr=str_replace('"','&quot;',$xmlStr);
	$xmlStr=str_replace("'",'&#39;',$xmlStr);
	$xmlStr=str_replace("&",'&amp;',$xmlStr);
	return $xmlStr;
}

//buscando todos os registros da tabela markers
$select_centro_saude = "SELECT centro_saude.nome_cent_saud,
							   centro_saude.leit_disp_cent_saud,
							   endereco_cent_saud.logr_ende_cent_saud,
							   endereco_cent_saud.nume_ende_cent_saud,
							   endereco_cent_saud.bair_ende_cent_saud,
							   endereco_cent_saud.lati_ende_cent_saud,
							   endereco_cent_saud.long_ende_cent_saud
						FROM centro_saude
						JOIN endereco_cent_saud
						ON centro_saude.fk_ende_cent_saud = endereco_cent_saud.pk_ende_cent_saud";
$resultado_select_centro_saude = mysqli_query($conexao, $select_centro_saude);

header("Content-type: text/xml");

//abrindo o xml
echo '<markers>';

//percorrendo o select da tabela markers
while ($row_centro_saude = mysqli_fetch_assoc($resultado_select_centro_saude)){

//unificando endereço
$address = $row_centro_saude['logr_ende_cent_saud'].' - '.$row_centro_saude['nume_ende_cent_saud'].' - '.$row_centro_saude['bair_ende_cent_saud'];	
	
  //adicionando os valores do select no xml
  echo '<marker ';
  echo 'name="' . parseToXML($row_centro_saude['nome_cent_saud']) . '" ';
  echo 'address="' . parseToXML($address). '" ';
  echo 'lat="' . $row_centro_saude['lati_ende_cent_saud'] . '" ';
  echo 'lng="' . $row_centro_saude['long_ende_cent_saud'] . '" ';
  echo 'leit="Leitos Disponíveis: ' . ParseToXML($row_centro_saude['leit_disp_cent_saud']) . '" ';
  echo '/>';
}

//fechando xml
echo '</markers>';



