<?php
include_once("conexao.php");

$arquivo = fopen('coordenada.js','w');
if ($arquivo == false) die('Não foi possível criar o arquivo.');

$result = mysqli_query($conexao, 'SELECT lati_ende_paci, long_ende_paci FROM endereco_paciente');

fwrite($arquivo, "var points = [
");

while($arraycoord = mysqli_fetch_array($result)){
	$latitude = $arraycoord['lati_ende_paci'];
	$longitude = $arraycoord['long_ende_paci'];
	
	
	
	$texto = "{lat:$latitude, lng:$longitude},
	";
	fwrite($arquivo, $texto);
}
fwrite($arquivo, "{lat:0.000000, lng:0.000000}"); 
fwrite($arquivo, "];"); 
//Fechamos o arquivo após escrever nele
fclose($arquivo);


header("Location: mapadoenca.html");



?>