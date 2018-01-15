<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
  <link rel="stylesheet" type="text/css" href="css/styleCarrousel.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="js/jsTri.js"></script>

</head>
<body>

  <div class="container" >
    <br>
    <h2>Mon inventaire</h2>
    <center>
      <div id="myCarousel" class="carousel slide" data-ride="carousel" style="width:50%;">
    <!-- Indicators 
    <ol class="carousel-indicators">
      <?php 

      $j = 0;
      foreach($oeuvres as $oeuvre)
      {
        if ($j==0)
          {
              echo ' <li data-target="#myCarousel" data-slide-to=" ' . $j . '" class="active"></li> ';
              $j = $j + 1;
          }
          else
          {
             echo ' <li data-target="#myCarousel" data-slide-to=" ' . $j . '"></li> ';
              $j = $j + 1;
          }
         } 
      ?>
    </ol>-->

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <?php
      $i = 0;  

      foreach($oeuvres as $oeuvre)
      {
        if ($i==0)
        {
          ?><div class="item active"> <?php
          $i = 1;
        }
        else
        {
          ?><div class="item"> <?php
        }

        
        echo '<embed src="upload/' . $oeuvre["URL"] . '" style="width:100%; height:50%;">'; ?>
        
        <!-- <?php echo '<img src="upload/' . $oeuvres[0]["URL"] . '" alt="Los Angeles" style="width:100%;"> '?>-->
        <div class="carousel-caption">
          <div id="bande_horizontale">
            <?php echo '<h3 style="color:white;">' . $oeuvre["NOM"] . '</h3>'; ?>
            <?php echo '<p style="color:white;">' . $oeuvre["NOM"] . ' - ' . $oeuvre["DATESORTIE"] . '</p>'; ?>

          </div>
        </div>
      </div><?php
    }

    ?>

    
    
    
    
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev" style="height:30%; margin-top: auto; margin-bottom: auto;">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next" style="height:30%; margin-top: auto; margin-bottom: auto;">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>

</div>

<form method="post" action="">

 <table class="table table-hover" style="margin-top: 5vh;" id="myTable">
  <thead>
    <tr class="filters">
      <th onclick="sortTable(0)">Titre</th>
      <th onclick="sortTable(1)">Genre</th>
      <th onclick="sortTable(2)">Date</th>
      <th class="col-lg-2">Aperçu</th>
      <th class="col-lg-2">Télécharger</th>
      <th>Editer</th>
      <th>Supprimer</th>
    </tr>
  </thead>
  <tbody>

    <?php

    foreach ($tab as $resultat) {

      echo '<tr>';

      echo '<td>';

      echo $resultat["nom"];

      echo '</td>';

      echo '<td>';

      echo $resultat["genre"];

      echo '</td>';

      echo '<td>';

      echo  $resultat["date"];

      echo '</td>';

      echo '<td>';

      echo "<center><a class='glyphicon glyphicon-eye-open' href='upload/" . $resultat["url"] ."' ></center>";

      echo '</td>';

      echo '<td>';

      echo "<center><a class='glyphicon glyphicon-download-alt' href='upload/" . $resultat["url"] ."' download></center>";

      echo '</td>';

      echo '<td class="col-lg-1">';

      echo '<center><a href="index.php?url=editerOeuvre&amp;idOeuvre=' . $resultat['id_oeuvre'] . '">  <span class="glyphicon glyphicon-pencil"></span></a></center>';

      echo '</td>';

      echo '<td class="col-lg-1">';

      echo '<center><button type="submit" class="btn btn-primary" name=\'delete\' value=" ' . $resultat['id_oeuvre'] . '"><i class="glyphicon glyphicon-remove"></i></button></center>';

      echo '</td>';

      

      echo '</tr>';    
    }
    ?>
    
  </tbody>
</table>

</div></center>


</body>

<script>
  $('body').on('click', '[data-editable]', function(){

    var $el = $(this);
    
    var $input = $('<input/>').val( $el.text() );
    $el.replaceWith( $input );
    
    var save = function(){
      var $p = $('<p data-editable />').text( $input.val() );
      $input.replaceWith( $p );
    };
    
  /**
    We're defining the callback with `one`, because we know that
    the element will be gone just after that, and we don't want 
    any callbacks leftovers take memory. 
    Next time `p` turns into `input` this single callback 
    will be applied again.
    */
    $input.one('blur', save).focus();
    
  });
</script>

<script>
function myFunction() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";

        }
    }
}
</script>


</html>
