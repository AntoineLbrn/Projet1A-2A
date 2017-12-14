<!DOCTYPE html>
<html>

<head>
  <title>Projet</title>
  <meta charset="utf-8">
</head>
<br><br>
<form method="post" action ="index.php?url=groupe&amp;creegroupe2=1">
	<input name ="nom" type="text" class="form-control" placeholder="Nom"></p>
	<input name ="mdp" type="text" class="form-control" placeholder="Mot de passe"></p>
	<select class="form-control" name="statut">
		<option value='0'>Groupe Public</option>
		<option value='1'>Groupe Privée</option>
		<option value='2'>Groupe Invisible</option>
	</select>
	<br>
	<input type="submit" class="btn btn-primary">
	<br>
</form>