<?php
	class Ecrit
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
	    public function insererEcrit($oeuvre,$artiste)
	    {
			$sql = "INSERT INTO ecrit (ID_OEUVRE,ID_ARTISTE) values (" . $oeuvre .", " .  $artiste . ")";
			$query = $this->db->prepare($sql);
			$query->execute();
	    }
	    public function getArtistes($oeuvre)
	    {
			$artistes = $this->db->query("select ID_ARTISTE from ecrit where ID_OEUVRE=" . $oeuvre);
			return $artistes->fetchall();
	    }	    
	}
?>