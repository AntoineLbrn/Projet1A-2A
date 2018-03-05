<?php

require_once (APP . 'app/model/Post.php');
require_once (APP . 'app/model/Genre.php');
require_once (APP . 'app/model/Oeuvre.php');
require_once (APP . 'app/model/Instrument.php');

$Instrument = new Instrument();

$Post = new Post();

if ( isset($_POST['delete']) )
{
	
	$supprimerOeuvre = $Post->supprimerOeuvreInventaire($_POST['delete']);
}

//var_dump($_GET['id']);





$oeuvres = $Post->getOeuvreAvecIdUserInventaire($_SESSION["utilisateur"]["id"]);
$Genre = new Genre();

//var_dump($oeuvres);


$tab= array();
$i=0;

foreach ($oeuvres as $oeuvre)
{
	$genre = $Genre->getGenre($oeuvre["ID_genre"]);
	$tab[$i]["nom"] = $oeuvre["NOM"];
	$tab[$i]["id_oeuvre"] = $oeuvre["ID_OEUVRE"];
 // $tab[$i]["editeur"] = $oeuvre["EDITEUR"];
	$tab[$i]["date"] = date("d/m/Y", strtotime($oeuvre["DATESORTIE"]));
	$tab[$i]["genre"] = $genre["libellé"];
	$tab[$i]["url"] = $oeuvre["URL"];
	$tab[$i]["instrument"] = $Instrument->getInstrumentParId($oeuvre["ID_INSTRUMENT"]);
	$i=$i + 1;
}











	//var_dump($oeuvres);

require_once (APP . 'app/view/templates/header.php');
require_once (APP . 'app/view/inventaire/index.php');	
require_once (APP . 'app/view/templates/footer.php');

?>