<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Accueil</title>
  <link href="./vue/bootstrap/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./vue/styleCSS/accueilEtu.css">
</head>
	<header>
			<div id="logo">
				<img src="./vue/images/logo-white.jpg">
			</div>
			<div id="titre">
				<h2>Choisissez un test parmi ceux proposés</h2>
			</div>
			<div id="userInfo">
			<h2> Utilisateur : <?php printf('M. %s',$_SESSION['login']); ?></h2>
			<!--<h3> 	Bienvenue
							<?php 
								printf ('M. %s, votre mot de passe est : %s et votre rôle est : %s', 
								$_SESSION['login'], $mdp, $_SESSION['roleCourant']);
							?>
			</h3>-->
			</div>
	</header>

	<body>
		<div class="contentPage contentAccueil">
			<form method="post" action="./controle/testEtudiant.php">
				<div class="form-group">
			 	<div id ="centerDiv"><select name="idTestChoisi" class="select-css">
					 <?php
					 	//$compteur = 0;
					 	foreach($_SESSION['listeTestDispo'] as $titre){
							echo ('<option value="'. $titre['id_test'] .'">' . $titre['titre_test'] . '</option>');
							//$compteur++;
						}
					?>
	  			 </select>
	  			<br><br>
				  <input type="submit" id="validation"></div>
				</div>
			</form>
		</div>
	</body>
</html>