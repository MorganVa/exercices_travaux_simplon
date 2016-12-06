
<header>


    <div class="container">
        <h1>Help me nounou</h1>
        <h5>vous accompagner avec votre assistante maternelle</h5>

        <div class="">
          <img src="pictures/image2.jpeg">
        </div>
    </div>

<?php

if (isset($_SESSION['pseudo']) && isset($_SESSION['password'])){
      echo '<a class="pull-left" href="logout.php">Déconnexion</a>';
    };
  ?>

</header>
