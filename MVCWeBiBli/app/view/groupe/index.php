<div class="container">
    <div class="row">
        <div style="margin-top:10vh" class="table-responsive col-md-12">
            <?php if(isset($message)){
                foreach($message as $mes){
                    echo $mes."<br>";
                }
            }
                ?>
                <br>
            <table class="table table-striped table-hover">
                <thead style="background-color: white;">
                    <tr style="height:5vh">
                        <th>Nom</th>
                        <th>Responsable</th>
                        <th>Statut</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        </div>
                    </tr>
                </thead>
                <tbody>
                <form method="post" action="index.php?url=groupe&amp;creegroupe1=1">
                <tr><td><input name ="nom" type="text" class="form-control" placeholder="Nom"></td>
                <td></td>
                <td><select class="form-control" name="statut">
                    <option value='0'>Groupe Public</option>
                    <option value='1'>Groupe Privé</option>
                    <option value='2'>Groupe Secret</option>
                </select></td>
                <td><input name ="mdp" type="text" class="form-control" placeholder="Mot de passe"></td>
                <td></td>
                <td><input type="submit" style="float:right" class="btn btn-primary" value='Créer groupe'></td>
                <td></td>
                </tr>
                </form>
                <?php if(!(isset($_POST['OK']))){      
                        foreach($groupe as $value){?>
                            <form method="post" action="index.php?url=groupe&amp;modifiergroupe=1">
                            <tr class="ligne" style="cursor:pointer;background-color: white;">
                                <?php if($value['ID_UTILISATEUR']==$_SESSION["utilisateur"]["id"]){ ?>
                                            <td><a href="pageGroupe/index.php?<?php echo $value['ID_GROUPE']?>"><input name="nom" type="hidden" value="<?php echo $value["NOM_GROUPE"] ?>"><?php echo $value["NOM_GROUPE"] ?></a></td>
                                            <td><?php echo $value["NOM_UTILISATEUR"] ?></td>
                                            <?php
                                                if($value['STATUT_GROUPE']== 0){
                                                    ?><td><input name="id" type="hidden" value="<?php echo $value["ID_GROUPE"] ?>"><span class="label label-success">Public</span></td>
                                                    <td><input name="mdp" type="hidden" value="<?php echo $value["mot_de_passe"] ?>"></td>
                                                    <td></td>
                                                    <?php if($value['ID_UTILISATEUR']==$_SESSION["utilisateur"]["id"] && $value['RANG']==1){ ?>
                                                        <td><input type="submit" style="float:right" class="btn btn-primary" value='Modifier'></td>
                                                        <td><button type="submit" class="btn btn-primary" name='delete'><i class="glyphicon glyphicon-remove"></i></button></td>
                                                    <?php } 
                                                    else{ ?>
                                                    <td></td>
                                                    <td></td>
                                                    <?php }?>
                                                    <?php
                                                    }
                                                else if($value['STATUT_GROUPE']== 1){?>
                                                    <td><input name="id" type="hidden" value="<?php echo $value["ID_GROUPE"] ?>"><span class="label label-warning">Privée</span></td>
                                                    <td><input name="mdp" type="hidden" value="<?php echo $value["mot_de_passe"] ?>"></td>
                                                        <td></td>
                                                    <?php if($value['ID_UTILISATEUR']==$_SESSION["utilisateur"]["id"] && $value['RANG']==1){ ?>
                                                        <td><input type="submit" style="float:right" class="btn btn-primary" value='Modifier'></td>
                                                        <td><button type="submit" class="btn btn-primary" name='delete'><i class="glyphicon glyphicon-remove"></i></button></td>
                                                    <?php }
                                                    else{ ?>
                                                    <td></td>
                                                    <td></td>
                                                    <?php }?>
                                            <?php } 
                                                else if($value['STATUT_GROUPE']== 2){?>
                                                    <td><input name="id" type="hidden" value="<?php echo $value["ID_GROUPE"] ?>"><span class="label label-danger">Secret</span></td>
                                                    <td><input name="mdp" type="hidden" value="<?php echo $value["mot_de_passe"] ?>"></td>
                                                        <td></td>
                                                    <?php if($value['ID_UTILISATEUR']==$_SESSION["utilisateur"]["id"] && $value['RANG']==1){ ?>
                                                        <td><input type="submit" style="float:right" class="btn btn-primary" value='Modifier'></td>
                                                        <td><button type="submit" class="btn btn-primary" name='delete'><i class="glyphicon glyphicon-remove"></i></button></td>
                                                    <?php }
                                                    else{ ?>
                                                    <td></td>
                                                    <td></td>
                                                    <?php }?>
                                    <?php } ?>
                            <?php } ?>
                        </a>
                                </tr>
                            </form>
                    <?php }}
                    else {
                            foreach($groupe as $value){?>
                                 <?php if(!($value['ID_UTILISATEUR']==$_SESSION["utilisateur"]["id"] && $value['NOM_UTILISATEUR']==$_SESSION["utilisateur"]["nom"]&& $value['PRENOM_UTILISATEUR']==$_SESSION["utilisateur"]["prenom"])){ 
                                    if($value['RANG']== 1){
                                        if($value['STATUT_GROUPE']!=2){ ?>
                                            <form method="post" action="index.php?url=groupe&amp;rejoindreGroupe=1">
                                                        <tr>
                                                            <td><input name="nom" type="hidden" value="<?php echo $value["NOM_GROUPE"] ?>"><p><?php echo $value["NOM_GROUPE"] ?></p></td>
                                                            <td><p><?php echo $value["NOM_UTILISATEUR"] ?></p></td> <?php } ?>
                                                            <?php
                                                                if($value['STATUT_GROUPE']== 0){
                                                                    ?><td><p><span class="label label-success">Public</span></p></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td><input class="btn btn-primary create pull-right" type="submit" value="Rejoindre"></p></td></tr><?php
                                                                    }
                                                                else if($value['STATUT_GROUPE']== 1){?>
                                                                    <td><p><span class="label label-warning">Privée</span></p></td>
                                                                    <td><p><input name ="mdp" type="text" placeholder="Mot de passe" class="form-control"></td>
                                                                    <td></td>
                                                                    <td><input class="btn btn-primary create pull-right" type="submit" value="Rejoindre"></p></td>
                                                                    <?php }?>
                                                        </tr>
                                            </form>
                                    <?php }
                                        }
                                    }
                                    ?>
                    <?php }
                ?>   
                </tbody>
            </table>
        </div>
    </div>
</div>