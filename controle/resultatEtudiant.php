<?php 
session_start();
require_once ("./etudiant.php");
var_dump("hello");
var_dump(listeQuestions($_SESSION['idTestChoisi']));
var_dump($_POST);    print_r($_POST);

$compteurQuestionsReussies = 0;
$nbQuestion = sizeof(listeQuestions($_SESSION['idTestChoisi']));
var_dump($nbQuestion);
var_dump($_POST['q_answer']);
foreach ($_POST['q_answer'] as $key=>$value) {
    $nbRepValides = nbRepValides($key);
    var_dump($nbRepValides);
    $questionReussie = true;
    var_dump($key);
    $compteurReponsesDonnees = 0;
    foreach ($value as $idReponse) {
        var_dump($idReponse);
        //creerResultatBD($_SESSION['idTestChoisi'] , $_SESSION['id_etu'], $key, $idReponse);
        if (verifRep($idReponse) == false) {
            $questionReussie = false;
        }
        $compteurReponsesDonnees++;
    }
    var_dump($questionReussie);
    if ($questionReussie == true && $compteurReponsesDonnees == $nbRepValides) {
        $compteurQuestionsReussies++;
    }
}
var_dump($compteurQuestionsReussies);
$note = $compteurQuestionsReussies * (20/$nbQuestion);
var_dump($note);
if (aDejaFaitLeTest($_SESSION['id_etu'], $_SESSION['idTestChoisi']) == false) {
    enregistrerBilan( $_SESSION['idTestChoisi'], $_SESSION['id_etu'], $note);
}

?>