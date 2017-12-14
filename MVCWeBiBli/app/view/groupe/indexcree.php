<!DOCTYPE html>
<html>

<head>
  <title>Projet</title>
  <meta charset="utf-8">
</head>
<br><br>
<form method="post" action="index.php?url=groupe&amp;modifiergroupe2=1">
	<input name="id" type="hidden" value="<?php echo $_POST["id"] ?>">
	<input name ="nom" type="text" class="form-control" placeholder="Nom" value="<?php echo $_POST["nom"] ?>">
	<input name ="mdp" type="text" class="form-control" placeholder="Mot de passe" value="<?php echo $_POST["mdp"] ?>">
	<select class="form-control" name="statut">
		<option value='0'>Groupe Public</option>
		<option value='1'>Groupe Privée</option>
		<option value='2'>Groupe Invisible</option>
	</select>
	<br>
	<input type="submit" class="btn btn-primary">
	<br>
</form>