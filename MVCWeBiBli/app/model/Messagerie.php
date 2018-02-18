<?php
	class Messagerie
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

	    public function getConversationParUtilisateur($id)
	    {
	    	$sql = "SELECT * FROM messagerie where ID_UTILISATEUR1 = $id or ID_UTILISATEUR2 = $id";
			$query = $this->db->prepare($sql);
			$query->execute();
			return $query->fetchAll();
	    }

	    public function getMessagesParConversation($id)
	    {
	    	$sql = "SELECT * FROM message where ID_CONVERSATION = $id order by heure asc";
			$query = $this->db->prepare($sql);
			$query->execute();
			return $query->fetchAll();	    	
	    }
	    public function insererMessage($idSession,$idCorrespondant,$message,$idConv)
	    {
	    	$date = date('Y-m-d H:i:s');
	    	$sql = "INSERT INTO message (ID_EXPEDITEUR,ID_DESTINATAIRE,LIBELLE,HEURE,ID_CONVERSATION) values ($idSession,$idCorrespondant,'$message',now(),$idConv)";

			$query = $this->db->prepare($sql);
			$query->execute();
	    }
	    public function insererMessagerie($id1,$id2)
	    {
	    	$sql = "INSERT INTO messagerie (ID_UTILISATEUR1,ID_UTILISATEUR2) values ($id1,$id2)";

			$query = $this->db->prepare($sql);
			$query->execute();
	    }
	}
?>