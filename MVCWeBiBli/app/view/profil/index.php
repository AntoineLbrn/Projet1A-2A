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
								<p> Nom :   <?php echo ($_SESSION["utilisateur"]["nom"]); ?></p> <!--<?php echo $donnees['PRENOM_UTILISATEUR']; ?>-->
						</tr>
						<tr>
							 <hr>
							 <p> Prénom :  <?php echo ($_SESSION["utilisateur"]["prenom"]); ?></p> <!--<?php echo $donnees['PRENOM_UTILISATEUR']; ?>-->
						</tr>
						<tr>
								<hr>
								<p> Mail :  <?php echo($_SESSION["utilisateur"]["email"]); ?></p> <!--<?php echo $donnees['PRENOM_UTILISATEUR']; ?>-->
						</tr>

						<tr>
								<hr>
								<p> Orchestre :

								<?php 

								$i = 0;
								foreach($nomGroupes as $nomGroupe)
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
							 

								?>
									 
								</p>
								<hr>
						</tr>
						
					
								
								</tbody>
						</table>
																</div>

																<img src="http://icons.iconarchive.com/icons/artua/dragon-soft/512/User-icon.png" width="200px;" height="200px";>
																
																<a href="index.php?url=profil&amp;id=<?php echo $_SESSION['utilisateur']['id']; ?>&amp;photo=1">Modifier la photo</a>
																	
																	
																</div>
															</div>


															<div class="panel panel-default">
																<div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Bootstrap Examples</h4></div>
																	<div class="panel-body">
																		<div class="list-group">
																			<a href="http://bootply.com/tagged/modal" class="list-group-item">Modal / Dialog</a>
																			<a href="http://bootply.com/tagged/datetime" class="list-group-item">Datetime Examples</a>
																			<a href="http://bootply.com/tagged/datatable" class="list-group-item">Data Grids</a>
																		</div>
																	</div>
															</div>

															<div class="well">
																	 <form class="form-horizontal" role="form">
																		<h4>What's New</h4>
																		 <div class="form-group" style="padding:14px;">
																			<textarea class="form-control" placeholder="Update your status"></textarea>
																		</div>
																		<button class="btn btn-primary pull-right" type="button">Post</button><ul class="list-inline"><li><a href=""><i class="glyphicon glyphicon-upload"></i></a></li><li><a href=""><i class="glyphicon glyphicon-camera"></i></a></li><li><a href=""><i class="glyphicon glyphicon-map-marker"></i></a></li></ul>
																	</form>
															</div>

															<div class="panel panel-default">
																 <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>More Templates</h4></div>
																	<div class="panel-body">
																		<img src="//placehold.it/150x150" class="img-circle pull-right"> <a href="#">Free @Bootply</a>
																		<div class="clearfix"></div>
																		There a load of new free Bootstrap 3 ready templates at Bootply. All of these templates are free and don't require extensive customization to the Bootstrap baseline.
																		<hr>
																		<ul class="list-unstyled"><li><a href="http://www.bootply.com/templates">Dashboard</a></li><li><a href="http://www.bootply.com/templates">Darkside</a></li><li><a href="http://www.bootply.com/templates">Greenfield</a></li></ul>
																	</div>
															</div>

															<div class="panel panel-default">
																<div class="panel-heading"><h4>What Is Bootstrap?</h4></div>
																<div class="panel-body">
																	Bootstrap is front end frameworkto build custom web applications that are fast, responsive &amp; intuitive. It consist of CSS and HTML for typography, forms, buttons, tables, grids, and navigation along with custom-built jQuery plug-ins and support for responsive layouts. With dozens of reusable components for navigation, pagination, labels, alerts etc..                          </div>
															</div>



													</div>

													<!-- main col right -->
													<div class="col-sm-7">


															 <div class="panel panel-default">
																 <div class="panel-heading"><a href="index.php?url=inventaire" class="pull-right">View all</a> <h4>Inventaire</h4></div>
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

																<div class="well">
																	 <form class="form">
																		<h4>Sign-up</h4>
																		<div class="input-group text-center">
																		<input type="text" class="form-control input-lg" placeholder="Enter your email address">
																			<span class="input-group-btn"><button class="btn btn-lg btn-primary" type="button">OK</button></span>
																		</div>
																	</form>
																</div>


															 <div class="panel panel-default">
																 <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Stackoverflow</h4></div>
																	<div class="panel-body">
																		<img src="//placehold.it/150x150" class="img-circle pull-right"> <a href="#">Keyword: Bootstrap</a>
																		<div class="clearfix"></div>
																		<hr>

																		<p>If you're looking for help with Bootstrap code, the <code>twitter-bootstrap</code> tag at <a href="http://stackoverflow.com/questions/tagged/twitter-bootstrap">Stackoverflow</a> is a good place to find answers.</p>

																		<hr>
																		<form>
																		<div class="input-group">
																			<div class="input-group-btn">
																			<button class="btn btn-default">+1</button><button class="btn btn-default"><i class="glyphicon glyphicon-share"></i></button>
																			</div>
																			<input type="text" class="form-control" placeholder="Add a comment..">
																		</div>
																		</form>

																	</div>
															 </div>

															 <div class="panel panel-default">
																 <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Portlet Heading</h4></div>
																	<div class="panel-body">
																		<ul class="list-group">
																		<li class="list-group-item">Modals</li>
																		<li class="list-group-item">Sliders / Carousel</li>
																		<li class="list-group-item">Thumbnails</li>
																		</ul>
																	</div>
															 </div>

															 <div class="panel panel-default">
																<div class="panel-thumbnail"><img src="/assets/example/bg_4.jpg" class="img-responsive"></div>
																<div class="panel-body">
																	<p class="lead">Social Good</p>
																	<p>1,200 Followers, 83 Posts</p>

																	<p>
																		<img src="https://lh6.googleusercontent.com/-5cTTMHjjnzs/AAAAAAAAAAI/AAAAAAAAAFk/vgza68M4p2s/s28-c-k-no/photo.jpg" width="28px" height="28px">
																		<img src="https://lh4.googleusercontent.com/-6aFMDiaLg5M/AAAAAAAAAAI/AAAAAAAABdM/XjnG8z60Ug0/s28-c-k-no/photo.jpg" width="28px" height="28px">
																		<img src="https://lh4.googleusercontent.com/-9Yw2jNffJlE/AAAAAAAAAAI/AAAAAAAAAAA/u3WcFXvK-g8/s28-c-k-no/photo.jpg" width="28px" height="28px">
																	</p>
																</div>
															</div>

													</div>
											 </div><!--/row-->

												<div class="row">
													<div class="col-sm-6">
														<a href="#">Twitter</a> <small class="text-muted">|</small> <a href="#">Facebook</a> <small class="text-muted">|</small> <a href="#">Google+</a>
													</div>
												</div>

												<div class="row" id="footer">
													<div class="col-sm-6">

													</div>
													<div class="col-sm-6">
														<p>
														<a href="#" class="pull-right">©Copyright 2013</a>
														</p>
													</div>
												</div>

											<hr>

											<h4 class="text-center">
											<a href="http://bootply.com/96266" target="ext">Download this Template @Bootply</a>
											</h4>

											<hr>


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
