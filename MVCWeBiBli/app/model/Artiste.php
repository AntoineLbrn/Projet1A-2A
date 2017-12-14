<?php
	class Artiste
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

	    public function getAllArtiste()
	    {
	    	$sql = "SELECT * FROM Artiste";
			$query = $this->db->prepare($sql);
			$query->execute();
			return $query->fetchAll();
	    }
	    public function verifArtiste($artiste)
	    {
			$sql = "SELECT ID_ARTISTE FROM artiste where NOM_ARTISTE ='" . $artiste ."'";
			$query = $this->db->prepare($sql);
			$query->execute();
			return $query->fetch();	    	
	    }
	    public function insererArtiste($artiste)
	    {
			$sql = "INSERT INTO artiste (NOM_ARTISTE) values ('" . $artiste ."')";
			$query = $this->db->prepare($sql);
			$query->execute();
	    }	  
	    public function getArtiste($id)
	    {
			$sql = "SELECT NOM_ARTISTE FROM artiste where ID_ARTISTE ='" . $id ."'";
			$query = $this->db->prepare($sql);
			$query->execute();
			return $query->fetch();	    	
	    }  
	}
?>