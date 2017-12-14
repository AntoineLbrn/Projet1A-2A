<?php

	require_once (APP . 'app/model/Utilisateur.php');
	session_unset();
	/*if (isset($_POST["mail"]))
	{
		$deja = testerUtilisateurDejaInscrit($_POST["mail"]);
	};*/

	if (isset($_POST["login-submit"]))
	{
		if (!empty($_POST["emailL"]) && !empty($_POST["password"]))
		{
			$err  = verifierLogin($_POST["emailL"],$_POST["password"]);	
		}
		else
		{
			$err = "veuillez remplir tous les champs";
		}

		
	}
	if (isset($_POST["register-submit"]))
	{
		$focus=1;
		if (!empty($_POST["emailS"]) && !empty($_POST["password"]) &&  !empty($_POST["nom"]) &&  !empty($_POST["prenom"]) &&  !empty($_POST["confirm-password"]))
		{
			$err2  = verifierInscription($_POST["emailS"],$_POST["password"],$_POST["confirm-password"],$_POST["nom"],$_POST["prenom"]);	
		}
		else
		{
			$err2 = "veuillez remplir tous les champs";
		}
	}
	require_once (APP . 'app/view/login/index.php');


	

	function verifierLogin($email,$password)
	{
		$err = verifMail($email);
		if ($err == 1)
		{
			return "format d'email non valide";
		}
		else
		{
			$err = verifierLoginBDD($email,$password);
			if ($err == 1)
			{
				return "mauvaise combinaison mot de passe/ email.";
			}
			else
			{
				$err = verifierValidation($email);
				if ($err == 1)
				{
					return "Votre compte n'a pas encore validé par un administrateur";
				}
				else
				{
					initialiserSessionUtilisateur($email);
					echo ('<script> window.location.href = "index.php?url=accueil"; </script>');
					return "entrez je vous prie";
	
				}
			}
		}

	}


	function verifierLoginBDD($mail,$password)
	{
		$Utilisateur = new Utilisateur();
		$utilisateur = $Utilisateur->getUtilisateur();
		while ($user = $utilisateur -> fetch())
		{
			if ($mail == $user["EMAIL"] && $password == $user["MOTDEPASSE"])
			{
				return 0;
			} 
		}
		return 1;
	}

	

	function verifMail($mail)
	{
		if (preg_match(" /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/ ",$mail)) return 0;
		else
		{
			return 1;
		}
	}

	function verifierInscription($email,$password,$confirm,$nom,$prenom)
	{
		$err = verifMail($email);
		if ($err == 1)
		{
			return "format d'email non valide";
		}
		else
		{
			$err = verifMDP($password,$confirm);
			if ($err == 1)
			{
				return "les mots de passes ne sont pas identiques";
			}
			else
			{
				$err = verifMailInexistant($email);
				if ($err == 1)
				{
					return "l'email est déjà affecté à un compte";
				}
				else
				{
					$Utilisateur = new Utilisateur();
					$utilisateur = $Utilisateur->setUtilisateur($email,$password,$nom,$prenom);
					return "Vous êtes inscrit(e)";
				}
			}
		}
	}
	function verifMDP($pass1,$pass2)
	{
		if ( $pass1 != $pass2 )
		{
			return 1;
		}
		return 0;
	}

	function verifMailInexistant($mail)
	{
		$Utilisateur = new Utilisateur();
		$utilisateur = $Utilisateur->getUtilisateur();
		while ($user = $utilisateur -> fetch())
		{
			if ($mail == $user["EMAIL"] )
			{
				return 1;
			} 
		}
		return 0;
	}

	function initialiserSessionUtilisateur($email)
	{
		$Utilisateur = new Utilisateur();
		$utilisateur = $Utilisateur->getUtilisateur();
		while ($user = $utilisateur -> fetch())
		{
			if ($email == $user["EMAIL"] )
			{
				$_SESSION["utilisateur"]["id"] = $user["ID_UTILISATEUR"];
				$_SESSION["utilisateur"]["nom"] = $user["NOM_UTILISATEUR"];
				$_SESSION["utilisateur"]["prenom"] = $user["PRENOM_UTILISATEUR"];
				$_SESSION["utilisateur"]["rang"] = $user["RANG_UTILISATEUR"];
				$_SESSION["utilisateur"]["email"] = $user["EMAIL"];
			}
		}
	}
	function verifierValidation($email)
	{
		$Utilisateur = new Utilisateur();
		$utilisateur = $Utilisateur->getUtilisateur();
		while ($user = $utilisateur -> fetch())
		{
			if ($email == $user["EMAIL"] )
			{
				if ($user["RANG_UTILISATEUR"] == 0)
				{
					return 1;
				}
			}
		}
		return 0;
	}
?>