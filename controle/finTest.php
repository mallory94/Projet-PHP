<?php 
    session_start();
    var_dump($_SESSION['idtest'][0]['id_test']);
	require_once ('../modele/testBD.php');
	arreterTestBD($_SESSION['idtest'][0]['id_test']);
	header ("Location: ../index.php?controle=utilisateur&action=accueil" );
?>