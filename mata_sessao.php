<?php
session_start();

unset($_SESSION['login_func_cent_saud']);

header('Location: index.php');
exit();

?>