<?php
require_once (APP . 'app/model/Groupe.php');
require_once (APP . 'app/model/Appartient.php');
require_once (APP . 'app/model/Instrument.php');
require_once (APP . 'app/model/Post.php');
require_once (APP . 'app/model/Oeuvre.php');
require_once (APP . 'app/model/Utilisateur.php');
require_once (APP . 'app/model/Genre.php');
require_once (APP . 'app/view/templates/header.php');

	$Appartient = new Appartient();
	$Groupe = new Groupe();
	$nomGroupe = $Groupe->getNomGroupe($_GET["idGroupe"]);
	$Post= new Post();
	$Genre = new Genre();

if (isset($_GET["ajouter"]))
{
	$Utilisateur = $Appartient->getUtlisateurPasDansGroupe($_GET["idGroupe"]);
	require_once(APP . 'app/view/interfaceGroupe/ajouterUtilisateur.php');
}
else if (isset($_GET["inventaire"]))
{
	$Oeuvre = new Oeuvre();
	$Oeuvres = $Oeuvre->getOeuvreInventairePasDansGroupe($_SESSION["utilisateur"]["id"],$_GET["idGroupe"]);
	require_once(APP . 'app/view/interfaceGroupe/ajouterOeuvre.php');
}
else
{
	if (isset($_POST["sub"]))
	{
		if (isset($_POST["ids"]))
		{
			foreach ($_POST["ids"] as $id)
			{
				$Appartient->AjouterUtilisateurAuGroupe($_GET["idGroupe"],$id);
			}
		}
	}
	if (isset($_POST["subOeuvre"]))
	{
		if (isset($_POST["ids"]))
		{
			foreach ($_POST["ids"] as $id)
			{
				$Post->setPost($_SESSION["utilisateur"]["id"],$_GET["idGroupe"],$id);
			}
		}
	}
	$Utilisateurs = $Appartient->getUtilisateurParIdGroupe($_GET["idGroupe"]);

	$Instrument = new Instrument();


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


	if (isset($_GET["idUtilisateur"]))
	{
		if ($_SESSION["utilisateur"]["id"] == $chefOrchestre[0]["ID_UTILISATEUR"])
		{
			$Groupe->retirerDuGroupe($_GET["idUtilisateur"],$_GET["idGroupe"]);
			header("Location: index.php?url=interfaceGroupe&idGroupe=" . $_GET["idGroupe"]);
			exit;
		}
	}

	if (isset($_POST['ajouterInventaire']))
	{
		
		$Post->setPost($_SESSION['utilisateur']['id'],0,$_POST['ajouterInventaire']); // ajout de l'oeuvre à l'inventaire
	}



	//var_dump($_SESSION["utilisateur"]["id"]);

	//var_dump($test);

	 //var_dump($idInstrument);

	 require_once (APP . 'app/view/interfaceGroupe/index.php');

}
?>