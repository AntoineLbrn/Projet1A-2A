<html>


<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	
	

	<div class="panel panel-default col-lg-4 col-lg-offset-4" style="margin-top: 10vh;">

		<div class="panel-heading"><h4>Selectionnez les groupes auxquels vous souhaitez ajouter l'oeuvre <b><?php echo $oeuvre[0]['NOM'];?></b></h4></div>
		<center>
			<div class="panel-body">
		 <form method='post' action="">
            <table class="table">
                <thead>
                    <tr class="filters">
                        <th width="25%"><input type="text" class="form-control" placeholder="Nom du groupe" disabled></th>
                        <th class="col-lg-2"><input type="text" class="form-control"  placeholder="Ajout" disabled></th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($groupes as $groupe) {?>
                        <tr>
                            <td>
                                <?php echo $groupe['NOM_GROUPE']; ?>
                            </td>
                            
                            
                            <td >
                                   <center><input name="ids[]" type = "checkbox" value="<?php echo $groupe['ID_GROUPE']; ?>"></input></center>
                            </td>
                        </tr>
                        <?php 
                    } ?>
                </tbody>
            </table>

           
        </div>
         <center>
                <button class="btn btn-primary" id="envoyer" name="sub" type="submit">Ajouter</button>
                </br>
                <h4 style="color:red"><?php if (isset($err)) echo ($err); ?></h4>
                
                <a href="index.php?url=inventaire" class="btn btn-success"> Retour au menu </a>
               
        </center>


    </div>
    </form>
			</div>
		</center>
	</div>	



</body>





</html>