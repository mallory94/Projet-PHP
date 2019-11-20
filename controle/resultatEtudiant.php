<?php 
session_start();
require_once ("./etudiant.php");
require_once ("./test.php");

$compteurQuestionsReussies = 0;
$nbQuestion = sizeof(listeQuestions($_SESSION['idTestChoisi']));
$listeQuestResultat = array(); //contient les id des questions ainsi que si elles sont réussies ou non
// var_dump($nbQuestion);
//var_dump($_POST['q_answer']);
//var_dump(isset($_POST['q_answer']));


if (isset($_POST['q_answer'])) {
    /* compte le nombre de question réussie sur l'ensemble du test
    */
    foreach ($_POST['q_answer'] as $key=>$value) {
        $nbRepValides = nbRepValides($key);
        // var_dump($nbRepValides);
        $questionReussie = true;
        // var_dump($key);
        $compteurReponsesDonnees = 0;
        foreach ($value as $idReponse) {
            if (aDejaFaitLeTest($_SESSION['id_etu'], $_SESSION['idTestChoisi']) == false){
             creerResultatBD($_SESSION['idTestChoisi'] , $_SESSION['id_etu'], $key, $idReponse);
            }
            if (verifRep($idReponse) == false) {
                $questionReussie = false;
            }
            $compteurReponsesDonnees++; 
        }
        $listeQuestResultat[$key] = $questionReussie;
 
        if ($questionReussie == true && $compteurReponsesDonnees == $nbRepValides) {
            $compteurQuestionsReussies++;
        }
    }
    $nbQuestionRepondues = sizeof($_POST['q_answer']);

}
else {
    $compteurQuestionsReussies = 0;
    $nbQuestionRepondues = 0;

    foreach($_SESSION['listeQuestions'] as $quest) {

        $listeQuestResultat[$quest['id_quest']] = false;
    }
    
}


$note = $compteurQuestionsReussies * (100/$nbQuestion);

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

$nbQuestionTotal = sizeof($listeQuestions);
//var_dump($listeQuestions);



// $reponsesSelectionnee = array();
// for ($y = 0; $y <= $nbQuestionTotal-1; $y++) {
//     $reponsesSelectionnee = array_merge($reponsesSelectionnee, array($listeQuestions[$y]['id_quest'] => repEstSelectionnee($listeQuestions[$y]['id_quest'])))
// }



$moyenne = (float) getMoyenne($_SESSION['idTestChoisi']);



require ("../vue/utilisateur/bilanEtudiant.tpl");

?>