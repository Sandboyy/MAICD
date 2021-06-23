<?php
		include('verifica_sessao.php');
		include_once("conexao.php");

		
			$nome = $_POST['name'];
			$cpf = $_POST['cpf'];
			$fone = $_POST['fone'];
			$doenca = $_POST['doenca'];
			$data = $_POST['data'];
			$address_inicial = $_POST['address'];
			$num = $_POST['num'];
			$bairro = $_POST['bairro'];
			$cep = $_POST['cep'];
			$city = $_POST['city'];
			$estado = $_POST['estado'];
			$situ = $_POST['estado_paciente'];
			/*
			echo $nome;
			echo '<br>'.$cpf;
			echo '<br>'.$fone;
			echo '<br>'.$doenca;
			echo '<br>'.$data;
			echo '<br>'.$address_inicial;
			echo '<br>'.$num;
			echo '<br>'.$bairro;
			echo '<br>'.$cep;
			echo '<br>'.$city;
			echo '<br>'.$estado;
			echo '<br>'.$situ;
			
			*/
			
			
			
			$insert_endereco = mysqli_query($conexao,"INSERT INTO endereco_paciente_internado (logr_ende_paci_inte, nume_ende_paci_inte, bair_ende_paci_inte ,cida_ende_paci_inte, uf_ende_paci_inte, cep_ende_paci_inte) 
				VALUES 
				('$address_inicial', '$num', '$bairro' ,'$city', '$estado', '$cep')");  
			
			
		
			if(mysqli_affected_rows($conexao) == 1){
			
			$select_fk_endereco = "SELECT MAX(pk_ende_paci_inte) FROM endereco_paciente_internado WHERE logr_ende_paci_inte = '$address_inicial' 
																								  AND nume_ende_paci_inte = '$num' 
																								  AND bair_ende_paci_inte = '$bairro'
																								  AND cida_ende_paci_inte = '$city'
																								  AND uf_ende_paci_inte = '$estado'
																								  AND cep_ende_paci_inte = '$cep'";
				$resultado_select_fk_endereco = mysqli_query($conexao, $select_fk_endereco);
				while ($row_markers = mysqli_fetch_assoc($resultado_select_fk_endereco)){
				$fk_ende = $row_markers['MAX(pk_ende_paci_inte)'];						
				}
				
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
				if(mysqli_affected_rows($conexao) == 1){
				
				$insert_paciente = mysqli_query($conexao,"INSERT INTO paciente_internado (nome_paci_inte, cpf_paci_inte, fone_paci_inte ,data_entr_paci_inte, fk_doen, fk_ende_paci_inte, fk_cent_saud, esta_doen) 
														  VALUES 
														  ('$nome', '$cpf', '$fone' ,'$data', '$doenca', '$fk_ende', '$fk_cent_saud', '$situ')");  
														  
				
				if(mysqli_affected_rows($conexao) == 1){
					
					$update_leitos = "UPDATE centro_saude SET leit_disp_cent_saud = leit_disp_cent_saud - 1 where pk_cent_saud = '$fk_cent_saud'";

					$valida_update_leito = mysqli_query($conexao, $update_leitos);
					
					header("Location: mapa_leito.php");
				}}else{
				 	$_SESSION['erro_cadastro'] = true;
					mysqli_close($conexao);
					header('Location: form_paciente_uti.php');
				}
			}else{
				$_SESSION['erro_cadastro'] = true;
				mysqli_close($conexao);
				header('Location: form_paciente_uti.php');
			
			
			}
				
/*
				$select_teste = "SELECT * FROM paciente 
								 JOIN endereco_paciente
								 JOIN doenca	
								 ON paciente.fk_ende_paci = endereco_paciente.pk_ende_paci
								 ON paciente.fk_doen = doenca.pk_doen;";
				$resultado_select_markers = mysqli_query($conexao, $select_teste);
				
				while ($row_markers = mysqli_fetch_assoc($resultado_select_markers)){
					echo '<br>'.$row_markers['pk_paci'];
					echo '<br>'.$row_markers['nome_paci'];
					echo '<br>'.$row_markers['cpf_paci'];
					echo '<br>'.$row_markers['fone_paci'];
					echo '<br>'.$row_markers['data_entr_paci'];
					echo '<br>'.$row_markers['pk_ende_paci'];
					echo '<br>'.$row_markers['logr_ende_paci'];
					echo '<br>'.$row_markers['nume_ende_paci'];
					echo '<br>'.$row_markers['cida_ende_paci'];
					echo '<br>'.$row_markers['bair_ende_paci'];
					echo '<br>'.$row_markers['uf_ende_paci'];
					echo '<br>'.$row_markers['cep_ende_paci'];
					echo '<br>'.$row_markers['lati_ende_paci'];
					echo '<br>'.$row_markers['long_ende_paci'].'<br>';
				}
			
			echo $nome;
			echo "<br>".$cpf;
			echo "<br>".$fone;
			echo "<br>".$doenca;
			echo "<br>".$data;
			echo "<br>".$address_inicial;
			echo "<br>".$num;
			echo "<br>".$bairro;
			echo "<br>".$cep;
			echo "<br>".$city;
			echo "<br>".$estado;
			echo "<br>".$lat;
			echo "<br>".$lng;*/
			
			
			
			
?>