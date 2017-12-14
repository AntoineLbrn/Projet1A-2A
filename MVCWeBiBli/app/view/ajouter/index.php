<script src="js/jsajouter.js"></script>   

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>

<div class="container" style="margin-top:100px">
    <center><h3>Ajouter une oeuvre</h3></center>
    <h4 style="color:red"><?php if (isset($err)) echo ($err); ?></h4>
    <form method="post" action="" enctype="multipart/form-data">
        <div class="full col-sm-7">
	    	<select class="form-control" name="groupe" id="selectGroupe">
	        	<option value="" selected>Groupe</option>
	        	<?php
	        	foreach ($groupe as $value)
	        	{
	        		echo ('<option value = "' . $value["ID_GROUPE"] . '">' . $value["NOM_GROUPE"] . '</option>' );
	        	}
	        	?>
	        </select>
		</div>
		<div style="margin-top : 0%" class="full col-sm-7">
			<select id="selectGenre" name ="genre" onclick="remet()" class="form-control" style="display:inline;">
        		<option value ="" selected>Genre</option>
        		<?php
	        	foreach ($genre as $value)
	        	{
	        		echo ('<option value = "' . $value["ID_genre"] . '">' . $value["libellé"] . '</option>' );
	        	}
	        	?>
	        </select>
	        </br>
            </br>
	        <input type="text" class="form-control input-lg" placeholder="Entrez le nom de l'oeuvre" name="nomOeuvre"/>
	        </br>
            <input type="text" id="myInput" name="auteur" class="form-control input-lg" onkeyup="recherche();myFunction()" onkeyup="myFunction()"  placeholder="Entrez le nom de l'auteur">
            <table style="display:none;" id="myTable">
            	<?php
                foreach ($artiste as $value)
                {
                	$val = $value['NOM_ARTISTE'];
					       echo("<tr><td style='cursor:pointer' onclick='remplacer(\"$val\")''>");echo($val); echo('</td></tr>');
				        }
				      ?>
            </table>

            </br>
            </br>
            	

            <div class="form-group">
                <div class='input-group date' id='datetimepicker6'>
                    <input type='text' name="dateoeuvre" placeholder="Cliquez sur le calendrier pour insérer la date de l'oeuvre" class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
            </br>
<!--             	<input type="text" class="form-control input-lg" placeholder="Entrez l'éditeur de l'oeuvre" name="editeurOeuvre">
            </br>
            <input type="text" id="album" class="form-control input-lg" style="display:none" placeholder="Entrez le titre de l'album" name="titreAlbum">
          	</br>
            <input type="text" id="ISBN" class="form-control input-lg" style="display:none" placeholder="Entrez l'ISBN du livre" name="isbn" >
          	</br>
            <input type="text" id="tome" class="form-control input-lg" style="display:none" placeholder="Indiquer, s'il s'agit d'une série, le tome de ce livre" name="tomeLivre"> 
          	</br>
            <input type="text" id="type" class="form-control input-lg" style="display:none" placeholder="Quel est le type de ce livre ? ( ex : roman,nouvelle...)" name="typeLivre">
          	</br>
         	<input type="text" id="instrument" class="form-control input-lg" style="display:none" placeholder="à quel instrument correspond cette partition ?" name="instrument">
             -->
          

            <span class="input-group-btn" id="plus" style="display:none;position:absolute">
            	<button  class="btn btn-secondary"  type="button">+</button>
            </span>


             


                  
	        </br>
	        <input type="text" id="difficulté" class="form-control input-lg" style="display:none" placeholder="Selon vous, quelle est la difficulté de cette partition (de 1 à 5)">
	        </br>
	        </br>
            <center>
	        	<label class="btn btn-default btn-file">
			   		Déposer une partition <input name="fichier" type="file" hidden>
				</label>
                <input type="hidden" name="MAX_FILE_SIZE" value="100000">
				</br>
				</br>
				<span class="input-group-btn"><button class="btn btn-lg btn-primary" name="sub" type="submit">Partager</button></span>
			</center>
		</div>
    	<div class="full col-sm-5" style="margin-top : -1%;margin-left: -2%;">
       		<span  onclick="afficheGenre()" id = "bouton+">
    			<button  class="btn btn-secondary" type="button"><font class="plus">+</font></button>
  			</span>
  			<input type="text" id="nouveauGenre" name="nouveauGenre" class="form-control input-lg" style="display:none;" placeholder="Nouveau genre"></input>
    	</div>
  	</form>
</div>
<script type="text/javascript">
$(document).ready(function() {
        $(function () {
            $('#datetimepicker6').datetimepicker({
             format: 'DD/MM/YYYY'
            });

            $("#datetimepicker6").on("dp.change", function (e) {
                $('#datetimepicker6').data("DateTimePicker");
            });
        });
    });
</script>