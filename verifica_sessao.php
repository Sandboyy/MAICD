<?php
session_start();

if(!$_SESSION['login_func_cent_saud']){
	header('Location: index.php');
	exit;
}
?>