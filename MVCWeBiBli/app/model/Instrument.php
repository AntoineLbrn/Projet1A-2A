<?php
class Instrument
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

	public function getInstruments()
	{
		$sql = "SELECT * FROM `instrument`";
		$query = $this->db->prepare($sql);
		$query->execute();
		return $query->fetchall();
	}

	public function getInstrumentParId($id)
	{
		$sql = "SELECT * FROM `instrument` WHERE `ID_instrument` = $id";
		$query = $this->db->prepare($sql);
		$query->execute();
		return $query->fetchall();
	}

	public function getInstrumentParLibelle($libelle)
	{
		$sql = "SELECT * FROM `instrument` WHERE `libellé` = '" . $libelle . "'";
		$query = $this->db->prepare($sql);
		$query->execute();
		return $query->fetchall();
	}
	

	 
}
?>