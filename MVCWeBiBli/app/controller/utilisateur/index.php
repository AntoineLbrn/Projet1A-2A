<?php
	
require_once (APP . 'app/model/Utilisateur.php');
require_once (APP . 'app/model/Appartient.php');
require_once (APP . 'app/model/Groupe.php');

$Utilisateur = new Utilisateur();

$idUtilisateur = $Utilisateur->getUtilisateurParId($_GET['id']);


/* Affichage des groupes */

$Appartient = new Appartient();
$idGroupes = $Appartient->getIdGroupeParIdUtilisateur($_GET['id']);

$Groupe = new Groupe();


$nomGroupes = array();
$j=0;


foreach ($idGroupes as $idGroupe)
{
	
	$groupe = $Groupe->getNomGroupe($idGroupe['ID_GROUPE']);
	//echo '<font color="green"> var dump attention </font>';

  if (!empty($groupe[0][0]))
  {
    $nomGroupes[$j]['nomGroupe'] = $groupe[0][0];
  }
	
  //var_dump($groupe);

	$j = $j+1;
}
/* Fin de l'affichage des Groupes */



	require_once (APP . 'app/view/templates/header.php');
	require_once (APP . 'app/view/utilisateur/index.php');	
	require_once (APP . 'app/view/templates/footer.php');

?>