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
			<!-- form qui va contenir la liste des tests et la liste des groupes -->
			<form method="post" action="index.php?controle=recuperationInfos&action=validationChoix">
				<?php require("./controle/test.php"); $tests = remplissageListeTest(); ?>
			 	<select name="listeTests">
				 	<?php 
				 		foreach($tests as $test){
							echo '<option value="">' . $test['titre_test'] . '</option>';
						} 
					?>
	  			 </select>
	  			<br><br>
	  			<?php require("./controle/groupe.php"); $groupes = recupGroupe(); ?>
	  			<select name="listeGroupes">
				 	<?php 
				 		foreach($groupes as $groupe){ 
							echo '<option value="">' . $groupe['num_grpe'] . '</option>';
						} 
					?>
	  			 </select>
	  			 <br><br>
	  			<input type="submit">
			</form>
		</div>
	</body>
</html>