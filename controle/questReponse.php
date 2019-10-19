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

//Creation de l'exception qui va catch une erreur de tableau
set_error_handler('exceptionTableau');

function exceptionTableau($severity, $message, $filename, $lineno) {
  if (error_reporting() == 0) {
    return;
  }
  if (error_reporting() & $severity) {
    throw new ErrorException($message, 0, $severity, $filename, $lineno);
  }
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