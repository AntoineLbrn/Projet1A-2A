<?php

	require_once (APP . 'app/model/Oeuvre.php');
	require_once (APP . 'app/model/Groupe.php');
	require_once (APP . 'app/model/Genre.php');
	require_once (APP . 'app/model/Artiste.php');
	require_once (APP . 'app/model/Ecrit.php');

	$Oeuvre = new Oeuvre();
	$Genre = new Genre();
	$Artiste = new Artiste();
	$Ecrit = new Ecrit();
	$oeuvres = $Oeuvre->getAllOeuvres();
	foreach ($oeuvres as $oeuvre)
	{
		$artistes = $Ecrit->getArtistes($oeuvre["ID_OEUVRE"]);
		$genre = $Genre->getGenre($oeuvre["ID_genre"]);
		echo ("N° d'oeuvre :" . $oeuvre["ID_OEUVRE"] . " L'oeuvre s'appelle :" . $oeuvre["NOM"] . ". Son auteur est ");
			foreach ($artistes as $artiste)
			{
				$nom = $Artiste->getArtiste($artiste["ID_ARTISTE"]);
				echo $nom["NOM_ARTISTE"];
			}
			echo(". Son genre est : " . $genre["libellé"] . "  ". "vous pouvez la récupérer <a href='upload/" . $oeuvre["URL"] . "'> à cette adresse</a> </br>");
	}
	var_dump($oeuvres);
