]<?php
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
			
			$address_fim = str_replace(' ', '+', $address_inicial);
			
			$address = $address_fim.'+'.$num.'+'.$bairro.'+'.$city.'+'.$cep.'+'.$estado;
			
			$address_visual = $address_inicial.''.$num.''.$bairro.''.$city.''.$cep.''.$estado;
			
			
			//carregando o json que gera geocodificacao da api
			$geo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyAbhq8m8qXvOGoHFdGITusaNEjXl_nShCM&address='.urlencode($address).'&sensor=false');

			
			// converte o JSON para um vetor
			$geo = json_decode($geo, true);
			
			if ($geo['status'] == 'OK') {
			// capturando a latitude e longitude do arquivo json e colocando numa variavel.
			$lat = $geo['results'][0]['geometry']['location']['lat'];
			$lng = $geo['results'][0]['geometry']['location']['lng'];
			}
			else {
				$_SESSION['erro_endereco'] = true;
				header('Location: form_paciente.php');
				exit();
				}
			
			$insert_endereco = mysqli_query($conexao,"INSERT INTO endereco_paciente (logr_ende_paci, nume_ende_paci, bair_ende_paci ,cida_ende_paci, uf_ende_paci, cep_ende_paci, lati_ende_paci, long_ende_paci) 
				VALUES 
				('$address_inicial', '$num', '$bairro' ,'$city', '$estado', '$cep', '$lat', '$lng')");  
				
		if(mysqli_affected_rows($conexao) == 1){
			
			$select_fk_endereco = "SELECT MAX(pk_ende_paci) FROM endereco_paciente WHERE logr_ende_paci = '$address_inicial' 
																				   AND nume_ende_paci = '$num' 
																				   AND bair_ende_paci = '$bairro'
																				   AND cida_ende_paci = '$city'
																				   AND uf_ende_paci = '$estado'
																				   AND cep_ende_paci = '$cep'";
				$resultado_select_fk_endereco = mysqli_query($conexao, $select_fk_endereco);
				while ($row_markers = mysqli_fetch_assoc($resultado_select_fk_endereco)){
				$fk_ende = $row_markers['MAX(pk_ende_paci)'];						
				}
				
				/*
				$select_doenca = "SELECT pk_doen FROM doenca WHERE nome_doen = '$doenca'";
				
				$resultado_select_doenca = mysqli_query($conexao, $select_doenca);
				while ($row_doenca = mysqli_fetch_assoc($resultado_select_doenca)){
				
				$fk_doen = $row_doenca['pk_doen'];
				}
				*/
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
				
				
				$insert_paciente = mysqli_query($conexao,"INSERT INTO paciente (nome_paci, cpf_paci, fone_paci ,data_entr_paci, fk_doen, fk_ende_paci, fk_cent_saud) 
														  VALUES 
														  ('$nome', '$cpf', '$fone' ,'$data', '$doenca', '$fk_ende', '$fk_cent_saud')");  
		
				if(mysqli_affected_rows($conexao) == 1){
					mysqli_close($conexao);	
					header("Location: separadados.php");
				}else{
					$_SESSION['erro_cadastro'] = true;
					mysqli_close($conexao);
					header('Location: form_paciente.php');
					
				}
		}else{
			$_SESSION['erro_cadastro'] = true;
			mysqli_close($conexao);
			header('Location: form_paciente.php');
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