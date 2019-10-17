<?php

//appelé dans accueil() dans utilisateur.php
function recupTest($login){
	require ('./modele/testBD.php');
	$tests = recupTestBD($login);
	return $tests;
}

function idTestChoisi(){
	require('./modele/testBD.php');

	return $resultat = idTestChoisiBD();
}

?>