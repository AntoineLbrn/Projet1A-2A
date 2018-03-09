<html>


<head>
	<meta charset="utf-8">
	<script src="js/jsTri.js"></script>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript">
		function ouvre()
		{
			window.open("tchat?id=<?php echo $_GET['idGroupe'] ?>",'fenetre','width=650,height=500');
		}
	</script>
	
	<style>
		.checked {
			color: orange;
		}

		.modal-body
		{

			padding : 15px;

		}
		.navbar
		{
			z-index:2;
		}
		.navbar-fixed-left {
			width: 11vw;
			position: fixed;
			border-radius: 0;
			height: 100%;
			margin-top: 3vh;
			margin-left:-1.2vw;
		}

		.navbar-fixed-left .navbar-nav > li {
			float: none;  /* Cancel default li float: left */
			width: 139px;
		}

		.navbar-fixed-left + .container {
			padding-left: 160px;
		}

		/* On using dropdown menu (To right shift popuped) */
		.navbar-fixed-left .navbar-nav > li > .dropdown-menu {
			margin-top: -50px;
			margin-left: 140px;
		}
		.dropdown
		{
			margin-top: 0.5vh;
		}

	</style>
	<title></title>
</head>
<body>
	<div class="row row-offcanvas row-offcanvas-left">
		<div class="navbar navbar-inverse navbar-fixed-left">
			<span class="navbar-brand" ><?php echo $nomGroupe[0]["NOM_GROUPE"]; ?></span>
			<ul class="nav navbar-nav">
				<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"> <?php echo $chefOrchestre[0]["NOM_UTILISATEUR"] . ' ' . $chefOrchestre[0]["PRENOM_UTILISATEUR"] ; ?> <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><strong style="margin-left: 1vw">Chef d'orchestre</strong></li>
						<li><a href="index.php?url=messagerie&amp;idUtilisateur=<?php echo $chefOrchestre[0]['ID_UTILISATEUR'] ?> ">Ouvrir la conversation</a></li>
						<li><a href="index.php?url=profil&amp;idUtilisateur=<?php echo $chefOrchestre[0]['ID_UTILISATEUR'];?>">Voir profil</a></li>
					</ul>
				</li>
				<?php
				foreach ($Utilisateurs as $resultat)
				{
					if($chefOrchestre[0]["ID_UTILISATEUR"] != $resultat["ID_UTILISATEUR"])
					{
						$idInstrument = $Appartient->getIdInstrumentParIdUtilisateurEtIdGroupe($resultat['ID_UTILISATEUR'],$_GET["idGroupe"]);

						echo '<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">' . $resultat["NOM_UTILISATEUR"] . ' ' . $resultat["PRENOM_UTILISATEUR"] . '<span class="caret"></span></a>';

						echo '<ul class="dropdown-menu" role="menu">';

						echo '<li><strong style="margin-left: 1vw">';

						if ( $idInstrument[0]["ID_INSTRUMENT"] == 0)
						{
							echo "Non Renseigné";
						}
						else
						{
							$instrument = $Instrument->getInstrumentParId($idInstrument[0]["ID_INSTRUMENT"]);
							echo $instrument[0]["libellé"];

						}
						echo '</strong></li>';

						echo '<li><a href="index.php?url=messagerie&amp;idUtilisateur='. $resultat["ID_UTILISATEUR"] . '">Ouvrir une conversation</a></li>';

						echo '<li><a href="index.php?url=profil&amp;idUtilisateur=' . $resultat["ID_UTILISATEUR"] . '">Voir profil</a></li>';

						if (  $_SESSION["utilisateur"]["id"] == $chefOrchestre[0]["ID_UTILISATEUR"] )
						{
							echo '<li class="divider"></li>';

							echo '<li><a href="index.php?url=interfaceGroupe&amp;idUtilisateur=' . $resultat['ID_UTILISATEUR'] . '&amp;idGroupe=' . $nomGroupe[0]["ID_GROUPE"] . '">Exclure du groupe</a></li>';
						}

						echo '</ul>';

						echo '</li>';
					}
				}


				?>	   
				<div>
				</ul>
			</div>



			<div class="wrapper" style="margin-left: 11vw">



				<div class="full col-sm-9">

					<center><h1 style="margin-bottom: 7vh;"><?php echo $nomGroupe[0]["NOM_GROUPE"]; ?></h1></center>

					<!-- content -->
					
					<?php
					if (  $_SESSION["utilisateur"]["id"] == $chefOrchestre[0]["ID_UTILISATEUR"] )
					{
						echo							"<a   href='index.php?url=interfaceGroupe&amp;idGroupe=";
						echo $nomGroupe[0]["ID_GROUPE"];
						echo "&amp;AjouterEvenement=1' class='btn btn-default' role='button'>Ajouter un évènement</a>";
					}
					?>

					<?php 
					foreach ($evenements as $value)
						{?>
					<div class="panel panel-default">
						<a style="float:right; margin:.1vw;" href="index.php?url=interfaceGroupe&amp;idGroupe=<?php echo $nomGroupe[0]['ID_GROUPE']; ?>&amp;idEvenement=<?php echo $value['ID_EVENEMENT']; ?>"  class="glyphicon glyphicon-remove btn btn-danger" role="button"></a>
						<div class="panel-heading" style="text-align: center">
							<h4><b><?php echo date("d/m/y",strtotime($value["date_evenement"])) ; ?></b> : <?php echo $value["libelle"] ;?></h4>
						</div>
					</div>	
					<?php } ?>

					<!-- main col left -->
					<div class="col-sm-5">

						<!-- Trigger the modal with a button -->




						<div class="panel panel-default">

							<div class="panel-body">

								<p class="lead">Identité du groupe</p>

								<div class="col-lg-7">


									<table class="table">

										<tbody>



											<tr>
												<hr>
												<p> Nom du groupe :   <?php echo $nomGroupe[0]["NOM_GROUPE"]; ?></p> <!--<?php echo $donnees['PRENOM_UTILISATEUR']; ?>-->
											</tr>
											<tr>
												<hr>
												<p> Chef d'orchestre :  <?php echo $chefOrchestre[0]["NOM_UTILISATEUR"] . ' ' . $chefOrchestre[0]["PRENOM_UTILISATEUR"] ; ?></p>
											</tr>
											<tr>
												<hr>
												<p> Mail :  <?php echo $chefOrchestre[0]["EMAIL"]; ?></p> <!--<?php echo $donnees['PRENOM_UTILISATEUR']; ?>-->
											</tr>

											<tr>


												<hr>
											</tr>



										</tbody>
									</table>
								</div>

								<img src="http://icons.iconarchive.com/icons/artua/dragon-soft/512/User-icon.png" width="200px;" height="200px";>



							</div>
						</div>

						<div class="panel panel-default">

							<div class="panel-body">

								<p class="lead">Serveur de discussion</p>

								<div class="col-lg-7" id="chat">

									<?php


									try
									{
										$bdd = new PDO('mysql:host=localhost;dbname=mlr9;charset=utf8', 'root', '');
									}
									catch(Exception $e)
									{
										die('Erreur : '.$e->getMessage());
									}

									if(isset($_GET['idGroupe']))$id = $_GET['idGroupe'] ;


									$reponse = $bdd->prepare("SELECT pseudo, message, groupe FROM minichat where groupe = $id order by ID DESC LIMIT 0,15");
									$reponse->execute();

									while ($donnees = $reponse->fetch())
									{




										echo '<p><strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> : ' . htmlspecialchars($donnees['message']) . '</p>';
									}


									$reponse->closeCursor();

									?>

									<input type="button" class="btn btn-primary" onclick="ouvre()" value="Participer à la discussion">

								</div>

							</div>
						</div>


					</div>

					<!-- main col right -->
					<div class="col-sm-7">
						<div class="panel panel-default">
							<div class="panel-heading"><a href="index.php?url=interfaceGroupe&amp;idGroupe=<?php echo $nomGroupe[0]['ID_GROUPE'];?>&amp;ajouter=1" class="pull-right btn btn-default" role="button">Ajouter un utilisateur au groupe</a> <h4>Utilisateurs</h4></div>
							<div class="panel-body">

								<table class="table table-hover" id="myTable">
									<thead>
										<tr class="filters">
											<th class="col-lg-2" style="cursor:pointer" onclick="sortTable(0)">Nom</th>
											<th class="col-lg-2" style="cursor:pointer" onclick="sortTable(1)">Prenom</th>
											<th class="col-lg-3" style="cursor:pointer" onclick="sortTable(2)">Instrument</th>
											<th class="col-lg-2">Editer</th>
										</tr>
									</thead>
									<tbody>

										<?php

										foreach ($Utilisateurs as $resultat)
										{

											$idInstrument = $Appartient->getIdInstrumentParIdUtilisateurEtIdGroupe($resultat['ID_UTILISATEUR'],$_GET["idGroupe"]);

											echo '<tr>';

											echo '<td>';

											echo $resultat["NOM_UTILISATEUR"];

											echo '</td>';

											echo '<td>';

											echo $resultat["PRENOM_UTILISATEUR"];

											echo '</td>';

											echo '<td>';

											if ( $idInstrument[0]["ID_INSTRUMENT"] == 0)
											{
												echo "Non Renseigné";
											}
											else
											{
												$instrument = $Instrument->getInstrumentParId($idInstrument[0]["ID_INSTRUMENT"]);
												echo $instrument[0]["libellé"];

											}



											echo '</td>';

											echo '<td>';

											if( $_SESSION["utilisateur"]["id"] == $resultat["ID_UTILISATEUR"])
											{
												echo '<form method="post" action="" enctype="multipart/form-data">';

												echo '<center><span class="input-group-btn"><button class="btn btn-lg btn-primary" name="ajouterInstu" type="submit"><span class="glyphicon glyphicon-pencil"></span></button></span></center>';

												echo '</form>';
											}



											echo '</td>';



											echo '</tr>';   

										}


										?>

									</tbody>
								</table>


							</div>
						</div>

						<div class="panel panel-default">
							<div class="panel-heading">
								<div class="pull-right" class="dropdown show">
									<div class="dropdown">
										<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											Ajouter une oeuvre
										</button>
										<div  class="dropdown-menu" aria-labelledby="dropdownMenuButton">
											<a  style="width:2vw;" href="index.php?url=interfaceGroupe&amp;idGroupe=<?php echo $nomGroupe[0]['ID_GROUPE']; ?>&amp;inventaire=1" class="dropdown-item" href="#"> Depuis l'inventaire</a><br>
											<a class="dropdown-item" href="index.php?url=ajouter&amp;groupe=<?php echo $nomGroupe[0]['ID_GROUPE']; ?>"> Nouvelle Oeuvre</a>
										</div>
									</div>

								</div>

								<h4>Oeuvres</h4>
							</div>
							<div class="panel-body">

								<form method="post" action="">

									<table class="table table-hover" id="myTable1">
										<thead>
											<tr class="filters">
												<th class="col-lg-2" style="cursor:pointer" onclick="sortTable1(0)">Titre</th>
												<th class="col-lg-2" style="cursor:pointer" onclick="sortTable1(1)">Instrument</th>
												<th class="col-lg-2" style="cursor:pointer" onclick="sortTable1(2)">Genre</th>
												<th class="col-lg-1">Aperçu</th>
												<th class="col-lg-2">Ajouter inventaire</th>
												<th class="col-lg-2">Difficulté</th>

											</tr>
										</thead>
										<tbody>

											<?php




											foreach ($Oeuvres as $resultat)
											{

												$oeuvre = $Oeuvre->getOeuvresAvecID($resultat["ID_OEUVRE"]);

												$utilisateur = $Utilisateur->getUtilisateurParId($resultat["ID_UTILISATEUR"]);

												$libelleGenre = $Genre->getGenre($oeuvre[0]["ID_genre"]);

												$instrument = $Instrument->getInstrumentParId($oeuvre[0]['ID_INSTRUMENT']);

												echo '<tr>';

												echo '<td';

												if($oeuvre[0]['ID_INSTRUMENT'] != 0)
												{
													if ($instrument[0]["ID_instrument"] != $instrumentSession[0]["ID_INSTRUMENT"])
													{
														echo ' style="color: #999999"';
													}
												}
												else
												{
													echo ' style="color: #999999"';
												}

												
												echo '>';

												echo $oeuvre[0]["NOM"];

												echo '</td>';

												echo '<td>';

												if($oeuvre[0]['ID_INSTRUMENT'] != 0)
												{
													echo $instrument[0]["libellé"];
												}
												else
												{
													echo 'Non Renseigné';
												}

												


												//echo $oeuvre[0]['ID_INSTRUMENT'];

												//var_dump($instrument);

												echo '</td>';

												echo '<td>';

												echo $libelleGenre["libellé"];

												echo '</td>';

												echo '<td>';

												echo "<center><a class='glyphicon glyphicon-eye-open' href='upload/" . $oeuvre[0]["URL"] ."'></center>";

												echo '</td>';

													/*echo '<td>';

													echo "<center><a class='glyphicon glyphicon-download-alt' href='upload/" . $oeuvre[0]["URL"] ."' download></center>";

													echo '</td>';*/

													$verifOeuvreDejaPresenteInventaire = $Post->testOeuvrePresenteInventaire($resultat['ID_OEUVRE'], $_SESSION["utilisateur"]["id"]);


													echo '<td>';
													if ($verifOeuvreDejaPresenteInventaire[0]['present']=='0')
													{
														
														

														echo '<center><button type="submit" class="btn btn-primary" name=\'ajouterInventaire\' value=" ' . $resultat['ID_OEUVRE']  . '"><i class="glyphicon glyphicon-plus"></i></button></center>';

														
													}

													echo '</td>';




													/*if ( $idInstrument[0]["ID_INSTRUMENT"] == 0)
													{
														echo "Non Renseigné";
													}
													else
													{
														$instrument = $Instrument->getInstrumentParId($idInstrument[0]["ID_INSTRUMENT"]);
														echo $instrument[0]["libellé"];
														
													}

													

													echo '</td>';*/

													echo '<td>';

													if (  $_SESSION["utilisateur"]["id"] == $chefOrchestre[0]["ID_UTILISATEUR"] )
													{
														echo '<a href="index.php?url=interfaceGroupe&amp;idGroupe=' . $nomGroupe[0]["ID_GROUPE"] . '&amp;EditerDifficulte=' . $resultat['ID_OEUVRE'] . '">';

														for($i = 0; $i < $oeuvre[0]['DIFFICULTE']; $i++)
														{
															echo '<span class="fa fa-star checked"></span>';
														}

														for($i = 5; $i > $oeuvre[0]['DIFFICULTE']; $i--)
														{
															echo '<span class="fa fa-star"></span>';
														}

														echo '</a>';
													}
													else
													{
														for($i = 0; $i < $oeuvre[0]['DIFFICULTE']; $i++)
														{
															echo '<span class="fa fa-star checked"></span>';
														}

														for($i = 5; $i > $oeuvre[0]['DIFFICULTE']; $i--)
														{
															echo '<span class="fa fa-star"></span>';
														}
													}

													

													
													



													echo '</td>';


													echo '</tr>';  

													//var_dump($utilisateur); 

												}

												
												?>

											</tbody>
										</table>

									</form>


								</div>

							</div>

						</div><!-- /col-9 -->

					</div><!-- /padding -->

				</div>
				<!-- /main -->

			</div>
		</div>
	</div>

</body>
<script type="text/javascript" src="js/script.js\"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



</html>
