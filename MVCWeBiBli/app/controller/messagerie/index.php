<?php

	require_once (APP . 'app/model/Messagerie.php');
	require_once (APP . 'app/model/Utilisateur.php');

	$Messagerie = new Messagerie();
	$Utilisateur = new Utilisateur();

	if (isset($_POST["submit"]))
	{
		if (!empty($_POST["message"]))
		{
			$_POST["message"] = addslashes($_POST["message"]);
			$_POST["message"] = htmlspecialchars(($_POST["message"]));
			$Messagerie->insererMessage($_SESSION["utilisateur"]["id"],$_POST["correspondant"],$_POST["message"],$_POST["conversation"]);
			$current = $_POST["correspondant"];
		}
	}
	else
	{
		if (isset($_GET["afficher"]))
		{
			$afficher= $_GET["correspondant"];
			$current = $_GET["correspondant"];
		}
		else
		{
			$afficher = -1;
			if (isset($_GET["idUtilisateur"]))
			{
				if ($_GET["idUtilisateur"] != $_SESSION["utilisateur"]["id"])
				{
					if (pasDeConversation($_GET["idUtilisateur"], $_SESSION["utilisateur"]["id"])==1)
					{

					}
					else
					{
						$Messagerie->insererMessagerie($_GET["idUtilisateur"], $_SESSION["utilisateur"]["id"]);
					}
				}
			}
		}
	}
	$conversations = $Messagerie->getConversationParUtilisateur($_SESSION["utilisateur"]["id"]);

	require_once (APP . 'app/view/templates/header.php');
	require_once (APP . 'app/view/messagerie/index.php');	
	require_once (APP . 'app/view/templates/footer.php');

	function pasDeConversation($id1,$id2)
	{
		$Messagerie = new Messagerie();
		$messageries = $Messagerie->getConversationParUtilisateur($id1);
		foreach ($messageries as $messagerie)
		{
			if (($messagerie["ID_UTILISATEUR1"] ==$id1 && $messagerie["ID_UTILISATEUR2"] ==$id2) || ( $messagerie["ID_UTILISATEUR2"] ==$id1 && $messagerie["ID_UTILISATEUR1"] ==$id2))
			{
				return 1;
			}
		}
		return 0;
	}
?>