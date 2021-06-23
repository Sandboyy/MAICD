<!DOCTYPE html>
<html lang="PT-br">
<head>
	<meta charset="UTF-8">
	<title>Principal</title>
	<link href="https://fonts.googleapis.com/css2?family=Merienda&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" rel="stylesheet">
	<link href="style.css" rel="stylesheet">
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

	<div class="carousel slide" data-ride="carousel" id="carouselExampleIndicators">
		<ol class="carousel-indicators">
			<li class="active" data-slide-to="0" data-target="#carouselExampleIndicators"></li>
			<li data-slide-to="1" data-target="#carouselExampleIndicators"></li>
			<li data-slide-to="2" data-target="#carouselExampleIndicators"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img alt="First slide" class="d-block w-100" src="slide1.jpg" style = "height: 90%">
				<div class="carousel-caption d-none d-md-block">
					<h5 class="animated bounceInRight" style="animation-delay: 0.5s">Ultímas Notícias</h5>
					<p class="animated bounceInLeft" style="animation-delay: 1s; margin-top: 50px;">Fique por dentro das últimas notícas voltadas relacionadas à saúde no Brasil e no mundo</p>
					<p class="animated bounceInRight" style="animation-delay: 1.5s; margin-bottom: -50px"><a href="https://noticias.uol.com.br/saude/" target="_blank">ACESSAR</a></p>
				</div>
			</div>
			<div class="carousel-item">
				<img alt="Second slide" class="d-block w-100" src="slide2.jpg" style = "height: 90%">
				<div class="carousel-caption d-none d-md-block">
					<h5 class="animated zoomIn" style="animation-delay: 0.5s;">Funcionalidade Do Mapa</h5>
					<p class="animated fadeInUp" style="animation-delay: 1s; margin-top: 50px">Através de um mapa de calor, visualize áreas que estão propensas sofrendo com um acúmulo de casos de doenças epidêmicas</p>
					<p class="animated zoomIn" style="animation-delay: 1.5s; margin-bottom: -50px"><a href="separadados.php">ACESSAR</a></p>
				</div>
			</div>
			<div class="carousel-item">
				<img alt="Third slide" class="d-block w-100" src="slide3.jpg" style = "height: 90%">
				<div class="carousel-caption d-none d-md-block">
					<h5 class="animated zoomIn" style="animation-delay: 0.5s">Estatísticas</h5>
					<p class="animated fadeInLeft" style="animation-delay: 1s; margin-top: 50px">Visualize em forma de gráficos ou tabelas, estatísticas da quantidade de casos de doença separados por Bairro e por cidade</p>
					<p class="animated zoomIn" style="animation-delay: 1.5s; margin-bottom: -50px"><a href="parametros_report.php">ACESSAR</a></p>
				</div>
			</div>
		</div><a class="carousel-control-prev" data-slide="prev" href="#carouselExampleIndicators" role="button"><span aria-hidden="true" class="carousel-control-prev-icon"></span> <span class="sr-only">Anterior</span></a> <a class="carousel-control-next" data-slide="next" href="#carouselExampleIndicators" role="button"><span aria-hidden="true" class="carousel-control-next-icon"></span> <span class="sr-only">Proximo</span></a>
	</div>
	
	    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="row featurette" style = "width: 100%">
      <div class="col-md-7">
        <h1 class="featurette-heading" style = "margin-left: 50px; color: #B22222">MAPAS</h1>
        <p class="lead" style = "margin-left: 50px">Acesse a informação de locais que encontram-se em situação de acúmulo de casos de doenças através do mapa de calor, que denomina cada região contaminada, Acesse também um mapa que indica todos os hospitais cadastrados e a quantidade de leitos de UTI disponíveis</p>
		<div class="dropdown">
		<button class="btn btn-lg btn-danger dropdown-toggle" href="#" role="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style = "margin-left: 50px">
			ACESSAR
		</button>
			<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
				<li><a class="dropdown-item" href="separadados.php">Mapa de Focos de Doenças</a></li>
				<li><a class="dropdown-item" href="mapa_leito.php">Mapa de UTIs</a></li>
			</ul></div>
	  </div>
      <div class="col-md-5">
        <img src = "img_mapa.png" style = "margin-left: 40px">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette" style = "width: 100%">
      <div class="col-md-7 order-md-2">
        <h1 class="featurette-heading" style = "margin-left:500px; color: #B22222">GRÁFICOS</h1>
        <p class="lead" style = "margin-right:60px">Para seguir com nossa premissa de exibir os dados necessários a população de forma clara, acesse gráficos que mostram de forma clara os números de casos por bairro, assim como um gráfico que apresenta a quantidade de leitos de UTI ocupados em cada centro de saúde</p>
		<div class="dropdown">
		<button class="btn btn-lg btn-danger dropdown-toggle" href="#" role="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style = "margin-left: 550px">
			ACESSAR
		</button>
			<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
				<li><a class="dropdown-item" href="parametros_report.php">Gráfico de focos de Doenças</a></li>
				<li><a class="dropdown-item" href="parametros_report_uti.php">Gráfico de UTIs</a></li>
			</ul></div>
	  </div>
      <div class="col-md-5 order-md-1">
        <img src = "img_grafico.png" style = "margin-left: 50px">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette" style = "width: 100%">
      <div class="col-md-7">
        <h1 class="featurette-heading" style = "margin-left: 50px; color: #B22222">RELATÓRIOS</h1>
        <p class="lead" style = "margin-left: 50px">Tenha acesso a relatórios detalhados e números simplificados dos casos de doenças ordenados por cidade e bairros</p>
		<div class="dropdown">
		<button class="btn btn-lg btn-danger dropdown-toggle" href="#" role="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style = "margin-left: 50px">
			ACESSAR
		</button>
			<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
				<li><a class="dropdown-item" href="report.php" target="_blank">Relatório de focos de Doenças</a></li>
				<li><a class="dropdown-item" href="report_uti.php" target="_blank">Relatório de UTIs</a></li>
			</ul></div>
	  </div>
      <div class="col-md-5">
        <img src = "img_rela.png" style = "margin-left: 40px">
      </div>
    </div>

    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->

  </div><!-- /.container -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js">
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
	</script>
	
</body>
</html>
