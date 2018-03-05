<html>


<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	
	

	<div class="panel panel-default col-lg-4 col-lg-offset-4" style="margin-top: 10vh;">

		<div class="panel-heading"><h4>Editez la difficulté de la partition : <b><?php echo$oeuvre[0]['NOM']; ?></b> </h4></div>
		<center>
			<div class="panel-body">
				<form method="post" action="" enctype="multipart/form-data">
					<select name="choixDifficulte">

						<?php

						for($i = 1; $i<=5; $i++)
						{
							if ( $i == $oeuvre[0]['DIFFICULTE'])
							{
								echo "<option value=$i selected>$i</option>";
							}
							else
							{
								echo "<option value=$i>$i</option>";
							}
							
						}



												?>

					</select>    
					
					<br><br>
					<input type="submit" name="submit" class="btn btn-primary"> 
					<br><br>
					 <?php  echo '<a href="index.php?url=interfaceGroupe&idGroupe=' . $_GET["idGroupe"] . '" class="btn btn-success"> Retour au menu </a>'; ?>
					
				</form>               
			</div>
		</center>
	</div>	



</body>





</html>