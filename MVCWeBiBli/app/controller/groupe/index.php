<?php

	require_once (APP . 'app/model/Groupe.php');
	require_once (APP . 'app/view/templates/header.php');

	$Groupe = new Groupe();
	
	if(isset($_GET["modifiergroupe2"])){
		if($_POST["mdp"]=='' && ($_POST["statut"]=='1'||$_POST["statut"]=='2')){
			$message[]="Le Mot de passe doit etre remplie pour un Groupe Privée ou Invisible";
		}else if(!($_POST["mdp"]=='') && $_POST["statut"]=='0'){
			$message[]="Le Mot de passe ne peux pas etre remplis pour un Groupe Public";
		}else{
			$Groupe->modifiergroupe($_POST["id"],$_POST["nom"],$_POST["mdp"],$_POST["statut"]);
		}
	}
	if(isset($_POST["OK"])){
			//$groupe = rechercherGroupe($_POST["recherche"]);
			$groupes = $Groupe->getGroupeARejoindre($_SESSION["utilisateur"]["id"]);
			$groupe=array();
			foreach ($groupes as $gr)
			{
				$test = $Groupe->testAppartenanceGroupe($_SESSION["utilisateur"]["id"],$gr["ID_GROUPE"]);
				if (empty($test))
				{
					$groupe[]=$gr;
				}
			}
	}else{
			$groupe = getAllGroupe();
	}
	if(isset($_GET["rejoindreGroupe"])){
		$Groupe->rejoindreGroupe($_POST["nom"]);
	}
	if(isset($_GET["creegroupe1"])){
		$Groupe->ajouterGroupe($_POST["nom"],$_POST["mdp"],$_POST["statut"]);
		$groupe = getAllGroupe();
	}
	if(isset($_GET["modifiergroupe"])){
		if(isset($_POST["delete"])){
		$Groupe->supprimergroupe($_POST["id"]);
		$groupe = getAllGroupe();
		require_once (APP . 'app/view/groupe/index.php');
		}else{
		require_once (APP . 'app/view/groupe/indexcree.php');}
	}else{
		require_once (APP . 'app/view/groupe/index.php');
	}
	function getAllGroupe(){
		$groupe = new Groupe();
		$groupe = $groupe->getAllGroupe();
		return $groupe;
	}
	function rechercherGroupe($groupes)
	{
		$groupe = new Groupe();
		$groupe = $groupe->getGroupeRecherche($groupes);
		return $groupe;
	}
	function ajouterGroupe($nom,$mdp,$statut)
	{
		$groupe = new Groupe();
		$err = $groupe->ajouterGroupe($nom,$mdp,$statut);
		if($err == 1)
		{
			$message = "Ajout réussi";
		}
		if($err == -1)
		{
			$message = "Nom de groupe deje present ou Mauvais nom de groupe";
		}
		if($err == -2)
		{
			$message = "Le Mot de passe ne respect pas le Format";
		}
		if($err == -2)
		{
			$message = "Le statut ne correspond pas au format";
		}
		return $message;
	}
	function rejoindreGroupe($groupe)
	{
		$groupe = new Groupe();
		$err = $groupe->rejoindreGroupe($groupe);
	}

?>