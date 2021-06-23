<?php
include('verifica_sessao.php');
include('conexao.php');

$pk = filter_input(INPUT_GET, 'unknow', FILTER_SANITIZE_NUMBER_INT);




$select_ende = "SELECT fk_ende_paci 
				FROM PACIENTE
				WHERE pk_paci = '$pk'";
				
$resultado_select_ende = mysqli_query($conexao, $select_ende);
while ($row_ende = mysqli_fetch_assoc($resultado_select_ende)){
		$fk_ende = $row_ende['fk_ende_paci'];						
		}
		
		

$delete_endereco = "DELETE FROM endereco_paciente WHERE pk_ende_paci = '$fk_ende'";
$resultado_delete_endereco = mysqli_query($conexao, $delete_endereco);		

$delete_paciente = "DELETE FROM paciente WHERE pk_paci = '$pk'";
$resultado_paciente = mysqli_query($conexao, $delete_paciente);

mysqli_close($conexao);

header("Location: lista_dados.php");

?>