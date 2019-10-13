<?php

function recupTest($login){
	require ('./modele/testBD.php');
	$tests = recupTestBD($login);
	return $tests;
}

function remplissageListeTest(){
	$login = $_SESSION['login'];

	//le tableau contient les résultats de la requete
	$resultat = recupTest($login);

	return $resultat;
	
}

function idTestChoisi(){
	require('./modele/testBD.php');

	return $resultat = idTestChoisiBD();
}



?>