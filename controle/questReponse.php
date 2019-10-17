<?php

function recupQuestReponse(){
	require('./modele/questReponseBD.php');
	$idtest = recupIdTest();
	$resultat = recupQuestReponseBD($idtest);
	return $resultat;
}

function recupIdTest(){
	require("./modele/testBD.php");

	//l'id du test
	$resultat = idTestBD($_SESSION['test'])[0]['id_test'];
	return $resultat;
}


function validationChoix(){
	
	if (isset($_POST['listeTests'])){
		$_SESSION['test'] = $_POST['listeTests'];
	}

	if (isset($_POST['listeGroupes'])){
		$_SESSION['groupe'] = $_POST['listeGroupes'];
	}

	$url = "index.php?controle=questReponse&action=accueilQuestionReponse";
	header ("Location:" .$url) ;

}

function accueilQuestionReponse(){
	$login = $_SESSION['login'];

	//le nom du test
	$test = $_SESSION['test'];
	//le groupe choisi
	$groupe = $_SESSION['groupe'];

	$questReponses = recupQuestReponse();
	require('./vue/utilisateur/questReponseProf.tpl');
}

?>