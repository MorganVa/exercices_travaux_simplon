<header>
  <?php if(!$user){?>
<h1>Bienvenue</h1>
<?php
};
    if($user){
    echo '<h1>Bienvenue '.$pseudo.'</h1>';
    echo '<a href="'.$_SERVER['PHP_SELF'].'">Déconnexion</a>';

  };
   ?>

</header>
