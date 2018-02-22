    
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />


        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script> 
        <script>

var stop = false;

function setStop(state){
	stop = state;
}

function refresh_div()

{

if(stop == true) return;

var xhr_object = null;

if(window.XMLHttpRequest)

{ // Firefox

xhr_object = new XMLHttpRequest();

}

else if(window.ActiveXObject)

{ // Internet Explorer

xhr_object = new ActiveXObject('Microsoft.XMLHTTP');

}

var method = 'GET';

var filename = 'tchat?id=<?php echo $_GET['id'];?>';

xhr_object.open(method, filename, true);

xhr_object.onreadystatechange = function()

{

if(xhr_object.readyState == 4)

{

var tmp = xhr_object.responseText;

document.getElementById('tchat').innerHTML = tmp;

}

}


xhr_object.send(null);

setTimeout('refresh_div()', 200);

}

</script>

</head>
<body onload="refresh_div()">


<?php

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=mlr9;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}


if(isset($_GET['id']))$id = $_GET['id'] ;


$reponse = $bdd->prepare("SELECT pseudo, message, groupe FROM minichat where groupe = $id order by ID DESC LIMIT 0,15");
$reponse->execute();

  while ($donnees = $reponse->fetch())
  {
?>
  <div id="tchat">

<?php

	echo '<p><strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> : ' . htmlspecialchars($donnees['message']) . '</p>';
}

?>

  </div>

<?php 

$reponse->closeCursor();

?>
</body>

      <form action="" method="post">
     
        <label for="message">Message</label> :  <input type="text" name="message" id="message" onmouseenter="setStop(true)" onmouseleave="setStop(false)" /><br />

        <input type="submit" value="Envoyer" onclick="setStop(false)" />

      </form>

</html>

<?php 

    $pseudo = $_SESSION['utilisateur']['nom']." ".$_SESSION['utilisateur']['prenom'];

		if(isset($_POST['message']) && isset($_GET['id'])){
			$Groupe->putMessage($pseudo,$_POST['message'],$_GET['id']);
		}
?>