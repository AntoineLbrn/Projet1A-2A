<?php
	session_start();
	define('APP', dirname(__DIR__) . DIRECTORY_SEPARATOR);
	define('BDD', 'mlr9');
	echo('<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />');

	if (!isset($_SESSION["utilisateur"]["id"]) || !isset ($_GET["url"]))
	{
		require_once(APP.'app/controller/login/index.php');
	}
	else
	{
		require_once(APP.'app/controller/' . $_GET["url"].'/index.php');
	}


?>