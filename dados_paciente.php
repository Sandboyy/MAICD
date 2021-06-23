<?php
include_once('conexao.php');
$pk = filter_input(INPUT_GET, 'unknow', FILTER_SANITIZE_NUMBER_INT);
include('verifica_sessao.php');

$select_nome = "SELECT nome_paci 
				FROM paciente
				WHERE pk_paci = '$pk'";
				
$res_select_nome = mysqli_query($conexao, $select_nome);

while ($row_nome = mysqli_fetch_assoc($res_select_nome)){
				
				$nome = $row_nome['nome_paci'];
				}				
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

    <title>Dados de <?php echo $nome; ?></title>
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
	<main role="main" class="container">
    <div>
		
		<div class = "text-center">
		<img src="logo.png" width = "300px" height = "100px">
		</div>
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
						AND paciente.pk_paci = '$pk'";
				$resultado_select_exibe_paciente = mysqli_query($conexao, $select_exibe_paciente);
				?>
				
	
	<a href = "altera_dados.php?unknow=<?php echo $pk; ?>" class="btn btn-outline-danger" style = "margin-bottom: 0px; margin-left: 940px">EDITAR</a>
	<a href = "exclui_dados.php?unknow=<?php echo $pk; ?>" class="btn btn-outline-danger">EXCLUIR</a>			
	
	<h2><p style = "margin-top: 10px;">Dados Pessoais</p></h2>
	<table class="table table-hover" style="margin-bottom:30px">
		<thead style = "background-color: #B22222; color: white">
				<?php
				while ($row_markers = mysqli_fetch_assoc($resultado_select_exibe_paciente)){
					?>
			<tr align = "center">
				<th scope = "row" style = "background-color: #B22222; color: white; Width:150px;">Nome </th>
				<th scope = "row" style = "background-color: #B22222; color: white; Width:150px;">CPF </th>
				<th scope = "row" style = "background-color: #B22222; color: white; Width:150px;">Telefone </th>
			</tr>
		</thead>	
		
		<tbody>	
			<tr align = "center">
				<td><?php echo ' '.$row_markers['nome_paci']; ?></td>
				<td><?php echo ' '.$row_markers['cpf_paci']; ?></td>
				<td><?php echo ' '.$row_markers['fone_paci'];?></td>
			</tr>
		</tbody>	

	</table>
	
	<hr>
	<h2><p>Endereço</p></h2>
	<table class="table table-hover">
		<thead style = "background-color: #B22222; color: white">
				<tr align = "center">
					<th scope = "row" style = "background-color: #B22222; color: white; Width:150px;">Logradouro</th>
					<th scope = "row" style = "background-color: #B22222; color: white; Width:150px;">Cidade</th>
					<th scope = "row" style = "background-color: #B22222; color: white; Width:150px;">Número</th>
					<th scope = "row" style = "background-color: #B22222; color: white; Width:150px;">Bairro</th>
					<th scope = "row" style = "background-color: #B22222; color: white; Width:150px;">CEP</th>
				</tr>
		</thead>
		
		<tbody>
			<tr align = "center">
				<td><?php echo ' '.$row_markers['logr_ende_paci']; ?></td>
				<td><?php echo ' '.$row_markers['nume_ende_paci']; ?></td>
				<td><?php echo ' '.$row_markers['cida_ende_paci'];?></td>
				<td><?php echo ' '.$row_markers['bair_ende_paci'];?></td>
				<td><?php echo ' '.$row_markers['cep_ende_paci'];?></td>
			</tr>	
		</tbody>	
	</table>
	
		<hr>
		<h2><p>Informações Médicas</p></h2>
	<table class="table table-hover">
		<thead style = "background-color: #B22222; color: white;">
				<tr align = "center">
					<th scope = "row" style = "background-color: #B22222; color: white; Width:150px;">Doença</th>
					<th scope = "row" style = "background-color: #B22222; color: white; Width:150px;">Data de Entrada</th>
				</tr>
		</thead>

		<tbody>	
				<tr align = "center">
				<td><?php echo ' '.$row_markers['nome_doen']; ?></td>
				<td><?php echo ' '.date("d/m/Y", strtotime($row_markers['data_entr_paci']));?></td></tr>
									<?php
						/*echo '<br><table border=0 align = "center">';
						echo '<tr><td width = "100 px"><p align = "center"><a href = "exclui_dados.php?unknow='.$row_markers['pk_paci'].'">Excluir</a><td>';
						echo '<td width = "100 px"><a href = "altera_dados.php?unknow='.$row_markers['pk_paci'].'">Alterar</a></p></td></tr>';
						echo '</table>';*/
						}
					?>
		</tbody>	
	</table>
	</main>
	</div>
	<!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  </body>
</html>