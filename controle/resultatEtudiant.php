<?php 
session_start();
require_once ("./etudiant.php");

$compteurQuestionsReussies = 0;
$nbQuestion = sizeof(listeQuestions($_SESSION['idTestChoisi']));
$listeQuestResultat = array(); //contient les id des questions ainsi que si elles sont réussies ou non
// var_dump($nbQuestion);
//var_dump($_POST['q_answer']);
foreach ($_POST['q_answer'] as $key=>$value) {
    $nbRepValides = nbRepValides($key);
    // var_dump($nbRepValides);
    $questionReussie = true;
    // var_dump($key);
    $compteurReponsesDonnees = 0;
    foreach ($value as $idReponse) {
        // var_dump($idReponse);
        //creerResultatBD($_SESSION['idTestChoisi'] , $_SESSION['id_etu'], $key, $idReponse);
        if (verifRep($idReponse) == false) {
            $questionReussie = false;
        }
        $compteurReponsesDonnees++; 
    }
    $listeQuestResultat[$key] = $questionReussie;
    // var_dump($questionReussie);
    if ($questionReussie == true && $compteurReponsesDonnees == $nbRepValides) {
        $compteurQuestionsReussies++;
    }
}
//var_dump($compteurQuestionsReussies);
//var_dump($listeQuestResultat);
$note = $compteurQuestionsReussies * (20/$nbQuestion);
//var_dump($note);
if (aDejaFaitLeTest($_SESSION['id_etu'], $_SESSION['idTestChoisi']) == false) {
    enregistrerBilan( $_SESSION['idTestChoisi'], $_SESSION['id_etu'], $note);
}



$listeQuestions = listeQuestions($_SESSION['idTestChoisi']);
$listeReponses = array();
foreach ($listeQuestions as $question) {
    array_push ($listeReponses,listeReponses($question['id_quest']));
}
$titreTest = getTitreTest($_SESSION['idTestChoisi']);
//var_dump($listeReponses);
foreach($listeReponses as $reponse) {
    
}

function repEstSelectionnee($id_quest, $id_rep) {
    $tailleTableau = sizeof($_POST['q_answer'][$id_quest]);
    //var_dump($tailleTableau);
    try {
        //var_dump($id_rep);
        for ($i = 0; $i <= $tailleTableau-1; $i++) {
            //var_dump($_POST['q_answer'][$id_quest]);
            if (strcmp($_POST['q_answer'][$id_quest][$i],$id_rep) == 0) {
                return true;
            }
        }
    }
    catch (Exception $e) {
        echo("Blindax!");
    }
    return false;
}

require ("../vue/utilisateur/bilanEtudiant.tpl")

?>