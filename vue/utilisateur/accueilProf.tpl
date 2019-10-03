<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>accueil prof</title>
</head>

<body>


<h3> 	Bienvenue
				<?php 
					printf ('M. %s, votre mot de passe est : %s et votre rôle est : %s', $login, $mdp, $_SESSION['roleCourant']);
				?>
</h3>


</body></html>