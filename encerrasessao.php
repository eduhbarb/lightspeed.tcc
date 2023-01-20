<?php
include_once('conexao.php');
    
if(!isset($_SESSION)) {
    session_start();
}

session_destroy();
unset($_COOKIE['user']);

header("Location: index.php");
?>
