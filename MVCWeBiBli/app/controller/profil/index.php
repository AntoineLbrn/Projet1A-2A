<?php

require_once (APP . 'app/model/Genre.php');
require_once (APP . 'app/model/Oeuvre.php');
require_once (APP . 'app/model/Post.php');
require_once (APP . 'app/model/Appartient.php');
require_once (APP . 'app/model/groupe.php');

/* Affichage des Oeuvres */
$Post = new Post();

$oeuvres = $Post->getOeuvreAvecIdUserInventaire($_SESSION["utilisateur"]["id"]);
$Genre = new Genre();


$tab= array();
$i=0;
foreach ($oeuvres as $oeuvre)
{
  $genre = $Genre->getGenre($oeuvre["ID_genre"]);
  $tab[$i]["nom"] = $oeuvre["NOM"];
  $tab[$i]["editeur"] = $oeuvre["EDITEUR"];
  $tab[$i]["date"] = date("d/m/Y", strtotime($oeuvre["DATESORTIE"]));
  $tab[$i]["genre"] = $genre["libellé"];
  $i=$i + 1;
}

/* Fin de l'affichage des Oeuvres */

/* Affichage des groupes */

$Appartient = new Appartient();
$idGroupes = $Appartient->getIdGroupeParIdUtilisateur($_SESSION["utilisateur"]["id"]);

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
  require_once (APP . 'app/view/profil/index.php');  
  
  require_once (APP . 'app/view/templates/footer.php');
?>