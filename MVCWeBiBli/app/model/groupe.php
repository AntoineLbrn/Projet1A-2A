<?php
class Groupe
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
			function getGroupeRecherche($groupe){
				$sql = "SELECT * FROM GROUPE join APPARTIENT using(ID_GROUPE) join Utilisateur using(ID_UTILISATEUR) where nom_groupe like '%".$groupe ."%'";
				$query = $this->db->prepare($sql);
				$query->execute();
				return $query->fetchAll();
			}
			function getAllGroupe()
			{
				$sql = "SELECT * FROM GROUPE join APPARTIENT using(ID_GROUPE) join Utilisateur using(ID_UTILISATEUR)";
				$query = $this->db->prepare($sql);
				$query->execute();
				return $query->fetchAll();
			}
			function ajouterGroupe($nom,$mdp,$statut)
			{
				$max = $this->getMaxId();
				$max = $max["MAX"];
				$sql1 = "INSERT INTO `GROUPE` (`ID_GROUPE`,`NOM_GROUPE`, `mot_de_passe`,`STATUT_GROUPE`) VALUES ('$max','$nom','$mdp','$statut')";
				$sql2 = "INSERT INTO `APPARTIENT`(`ID_GROUPE`,`ID_UTILISATEUR`,`rang`) VALUES ('$max','".$_SESSION["utilisateur"]["id"]."',1)";
				$query1 = $this->db->prepare($sql1);
				$query2 = $this->db->prepare($sql2);
				$query1->execute();
				$query2->execute();
				return 1;
			}
			function getMaxId(){
				$sql = "SELECT MAX(ID_GROUPE)+1 as MAX FROM GROUPE";
				$query = $this->db->prepare($sql);
				$query->execute();
				return $query->fetch();
			}
			function rejoindreGroupe($groupe)
			{
				$id = $this->getId($groupe);
				$sql = "INSERT INTO `APPARTIENT`(`ID_GROUPE`,`ID_UTILISATEUR`,`rang`) VALUES ('$id','" . $_SESSION["ID_UTILISATEUR"] . "',0)";

				$query = $this->db->prepare($sql);
				$query->execute();
			}
			function getId($groupe){
				$sql = "SELECT ID_GROUPE FROM GROUPE where nom_groupe = '".$groupe."'";
				$query = $this->db->prepare($sql);
				$query->execute();
				$query->fetchAll();
				foreach ($query as $value)
	        	{
	        		$id = $value["ID_GROUPE"];
	        	}
	        	return $id;
			}

			function getNomGroupe($idGroupe){
				$sql = "SELECT NOM_GROUPE FROM GROUPE where ID_GROUPE = " . $idGroupe;
				$query = $this->db->prepare($sql);
				$query->execute();
				return $query->fetchAll();
			}


		}
?>