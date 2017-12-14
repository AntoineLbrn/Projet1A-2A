<div class="container">
    <div class="row">
        <div style="margin-top:10vh" class="table-responsive col-md-12">
            <table class="table table-striped table-hover">
                <thead style="background-color: white;">
                    <tr style="height:5vh">
                        <th>Nom</th>
                        <th>Responsable</th>
                        <th>Statut</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        </div>
                    </tr>
                </thead>
                <tbody>
                <form method="post" action="">
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
                </tr>
                <?php if(!(isset($_POST['OK']))){      
                        foreach($groupe as $value){?>
                            <form method="post" action="">
                            <tr class="ligne" style="cursor:pointer;background-color: white;">
                                <?php if($value['ID_UTILISATEUR']==$_SESSION["utilisateur"]["id"]){ ?>
                                            <td><input name="nom" type="hidden" value="<?php echo $value["NOM_GROUPE"] ?>"><?php echo $value["NOM_GROUPE"] ?></td>
                                            <td><?php echo $value["NOM_UTILISATEUR"] ?></td>
                                            <?php
                                                if($value['STATUT_GROUPE']== 0){
                                                    ?><td><span class="label label-success">Public</span></td>
                                                    <td></td>
                                                    <td></td>
                                                    <?php if($value['ID_UTILISATEUR']==$_SESSION["utilisateur"]["id"] && $value['RANG']==1){ ?>
                                                        <td><a href="index.php?url=groupe&amp;modifiergroupe1=1" class="btn btn-primary create pull-right">Modifier</a></td>
                                                    <?php } 
                                                    else{ ?>
                                                    <td></td>
                                                    <?php }?>
                                                    </tr><?php
                                                    }
                                                else if($value['STATUT_GROUPE']== 1){?>
                                                    <td><span class="label label-warning">Privée</span></td>
                                                    <td></td>
                                                        <td></td>
                                                    <?php if($value['ID_UTILISATEUR']==$_SESSION["utilisateur"]["id"] && $value['RANG']==1){ ?>
                                                        <td><a href="index.php?url=groupe&amp;modifiergroupe=1" class="btn btn-primary create pull-right">Modifier</a></td>
                                                    <?php }
                                                    else{ ?>
                                                    <td></td>
                                                    <?php }?>
                                            <?php } 
                                                else if($value['STATUT_GROUPE']== 2){?>
                                                    <td><span class="label label-danger">Secret</span></td>
                                                    <td></td>
                                                        <td></td>
                                                    <?php if($value['ID_UTILISATEUR']==$_SESSION["utilisateur"]["id"] && $value['RANG']==1){ ?>
                                                        <td><a href="index.php?url=groupe&amp;modifiergroupe=1" class="btn btn-primary create pull-right">Modifier</a></td>
                                                    <?php }
                                                    else{ ?>
                                                    <td></td>
                                                    <?php }?>
                                                    
                                    <?php } ?>
                            <?php } ?>
                                </tr>
                            </form>
                    <?php }}
                    else {
                            foreach($groupe as $value){?>
                            <form method="post" action="">
                            <tr>
                                <?php if(!($value['ID_UTILISATEUR']==$_SESSION["utilisateur"]["id"])){ ?>
                                    <?php if($value['RANG']==1){ ?>
                                        <?php if($value['STATUT_GROUPE']!=2){ ?>
                                            <td><input name="nom" type="hidden" value="<?php echo $value["NOM_GROUPE"] ?>"><p><?php echo $value["NOM_GROUPE"] ?></p></td>
                                            <td><p><?php echo $value["NOM_UTILISATEUR"] ?></p></td> <?php } ?>
                                            <?php
                                                if($value['STATUT_GROUPE']== 0){
                                                    ?><td><p><span class="label label-success">Public</span></p></td>
                                                    <td></td>
                                                    <?php if($value['ID_UTILISATEUR']==$_SESSION["utilisateur"]["id"] && $value['RANG']==1){ ?>
                                                        <td><a href="index.php?url=groupe&amp;modifiergroupe1=1" class="btn btn-primary create pull-right">Modifier</a></td>
                                                    <?php } 
                                                    else{ ?>
                                                    <td></td>
                                                    <?php }?>
                                                    <td><input class="btn btn-primary create pull-right" type="submit" value="Rejoindre"></p></td></tr><?php
                                                    }
                                                else if($value['STATUT_GROUPE']== 1){?>
                                                    <td><p><span class="label label-warning">Privée</span></p></td>
                                                    <td><p><input name ="mdp" type="text" placeholder="Mot de passe" class="form-control"></td>
                                                    <?php if($value['ID_UTILISATEUR']==$_SESSION["utilisateur"]["id"] && $value['RANG']==1){ ?>
                                                        <td><a href="index.php?url=groupe&amp;modifiergroupe=1" class="btn btn-primary create pull-right">Modifier</a></td>
                                                    <?php }
                                                    else{ ?>
                                                    <td></td>
                                                    <?php }?>
                                                    <td><input class="btn btn-primary create pull-right" type="submit" value="Rejoindre"></p></td>
                                    <?php } ?>
                                    <?php } ?>
                            </tr><?php
                                        }
                                    ?>
                            </form>
                    <?php }
                    }
                ?>   
                </tbody>
            </table>
        </div>
    </div>
</div>
<style>
    .ligne:hover
    {
        background-color:#;
    }
</style>