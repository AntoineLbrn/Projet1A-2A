<?php
class Appartient
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

			function getIdGroupeParIdUtilisateur($idUtilisateur)
			{
				$sql = "SELECT ID_GROUPE FROM APPARTIENT WHERE ID_UTILISATEUR= " . $idUtilisateur;
				$query = $this->db->prepare($sql);
				$query->execute();
				return $query->fetchAll();
			}
				    
		}
?>