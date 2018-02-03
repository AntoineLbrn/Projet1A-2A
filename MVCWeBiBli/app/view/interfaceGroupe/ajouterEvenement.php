<html>


<head>
	<meta charset="utf-8">
	<title></title>
<script src="js/jsajouter.js"></script>   

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>

</head>
<body>
	
	

	<div class="panel panel-default col-lg-4 col-lg-offset-4" style="margin-top: 10vh;">

		<div class="panel-heading"><h4>Ajoutez un évènement</h4></div>
		<center>
			<div class="panel-body">
				<form method="post" action="" enctype="multipart/form-data">
					<span style="color:red">
					<?php if (isset($err))
					{
						echo $err;
					}
					?>
					</span>
					<input type="text" name="libelle" class="form-control input-lg" placeholder="Intitulé de l'évènement"></input>
					  <div  style="margin-top:1vh" class='input-group date' id='datetimepicker6'>
					    <input type='text' name="date" placeholder="Cliquez sur le calendrier pour insérer la date de l'oeuvre" class="form-control" />
					    <span class="input-group-addon">
					      <span class="glyphicon glyphicon-calendar"></span>
					    </span>
					  </div>

					<input style="margin-top:2vh" type="submit" name ="submitEvenement" class="btn btn-primary"> 
					<br><br>
					 <?php  echo '<a href="index.php?url=interfaceGroupe&idGroupe=' . $_GET["idGroupe"] . '" class="btn btn-success"> Retour au menu </a>'; ?>
					
				</form>               
			</div>
		</center>
	</div>	



</body>




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
<script type="text/javascript">
  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
  });
</script>
</html>