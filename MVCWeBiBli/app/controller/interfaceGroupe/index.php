<?php
require_once (APP . 'app/model/Groupe.php');
require_once (APP . 'app/model/Appartient.php');
require_once (APP . 'app/model/Instrument.php');
require_once (APP . 'app/model/Post.php');
require_once (APP . 'app/model/Oeuvre.php');
require_once (APP . 'app/model/Utilisateur.php');
require_once (APP . 'app/model/Genre.php');
require_once (APP . 'app/view/templates/header.php');

$Groupe = new Groupe();
$nomGroupe = $Groupe->getNomGroupe($_GET["idGroupe"]);

$Appartient = new Appartient();
$Utilisateurs = $Appartient->getUtilisateurParIdGroupe($_GET["idGroupe"]);

$Instrument = new Instrument();

$Post= new Post();

$Oeuvres = $Post->getOeuvreAvecIdGroupe($_GET["idGroupe"]);

//var_dump($Oeuvres);

$Oeuvre = new Oeuvre();

$Utilisateur = new Utilisateur();

$allInstruments = $Instrument->getInstruments();

if(isset($_POST['ajouterInstu']))
{
header("Location: index.php?url=ajouterInstrumentGroupe&idGroupe=" . $_GET["idGroupe"]);
exit;
}

$Genre = new Genre();

$chefOrchestre = $Appartient->getChefOrchestreParIdGroupe($_GET["idGroupe"]);






//var_dump($_SESSION["utilisateur"]["id"]);

//var_dump($test);

 //var_dump($idInstrument);

 require_once (APP . 'app/view/interfaceGroupe/index.php');
?>