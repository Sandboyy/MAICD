<?php
session_start();
include("conexao.php");

if(empty($_POST['login']) ||(empty($_POST['senha']))){
	header('Location: login.php');
	exit();
}

	$login = mysqli_real_escape_string($conexao, $_POST['login']);
	$senha = mysqli_real_escape_string($conexao, md5($_POST ['senha']));
	
	$query = "select pk_func_cent_saud, login_func_cent_saud 
			  from funcionario_cent_saud 
			  where login_func_cent_saud = '$login' 
			  and senh_func_cent_saud = '$senha'";
			  
    $resultado_query = mysqli_query($conexao, $query);
	
	$valida = mysqli_num_rows($resultado_query);
	
	if($valida == 1){
		$_SESSION['login_func_cent_saud'] = $login;
		header('Location: painel_controle.php');
		exit();
	}else{
		$_SESSION['erro_login'] = true;
		header('Location: login.php');
		exit();
	}
	
	
	
