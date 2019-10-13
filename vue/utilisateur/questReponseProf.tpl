<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Accueil</title>
  <link href="./vue/bootstrap/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./vue/styleCSS/accueilProf.css">
</head>
	<!--<header>
			<div id="logo">
				<img src="./vue/images/logo-white.jpg">
			</div>
			<div id="titre">
				<h2> QCM - Sélection du thème</h2>
			</div>
			<div id="userInfo">
			<h2> Utilisateur : <?php printf('M. %s',$login); ?></h2>
			<!-<h3> 	Bienvenue
							<?php 
								printf ('M. %s, votre mot de passe est : %s et votre rôle est : %s', $login, $mdp, $_SESSION['roleCourant']);
							?>
			</h3>->
			</div>
	</header>-->

	<body>
		<div class="infos">
			<h1>le test choisi est : <?php echo $test ?> </h1>
			<br>
			<h1>le groupe choisi est : <?php echo $groupe ?> </h1>
			<br>
			<h1>Voici les question du test <?php echo $test ?> </h1>
			<br>
			<?php require('./controle/test.php'); $idTest = idTestChoisi(); $_SESSION['idTest'] = $idTest[0]['id_test'];?>
			<h1>l'id du test actuel est : <?php echo $_SESSION['idTest'];  ?> </h1>

			<?php require('./controle/questReponse.php'); $questReponses = recupQuestReponse(); ?>

			<form>
				<p>Voici les questions et leurs reponses associées :</p>
				<p>Choisissez les questions à ajouter dans le test</p>
				<div>
				<?php
					$question = $questReponses[0]['texte'];
					$reponse = utf8_encode($questReponses[0]['texte_rep']);
					$compteur = 1;

					echo ('<input type="checkbox" id="' .$compteur. '" name="question" value="' .$question. '">');
					echo ('<label for="' .$compteur. '">' .$question. '</label>');
					echo ('<p>' . $reponse . '</p>');

    				for ($compteur; $compteur < count($questReponses); $compteur++){
						//on commence à partir de la 2eme ligne pour comparer avec celle d'avant
						$question = $questReponses[$compteur]['texte'];
						$reponse = utf8_encode($questReponses[$compteur]['texte_rep']);

						if ($question == $questReponses[$compteur - 1]['texte']){
							echo ('<p>' . $reponse . '</p>');
						}
						else{
							echo ('<input type="checkbox" id="' .$compteur. '" name="question" value="' .$question. '">');
							echo ('<label for="' .$compteur. '">' .$question. '</label>');
							echo ('<p>' . $reponse . '</p>');
						}
					}
				?>
				</div>
  				<div>
    				<button type="submit">valider</button>
  				</div>
			</form>

		</div>
	</body>

</html>