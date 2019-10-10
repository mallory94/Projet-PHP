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
	/*foreach($resultat as $test){
		echo '<option value="">' . $test['titre_test'] . '</option>';
	}*/
}

?>