<html>


<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	
	

	<div class="panel panel-default col-lg-4 col-lg-offset-4" style="margin-top: 10vh;">

		<div class="panel-heading"><h4>Ajoutez votre insrument</h4></div>
		<center>
			<div class="panel-body">
				<form method="post" action="" enctype="multipart/form-data">
					<select name="choixInstrument">

						<?php

						foreach ($allInstruments as $instrument) {

							if ( $instrument['ID_instrument'] == $idInstrumentActuel )
							{
								echo ' <option value="' . $instrument['libellé'] . '" selected>' . $instrument['libellé'] . '</option>';
							}
							else
							{
								echo ' <option value="' . $instrument['libellé'] . '">' . $instrument['libellé'] . '</option>';
							}

						}

						?>

					</select>    
					<br><br>
					<input type="submit" name ="submit" class="btn btn-primary"> 
					<br><br>
					 <?php  echo '<a href="index.php?url=interfaceGroupe&idGroupe=' . $_GET["idGroupe"] . '" class="btn btn-success"> Retour au menu </a>'; ?>
					
				</form>               
			</div>
		</center>
	</div>	



</body>





</html>