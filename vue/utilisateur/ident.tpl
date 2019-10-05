<!doctype HTML>

<header>
  <link href="./vue/bootstrap/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./vue/styleCSS/ident.css">
  <title>Identification</title>
</header>

<body>
	<!-- <div class="identForm">
		<form method="get" action="connect.php">
			<fieldset>
				<legend>Login : </legend>
					<input type="text" name="identifiant"/>
			</fieldset>
			<fieldset>
				<legend>Mot de passe : </legend>
					<input type="password" name="motdepasse"/>
			</fieldset>
			<input type="submit" name="submit" value="Se connecter"/>
		</form>
	</div> -->

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="./vue/images/logo.jpg" id="icon" alt="Icone Université de Paris" />
    </div>

    <!-- Login Form -->
    <form method="post" action="index.php?controle=utilisateur&action=ident">
      <input type="text" id="login" class="fadeIn second" name="login" placeholder="Identifiant" value="<?php echo $login; ?>">
      <input type="password" id="password" class="fadeIn third" name="mdp" placeholder="Mot de passe" value="<?php echo $mdp; ?>">
      <input type="submit" class="fadeIn fourth" value="Connexion">
    </form>

    <div>
    	<?php echo "<p style='color:red;'>".$msg."</p>"; ?>
    </div>

  </div>
</div>
</body>