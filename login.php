<?php
session_start();
?>
<!doctype html>
<html lang="en">
<meta charset="UTF-8">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="custom.css" rel="stylesheet">
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
              <a class="nav-link" href="painel_controle.php">Home <span class="sr-only" >(atual)</span></a>
            </li>
             <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
              <a class="nav-link" href="login.php">Login</a>
            </li>
          </ul>
         <!-- pesquisar algo p fazer com essa barra de pesquisa-->
  	   <form class="form-inline my-2 my-lg-0" method = "GET" action = "busca_cpf.php">
            <input class="form-control mr-sm-2" type="text" name = "cpf" placeholder="Busca por CPF" aria-label="Search">
            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Pesquisar</button>
          </form>
        </div>
      </nav>
  	</div>
	<br>
	<main role="main" class="container">
    <div class="text-center">
		<img src="logo.png" width = "300px" height = "100px">



	<form method = "POST" action = "valida_login.php">
		<?php
		if(isset($_SESSION['erro_login'])):?>
		<br>
		<h5><p class = "text-center" style = "color: red">USUÁRIO OU SENHA INVÁLIDOS</p></h5>
		<?php
		endif;
		unset($_SESSION['erro_login']);?>
		<p><div class="form-group">
            <div class="col-md-6 offset-md-3">
                 <p class="text-forms">LOGIN:<br>
                <input class="form-control form-control-sm" type="text" name = "login" placeholder="Login"></p>
            </div>
        </div></p>

		<p><div class="form-group">
            <div class="col-md-6 offset-md-3">
                 <p class="text-forms">SENHA:<br>
                <input class="form-control form-control-sm" type="password" name = "senha" placeholder="Senha" id = "exampleInputPassword1"></p>
            </div>
        </div></p>
		<input type = "submit" value = "Login"><br><br>
    </form>
	</main>
	</div>
	<!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  </body>
</html>
