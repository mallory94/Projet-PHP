<!doctype html>
<html lang="fr">

<head>
   <meta charset="utf-8">
   <title>Resultats</title>
   <script type="text/javascript" src="../vue/js/jquery-3.4.1.min.js"></script>
   <link href="../vue/bootstrap/bootstrap.min.css" rel="stylesheet">
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="../vue/styleCSS/accueilEtu.css">
   <link rel="stylesheet" href="../vue/styleCSS/quizRadioButton.css">
   <link rel="stylesheet" href="../vue/styleCSS/repondreEtu.css">
   <link rel="stylesheet" href="../vue/styleCSS/bilanEtu.css">



</head>
<header>
   <div id="logo">
      <img src="../vue/images/logo-white.jpg">
   </div>
   <div id="titre">
      <h2>Bilan de votre examen sur le thême :<br> "
         <?php

         echo ($titreTest);
         ?>
         "</h2>
   </div>
   <div id="userInfo">
      <h2> Utilisateur : <?php
                           printf('M. %s', $_SESSION['login']); ?></h2>

   </div>
</header>

<body>
   <div id="centerDiv2">
   <div class="bilan">
      Vous avez reçu la note de  
      <?php echo('' . $note . "/100 autrement dit ". $note/5 . "/20");
      
      echo("<br>en répondant à " . $nbQuestionRepondues . " questions sur " . $nbQuestionTotal. "<br>La moyenne de votre groupe est de ". $moyenne . "/100");
      ?>
   <form action="/Projet-PHP-GIT-3/controle/finEtudiant.php" method="post">
    <input type="submit" id="envoyer" name="envoyer" value="test">
   <form>   
   </div>
   </div>

   <form>
   
      <?php 

      function repEstSelectionnee($id_quest, $id_rep) {

         if (isset($_POST['q_answer'][$id_quest])){
            try {
               
               $tailleTableau = sizeof($_POST['q_answer'][$id_quest]);
               //var_dump($id_rep);
               for ($i = 0; $i <= $tailleTableau-1; $i++) {
                  //var_dump($_POST['q_answer'][$id_quest]);
                  if (strcmp($_POST['q_answer'][$id_quest][$i],$id_rep) == 0) {
                        return true;
                  }
               }
            }
            catch (Exception $e) {
            }
         }
         return false;
      }


      
      $nbQuestion = sizeof($listeQuestions);
      $listeQuestionsBis = $listeQuestions;
      $questionReponses = array();
      for ($compteur = 0; $compteur < $nbQuestion; $compteur++) {
         //var_dump($listeQuestResultat);
         if(isset($listeQuestResultat[$listeQuestions[$compteur]['id_quest']])) {
            $questionReussie = $listeQuestResultat[$listeQuestions[$compteur]['id_quest']]; //boolean indiquant si cette question a été réussie par l'étudiant
         }
         else
            $questionReussie = false;
         echo ('
            <div class="container-fluid contenu">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <h3><span class="label label-warning" id="' . $listeQuestions[$compteur]['id_quest'] . '">n°question ' . number_format($compteur + 1) . "</span> <span class=\"titreQuestion\">" . utf8_encode($listeQuestions[$compteur]['texte']) . '</span></h3>
                  </div>');
         if ($questionReussie == false) {
            
            echo('
            <div class="phraseTransiton">Vous vous êtes trompé en répondant à cette question. Voici ce que vous avez répondu : </div>
                  <div class="modal-body">
                     <div class="col-xs-3 col-xs-offset-5">
                        <div id="loadbar" style="display: none;">
                           <div class="blockG" id="rotateG_01"></div>
                           <div class="blockG" id="rotateG_02"></div>
                           <div class="blockG" id="rotateG_03"></div>
                           <div class="blockG" id="rotateG_04"></div>
                           <div class="blockG" id="rotateG_05"></div>
                           <div class="blockG" id="rotateG_06"></div>
                           <div class="blockG" id="rotateG_07"></div>
                           <div class="blockG" id="rotateG_08"></div>
                        </div>
                     </div>
                     <div class="quiz" id="quiz" data-toggle="buttons">');
            //var_dump($listeReponses);
            foreach ($listeReponses[$compteur] as $reponsesDeLaQuestion) {
               
               $reponse = "";
               //var_dump($reponsesDeLaQuestion['id_rep']);
               if (repEstSelectionnee($listeQuestions[$compteur]['id_quest'],$reponsesDeLaQuestion['id_rep']) == true) {
                  $reponse = "reponseSelectionnee";
               }
               echo ('<label class="element-animation1 btn disabled btn-lg btn-primary btn-block ' . $reponse . ' " ><span class="btn-label"><i class="glyphicon glyphicon-chevron-right"></i></span> <input type="checkbox" autocomplete="off" name="q_answer[' . $reponsesDeLaQuestion['id_quest'] . '][]" disabled="true" value="" id="' . $reponsesDeLaQuestion['id_rep'] ."\">"  . utf8_encode($reponsesDeLaQuestion['texte_rep']) . '</label>');
            }
            echo ('</div></div>');
         }
         
         if ($questionReussie == false) {
               echo('<div class="phraseTransiton">Ci-dessous sont sélectionnées les réponses vous auriez du choisir</div>');
         }
         else {
            echo('<div class="phraseTransiton">Vous avez réussi cette question. Bravo!</div>');
         }
         echo('
               <div class="modal-body">
               <div class="col-xs-3 col-xs-offset-5">
                        <div id="loadbar" style="display: none;">
                           <div class="blockG" id="rotateG_01"></div>
                           <div class="blockG" id="rotateG_02"></div>
                           <div class="blockG" id="rotateG_03"></div>
                           <div class="blockG" id="rotateG_04"></div>
                           <div class="blockG" id="rotateG_05"></div>
                           <div class="blockG" id="rotateG_06"></div>
                           <div class="blockG" id="rotateG_07"></div>
                           <div class="blockG" id="rotateG_08"></div>
                        </div>
                     </div>
                     <div class="quiz" id="quiz" data-toggle="buttons">
                  ');
         foreach ($listeReponses[$compteur] as $reponsesDeLaQuestion) {
            $reponseJuste = "";
            // var_dump($listeQuestions[$compteur]);
            if ($reponsesDeLaQuestion['bvalide'] == 1) {
               $reponseJuste= "reponseJuste";
            }
            
            echo ('<label class="element-animation1 btn disabled btn-lg btn-primary btn-block ' . $reponseJuste . ' " ><span class="btn-label"><i class="glyphicon glyphicon-chevron-right"></i></span> <input type="checkbox" autocomplete="off" name="q_answer[' . $reponsesDeLaQuestion['id_quest'] . '][]" disabled="true" value="" id="' . $reponsesDeLaQuestion['id_rep'] ."\">"  . utf8_encode($reponsesDeLaQuestion['texte_rep']) . '</label>'); 
         }
         echo('</div></div>
         <div class="modal-footer text-muted">
            <span id="answer"></span>
         </div>
         </div>
         </div>');
      }
      ?>
      </div>
   </form>
   <script src="../vue/js/putValueCheckbox.js"></script>
   

</body>
<script src="../vue/js/quizRadioButton.js"></script>

</html>