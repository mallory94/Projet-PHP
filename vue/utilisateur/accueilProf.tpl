<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Accueil</title>
  <link href="./vue/bootstrap/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./vue/styleCSS/accueilProf.css">
</head>
	<header>
			<div id="logo">
				<img src="./vue/images/logo-white.jpg">
			</div>
			<div id="titre">
				<h2> QCM - Sélection du thème</h2>
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
			 	<?php require("./controle/test.php"); $liste = remplissageListeTest(); ?>
			 	<select name="liste des tests">
				 	<?php 
				 		foreach($liste as $test){ 
							echo '<option value="">' . $test['titre_test'] . '</option>';
						} 
					?>
	  			 </select>
	  			<br><br>
	  			<input type="submit">
			</form>
		</div>
	</body>
</html>