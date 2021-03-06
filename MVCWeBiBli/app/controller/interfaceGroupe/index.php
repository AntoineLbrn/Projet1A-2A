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
if (isset($_POST["submitEvenement"]))
{
	if (empty($_POST["libelle"]) || empty($_POST["date"]))
	{
		$err = "Veuillez remplir tous les champs";
		require_once(APP . 'app/view/interfaceGroupe/ajouterEvenement.php');
	}
	else
	{
		$_POST["libelle"] = htmlspecialchars($_POST["libelle"]);
		$_POST["libelle"] = str_replace("'", "\'", $_POST["libelle"]);
		$dateInserer = str_replace('/', '-',  $_POST['date']);
		$dateInserer = date("Y-m-d", strtotime($dateInserer));
		$Groupe->insererEvenement($_GET["idGroupe"],$_POST["libelle"],$dateInserer);
		header("Location: index.php?url=interfaceGroupe&idGroupe=" . $_GET["idGroupe"]);
	}
}
else if (isset($_GET["ajouter"]))
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
else if (isset($_GET["AjouterEvenement"]))
{
	require_once(APP . 'app/view/interfaceGroupe/ajouterEvenement.php');
}
else if (isset($_GET["EditerDifficulte"]))
{
	$Oeuvre = new Oeuvre();

	if(isset($_POST['submit']))
	{		
		$editerDiffculte = $Oeuvre->updateDifficulte($_GET['EditerDifficulte'], $_POST['choixDifficulte']);
		header("Location: index.php?url=interfaceGroupe&idGroupe=" . $_GET["idGroupe"]);
	}

	$oeuvre = $Oeuvre->getOeuvresAvecID($_GET['EditerDifficulte']);
	

	require_once(APP . 'app/view/interfaceGroupe/editerDifficulteOeuvre.php');	
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
	$chefOrchestre = $Appartient->getChefOrchestreParIdGroupe($_GET["idGroupe"]);

	$Utilisateurs = $Appartient->getUtilisateurParIdGroupe($_GET["idGroupe"]);

	$Instrument = new Instrument();


	$Oeuvres = $Post->getOeuvreAvecIdGroupe($_GET["idGroupe"]);

	$Oeuvre = new Oeuvre();

	$Utilisateur = new Utilisateur();

	$allInstruments = $Instrument->getInstruments();

	if(isset($_POST['ajouterInstu']))
	{
	header("Location: index.php?url=ajouterInstrumentGroupe&idGroupe=" . $_GET["idGroupe"]);
	exit;
	}

	$Genre = new Genre();




	if (isset($_GET["idEvenement"]))
	{
		if ($_SESSION["utilisateur"]["id"] == $chefOrchestre[0]["ID_UTILISATEUR"])
		{
			$Groupe->retirerEvenement($_GET["idEvenement"]);
		}
	}
	if (isset($_GET["idUtilisateur"]))
	{
		if ($_SESSION["utilisateur"]["id"] == $chefOrchestre[0]["ID_UTILISATEUR"])
		{
			$Groupe->retirerDuGroupe($_GET["idUtilisateur"],$_GET["idGroupe"]);
			header("Location: index.php?url=interfaceGroupe&idGroupe=" . $_GET["idGroupe"]);
			exit;
		}
	}

	$evenements = $Groupe->getEvenements($_GET["idGroupe"]);

	if (isset($_POST['ajouterInventaire']))
	{
		
		$Post->setPost($_SESSION['utilisateur']['id'],0,$_POST['ajouterInventaire']); // ajout de l'oeuvre à l'inventaire
	}

	$instrumentSession = $Appartient->getIdInstrumentParIdUtilisateurEtIdGroupe($_SESSION["utilisateur"]["id"], $_GET["idGroupe"]);


	//var_dump($_SESSION["utilisateur"]["id"]);

	//var_dump($test);

	 //var_dump($idInstrument);

	 require_once (APP . 'app/view/interfaceGroupe/index.php');

}
?>