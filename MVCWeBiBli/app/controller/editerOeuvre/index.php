<?php
require_once (APP . 'app/view/templates/header.php');
require_once (APP . 'app/model/Oeuvre.php');
require_once (APP . 'app/model/Genre.php');

$Oeuvre = new Oeuvre();



$Genre = new Genre();


$allGenre = $Genre->getAllGenre();






if(isset($_POST['submit']))
{

	if (isDate($_POST['date']))
	{
		
		$dateUpdate = str_replace('/', '-',  $_POST['date']);
		$dateUpdate = date("Y-m-d", strtotime($dateUpdate));
		$genre = $Genre->getGenre($_POST['choixGenre']);

		

		$nouvelleOeuvre = $Oeuvre->updateOeuvre($_GET['idOeuvre'], $_POST['nomOeuvre'], $_POST['choixGenre'], $dateUpdate);

	}
	else
	{
		$err = "not tthat good";
	}


	
	
	

	//echo ('<script> window.location.href = "index.php?url=interfaceGroupe&idGroupe=' . $_GET["idGroupe"] . '" </script>');
}

$oeuvre = $Oeuvre->getOeuvresAvecID($_GET['idOeuvre']);

$date = date("d/m/Y", strtotime($oeuvre[0]["DATESORTIE"]));

$genreActuel = $Genre->getGenre($oeuvre[0]['ID_genre']);





function isDate($string) {
	$matches = array();
	$pattern = '/^([0-9]{1,2})\\/([0-9]{1,2})\\/([0-9]{4})$/';
	if (!preg_match($pattern, $string, $matches)) return false;
	if (!checkdate($matches[2], $matches[1], $matches[3])) return false;
	return true;
}









require_once (APP . 'app/view/editerOeuvre/index.php');
?>