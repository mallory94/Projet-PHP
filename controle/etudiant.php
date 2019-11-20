<?php

function listeTestsDipo(){
    require_once ("./modele/etudiantBD.php");
    return(listeTestDispoBD());
}


function commencerTest(){
    session_start();
    require_once ("../modele/etudiantBD.php");
    setBConnect($_SESSION['login'],1);
    $_SESSION['idTestChoisi'] = $_POST['idTestChoisi'];
    $_SESION['indiceQuestion'] = 0;
    $titreTest = getTitreTest($_SESSION['idTestChoisi']);
    $listeQuestions = listeQuestions($_SESSION['idTestChoisi']);
    $_SESSION['listeQuestions'] = $listeQuestions;
    //boucle for each qui recup toutes les réponses à toutes les questions du test : tableau de tableau.
    $listeReponses = array();
    foreach ($listeQuestions as $question) {
        array_push ($listeReponses,listeReponses($question['id_quest']));
    }
    require ("../vue/utilisateur/repondreEtu.tpl");
}

function questionCourante(){
    session_start();
    require_once ('../modele/etudiantBD.php');
    return questionCouranteBD($_SESSION['indiceQuestion']);
}

function listeReponses($idQuestion) {
    require_once ('../modele/etudiantBD.php');
    return(listeReponsesBD($idQuestion));
}

function listeQuestions($indiceTest) {
    require_once ("../modele/etudiantBD.php");
    return(listeQuestionsBD($indiceTest));
}


function getTitreTest($id_test){
    require_once ("../modele/etudiantBD.php");
    return (getTitreTestBD($id_test)[0]['titre_test']);
}

function creerResultat($id_test, $id_etu, $id_quest, $id_rep){
    require_once ("../modele/etudiantBD.php");
    creerResultatBD($id_test, $id_etu, $id_quest, $id_rep);
}

function verifRep($id_rep){
    require_once ("../modele/etudiantBD.php");
    return(verifRepBD($id_rep));
}

function nbRepValides($id_quest) {
    require_once ("../modele/etudiantBD.php");
    return nbRepValidesBD($id_quest);
}


function enregistrerBilan( $id_test, $id_etu, $note){
    require_once ("../modele/etudiantBD.php");
    enregistrerBilanBD($id_test, $id_etu, $note);
}

function aDejaFaitLeTest($id_etu, $id_test){
    require_once ("../modele/etudiantBD.php");
	return (aDejaFaitLeTestBD($id_etu, $id_test));
}

function setBConnect($login, $boolean){
    require_once ("../modele/etudiantBD.php");
    setBConnectBD($login,$boolean);
}

function resultatExiste($id_test, $id_etu, $id_quest, $id_rep){
    require_once ("../modele/etudiantBD.php");
    return resultatExisteBD();
}

?>