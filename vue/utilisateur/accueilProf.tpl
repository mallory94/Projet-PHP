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
			<form method="get" action="">
				<?php require('./modele/themeBD.php'); $themes = recupTheme(); ?>
				 <select name="theme">
		    		 <?php 
		    		 	foreach($themes as $theme){
		    		 	   	echo '<option value="theme">' . $theme['titre_theme'] . '</option>';
		    			}
		    		 ?>
	  			 </select>
	  			<br><br>
	  			<input type="submit">
			</form>
		</div>
	</body>
</html>