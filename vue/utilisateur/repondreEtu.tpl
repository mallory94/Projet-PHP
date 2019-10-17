<!doctype html>
<html lang="fr">

<head>
   <meta charset="utf-8">
   <title>Accueil</title>
   <script type="text/javascript" src="../vue/js/jquery-3.4.1.min.js"></script>
   <link href="../vue/bootstrap/bootstrap.min.css" rel="stylesheet">
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="../vue/styleCSS/accueilEtu.css">
   <link rel="stylesheet" href="../vue/styleCSS/quizRadioButton.css">
   
   
  
</head>
	<header>
			<div id="logo">
				<img src="../vue/images/logo-white.jpg">
			</div>
			<div id="titre">
				<h2>Répondez aux questions qui s'affichent pour le test :<br> "
					<?php 
					
					echo($titreTest);
					?>
					"</h2>
			</div>
			<div id="userInfo">
            <h2> Utilisateur : <?php  
                                printf('M. %s',$_SESSION['login']); ?></h2>
			
			</div>
	</header>

	<body>
	<div class="container-fluid contenu">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h3><span class="label label-warning" id="qid">n°question</span>    $enoncé</h3>
         </div>
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
               <label class="element-animation1 btn btn-lg btn-primary btn-block"><span class="btn-label"><i class="glyphicon glyphicon-chevron-right"></i></span> <input type="radio" name="q_answer" value="1">réponse 1</label>
               <label class="element-animation2 btn btn-lg btn-primary btn-block"><span class="btn-label"><i class="glyphicon glyphicon-chevron-right"></i></span> <input type="radio" name="q_answer" value="2">réponse 2</label>
               <label class="element-animation3 btn btn-lg btn-primary btn-block"><span class="btn-label"><i class="glyphicon glyphicon-chevron-right"></i></span> <input type="radio" name="q_answer" value="3">réponse 3</label>
               <label class="element-animation4 btn btn-lg btn-primary btn-block"><span class="btn-label"><i class="glyphicon glyphicon-chevron-right"></i></span> <input type="radio" name="q_answer" value="4">réponse 4</label>
            </div>
         </div>
         <div class="modal-footer text-muted">
            <span id="answer"></span>
         </div>
      </div>
      </div>
      


      <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h3><span class="label label-warning" id="qid">n°question</span>    $enoncé</h3>
         </div>
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
               <label class="element-animation1 btn btn-lg btn-primary btn-block"><span class="btn-label"><i class="glyphicon glyphicon-chevron-right"></i></span> <input type="radio" name="q_answer" value="1">réponse 1</label>
               <label class="element-animation2 btn btn-lg btn-primary btn-block"><span class="btn-label"><i class="glyphicon glyphicon-chevron-right"></i></span> <input type="radio" name="q_answer" value="2">réponse 2</label>
               <label class="element-animation3 btn btn-lg btn-primary btn-block"><span class="btn-label"><i class="glyphicon glyphicon-chevron-right"></i></span> <input type="radio" name="q_answer" value="3">réponse 3</label>
               <label class="element-animation4 btn btn-lg btn-primary btn-block"><span class="btn-label"><i class="glyphicon glyphicon-chevron-right"></i></span> <input type="radio" name="q_answer" value="4">réponse 4</label>
            </div>
         </div>
         <div class="modal-footer text-muted">
            <span id="answer"></span>
         </div>
      </div>
   	</div>
	</div>
	</body>
   <script src="../vue/js/quizRadioButton.js"></script>
</html>