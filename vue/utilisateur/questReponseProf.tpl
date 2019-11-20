<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Accueil</title>
  <link href="./vue/bootstrap/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./vue/styleCSS/questRep.css">
  <script src="./js/creaQuest.js"></script>
</head>
	<header>
			<div id="logo">
				<img src="./vue/images/logo-white.jpg">
			</div>
			<div id="titre">
				<h2> QCM - Sélection des questions</h2>
			</div>
			<div id="userInfo">
			<h2> Utilisateur : <?php printf('M. %s',$login); ?></h2>
			</div>
	</header>

	<body>
		<script type="text/javascript">
			    function toggle_visibility(myRadio) {
			    	var r2 = document.getElementById("r2");
			    	var r3 = document.getElementById("r3");
			    	var r4 = document.getElementById("r4");
			    	if(myRadio.value==2){
			    		r2.style.display = "block";
			    		r3.style.display = "none";
			    		r4.style.display = "none";
			    	}

			    	if(myRadio.value==3){
			    		r2.style.display = "block";
			    		r3.style.display = "block";
			    		r4.style.display = "none";
			    	}

			    	if(myRadio.value==4){
			    		r2.style.display = "block";
			    		r3.style.display = "block";
			    		r4.style.display = "block";
			    	}
			    }

		</script>

		<div class="contentPage">
			<div class="form-group">
				<div id="infoSelected">
					<h1 id="test"><?php echo $test ?> </h1>
					<h1 id="groupe"><?php echo $groupe ?> </h1>
					<h1 id="groupe">Création d'une nouvelle question</h1>
				</div>
				<form method="post" action="index/php?controle=questReponse&action=updateQuestionPasDansTest"> <!-- faudra changer l'action -->
					<div class="rbContainer">
						<h1> Nombre de réponse : </h1>
						<input type="radio" name="nbRep" value="2" checked="checked" onchange="toggle_visibility(this)"><label for="nbRep">2 réponses</label></input>
						<input type="radio" name="nbRep" value="3" onchange="toggle_visibility(this)"><label for="nbRep">3 réponses</label></input>
						<input type="radio" name="nbRep" value="4" onchange="toggle_visibility(this)"><label for="nbRep">4 réponses</label></input>
					</div>
					<div class="qContainer"><input type="text" name="question" placeholder="Votre question"></input></div>
					<div class="repContainer">
						<div id="r1">
							<input type="checkbox" name="r1Vrai"><label for="r1Vrai">valide</label>
							<input type="text" class="reponseCrea" name="rep1" placeholder="Réponse1"></input>
						</div>
						<div id="r2">
							<input type="checkbox" name="r2Vrai"><label for="r2Vrai">valide</label>
							<input type="text" class="reponseCrea" name="rep2" placeholder="Réponse2"></input>
						</div>
						<div id="r3">
							<input type="checkbox" name="r3Vrai"><label for="r3Vrai">valide</label>
							<input type="text" class="reponseCrea" name="rep3" placeholder="Réponse3"></input>
						</div>
						<div id="r4">
							<input type="checkbox" name="r4Vrai"><label for="r4Vrai">valide</label>
							<input type="text" class="reponseCrea" name="rep4" placeholder="Réponse4"></input>
						</div>
					</div>

					<div class="outerDiv"><div class="innerDiv"><input id="validation" name="debloquer" type="submit" value="créer"></input></div></div>
				</form>
			</div>
		</div>

		<div class="contentPage">
			<div class="form-group">
				<div id="infoSelected">
					<h1 id="test"><?php echo $test ?> </h1>
					<h1 id="groupe"><?php echo $groupe ?> </h1>
					<h1 id="groupe">Questions disponibles pour ce test</h1>
				</div>
				<form method="post" action="index.php?controle=questReponse&action=updateQuestionPasDansTest">
					<div id="tab">
					<p>Voici les questions que vous pouvez ajouter dans le test :</p>
					<table>
					<?php
						try{
							$question = utf8_encode($questReponsesPasDansTest[0]['texte']);
							$reponse = utf8_encode($questReponsesPasDansTest[0]['texte_rep']);
							$compteur = 1;
							echo ('<tr><td><input type="checkbox" id="' .$compteur. '" name="question[]" value="' .$question. '"></td>');
							echo ('<td id="questiond" for="' .$compteur. '">' .$question. '</td>');
							echo ('<td id="reponsed">' . $reponse . ' </td>');
							
		    				for ($compteur; $compteur < count($questReponsesPasDansTest); $compteur++){
								//on commence à partir de la 2eme ligne pour comparer avec celle d'avant
								$question = utf8_encode($questReponsesPasDansTest[$compteur]['texte']);
								$reponse = utf8_encode($questReponsesPasDansTest[$compteur]['texte_rep']);

								if ($question == utf8_encode($questReponsesPasDansTest[$compteur - 1]['texte'])){
									echo ('<td id="reponsed">' . $reponse . ' </td>');
								}
								else{
									echo ('</tr><tr><td><input type="checkbox" id="' .$compteur. '" name="question[]" value="' .$question. '"></td>');
									echo ('<td id="questiond" for="' .$compteur. '">' .$question. '</label></td>');
									echo ('<td id="reponsed">' . $reponse . ' </td>');
								}
							}
							echo('</tr></table></div>');
							echo('<div class="outerDiv"><div class="innerDiv"><input id="validation" type="submit" name="ajouter"value="ajouter"></input><input id=validation" type="submit" name="supprimer" value="supprimer"</input></div></div>');
						}		
						catch (Exception $e) {
							echo "Toutes les questions disponibles sont déjà dans le test, Veuillez en créer de nouvelles !\n";
							echo('</table></div>');
						}
					?>

				</form>
			</div>
		</div>

		<div class="contentPage" id="noPadBot">
			<div class="form-group">
				<div id="infoSelected">
					<h1 id="test"><?php echo $test ?> </h1>
					<h1 id="groupe"><?php echo $groupe ?> </h1>
					<h1 id="groupe">Questions déjà inclus dans le test</h1>
				</div>
				<form method="post" action="index.php?controle=questReponse&action=updateQuestionDansTest">
					<p>Voici les questions que vous pouvez retirer du test :</p>
					<div id="tab">
					<table>
					<?php
						try{
							$question = utf8_encode($questReponsesDansTest[0]['texte']);
							$reponse = utf8_encode($questReponsesDansTest[0]['texte_rep']);
							$info = $infoBloque[0]['bBloque'];
							$compteur = 1;
							$cptinfo = 1;

							echo ('<tr><td><input type="checkbox" id="' .$compteur. '" name="question[]" value="' .$question. '"></td>');
							if($info == 1){
								echo ('<td id="questionb" for="' .$compteur. '">' .$question. '</td>');
								echo ('<td id="reponseb">' . $reponse . ' </td>');
							}
							else{
								echo ('<td id="questiond" for="' .$compteur. '">' .$question. '</td>');
								echo ('<td id="reponsed">' . $reponse . ' </td>');
							}
							
		    				for ($compteur; $compteur < count($questReponsesDansTest); $compteur++){
								//on commence à partir de la 2eme ligne pour comparer avec celle d'avant
								$question = utf8_encode($questReponsesDansTest[$compteur]['texte']);
								$reponse = utf8_encode($questReponsesDansTest[$compteur]['texte_rep']);

								if ($question == utf8_encode($questReponsesDansTest[$compteur - 1]['texte'])){
									if($info == 1){
										echo ('<td id="reponseb">' . $reponse . ' </td>');
									} else{
										echo ('<td id="reponsed">' . $reponse . ' </td>');
									}

								}
								else{
									$info = $infoBloque[$cptinfo]['bBloque'];
									echo ('</tr><tr><td><input type="checkbox" id="' .$compteur. '" name="question[]" value="' .$question. '"></td>');
									if($info == 1){
									echo ('<td id="questionb" for="' .$compteur. '">' .$question. '</td>');
									echo ('<td id="reponseb">' . $reponse . ' </td>');
									}
									else{
									echo ('<td id="questiond" for="' .$compteur. '">' .$question. '</td>');
									echo ('<td id="reponsed">' . $reponse . ' </td>');
									}
									$cptinfo++;
								}
							}
							echo('</tr></table></div>');
							echo('<div class="outerDiv"><div class="innerDiv"><input id="validation" name="validation" type="submit" value="retirer"></input>');
							echo('<input id="validation" name="bloquer" type="submit" value="bloquer"></input>');
							echo('<input id="validation" name="debloquer" type="submit" value="débloquer"></input></div></div>');
						}		
						catch (Exception $e) {
							echo "Il n'y a encore aucune question dans ce test ! \n";
							echo('</table></div>');
						}
					?>
					</table>
					</div>
				</form>
			</div>
		</div>

		<div class="contentPage">	
			<div class="returnButtonContainer">
				<form id="returnButton" method="post" action="index.php?controle=questReponse&action=retour">
						<input id="validation" type="submit" value="Retour">
				</form>
			</div>
		</div>
	</body>

</html>