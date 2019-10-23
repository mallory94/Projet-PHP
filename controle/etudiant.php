<?php

function listeTestsDipo(){
    require_once ("./modele/etudiantBD.php");
    return(listeTestDispoBD());
}


function commencerTest(){
    session_start();
    require_once ("../modele/etudiantBD.php");
    $_SESSION['idTestChoisi'] = $_POST['idTestChoisi'];
    var_dump($_SESSION['idTestChoisi']);
    $_SESION['indiceQuestion'] = 0;
    $titreTest = getTitreTest($_SESSION['idTestChoisi']);
    $listeQuestions = listeQuestions($_SESSION['idTestChoisi']);
    //boucle for each qui recup toutes les réponses à toutes les questions du test : tableau de tableau.
    //foreach($listeQuestion) 
    var_dump($listeQuestions);
    $listeReponses = array();
    foreach ($listeQuestions as $question) {
        array_push ($listeReponses,listeReponses($question['id_quest']));
    }
    var_dump($listeReponses);
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
?>