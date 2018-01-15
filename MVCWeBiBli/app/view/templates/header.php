<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/styleHeader.css" />
            <div class="column col-sm-12 col-xs-12" id="main">

                <!-- top nav -->
              	<div class="navbar navbar-blue navbar-static-top">
                    <div class="navbar-header">
                      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle</span>
                        <span class="icon-bar"></span>
          				<span class="icon-bar"></span>
          				<span class="icon-bar"></span>
                      </button>
                  	</div>
                  	<nav class="collapse navbar-collapse" role="navigation">
                          <form method="post"  class="navbar-form navbar-left" action ="index.php?url=groupe">
                            <div class="input-group input-group-sm" style="max-width:360px;">
                          <input type="text" class="form-control" placeholder="Rechercher un groupe" name="recherche" id="srch-term">
                          <div class="input-group-btn">
                            <button class="btn btn-default" name="OK" type="submit"><i class="glyphicon glyphicon-search"></i></button></form>
                          </div>
                        </div>
                    <ul class="nav navbar-nav">
                      <li>
                        <a href="index.php?url=groupe"><i class="glyphicon glyphicon-home"></i> Vos groupes</a>
                      </li>
                      <li>
                        <a href="index.php?url=ajouter" role="button" data-toggle="modal"><i class="glyphicon glyphicon-plus"></i> Ajouter une oeuvre</a>
                      </li>
                      <li>
                        <a href="index.php?url=inventaire" role="button" data-toggle="modal"><i class="glyphicon glyphicon-folder-open"></i> &nbsp;Mon inventaire</a>
                      </li>
                      <?php if ($_SESSION["utilisateur"]["rang"]==2){?><li>
                        <a href="index.php?url=admin" role="button" data-toggle="modal"><i class="glyphicon glyphicon-user"></i> Gérer les inscriptions</a>
                      </li><?php }?>
                    </ul>
                    
                    <ul class="nav navbar-nav navbar-right">
                      <li> <a href="index.php?url=login" style="margin-right: 10px;"><i class="glyphicon glyphicon-lock"></i> Déconnexion</a>
                      </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                      <li>
                        <a href="index.php?url=profil&amp;idUtilisateur=<?php echo $_SESSION['utilisateur']['id']; ?>">
                          <i class="glyphicon glyphicon-hme">
                            
                          </i>
                          <?php echo  ($_SESSION["utilisateur"]["nom"]) .' '. ($_SESSION["utilisateur"]["prenom"]);?>
                        </a>
                      </li>
                    </ul>
                  	</nav>
                </div>
                <div class="padding">