<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Caf</title>

  <?php
  include("coBootstrap.html");
  ?>

</head>

<body>
  <?php
  include("header.php");
  include("nav.html");
  ?>


    <div id="myCarousel" class="carousel slide pull-left" data-ride="carousel" style="width:50%;margin-bottom: 50px;">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="pictures/image1.jpeg" alt="enfant1">
          <div  class="carousel-caption" style="color:black; text-shadow: white 1px 1px, white -1px 1px, white -1px -1px, white 1px -1px;" >
            <h3>Maria Montessori</h3>
            <p >« Un enfant enfermé dans ses limites reste incapable de se valoriser et n’arrivera pas à s’adapter au monde extérieur. »</p>
          </div>
        </div>

        <div class="item">
          <img src="pictures/image3.jpeg" alt="enfant2">
        </div>

        <div class="item">
          <img src="pictures/image4.jpeg" alt="enfant2">
        </div>

      </div>

      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>



</body>
</html>
