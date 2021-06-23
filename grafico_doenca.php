<?php 
include_once('conexao.php');

$cidade = $_POST['cidade'];
$doenca = $_POST ['doenca'];
?>
<!DOCTYPE html >
<html>
  <head>
  <!--Required Meta tags -->
  <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <!-- Bootstrap CSS -->
    <link href="custom" rel="stylesheet">
	<link href="template.css" rel="stylesheet">
   
  <!--Load the AJAX API-->
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

    // Load the Visualization API and the corechart package.
	google.charts.load('current', {'packages':['bar']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
		function drawChart() {

        // Create the data table.
        var data = google.visualization.arrayToDataTable([
          ['Cidade', 'Casos'],
		<?php 
		$select_grafico = "SELECT endereco_paciente.bair_ende_paci,
						   COUNT(paciente.pk_paci)
 						   FROM endereco_paciente
 						   JOIN paciente
 						   ON paciente.fk_ende_paci = endereco_paciente.pk_ende_paci
 						   WHERE paciente.fk_doen = '$doenca'
						   AND endereco_paciente.cida_ende_paci = '$cidade'
 						   GROUP BY endereco_paciente.bair_ende_paci,
									endereco_paciente.cida_ende_paci";
		
		$resultado_select_grafico = mysqli_query($conexao, $select_grafico);

		
		while ($row_grafico = mysqli_fetch_assoc($resultado_select_grafico)){		
			$bairro = $row_grafico['bair_ende_paci'];
			$contagem = $row_grafico['COUNT(paciente.pk_paci)'];
		?>	
		['<?php echo $bairro; ?>', <?php echo $contagem; ?>],
		<?php } ?>
        ]);
					   
		 var options = {
          chart: {
            title: 'Casos de Doença na Cidade de <?php echo $cidade; ?>',
            subtitle: 'Relação Qtde Doenças X Bairro',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html;" charset = "utf8_encode">
		<style type = "text/css">
			html, body {height: 100%; margin: 0; padding: 0; }
			#map {height: 90%; width: 90%; margin:auto; margin-top:10px;}
		</style>
		    <link href="custom" rel="stylesheet">
			<link href="template.css" rel="stylesheet">
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
	 <!--Div that will hold the pie chart-->
    <div id="columnchart_material" style="width: 1200px; height: 400px; margin-left: 110px; margin-top: 50px;"></div>
	</body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</html>	