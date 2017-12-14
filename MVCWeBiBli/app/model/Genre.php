<?php
	class Genre
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

	    public function getAllGenre()
	    {
	    	$sql = "SELECT * FROM Genre";
			$query = $this->db->prepare($sql);
			$query->execute();
			return $query->fetchAll();
	    }
	    public function verifGenre($genre)
	    {
			$sql = "SELECT ID_GENRE FROM Genre where libellé ='" . $genre ."'";
			$query = $this->db->prepare($sql);
			$query->execute();
			return $query->fetch();	    	
	    }
	    public function insererGenre($genre)
	    {
			$sql = "INSERT INTO Genre (libellé) values ('" . $genre ."')";
			$query = $this->db->prepare($sql);
			$query->execute();
	    }
	    public function getGenre($genre)
	    {
	    	$sql = "SELECT * FROM Genre where ID_GENRE = " . $genre . "";
			$query = $this->db->prepare($sql);
			$query->execute();
			return $query->fetch();	    	
	    }
	}
?>