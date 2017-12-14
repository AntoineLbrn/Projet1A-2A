<div class="container" style="margin-top:100px">
    <h3>Gestion des inscriptions</h3>
    <hr>
    
    <div class="row">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">Utilisateurs</h3>
                
            </div>
            <form method='post' action=''>
            <table class="table">
                <thead>
                    <tr class="filters">
                        <th><input type="text" class="form-control" placeholder="ID" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Prénom" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Nom" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Mail" disabled></th>
                        <th><input type="text" class="form-control"  placeholder="Gérer" disabled></th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($donnees = $user->fetch()) {?>
                        <tr>
                            <td>
                                <?php echo $donnees['ID_UTILISATEUR']; ?>
                            </td>
                            <td>
                                <?php echo $donnees['PRENOM_UTILISATEUR']; ?>
                            </td>
                            <td>
                                <?php echo $donnees['NOM_UTILISATEUR']; ?>
                            </td>
                            
                            <td>
                                <?php echo $donnees['EMAIL']; ?>
                            </td>
                            
                            <td>
                                   <input name="ids[]" type = "checkbox" value="<?php echo $donnees['ID_UTILISATEUR']; ?>"></input>
                                <!--<div class="radio">
                                  <label><input type="radio" name="accepter[]" value="<?php echo $donnees['ID_UTILISATEUR']; ?>">Accepter</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="refuser[]" value="<?php echo $donnees['ID_UTILISATEUR']; ?>">Refuser</label>
                                </div>
                                -->
                                 

                            </td>
                        </tr>
                        <?php 
                    } ?>
                </tbody>
            </table>

           
        </div>
         <center>
                
                
                <!--<input type='submit' value="ENVOYER">-->
                <div class="radio">
                  <label><input type="radio" name="choix" value="accepter">Accepter</input></label>
                </div>
                <div class="radio">
                  <label><input type="radio" name="choix" value="refuser">Refuser</input></label>
                </div>
                <button class="btn btn-primary" id="envoyer" name="sub" type="submit">Envoyer</button>
                </br>
                <h4 style="color:red"><?php if (isset($err)) echo ($err); ?></h4>
        </center>


    </div>
    </form>

    <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">Utilisateurs</h3>
                
            </div>
            <form method='post' action=''>
            <table class="table">
                <thead>
                    <tr class="filters">
                        <th><input type="text" class="form-control" placeholder="ID" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Prénom" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Nom" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Mail" disabled></th>
                        

                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($donnees = $users->fetch()) {?>
                        <tr>
                            <td>
                                <?php echo '<a href="index.php?url=utilisateur&amp;id=' . $donnees['ID_UTILISATEUR'] . '">' . $donnees['ID_UTILISATEUR'] . '</a>' ;?> 
                            </td>
                            <td>
                                <?php echo '<a href="index.php?url=utilisateur&amp;id=' . $donnees['ID_UTILISATEUR'] . '">' . $donnees['PRENOM_UTILISATEUR'] . '</a>' ;?>
                            </td>
                            <td>
                                <?php echo '<a href="index.php?url=utilisateur&amp;id=' . $donnees['ID_UTILISATEUR'] . '">' . $donnees['NOM_UTILISATEUR'] . '</a>' ;?>
                            </td>
                            
                            <td>
                                <?php echo $donnees['EMAIL']; ?>
                            </td>
                            
                            
                        </tr>
                        <?php 
                    } ?>
                </tbody>
            </table>

           
        </div>
        

        
    </div>
    </form>