<html>


<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	
	

	<div class="panel panel-default col-lg-4 col-lg-offset-4" style="margin-top: 10vh;">

		<div class="panel-heading"><h4>Editez votre oeuvre</h4></div>
		<center>
			<div class="panel-body">
				<form method="post" action="" enctype="multipart/form-data">

					<table class="table">
						<thead>
							<tr class="filters">
								<th class="col-lg-4"><input type="text" class="form-control" placeholder="Titre" disabled></th>
								<th class="col-lg-4"><input type="text" class="form-control" placeholder="Genre" disabled></th>
								<th class="col-lg-3"><input type="text" class="form-control" placeholder="Date" disabled></th>
							</tr>
						</thead>
						<tbody>

							<tr>

								<td>
									<input text class="form-control" name="nomOeuvre" placeholder="<?php echo $oeuvre[0]['NOM']; ?>" value="<?php echo $oeuvre[0]['NOM'];?>">
								</td>

								<td>
									<select name="choixGenre" class="form-control">

										<?php

										foreach ($allGenre as $genre) {

											

											if ( $genre['ID_genre'] == $genreActuel['ID_genre'] )
											{
												echo ' <option value="' . $genre['ID_genre'] . '" selected >' . $genre['libellé'] . '</option>';
											}
											else
											{
												echo ' <option value="' . $genre['ID_genre'] . '" >' . $genre['libellé'] . '</option>';
											}

										}

										?>

									</select>    
								</td>

								<td>
									<input text class="form-control" name="date" placeholder="<?php echo $date; ?>"  value="<?php 
									if(isset($dateUpdate))
									{
										echo date("d/m/Y", strtotime($dateUpdate));
									}  
									else
									{
										echo $date;
									}
									?>">
								</td>

							</tr>										

						</tbody>
					</table>

					<?php if (isset($err))
					{
					?>
						<div class="alert alert-danger" style="margin-top: 5px;">
														<?php echo '<strong>Attention!</strong> ' . $err ?>
						</div>
					<?php	
					}
					?>
					
					<br><br>
					<input type="submit" name ="submit" class="btn btn-primary"> 
					<br><br>
					<a href="index.php?url=inventaire" class="btn btn-success"> Retour au menu </a>
					
				</form>               
			</div>
		</center>
	</div>	



</body>





</html>