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
			</div>
			<form>
				<div id="tab">
					<table>
				<?php
					$question = $questReponses[0]['texte'];
					$reponse = utf8_encode($questReponses[0]['texte_rep']);
					$compteur = 1;

					echo ('<tr><td><input type="checkbox" id="' .$compteur. '" name="question" value="' .$question. '"></td>');
					echo ('<td id="question" for="' .$compteur. '">' .$question. '</td>');
					echo ('<td id="reponse">' . $reponse . ' </td>');
					
    				for ($compteur; $compteur < count($questReponses); $compteur++){
						//on commence à partir de la 2eme ligne pour comparer avec celle d'avant
						$question = $questReponses[$compteur]['texte'];
						$reponse = utf8_encode($questReponses[$compteur]['texte_rep']);

						if ($question == $questReponses[$compteur - 1]['texte']){
							echo ('<td id="reponse">' . $reponse . ' </td>');
						}
						else{
							echo ('</tr><tr><td><input type="checkbox" id="' .$compteur. '" name="question" value="' .$question. '"></td>');
							echo ('<td id="question" for="' .$compteur. '">' .$question. '</label></td>');
							echo ('<td id="reponse">' . $reponse . ' </td>');
						}
					}
					echo('</tr>')
				?>
				</table>
				</div>
  				<div>
    				<input id="validation" type="submit"></input>
  				</div>
			</form></div>

		</div>
	</body>

</html>