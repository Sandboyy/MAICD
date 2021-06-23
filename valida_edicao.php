<?php
		include('verifica_sessao.php');
		include_once("conexao.php");

		
			$pk = $_POST['pk_paci'];
			$pk_ende_paci = $_POST['pk_ende_paci'];
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
				
			/*
			echo '<br>'.$pk;
			echo '<br>'.$pk_ende_paci;
			echo '<br>'.$nome; 
			echo '<br>'.$cpf  ;
			echo '<br>'.$fone ;
			echo '<br>'.$doenca;
			echo '<br>'.$data ;
			echo '<br>'.$address_inicial;
			echo '<br>'.$num  ;
			echo '<br>'.$bairro;
			echo '<br>'.$cep  ;
			echo '<br>'.$city ;
			echo '<br>'.$estado;
			echo '<br>'.$lat;
			echo '<br>'.$lng.'<br>';
			*/
		
			
				$update_endereco = "UPDATE endereco_paciente 
									SET logr_ende_paci = '$address_inicial',
										nume_ende_paci = '$num',
										bair_ende_paci = '$bairro',
										cida_ende_paci = '$city',
										cep_ende_paci = '$cep',
										uf_ende_paci = '$estado',
										lati_ende_paci = '$lat',
										long_ende_paci = '$lng'
									WHERE pk_ende_paci = '$pk_ende_paci'";
				
				
				$executa_update_endereco = mysqli_query($conexao, $update_endereco);
				

					$update_paciente = "UPDATE paciente 
										SET nome_paci = '$nome',
											cpf_paci = '$cpf',
											fone_paci = '$fone',
											data_entr_paci = '$data',
											fk_doen = '$doenca'
										WHERE pk_paci = '$pk'";
					
					
					$executa_update_paciente = mysqli_query($conexao, $update_paciente);
					
					if(mysqli_affected_rows($conexao) == 1){
					
						header("Location: lista_dados.php");
						mysqli_close($conexao);
					
					}else{
						$_SESSION['erro_cadastro'] = true;
						mysqli_close($conexao);
						header('Location: altera_dados.php');	
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