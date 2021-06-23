<?php
include('verifica_sessao.php');
include_once("conexao.php");

$select_doenca = "SELECT pk_doen, nome_doen FROM doenca";
				
$resultado_select_doenca = mysqli_query($conexao, $select_doenca);

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
				



$select_verifica_leito = "SELECT leit_disp_cent_saud FROM centro_saude where pk_cent_saud = '$fk_cent_saud'";

$result_verifica_leito = mysqli_query($conexao, $select_verifica_leito);
	while ($row_leito = mysqli_fetch_assoc($result_verifica_leito)){
				
				$leit_disp = $row_leito['leit_disp_cent_saud'];
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
	
    <title>Cadastro de Paciente</title>
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
    <div class="text-center">
		<img src="logo.png" width = "300px" height = "100px">
		
		<h3><p class = "text-center">Dados Pessoais</p></h3>
		
		<?php
		if(isset($_SESSION['erro_endereco'])):?>
		<br>
		<h5><p class = "text-center" style = "color: red">ENDEREÇO INVÁLIDO</p></h5>
		<?php 		
		endif;
		unset($_SESSION['erro_endereco']);?>
		
			<?php
		if(isset($_SESSION['erro_cadastro'])):?>
		<br>
		<h5><p class = "text-center" style = "color: red">ERRO, VERIFIQUE OS DADOS INSERIDOS</p></h5>
		<?php 		
		endif;
		unset($_SESSION['erro_cadastro']);?>
		
	
	<form method = "POST" action = "valida_paciente_uti.php">
		<p><div class="form-group">
            <div class="col-md-6 offset-md-3">
                 <p class="text-forms">NOME:<br>
                <input class="form-control form-control-sm" type="text" name = "name" placeholder="Nome"></p>
            </div>
        </div></p>
		
		<p><div class="form-group">
            <div class="col-md-6 offset-md-3">
                 <p class="text-forms">CPF:<br>
                <input class="form-control form-control-sm" type = "text" onkeypress="$(this).mask('000.000.000-00');" name = "cpf" placeholder="CPF"></p>
            </div>
        </div></p>
		
		<p><div class="form-group">
            <div class="col-md-6 offset-md-3">
                 <p class="text-forms">TELEFONE:<br>
                <input class="form-control form-control-sm" type = "text" onkeypress="$(this).mask('(00) 0000-00009')" name = "fone" placeholder="Telefone"></p>
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
		
		<p><div class="form-group">
            <div class="col-md-6 offset-md-3">
                 <p class="text-forms">DATA DE ENTRADA NA UTI:<br>
                <input class="form-control form-control-sm" type="date" name = "data" placeholder="Data"></p>
            </div>
        </div></p>
		
		<p><div class="form-group">
            <div class="col-md-6 offset-md-3">
                 <p class="text-forms">ENDEREÇO:<br>
                <input class="form-control form-control-sm" type="text" name = "address" placeholder="Endereço"></p>
            </div>
        </div></p>
		
		<p><div class="form-group">
            <div class="col-md-6 offset-md-3">
                 <p class="text-forms">NÚMERO:<br>
                <input class="form-control form-control-sm" type="text" name = "num" placeholder="Número"></p>
            </div>
        </div></p>
		
		<p><div class="form-group">
            <div class="col-md-6 offset-md-3">
                 <p class="text-forms">BAIRRO:<br>
                <input class="form-control form-control-sm" type="text" name = "bairro" placeholder="Bairro"></p>
            </div>
        </div></p>
		
		<p><div class="form-group">
            <div class="col-md-6 offset-md-3">
                 <p class="text-forms">CEP:<br>
                <input class="form-control form-control-sm" type = "text" onkeypress="$(this).mask('00000-000')" name = "cep" placeholder="CEP"></p>
            </div>
        </div></p>
		
		<p><div class="form-group">
            <div class="col-md-6 offset-md-3">
                 <p class="text-forms">CIDADE:<br>
                <input class="form-control form-control-sm" type="text" name = "city" placeholder="Cidade"></p>
            </div>
        </div></p>
		
		<p><div class="form-group">
            <div class="col-md-6 offset-md-3">
              <p class="text-forms">ESTADO:<br>
                <select class="form-select" id="estado" name="estado"> 
					<option value="AC">Acre</option>
					<option value="AL">Alagoas</option>
					<option value="AP">Amapá</option>
					<option value="AM">Amazonas</option>
					<option value="BA">Bahia</option>
					<option value="CE">Ceará</option>
					<option value="DF">Distrito Federal</option>
					<option value="ES">Espírito Santo</option>
					<option value="GO">Goiás</option>
					<option value="MA">Maranhão</option>
					<option value="MT">Mato Grosso</option>
					<option value="MS">Mato Grosso do Sul</option>
					<option value="MG">Minas Gerais</option>
					<option value="PA">Pará</option>
					<option value="PB">Paraíba</option>
					<option value="PR">Paraná</option>
					<option value="PE">Pernambuco</option>
					<option value="PI">Piauí</option>
					<option value="RJ">Rio de Janeiro</option>
					<option value="RN">Rio Grande do Norte</option>
					<option value="RS">Rio Grande do Sul</option>
					<option value="RO">Rondônia</option>
					<option value="RR">Roraima</option>
					<option value="SC">Santa Catarina</option>
					<option value="SP">São Paulo</option>
					<option value="SE">Sergipe</option>
					<option value="TO">Tocantins</option>
					<option value="EX">Estrangeiro</option>
				</select></p>
            </div>
        </div></p>
		
		<p><div class="form-group">
            <div class="col-md-6 offset-md-3">
              <p class="text-forms">SITTUAÇÂO DO PACIENTE:<br>
                <select class="form-select" id="estado_paciente" name="estado_paciente"> 
					<option value="Grave">Grave</option>
					<option value="Moderado">Moderado</option>
					<option value="Recuperado">Recuperado</option>
				</select></p>
            </div>
        </div></p>
		<br>
		<?php if($leit_disp > 0){
		?>
		<input type = "submit" class="btn btn-sm btn-primary" value = "CADASTRAR"><br><br>
		<?php }else{
			?><input type = "submit" class="btn btn-sm btn-primary" value = "CADASTRAR" disabled>
			  <div class="col-md-6 offset-md-3">
                 <p class="text-center" style = "color: red">Todos os leitos estão ocupados!
			  </div>
				 </p>
			  <br><br>
		<?php }	  
		?>	
	
	</form>
	</main>
	</div>
	<!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  </body>
  <script type = "text/javascript" src ="jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
</html>