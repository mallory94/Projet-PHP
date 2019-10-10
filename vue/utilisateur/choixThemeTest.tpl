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
			<h3> 	Bienvenue
							<?php 
								printf ('M. %s, votre mot de passe est : %s et votre rôle est : %s', $login, $mdp, $_SESSION['roleCourant']);
							?>
			</h3>
			</div>
	</header>-->

	<body>
		<div class="infos">
			<h1>le test choisi est : <?php echo $test ?> </h1>
			<br>
			<h1>le groupe choisi est : <?php echo $groupe ?> </h1>
		</div>
	</body>

</html>