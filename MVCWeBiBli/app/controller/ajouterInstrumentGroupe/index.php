<?php
require_once (APP . 'app/view/templates/header.php');
require_once (APP . 'app/model/Instrument.php');
require_once (APP . 'app/model/Appartient.php');

$Instrument = new Instrument();

$allInstruments = $Instrument->getInstruments();

$Appartient = new Appartient();



if(isset($_POST['submit']))
{
	

	$instrument = $Instrument->getInstrumentParLibelle($_POST['choixInstrument']);

	//var_dump();
	//var_dump($_GET["idGroupe"]) ;

	//var_dump($_SESSION['utilisateur']['id']);

	$updtInstrument = $Appartient->setInstrumentParIdParGroupe($_SESSION['utilisateur']['id'], $_GET["idGroupe"], $instrument[0]['ID_instrument']);
}

$instrument = $Appartient->getIdInstrumentParIdUtilisateurEtIdGroupe($_SESSION['utilisateur']['id'], $_GET["idGroupe"]);






if ( $instrument[0]["ID_INSTRUMENT"] != 0)
{
	$idInstrumentActuel = $instrument[0]["ID_INSTRUMENT"];
}



require_once (APP . 'app/view/ajouterInstrumentGroupe/index.php');
?>