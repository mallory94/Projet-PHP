<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Accueil</title>
  <link href="./vue/bootstrap/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./vue/styleCSS/questRep.css">
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
							echo ('<td id="question" for="' .$compteur. '">' .$question. '</td>');
							echo ('<td id="reponse">' . $reponse . ' </td>');
							
		    				for ($compteur; $compteur < count($questReponsesPasDansTest); $compteur++){
								//on commence à partir de la 2eme ligne pour comparer avec celle d'avant
								$question = utf8_encode($questReponsesPasDansTest[$compteur]['texte']);
								$reponse = utf8_encode($questReponsesPasDansTest[$compteur]['texte_rep']);

								if ($question == utf8_encode($questReponsesPasDansTest[$compteur - 1]['texte'])){
									echo ('<td id="reponse">' . $reponse . ' </td>');
								}
								else{
									echo ('</tr><tr><td><input type="checkbox" id="' .$compteur. '" name="question[]" value="' .$question. '"></td>');
									echo ('<td id="question" for="' .$compteur. '">' .$question. '</label></td>');
									echo ('<td id="reponse">' . $reponse . ' </td>');
								}
							}
							echo('</tr></table></div>');
							echo('<div><input id="validation" type="submit"></input></div>');
						}		
						catch (Exception $e) {
							echo "Toutes les questions disponibles sont déjà dans le test, Veuillez en créer de nouvelles !\n";
							echo('</table></div>');
						}
					?>

				</form>
			</div>
		</div>

		<div class="contentPage">
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
							$compteur = 1;

							echo ('<tr><td><input type="checkbox" id="' .$compteur. '" name="question[]" value="' .$question. '"></td>');
							echo ('<td id="question" for="' .$compteur. '">' .$question. '</td>');
							echo ('<td id="reponse">' . $reponse . ' </td>');
							
		    				for ($compteur; $compteur < count($questReponsesDansTest); $compteur++){
								//on commence à partir de la 2eme ligne pour comparer avec celle d'avant
								$question = utf8_encode($questReponsesDansTest[$compteur]['texte']);
								$reponse = utf8_encode($questReponsesDansTest[$compteur]['texte_rep']);

								if ($question == utf8_encode($questReponsesDansTest[$compteur - 1]['texte'])){
									echo ('<td id="reponse">' . $reponse . ' </td>');
								}
								else{
									echo ('</tr><tr><td><input type="checkbox" id="' .$compteur. '" name="question[]" value="' .$question. '"></td>');
									echo ('<td id="question" for="' .$compteur. '">' .$question. '</label></td>');
									echo ('<td id="reponse">' . $reponse . ' </td>');
								}
							}
							echo('</tr></table></div>');
							echo('<div><input id="validation" type="submit"></input></div>');
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
	</body>

</html>