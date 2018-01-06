<?php

	require_once (APP . 'app/model/Groupe.php');
	require_once (APP . 'app/view/templates/header.php');

	

	if(isset($_POST["OK"])){
			$groupe = rechercherGroupe($_POST["recherche"]);
	}else{
			$groupe = getAllGroupe();
	}

	if(isset($_GET["idGroupe"]))
	{
		
		echo ('<script> window.location.href = "index.php?url=interfaceGroupe&idGroupe=" . $_GET["idGroupe"]) ; </script>');
	}
	else{
		require_once (APP . 'app/view/groupe/index.php');
	}

	if(isset($_GET["creegroupe2"])){
		$Groupe = new Groupe();
		$message = $Groupe->ajouterGroupe($_POST["nom"],$_POST["mdp"],$_POST["statut"]);
		require_once (APP . 'app/view/groupe/index.php');
	}

	if(isset($_GET["creegroupe1"])){
			require_once (APP . 'app/view/groupe/indexcree.php');
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