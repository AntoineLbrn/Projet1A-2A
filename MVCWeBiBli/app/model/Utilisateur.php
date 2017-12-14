<?php
	class Utilisateur
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

	    function setUtilisateur($mail,$password,$nom,$prenom)
	    {
	    	$this->db->exec("INSERT INTO `utilisateur`(`NOM_UTILISATEUR`, `PRENOM_UTILISATEUR`,`MOTDEPASSE`,`EMAIL`,`DATE_INSCRIPTION`) VALUES ('$nom','$prenom', '$password', '$mail',sysdate())");
	    }

	    function getUtilisateur()
	    {
			$utilisateur = $this->db->query("SELECT * FROM utilisateur");
			return $utilisateur;
	    }
	    function getUtilisateurNonValide()
	    {
			$utilisateur = $this->db->query("SELECT * FROM utilisateur where RANG_UTILISATEUR=0");
			return $utilisateur;	    	
	    }
	    function upgradeUtilisateurs($ids)
	    {
    		$updt = $this->db->prepare("UPDATE utilisateur SET RANG_UTILISATEUR=1 WHERE ID_UTILISATEUR=:valeur;");
    		foreach ($ids as $value)
    		{   
    			$updt->bindParam(':valeur', $value);
    			$updt->execute();
    		}
    	}
    	function deleteUtilisateurs($ids)
    	{
   			$dlt = $this->db->prepare("DELETE from utilisateur WHERE ID_UTILISATEUR=:valeur;");
    		foreach ($ids as $value)
    		{   
    			$dlt->bindParam(':valeur', $value);
    			$dlt->execute();
    		}
    	}

    	function getUtilisateurParId($idUtilisateur)
	    {
			
			$sql = "SELECT * FROM utilisateur WHERE ID_UTILISATEUR=" . $idUtilisateur;
				$query = $this->db->prepare($sql);
				$query->execute();
				return $query->fetchAll();
	    }
	}
?>