<html>


<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	
	

	<div class="panel panel-default col-lg-4 col-lg-offset-4" style="margin-top: 10vh;">

		<div class="panel-heading"><h4>Selectionnez les oeuvres que vous voulez ajouter à <b><?php echo $nomGroupe[0]["NOM_GROUPE"];?></b></h4></div>
		<center>
			<div class="panel-body">
		 <form method='post' action="index.php?url=interfaceGroupe&amp;idGroupe=<?php echo $nomGroupe[0]['ID_GROUPE']; ?>">
            <table class="table">
                <thead>
                    <tr class="filters">
                        <th width="25%"><input type="text" class="form-control" placeholder="Prénom" disabled></th>
                        <th width="25%"><input type="text" class="form-control" placeholder="Nom" disabled></th>
                        <th width="25%"><input type="text" class="form-control" placeholder="Mail" disabled></th>
                        <th width="25%"><input type="text" class="form-control"  placeholder="Ajout" disabled></th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($Utilisateur as $utilisateur) {?>
                        <tr>
                            <td>
                                <?php echo $utilisateur['PRENOM_UTILISATEUR']; ?>
                            </td>
                            <td>
                                <?php echo $utilisateur['NOM_UTILISATEUR']; ?>
                            </td>
                            
                            <td>
                                <?php echo $utilisateur['EMAIL']; ?>
                            </td>
                            
                            <td>
                                   <input name="ids[]" type = "checkbox" value="<?php echo $utilisateur['ID_UTILISATEUR']; ?>"></input>
                            </td>
                        </tr>
                        <?php 
                    } ?>
                </tbody>
            </table>

           
        </div>
         <center>
                <button class="btn btn-primary" id="envoyer" name="subOeuvre" type="submit">Ajouter</button>
                </br>
                <h4 style="color:red"><?php if (isset($err)) echo ($err); ?></h4>
        </center>


    </div>
    </form>
			</div>
		</center>
	</div>	



</body>





</html>