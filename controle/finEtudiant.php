<?php 
session_start();
var_dump($_SESSION['login']);
require_once ("./etudiant.php");
setBConnect($_SESSION['login'],0);

// $_SESSION = array();
// session_destroy();
// unset($_SESSION);

// header('Location: ../index.php ');

?>