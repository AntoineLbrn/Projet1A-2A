<?php
	class Oeuvre
	{

	   private $db;

	    function __construct()
	    {
	        try
	        {
				$this->db = new PDO('mysql:host=localhost;dbname='. BDD . ';charset=utf8', 'root', '');

				$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

	        } catch (PDOException $e)
	        {
	            exit('Connexion à la base de donnée impossible');
	        }
	    }

	   public function InsererOeuvre($NOM,$DATESORTIE,$ID_GENRE,$EDITEUR,$URL)
	   {
			$sql = "INSERT INTO oeuvre (NOM,DATESORTIE,ID_genre,EDITEUR,URL) values ('" . $NOM ."','" . date('Y-m-d', strtotime(str_replace('-', '/', $DATESORTIE))) ."', '" . $ID_GENRE ."', '" . $EDITEUR ."', '" . $URL ."' )";
			$query = $this->db->prepare($sql);
			$query->execute();	   	
	   }
	   public function verifOeuvre($oeuvre)
	   {
			$sql = "SELECT ID_OEUVRE FROM oeuvre where NOM ='" . $oeuvre ."'";
			$query = $this->db->prepare($sql);
			$query->execute();
			return $query->fetch();	    	
	   }
	   public function getAllOeuvres()
	   {
			$sql = "SELECT * from oeuvre";
			$query = $this->db->prepare($sql);
			$query->execute();
			return $query->fetchall();	    	   		
	   }

	   public function getOeuvresAvecID($id)
	   {
	   		$sql = "SELECT * from oeuvre where ID_OEUVRE=$id";
			$query = $this->db->prepare($sql);
			$query->execute();
			return $query->fetchall();
	   }
	}
?>