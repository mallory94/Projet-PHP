<?php

function listeTestsDipo(){
    require ("./modele/etudiantBD.php");
    return(listeTestDispoBD());
}


function commencerTest(){
    session_start();
    $_SESSION['indiceTest'] = $_POST['indiceTest'];
    $_SESION['indiceQuestion'] = 0;
    $titreTest = $_SESSION['listeTestDispo'][$_POST['indiceTest']]['titre_test'];
    require ("../vue/utilisateur/repondreEtu.tpl");
}

function questionCourante(){
    session_start();
    require ('../modele/etudiantBD.php');
    return questionCouranteBD($_SESSION['indiceQuestion']);
}

?>