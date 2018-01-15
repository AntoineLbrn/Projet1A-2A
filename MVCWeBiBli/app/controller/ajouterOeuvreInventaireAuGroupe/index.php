<?php
require_once (APP . 'app/model/Groupe.php');
require_once (APP . 'app/model/Oeuvre.php');
require_once (APP . 'app/model/Post.php');

$Groupe = new Groupe();
$Oeuvre = new Oeuvre();
$Post = new Post();

if (isset($_GET['idOeuvre']))
{
	if (isset($_POST['sub']))
	{
		

		if ( isset($_POST['ids']))
		{
			foreach ($_POST['ids'] as $idGroupe) {
				
				$test = $Post->setPost($_SESSION['utilisateur']['id'],$idGroupe,$_GET['idOeuvre']);
			}
		}

	}
	
	$groupes = $Groupe->getGroupeOeuvrePasPresenteParUtilisateur($_SESSION['utilisateur']['id'],$_GET['idOeuvre']);

	$oeuvre = $Oeuvre->getOeuvresAvecID($_GET['idOeuvre']);

	//var_dump($groupes);

	

	
}






require_once (APP . 'app/view/templates/header.php');
require_once (APP . 'app/view/ajouterOeuvreInventaireAuGroupe/index.php');	
require_once (APP . 'app/view/templates/footer.php');


?>