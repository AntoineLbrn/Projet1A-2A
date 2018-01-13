<?php
	require_once (APP . 'app/model/Oeuvre.php');
	require_once (APP . 'app/model/Groupe.php');
	require_once (APP . 'app/model/Genre.php');
	require_once (APP . 'app/model/Artiste.php');
	require_once (APP . 'app/model/Ecrit.php');
	require_once (APP . 'app/model/Post.php');

	$Groupe = new Groupe();
	$groupe = $Groupe->getAllGroupe();

	

	$Genre = new Genre();
	$genre = $Genre->getAllGenre();

	$Artiste = new Artiste();
	$artiste = $Artiste->getAllArtiste();

	if (isset($_POST["sub"]))
	{
		if (!isset($_FILES["fichier"]) || ($_POST["genre"]=="" && empty($_POST["nouveauGenre"])) || empty($_POST["nomOeuvre"]) || empty($_POST["auteur"]) || !isset($_POST["dateoeuvre"]))
		{
			$err = "Veuillez remplir tous les champs";
		}
		else
		{
			if (!empty($_POST["nouveauGenre"]))
			{
				$Genre = new Genre();
				$id = $Genre->verifGenre($_POST["nouveauGenre"]);
				if ($id==0)
				{
					$Genre->insererGenre($_POST["nouveauGenre"]);
					$id = $Genre->verifGenre($_POST["nouveauGenre"]);
					$genreO = $id["ID_GENRE"];
				}
				else
				{
					$genreO= $id;
					$genreO = $id["ID_GENRE"];					
				}
			}
			else
			{
				$genreO = $_POST["genre"];
			}

			$id = $Artiste->verifArtiste($_POST["auteur"]);
			if ($id == 0 )
			{
				$Artiste->insererArtiste($_POST["auteur"]);
				$id = $Artiste->verifArtiste($_POST["auteur"]);
				$artisteO = $id;
			}
			else
			{
				$artisteO = $id;
			}
			$Oeuvre = new Oeuvre();
			$id = $Oeuvre->verifOeuvre($_POST["nomOeuvre"]);
			if (!$id==null)
			{
				$err="Une oeuvre existe déjà avec ce nom.";
			}
			$lien = $_FILES["fichier"]["name"];
			$dossier = 'upload/';
			$fichier = basename($_FILES['fichier']['name']);
			$taille_maxi = 20000000;
			$taille = filesize($_FILES['fichier']['tmp_name']);
			$extensions = array('.png', '.gif', '.jpg', '.jpeg', '.pdf','.mp3');
			$extension = strrchr($_FILES['fichier']['name'], '.'); 
			//Début des vérifications de sécurité...
			if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
			{
			     $err = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt,mp3 ou doc...';
			}
			if($taille>$taille_maxi)
			{
			     $err = 'Le fichier est trop gros...';
			}
			if(!isset($err)) //S'il n'y a pas d'erreur, on upload
			{	
			     //On formate le nom du fichier ici...
			     $fichier = strtr($fichier, 
			          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
			          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
			     $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
			     if(move_uploaded_file($_FILES['fichier']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
			     {
			          $err = 'Votre fichier a été envoyé avec succès !';
					  $Oeuvre->insererOeuvre($_POST["nomOeuvre"],$_POST["dateoeuvre"],$genreO,' ', $fichier);
					  $idO = $Oeuvre->verifOeuvre($_POST["nomOeuvre"]);
					  $Ecrit = new Ecrit();
					  $artisteO=$artisteO["ID_ARTISTE"];
					  $ecrit = $Ecrit->insererEcrit($idO["ID_OEUVRE"],$artisteO);
					  $Post = new Post();
					  if ($_POST["groupe"]!="")
					  {
					 	$Post->setPost($_SESSION["utilisateur"]["id"],$_POST["groupe"],$idO["ID_OEUVRE"]);	
					  }
					  $Post->setPost($_SESSION["utilisateur"]["id"],0,$idO["ID_OEUVRE"]);
			     }
			     else //Sinon (la fonction renvoie FALSE).
			     {
			          $err =  'Echec de l\'upload !';
			     }
			}
		}
	}

	require_once (APP . 'app/view/templates/header.php');
	require_once (APP . 'app/view/ajouter/index.php');
?>