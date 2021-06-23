<?php
include('verifica_sessao.php');
include('conexao.php');

$pk = filter_input(INPUT_GET, 'unknow', FILTER_SANITIZE_NUMBER_INT);


	$info_sessao = $_SESSION['login_func_cent_saud'];
				
	$select_centro_saude = "SELECT pk_cent_saud 
							FROM centro_saude
							JOIN funcionario_cent_saud
							ON funcionario_cent_saud.fk_cent_saud = centro_saude.pk_cent_saud
							WHERE funcionario_cent_saud.login_func_cent_saud = '$info_sessao'";
	
	$resultado_select_centro_saude = mysqli_query($conexao, $select_centro_saude);
	
	while ($row_centro_saude = mysqli_fetch_assoc($resultado_select_centro_saude)){
		$fk_cent_saud = $row_centro_saude['pk_cent_saud'];
	}




$select_ende = "SELECT fk_ende_paci_inte 
				FROM paciente_internado
				WHERE pk_paci_inte = '$pk'";
				
$resultado_select_ende = mysqli_query($conexao, $select_ende);
while ($row_ende = mysqli_fetch_assoc($resultado_select_ende)){
		$fk_ende = $row_ende['fk_ende_paci_inte'];						
		}
		
		

$delete_endereco = "DELETE FROM endereco_paciente_internado WHERE pk_ende_paci_inte = '$fk_ende'";
$resultado_delete_endereco = mysqli_query($conexao, $delete_endereco);

if(mysqli_affected_rows($conexao) == 1){		

	$delete_paciente = "DELETE FROM paciente_internado WHERE pk_paci_inte = '$pk'";
	$resultado_paciente = mysqli_query($conexao, $delete_paciente);
	
	if(mysqli_affected_rows($conexao) == 1){
	
		$select_leito = "SELECT leit_disp_cent_saud FROM centro_saude where pk_cent_saud = '$fk_cent_saud'";
		$resultado_select_leito = mysqli_query($conexao, $select_leito);
		
		while ($row_leito = mysqli_fetch_assoc($resultado_select_leito)){
			$qtde_max_leito = $row_leito['leit_disp_cent_saud'];						
		}
		
		$result = $qtde_max_leito + 1;	
		
		$update_leitos = "UPDATE centro_saude SET leit_disp_cent_saud = '$result' where pk_cent_saud = '$fk_cent_saud'";
	
		$valida_update_leito = mysqli_query($conexao, $update_leitos);
		
		mysqli_close($conexao);
	}
}
	
mysqli_close($conexao);

header("Location: lista_dados_uti.php");

?>