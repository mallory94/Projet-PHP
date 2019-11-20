<?php

function recupQuestReponseDansTest(){
	require_once('./modele/questReponseBD.php');
	$idtest = recupIdTest();
	$resultat = recupQuestReponseDansTestBD($idtest);
	return $resultat;
}

function recupQuestBloqueOuPas(){
	require_once('./modele/questReponseBD.php');
	$idtest = recupIdTest();
	$resultat = questionBloquée($idtest);
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

function notes(){
	require('./modele/noteBD.php');
	$idtest = recupIdTest();
	$resultat = notesBD($idtest);
	return $resultat;
}

function noms(){
	require_once('./modele/etudiantBD.php');
	$idtest = recupIdTest();
	$resultat = nomsBD($idtest);
	return $resultat;
}

function nbEtuConnecte(){
	require_once('./modele/etudiantBD.php');
	$resultat = etudiantConnecteBD();

	$cpt = 0;

	foreach($resultat as $etu){
		$cpt++;
	}
	return $cpt;
}

function nbListeEtudiant(){
	
	$resultat = listeEtudiantBD();

	$cpt = 0;
	
	foreach($resultat as $etu){
		$cpt++;
	}

	return $cpt;
}

//affichage des questions et réponses ou du bilan
function validationChoix(){
	require("./modele/testBD.php");

	if (isset($_POST['listeTests'])){
		$_SESSION['test'] = $_POST['listeTests'];
	}

	if (isset($_POST['listeGroupes'])){
		$_SESSION['groupe'] = $_POST['listeGroupes'];
	}

	$_SESSION['idtest'] = idTestBD($_POST['listeTests']);
	var_dump($_SESSION['idtest']);
	//L'utilisateur à cliquer sur le bouton validation
	if (isset($_POST['validation'])){
		$url = "index.php?controle=questReponse&action=accueilQuestionReponse";
	}
	elseif (isset($_POST['bilan'])){
		$url = "index.php?controle=questReponse&action=accueilBilan";
	}

	elseif (isset($_POST['supprimer'])){
		//var_dump($_SESSION['idtest'][0]['id_test']);die();
		supprimerTestBD($_SESSION['idtest'][0]['id_test']);
		supprimerResultatBD($_SESSION['idtest'][0]['id_test']);
		supprimerQcmTestBD($_SESSION['idtest'][0]['id_test']);
		supprimerBilanBD($_SESSION['idtest'][0]['id_test']);
		$url = "index.php?controle=utilisateur&action=accueil";
	}
	
	header ("Location:" .$url) ;

}

//fonction qui actualise les questions dans un test donné apres validation du formulaire
function updateQuestionDansTest(){
	require_once ("./modele/questReponseBD.php");
	require_once ("./modele/testBD.php");
	
	$idtest = $_SESSION['idtest'][0]['id_test'];

	
	if(isset($_POST['validation'])){
		foreach($_POST['question'] as $val){
			$idquestion = recupIdQuestionBD($val)[0]['id_quest'];
			updateQuestionsDansTestBD($idquestion, $idtest);
		}
	}

	elseif(isset($_POST['bloquer'])){
		foreach($_POST['question'] as $val){
			$idquestion = recupIdQuestionBD($val)[0]['id_quest'];
			bloquerQuestionsBD($idquestion,$idtest);
		}
	}

	elseif(isset($_POST['debloquer'])){
		foreach($_POST['question'] as $val){
			$idquestion = recupIdQuestionBD($val)[0]['id_quest'];
			debloquerQuestionsBD($idquestion,$idtest);
		}
	}

	//on actualise
	$url = "index.php?controle=questReponse&action=accueilQuestionReponse";
	header ("Location:" .$url) ;
}

function updateQuestionPasDansTest(){
	require_once ("./modele/questReponseBD.php");
	require_once ("./modele/testBD.php");
	
	$idtest = $_SESSION['idtest'][0]['id_test'];

	if(isset($_POST['ajouter'])){
		foreach($_POST['question'] as $val){
			$idquestion = recupIdQuestionBD($val)[0]['id_quest'];
			updateQuestionsPasDansTestBD($idquestion, $idtest);
		}
	}
	elseif(isset($_POST['supprimer'])){
		foreach($_POST['question'] as $val){
			$idquestion = recupIdQuestionBD($val)[0]['id_quest'];
			supprimerQuestionBD($idquestion);
			supprimerReponsesBD($idquestion);
			supprimerQcmBD($idquestion);
		}
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
	//Info sur les questions si elle sont bloquées ou pas
	$infoBloque = recupQuestBloqueOuPas();
	//var_dump($questReponsesDansTest);die();
	require('./vue/utilisateur/questReponseProf.tpl');
}

function retour(){
	//retour à l'accueil du prof
	$url = "index.php?controle=utilisateur&action=accueil";
	header ("Location:" .$url) ;
}

function accueilBilan(){
	require_once ("./modele/testBD.php");
	$_SESSION['idtest'] = idTestBD($_SESSION['test']);
	$login = $_SESSION['login'];

	//le nom du test
	$test = $_SESSION['test'];
	//le groupe choisi
	$groupe = $_SESSION['groupe'];
	//liste des etudiants connectés
	$etuConnecte = nbEtuConnecte();
	//liste des etudiants
	$etuTotal = nbListeEtudiant();
	//Les notes des élèves
	$notes = notes();
	//Le nom des élèves
	$noms = noms();
	//moyenne du groupe
	if(!empty($notes)){
		$resultat = 0;
		foreach($notes as $note){
			$resultat = $resultat + $note['note_test'];
		}
		$moyenne = $resultat/(count($notes));
	}
	else{
		$moyenne = 0;
	}
	$nbEtuTestFini = nbEtudiantTestFini();
	require('./vue/utilisateur/BilanProf.tpl');
}

function nbEtudiantTestFini(){
	require_once ("./modele/etudiantBD.php");
	return(nbEtudiantTestFiniBD());
}

function creerQuestion(){
	require_once ("./modele/questReponseBD.php");
	$question = $_POST['question'];
	$multiple = 0;
	
	//var_dump($_POST);die();
	if(count($_POST['rep'])>1){
		$multiple = 1;
	}
	creerQuestionBD($question,$multiple);
	$idquestion = recupIdQuestionBD($question);
	$idtest = recupIdTest();
	creerQcmBD($idtest,$idquestion[0]['id_quest']);
	for($i = 0; $i < $_POST['nbRep']; $i++){
		$txtRep = $_POST['rep1'][$i];
		$bonneRep = 0;
		for($j = 0; $j < count($_POST['rep']); $j++){
			if($_POST['rep'][$j] == "r". ($i + 1)){
				$bonneRep = 1;
			}	
		}
			
		creerReponseBD($idquestion[0]['id_quest'],$txtRep,$bonneRep);
	}
	
	//var_dump($cpt);die();
	$url = "index.php?controle=questReponse&action=accueilQuestionReponse";
	header ("Location:" .$url) ;
}

?>