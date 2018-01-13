<?php
require_once (APP . 'app/view/templates/header.php');
require_once (APP . 'app/model/Oeuvre.php');
require_once (APP . 'app/model/Genre.php');

$Oeuvre = new Oeuvre();

$oeuvre = $Oeuvre->getOeuvresAvecID($_GET['idOeuvre']);

$date = date("d/m/Y", strtotime($oeuvre[0]["DATESORTIE"]));

$Genre = new Genre();

$genreActuel = $Genre->getGenre($oeuvre[0]['ID_genre']);





$allGenre = $Genre->getAllGenre();






if(isset($_POST['submit']))
{
	$dateUpdate = date("Y-m-d", strtotime( $_POST['date']));
	$genre = $Genre->getGenre($_POST['choixGenre']);
	

	$nouvelleOeuvre = $Oeuvre->updateOeuvre($_GET['idOeuvre'], $_POST['nomOeuvre'], $_POST['choixGenre'], $dateUpdate);
	
	

	//echo ('<script> window.location.href = "index.php?url=interfaceGroupe&idGroupe=' . $_GET["idGroupe"] . '" </script>');
}









require_once (APP . 'app/view/editerOeuvre/index.php');
?>