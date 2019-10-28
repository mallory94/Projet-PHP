<?php

function recupQuestReponseDansTest(){
	require_once('./modele/questReponseBD.php');
	$idtest = recupIdTest();
	$resultat = recupQuestReponseDansTestBD($idtest);
	return $resultat;
}

function recupQuestReponsePasDansTest(){
	require_once('./modele/questReponseBD.php');
	$idtest = recupIdTest();
	$resultat = recupQuestReponsePasDansTestBD($idtest);
	return $resultat;
}

function recupIdTest(){
	require_once("./modele/testBD.php");

	//l'id du test
	$resultat = idTestBD($_SESSION['test'])[0]['id_test'];
	return $resultat;
}

//affichage des questions et réponses
function validationChoix(){
	require("./modele/testBD.php");

	if (isset($_POST['listeTests'])){
		$_SESSION['test'] = $_POST['listeTests'];
	}

	if (isset($_POST['listeGroupes'])){
		$_SESSION['groupe'] = $_POST['listeGroupes'];
	}

	$_SESSION['idtest'] = idTestBD($_POST['listeTests']);

	$url = "index.php?controle=questReponse&action=accueilQuestionReponse";
	header ("Location:" .$url) ;

}

//fonction qui actualise les questions dans un test donné apres validation du formulaire
function updateQuestionDansTest(){
	require_once ("./modele/questReponseBD.php");
	require_once ("./modele/testBD.php");
	
	$idtest = $_SESSION['idtest'][0]['id_test'];

	/*for($i = 0; $i < count($_POST['question']); $i++){
		$idquestion = recupIdQuestionBD($_POST['question'])[0]['id_quest'];
		updateQuestionsDansTestBD($idquestion, $idtest);
	}*/

	foreach($_POST['question'] as $val){
		$idquestion = recupIdQuestionBD($val)[0]['id_quest'];
		updateQuestionsDansTestBD($idquestion, $idtest);
	}

	//retour à l'accueil du prof
	$url = "index.php?controle=questReponse&action=accueilQuestionReponse";
	header ("Location:" .$url) ;
}

function updateQuestionPasDansTest(){
	require_once ("./modele/questReponseBD.php");
	require_once ("./modele/testBD.php");
	
	$idtest = $_SESSION['idtest'][0]['id_test'];

	foreach($_POST['question'] as $val){
		
		$idquestion = recupIdQuestionBD($val)[0]['id_quest'];
		updateQuestionsPasDansTestBD($idquestion, $idtest);
	}

	//retour à l'accueil du prof
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
	//Les questions et réponses déjà présentent d'un un test
	$questReponsesDansTest = recupQuestReponseDansTest();
	//Les questions et réponses qui ne sont pas dans le test
	$questReponsesPasDansTest = recupQuestReponsePasDansTest();

	//var_dump($questReponsesDansTest);die();
	require('./vue/utilisateur/questReponseProf.tpl');
}

?>