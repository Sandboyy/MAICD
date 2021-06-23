<?php
include('verifica_sessao.php');

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
	

    <title>MAICD</title>
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

	<h2><p class = "text-center" style = "margin-top: 50px">Bem-vindo, <?php echo $_SESSION['login_func_cent_saud'];?></p></h2><hr>
	
  <div class="container py-5" id="hanging-icons">
  <div class="row g-5 py-5">
    <div class="col-md-4 d-flex align-items-start">
      <div class="icon-square bg-light text-dark flex-shrink-0 me-3" style = "margin-right: -4px">
		<img src = "dashboardlogo.jpg" style = "height: 100px;">
      </div>
      <div>
        <h2>Mapa de Doenças</h2>
        <p>Visualize o mapa de calor gerado através das informações dos pacientes em observação e localize potenciais novos focos de doenças.</p>
        <a href="separadados.php" class="btn btn-danger" style = "margin-top: 10px;">
          ACESSAR
        </a>
      </div>
    </div>
     <div class="col-md-4 d-flex align-items-start">
      <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
		<img src = "dashboardlogo.jpg" style = "height: 100px;">
      </div>
      <div>
        <h2>Relatórios</h2>
        <p>Tenha acesso a um documento PDF com as informações da quantidade de casos de doenças organizada por bairros e por tipo de doença.</p>
        <button class="btn btn-danger dropdown-toggle" type="button" id="selecionaReport" data-bs-toggle="dropdown" aria-expanded="false" style = "margin-top: 11px;">
			ACESSAR
		</button>
			<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
				<li><a class="dropdown-item" href="report.php" target="_blank">Relatório Escrito</a></li>
				<li><a class="dropdown-item" href="parametros_report">Relatório em Gráfico</a></li>
			</ul>
      </div>
    </div>
     <div class="col-md-4 d-flex align-items-start">
      <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
		<img src = "dashboardlogo.jpg" style = "height: 100px;">
      </div>
      <div>
        <h2>Pacientes sob observação</h2>
        <p>Insira novos pacientes. Visualize, edite e delete registros relacionados aos pacientes sob observação.</p>
        <a href="lista_dados.php" class="btn btn-danger">
          ACESSAR
        </a>
      </div>
    </div>
  </div>
<hr>
  <div class="row g-5 py-5">
    <div class="col-md-4 d-flex align-items-start">
      <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
		<img src = "dashboardlogo.jpg" style = "height: 100px;">
      </div>
      <div>
        <h2>Mapa de UTIs</h2>
        <p>Acesse um mapa que exibe os hospitais de sua região juntamente com seu endereço e quantidade de Leitos disponíveis em cada um deles</p>
        <a href="mapa_leito" class="btn btn-danger" style = "margin-top: 15px">
          ACESSAR
        </a>
      </div>
    </div>
     <div class="col-md-4 d-flex align-items-start">
      <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
		<img src = "dashboardlogo.jpg" style = "height: 100px;">
      </div>
      <div>
        <h2>Relatórios</h2>
        <p>Acesse um diferentes relatórios de UTI com todos os hospitais listados, juntamente com seus respectivos endereços e número de Leitos disponíveis</p>
        <button class="btn btn-danger dropdown-toggle" type="button" id="selecionaReport" data-bs-toggle="dropdown" aria-expanded="false" style = "margin-top: 10px">
			ACESSAR
		</button>
			<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
				<li><a class="dropdown-item" href="report_uti.php" target="_blank">Relatório Escrito</a></li>
				<li><a class="dropdown-item" href="parametros_report_uti">Relatório em Gráfico</a></li>
			</ul>
      </div>
    </div>
     <div class="col-md-4 d-flex align-items-start">
      <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
		<img src = "dashboardlogo.jpg" style = "height: 100px;">
      </div>
      <div>
        <h2>Pacientes em UTI</h2>
        <p>Insira novos pacientes. Visualize, edite e delete registros relacionados aos pacientes da UTI de sua unidade de saúde.</p>
        <a href="lista_dados_uti.php" class="btn btn-danger" style = "margin-top: 35px">
          ACESSAR
        </a>
      </div>
    </div>
  </div>
</div>
</main>	

	<!--
    <div class="text-center">
		<p>Olá, // echo $_SESSION['login_func_cent_saud'];?></p>
		<p><a href = "separadados.php">MAPA DE DOENÇAS</a></p>
		<p><a href = "report.php">RELATÓRIO DE FOCOS DE DOENÇAS</a></p>
		<p><a href = "form_paciente.php">INSERIR PACIENTE</a></p>
		<p><a href = "lista_dados.php">GERENCIAR PACIENTES</a></p>
		<br>
		<p><a href = "mapa_leito.php">MAPA DE LEITOS DE UTI</a></p>
		<p><a href = "report_uti.php">RELATÓRIO DE LEITOS DISPONÍVEIS</a></p>
		<p><a href = "form_paciente_uti.php">ALOCAR PACIENTE EM UTI</a></p>
		<p><a href = "lista_uti.php">GERENCIAR PACIENTES EM UTI</a></p>
		<br>
		<p><a href = "mata_sessao.php">SAIR</a></p>
		<p><a href = "mata_sessao.php">SAIR</a></p>
		
	
	</div>
	-->
	<!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  </body>
</html>