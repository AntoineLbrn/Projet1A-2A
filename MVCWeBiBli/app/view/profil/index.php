<html>


<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css" />
	<link rel="stylesheet" type="text/css" href="../style/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="../style/style.css" />
	<title></title>
</head>
<body>

	<div class="wrapper">
		<div>
			<div class="row row-offcanvas row-offcanvas-left">






				<div class="full col-sm-9">

					<!-- content -->
					<div class="row">

						<!-- main col left -->
						<div class="col-sm-5">

							<div class="panel panel-default">

								<div class="panel-body">

									<p class="lead">Mon Profil</p>

									<div class="col-lg-7">


										<table class="table">

											<tbody>



												<tr>
													<hr>
													<p> Nom :   <?php echo ($utilisateur[0]["NOM_UTILISATEUR"]); ?></p> <!--<?php echo $donnees['PRENOM_UTILISATEUR']; ?>-->
												</tr>
												<tr>
													<hr>
													<p> Prénom :  <?php echo  ($utilisateur[0]["PRENOM_UTILISATEUR"]); ?></p> <!--<?php echo $donnees['PRENOM_UTILISATEUR']; ?>-->
												</tr>
												<tr>
													<hr>
													<p> Mail :  <?php echo ($utilisateur[0]["EMAIL"]); ?></p> <!--<?php echo $donnees['PRENOM_UTILISATEUR']; ?>-->
												</tr>

												<tr>
													<hr>
													<p> Orchestre :

														<?php 

														$i = 0;
														foreach($nomGroupes as $nomGroupe)
														{


															if ($nomGroupe!="Inventaire")
															{
																if ($i != sizeof($nomGroupes)-1)
																{

																	echo  $nomGroupe['nomGroupe']  . ' / ' ;
																	$i = $i+1;

																}
																else
																{

																	echo $nomGroupe['nomGroupe'] ;
																} 
															}  
														}


														?>

													</p>
													<hr>
												</tr>



											</tbody>
										</table>
									</div>

									<center><img src="http://icons.iconarchive.com/icons/artua/dragon-soft/512/User-icon.png" width="200px;" height="200px";></center>

									<!--<br><center><a href="index.php?url=profil&amp;id=<?php echo $_SESSION['utilisateur']['id']; ?>&amp;photo=1">Modifier la photo</a></center>-->


								</div>
							</div>

						</div>

						<!-- main col right -->
						<div class="col-sm-7">


							<div class="panel panel-default">
								<div class="panel-heading"><a href="index.php?url=inventaire" class="pull-right">Voir tout</a> <h4>Inventaire</h4></div>
								<div class="panel-body">



									<table class="table">
										<thead>
											<tr class="filters">
												<th><input type="text" class="form-control" placeholder="Titre" disabled></th>
												<th><input type="text" class="form-control" placeholder="Genre" disabled></th>
												<th><input type="text" class="form-control" placeholder="Date" disabled></th>
												<th><input type="text" class="form-control"  placeholder="Editeur" disabled></th>

											</tr>
										</thead>
										<tbody>

											<?php

											foreach ($tab as $resultat) {

												echo '<tr>';

												echo '<td>';

												echo $resultat["nom"];

												echo '</td>';

												echo '<td>';

												echo $resultat["genre"];

												echo '</td>';

												echo '<td>';

												echo $resultat["date"];

												echo '</td>';

												echo '<td>';

												echo $resultat["editeur"];

												echo '</td>';

												echo '</tr>';    
											}
											?>

										</tbody>
									</table>


								</div>
							</div>


						</div>
					</div><!--/row-->

				</div><!-- /col-9 -->
			</div><!-- /padding -->
		</div>
		<!-- /main -->

	</div>
</div>
</div>


<!--post modal-->
<div id="postModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				Update Status
			</div>
			<div class="modal-body">
				<form class="form center-block">
					<div class="form-group">
						<textarea class="form-control input-lg" autofocus="" placeholder="What do you want to share?"></textarea>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<div>
					<button class="btn btn-primary btn-sm" data-dismiss="modal" aria-hidden="true">Post</button>
					<ul class="pull-left list-inline"><li><a href=""><i class="glyphicon glyphicon-upload"></i></a></li><li><a href=""><i class="glyphicon glyphicon-camera"></i></a></li><li><a href=""><i class="glyphicon glyphicon-map-marker"></i></a></li></ul>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
<script type="text/javascript" src="js/script.js\"></script>

</html>
