<?php
	require_once (APP . 'app/model/Utilisateur.php');

	$Utilisateur = new Utilisateur();

	if (isset($_POST["sub"]))
	{
		if (isset($_POST["ids"]))
		{
			if (isset($_POST["choix"]))
			{
				if ($_POST["choix"] == "accepter" )
				{
					$Utilisateur->upgradeUtilisateurs($_POST["ids"]);
				}
				else if ($_POST["choix"] == "refuser")
				{
					$Utilisateur->deleteUtilisateurs($_POST["ids"]);
				}
			}
			else
			{
				$err = "veuillez selectionner une action";
			}
		}
		else
		{
			$err = 'veuillez selectionner des utilisateurs';
		}
	}

	$user = $Utilisateur->getUtilisateurNonValide();
	$users = $Utilisateur->getUtilisateur();
	var_dump($users);

	require_once (APP . 'app/view/templates/header.php');
	require_once (APP . 'app/view/admin/index.php');	
	require_once (APP . 'app/view/templates/footer.php');

?>