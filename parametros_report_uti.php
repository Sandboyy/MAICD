<?php
session_start();

include_once("conexao.php");

$select_doenca = "SELECT pk_doen, nome_doen FROM doenca";
				
$resultado_select_doenca = mysqli_query($conexao, $select_doenca);


$select_cidade = "SELECT DISTINCT cida_ende_paci_inte FROM endereco_paciente_internado";
$resultado_select_cidade = mysqli_query($conexao, $select_cidade);

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

    <title>Login</title>
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
	   <form class="form-inline my-2 my-lg-0" method = "GET" action = "busca_cpf_uti.php">
          <input class="form-control mr-sm-2" type="text" name = "cpf" placeholder="Busca por CPF" aria-label="Search">
          <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Pesquisar</button>
        </form>
      </div>
    </nav>
	<br>
	<main role="main" class="container">
    <div class="text-center">
		<img src="logo.png" width = "300px" height = "100px">
		<!--<p>Defina a Cidade e a Doença que deseja visualizar no gráfico</p>-->
		<p><div class="badge bg-danger text-wrap" style="width: 19,5rem; height: 18px;">
			<p style = "color: white;">Defina a Cidade e a Doença para visualizar no gráfico</p>
		</div></p>
		
	
	<form method = "POST" action = "grafico_uti.php">
		<p><div class="form-group">
            <div class="col-md-6 offset-md-3">
                 <p class="text-forms">CIDADE:<br>
                 <select class="form-select form-select-lg mb-3" id = "cidade" name = "cidade" aria-label=".form-select-lg example" style= "width: 300px;"></p>
				<?php while ($row_cidade = mysqli_fetch_assoc($resultado_select_cidade)){ ?>
				<option value = "<?php echo $row_cidade['cida_ende_paci_inte'];?>"><?php echo $row_cidade['cida_ende_paci_inte'];}?></option>
				</select>
            </div>
        </div></p>
		
		<p><div class="form-group">
            <div class="col-md-6 offset-md-3">
                 <p class="text-forms">DOENÇA:<br>
                <select class="form-select form-select-lg mb-3" id = "doenca" name = "doenca" aria-label=".form-select-lg example" style= "width: 300px;"></p>
				<?php while ($row_doenca = mysqli_fetch_assoc($resultado_select_doenca)){ ?>
				<option value = "<?php echo $row_doenca['pk_doen'];?>"><?php echo $row_doenca['nome_doen'];}?></option>
				</select>
            </div>
        </div></p>
		<input type = "submit" value = "BUSCAR"><br><br>
    </form>
	</main>
	</div>
	<!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  </body>
</html>