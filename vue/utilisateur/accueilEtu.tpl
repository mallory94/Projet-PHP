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
			<h2> Utilisateur : <?php printf('M. %s',$login); ?></h2>
			<!--<h3> 	Bienvenue
							<?php 
								printf ('M. %s, votre mot de passe est : %s et votre rôle est : %s', $login, $mdp, $_SESSION['roleCourant']);
							?>
			</h3>-->
			</div>
	</header>

	<body>
		<div class="contentPage">
			<form method="post" action="">
				 <?php 
				 require("./controle/etudiant.php"); 
				 $liste = listeTestsDipo();
				 $liste_test = array( "Test 1 : Comment faire des raquettes AisseCouelle?", 
				 "Test 2 : Le présent, c'est le moment où le futur devient le présent.",
				  "Test 3 : J'ai plus d'inspi", "Test 4 : Pour une cause juste, seriez vous capable de manger vos morts?" );
				 ?>
				 
			 	<select name="liste des tests">
					 <?php 
					 	foreach($liste as $titre){
							echo '<option value="">' . $titre['titre_test'] . '</option>';
						}
					?>
	  			 </select>
	  			<br><br>
	  			<div id ="centerDiv"><input type="submit" id="boutonValide"></div>
			</form>
		</div>
	</body>
</html>