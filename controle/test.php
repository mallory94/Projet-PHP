<?php

//appelé dans accueil() dans utilisateur.php
function recupTest($login){
	require_once ('./modele/testBD.php');
	$tests = recupTestBD($login);
	return $tests;
}

function idTestChoisi(){
	require_once ('./modele/testBD.php');

	return $resultat = idTestChoisiBD();
}

?>