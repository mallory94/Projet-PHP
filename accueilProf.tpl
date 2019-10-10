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
				<h2> QCM - Sélection du test et du groupe</h2>
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
			<fieldset>
				<form method="post" action="index.php?controle=recuperationInfos&action=validationChoix">
				<?php require("./controle/test.php"); $tests = remplissageListeTest(); ?>

				<div class="form-group">
					<legend> Test </legend>
				 	<select name="listeTests" class="select-css">
					 	<?php 
					 		foreach($tests as $test){
								echo '<option value="">' . $test['titre_test'] . '</option>';
							} 
						?>
		  			 </select>
		  			 <br>
		  			 <legend> Groupe </legend>
		  			<?php require("./controle/groupe.php"); $groupes = recupGroupe(); ?>
		  			<select name="listeGroupes" class="select-css">
					 	<?php 
					 		foreach($groupes as $groupe){ 
								echo '<option value="">' . $groupe['num_grpe'] . '</option>';
							} 
						?>
		  			 </select>
		  			 <input type="submit" id="validation">
		  		</div>
	  			
			</form>
			</fieldset>
		</div>
    
	</body>
</html>