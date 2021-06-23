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
			$situ = $_POST['estado_paciente'];
			
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
		
			
				$update_endereco = "UPDATE endereco_paciente_internado 
									SET logr_ende_paci_inte = '$address_inicial',
										nume_ende_paci_inte = '$num',
										bair_ende_paci_inte = '$bairro',
										cida_ende_paci_inte = '$city',
										cep_ende_paci_inte = '$cep',
										uf_ende_paci_inte = '$estado'
									WHERE pk_ende_paci_inte = '$pk_ende_paci'";
				
				
				$executa_update_endereco = mysqli_query($conexao, $update_endereco);
				


					$update_paciente = "UPDATE paciente_internado 
										SET nome_paci_inte = '$nome',
											cpf_paci_inte = '$cpf',
											fone_paci_inte = '$fone',
											data_entr_paci_inte = '$data',
											esta_doen = '$situ',
											fk_doen = '$doenca'
										WHERE pk_paci_inte = '$pk'";
					
					
					$executa_update_paciente = mysqli_query($conexao, $update_paciente);
					
					if(mysqli_affected_rows($conexao) == 1){
					
						header("Location: lista_dados_uti.php");
						mysqli_close($conexao);
					
					}else{
						$_SESSION['erro_cadastro'] = true;
						mysqli_close($conexao);
						header('Location: altera_dados_uti.php');	
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