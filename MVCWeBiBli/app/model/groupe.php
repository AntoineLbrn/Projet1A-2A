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
				$sql = "SELECT * FROM GROUPE join APPARTIENT using(ID_GROUPE) 
				join Utilisateur using(ID_UTILISATEUR) where nom_groupe like '%".$groupe ."%'";
				$query = $this->db->prepare($sql);
				$query->execute();
				return $query->fetchAll();
			}
			function getAllGroupe()
			{
				$sql = "SELECT * FROM GROUPE join APPARTIENT using(ID_GROUPE) join Utilisateur using(ID_UTILISATEUR) 
				where RANG = 1 AND ID_GROUPE in (select ID_GROUPE from APPARTIENT 
				where ID_UTILISATEUR = ".$_SESSION["utilisateur"]["id"].")";
				$query = $this->db->prepare($sql);
				$query->execute();
				return $query->fetchAll();
			}
			function ajouterGroupe($nom,$mdp,$statut)
			{
				if($mdp == "" && $statut!=0){
					return "Le champ mot de passe doit etre remplis pour un groupe de ce type";
				}
				if($nom == ""){
					return "Le champ nom ne peux pas etre vide";
				}
				$max = $this->getMaxId();
				$max = $max["MAX"];
				$dispo = $this->existe($nom);
				if($dispo == 0){
					$sql1 = "INSERT INTO `GROUPE` (`ID_GROUPE`,`NOM_GROUPE`, `mot_de_passe`,`STATUT_GROUPE`) VALUES ('$max','$nom','$mdp','$statut')";
					$sql2 = "INSERT INTO `APPARTIENT`(`ID_GROUPE`,`ID_UTILISATEUR`,`rang`) VALUES ('$max','".$_SESSION["utilisateur"]["id"]."',1)";
					$query1 = $this->db->prepare($sql1);
					$query2 = $this->db->prepare($sql2);
					$query1->execute();
					$query2->execute();
					return "Groupe Correctement crée";
				}else{
					return "Le nom de groupe existe deja";
				}
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
				$id = $id["ID_GROUPE"];
				$sql = "INSERT INTO `APPARTIENT`(`ID_GROUPE`,`ID_UTILISATEUR`,`rang`) VALUES ('$id','" . $_SESSION["utilisateur"]["id"]."',0)";
				$query = $this->db->prepare($sql);
				$query->execute();
			}
			function getId($groupe){
				$sql = "SELECT ID_GROUPE FROM GROUPE where nom_groupe = '".$groupe."'";
				$query = $this->db->prepare($sql);
				$query->execute();
				return $query->fetch();
			}

			function getNomGroupe($idGroupe){
				$sql = "SELECT NOM_GROUPE,ID_GROUPE FROM GROUPE where ID_GROUPE = " . $idGroupe;
				$query = $this->db->prepare($sql);
				$query->execute();
				return $query->fetchAll();
			}
			function modifiergroupe($idGroupe,$nom,$mdp,$statut){
				$sql = "UPDATE GROUPE set NOM_GROUPE='".$nom."',mot_de_passe='".$mdp."',
				STATUT_GROUPE='".$statut."' where ID_GROUPE='".$idGroupe."'";
				$query = $this->db->prepare($sql);
				$query->execute();
			}

			function getGroupeARejoindre($id)
			{
				$sql = "SELECT * FROM APPARTIENT join Utilisateur using (ID_UTILISATEUR) join groupe using (ID_GROUPE) where ID_UTILISATEUR <> $id " ;
				$query = $this->db->prepare($sql);
				$query->execute();
				return $query->fetchAll();				
			}
			function testAppartenanceGroupe($idUti,$idGroupe)
			{
				$sql = "SELECT * FROM APPARTIENT where ID_UTILISATEUR = $idUti and ID_GROUPE=$idGroupe" ;
				$query = $this->db->prepare($sql);
				$query->execute();
				return $query->fetchAll();	
			}
			function supprimergroupe($ID){
				$sql = "DELETE FROM GROUPE where ID_GROUPE = $ID";
				$query = $this->db->prepare($sql);
				$query->execute();
				$sql = "DELETE FROM APPARTIENT where ID_GROUPE = $ID";
				$query = $this->db->prepare($sql);
				$query->execute();
			}
			function existe($nom){
				$sql = "SELECT * FROM GROUPE where NOM_GROUPE = UPPER('".$nom."')" ;
				$query = $this->db->prepare($sql);
				$query->execute();
				$result = $query->fetchAll();
				if($query->rowCount()>0){
					return 1;
				}else{
					return 0;
				}
			}
			function retirerDuGroupe($idUtilisateur,$idGroupe)
			{
				$sql = "DELETE FROM APPARTIENT where ID_GROUPE = $idGroupe and ID_UTILISATEUR=$idUtilisateur";
				$query = $this->db->prepare($sql);
				$query->execute();
			}

			function getGroupeOeuvrePasPresenteParUtilisateur($idUtilisateur, $idOeuvre)
			{
				$sql = "SELECT * FROM `groupe` where `ID_GROUPE` in ( select `ID_GROUPE` from appartient where ID_UTILISATEUR=$idUtilisateur) and `ID_GROUPE` not in ( SELECT `ID_GROUPE` FROM `post` where `ID_OEUVRE`=$idOeuvre )" ;
				$query = $this->db->prepare($sql);
				$query->execute();
				return $query->fetchAll();				
			}

			function getEvenements($idGroupe)
			{
				$sql = "SELECT * FROM `evenement` where `ID_GROUPE` = $idGroupe" ;
				$query = $this->db->prepare($sql);
				$query->execute();
				return $query->fetchAll();						
			}

			
		}
?>