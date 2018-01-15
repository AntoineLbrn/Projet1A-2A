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

                                    <table class="table table-hover" id="myTable1">
                                        <thead>
                                            <tr class="filters">
                                                <th class="col-lg-2" style="cursor:pointer" onclick="sortTable1(0)">Titre</th>
                                                <th class="col-lg-2" style="cursor:pointer" onclick="sortTable1(1)">Genre</th>
                                                <th class="col-lg-2">Aperçu</th>
                                                <th class="col-lg-2">Télécharger</th>
                                                <th class="col-lg-2">Ajouter</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php




                                            foreach ($Oeuvres as $oeuvre)
                                            {
                                                $libelleGenre = $Genre->getGenre($oeuvre["ID_genre"]);



                                                echo '<tr>';

                                                echo '<td>';

                                                echo $oeuvre["NOM"];

                                                echo '</td>';

                                                echo '<td>';

                                                echo $libelleGenre["libellé"];

                                                echo '</td>';

                                                echo '<td>';

                                                echo "<center><a class='glyphicon glyphicon-eye-open' href='upload/" . $oeuvre["URL"] ."'></center>";

                                                echo '</td>';

                                                echo '<td>';

                                                echo "<center><a class='glyphicon glyphicon-download-alt' href='upload/" . $oeuvre["URL"] ."' download></center>";

                                                echo '</td>';


                                                echo '<td>
                                                    <input name="ids[]" type = "checkbox" value="' . $oeuvre["ID_OEUVRE"] . '"></input>
                                                </td>';

                                                    echo '</tr>';  

                                                    //var_dump($utilisateur); 

                                                }
           ?>
       </tbody>
   </table>
   <button class="btn btn-primary" id="envoyer" name="subOeuvre" type="submit">Ajouter</button>
</form>
        </div>
         <center>
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