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
			</div>
	</header>

	<body>
		<div class="contentPage">
			<!-- form qui va contenir la liste des tests et la liste des groupes -->
			<fieldset>
			<form method="post" action="index.php?controle=questReponse&action=validationChoix">
				<div class="form-group">
					<legend> Test </legend>
				 	<select name="listeTests" class="select-css">
					 	<?php 
					 		foreach($tests as $test){
								echo ('<option value="' . $test['titre_test'] .'">' . $test['titre_test'] . '</option>');
							} 
						?>
		  			</select>
		  			<br>
		  			<legend> Groupe </legend>
		  			<select name="listeGroupes" class="select-css">
					 	<?php 
					 		foreach($groupes as $groupe){ 
								echo ('<option value= "'. $groupe['num_grpe'] . '">' . $groupe['num_grpe'] . '</option>');
							} 
						?>
		  			 </select>
	  			<input type="submit" name="validation" value="Validation">
	  			<input type="submit" name="bilan" value="Bilan">
	  		</div>
			</form>
		</fieldset>
		</div>
	</body>
</html>