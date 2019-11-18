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

function getMoyenne($id_test) {
	require_once ('../modele/noteBD.php');
	
	return(getMoyenneBD($id_test));
}

?>