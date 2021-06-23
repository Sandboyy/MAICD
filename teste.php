<?php 

		include("conexao.php");

		$select_grafico = "SELECT endereco_paciente.bair_ende_paci,
						   COUNT(paciente.pk_paci)
 						   FROM endereco_paciente
 						   JOIN paciente
 						   ON paciente.fk_ende_paci = endereco_paciente.pk_ende_paci
 						   WHERE paciente.fk_doen = 2
 						   AND endereco_paciente.cida_ende_paci = 'CabrÃ¡lia Paulista'
 						   GROUP BY endereco_paciente.bair_ende_paci,
									endereco_paciente.cida_ende_paci";
		
		$resultado_select_grafico = mysqli_query($conexao, $select_grafico);

		
		while ($row_grafico = mysqli_fetch_assoc($resultado_select_grafico)){		
			$bairro = $row_grafico['bair_ende_paci'];
			$contagem = $row_grafico['COUNT(paciente.pk_paci)'];
			
			echo "$bairro<br>";
			echo "$contagem";
		}		
		
		?>	