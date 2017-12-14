<?php
	class Post
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

	    function getOeuvreAvecIdUser($id)
	    {
			$utilisateur = $this->db->query("select * from Oeuvre where ID_OEUVRE in
				(
					SELECT ID_OEUVRE FROM post WHERE ID_UTILISATEUR=$id
				)
				");
			return $utilisateur->fetchall();
	    }
	    function setPost($utilisateur,$groupe,$oeuvre)
	    {
			$sql = "INSERT INTO post (ID_UTILISATEUR,ID_GROUPE,ID_OEUVRE) values (" . $utilisateur ."," . $groupe ."," . $oeuvre .")";
			$query = $this->db->prepare($sql);
			$query->execute();				    	
	    }

	   

	   
	    
	}
?>