<?php
include_once('conexao.php');
include('verifica_sessao.php');

$cpf = 0;
$cpf = $_GET['cpf'];

?>
<!doctype html>
<html lang="en">
<meta charset="UTF-8">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="custom" rel="stylesheet">
	<link href="template.css" rel="stylesheet">

    <title>Pacientes Cadastrados</title>
  </head>
  <body>
 <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style ="background-color:#8B0000">
      <a class="navbar-brand" href="index"><img src="navlogo.png" height = "50px" width = "25px"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="painel_controle.php">Home <span class="sr-only">(atual)</span></a>
          </li>
           <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Pacientes em Observação
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
            <li><a class="dropdown-item" href="separadados.php">Mapa</a></li>
            <li><a class="dropdown-item" href="report.php" target="_blank">Relatório</a></li>
			<li><a class="dropdown-item" href="parametros_report.php">Gráfico</a></li>
            <li><a class="dropdown-item" href="lista_dados.php">Pacientes</a></li>
          </ul>
		  </li>
		  <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Pacientes em UTI
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
            <li><a class="dropdown-item" href="mapa_leito.php">Mapa</a></li>
            <li><a class="dropdown-item" href="report_uti.php" target="_blank">Relatório</a></li>
			<li><a class="dropdown-item" href="parametros_report_uti.php">Gráfico</a></li>
            <li><a class="dropdown-item" href="lista_dados_uti.php">Pacientes</a></li>
          </ul>
		  </li>
		  <li class="nav-item">
            <a class="nav-link" href="mata_sessao.php">Sair</a>
          </li>
        </ul>
       <!-- pesquisar algo p fazer com essa barra de pesquisa-->
	   <form class="form-inline my-2 my-lg-0" method = "GET" action = "busca_cpf.php">
          <input class="form-control mr-sm-2" type="text" name = "cpf" placeholder="Busca por CPF" aria-label="Search">
          <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Pesquisar</button>
        </form>
      </div>
    </nav>
	<br>
	<div class = "container">
	<main role="main" class="container">
    <div class="text-center">
		<img src="logo.png" width = "300px" height = "100px">
		
		<h3><p class = "text-center">Pacientes Cadastrados</p></h3><br>
		<?php 
		
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
		
		$select_exibe_paciente ="SELECT paciente.pk_paci,
						paciente.nome_paci, 
						paciente.cpf_paci, 
						paciente.fone_paci, 
						paciente.data_entr_paci, 
						endereco_paciente.logr_ende_paci,
						endereco_paciente.nume_ende_paci,
						endereco_paciente.cida_ende_paci,
						endereco_paciente.bair_ende_paci,
						endereco_paciente.uf_ende_paci,
						endereco_paciente.cep_ende_paci,
						doenca.nome_doen
						FROM paciente 
						JOIN endereco_paciente	
						ON paciente.fk_ende_paci = endereco_paciente.pk_ende_paci
						JOIN doenca
						ON paciente.fk_doen = doenca.pk_doen
						WHERE paciente.fk_cent_saud = '$fk_cent_saud'
						AND paciente.cpf_paci LIKE '%$cpf%'";
				$resultado_select_exibe_paciente = mysqli_query($conexao, $select_exibe_paciente);
				
				?>
	<table class="table table-hover">
		<thead style = "background-color: #B22222; color: white">
			<tr>
				<th scope="col">Nome</th>
				<th scope="col">CPF</th>
				<th scope="col">Doença</th>
				<th scope="col">Data de Entrada</th>
				<th scope="col">Ações</th>
			</tr>
		</thead>
		<tbody>
				<?php
				while ($row_markers = mysqli_fetch_assoc($resultado_select_exibe_paciente)){
					?>
			<tr>
				<td><?php echo '<p align = "center">'.$row_markers['nome_paci']; ?></td>
				<td><?php echo '<p align = "center">'.$row_markers['cpf_paci']; ?></td>
				<td><?php echo '<p align = "center">'.$row_markers['nome_doen'];?></td>
				<td><?php echo '<p align = "center">'.date("d/m/Y", strtotime($row_markers['data_entr_paci']));?></td>
				<td><button type="button" class="btn btn-outline-dark"><?php echo '<a href = "dados_paciente.php?unknow='.$row_markers['pk_paci'].'">GERENCIAR</a>'?></button></td>
			</tr>
					<?php
					/*echo '<br><table border=0 align = "center">';
					echo '<tr><td width = "100 px"><p align = "center"><a href = "exclui_dados.php?unknow='.$row_markers['pk_paci'].'">Excluir</a><td>';
					echo '<td width = "100 px"><a href = "altera_dados.php?unknow='.$row_markers['pk_paci'].'">Alterar</a></p></td></tr>';
					echo '</table>';*/
				}
		?>
		</tbody>
	</table>
	<button type="button" class="btn btn-outline-dark"><a href = "form_paciente.php">INSERIR PACIENTE</a></button></br>
	</div>	
	</main>
	</div>
	<!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  </body>
</html>