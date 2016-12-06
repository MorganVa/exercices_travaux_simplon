<?php
$errorMessage = '';

if ((isset($_POST['pseudo']))&&(isset($_POST['password']))) {

  $pseudo = $_POST['pseudo'];
  $mdp = $_POST['password'];

    if(strlen($mdp)>3 && strlen($pseudo)>3) {

        try {
            // on ouvre une connexion à la base de données
            $connexion = new PDO(
                'mysql:host=mysql.hostinger.fr;dbname=u891004465_help;charset=utf8',
                'u891004465_root', 'LkL7Dcdt');
        } catch (Exception $excp) {
            die('Erreur : ' . $excp->getMessage());
        };

        $q = $connexion->prepare('SELECT * FROM membres WHERE login = :login');
        $q->bindValue(':login', $pseudo, PDO::PARAM_STR);
        $q->execute();

        if($q->fetchColumn() > 0){

            $q = $connexion->prepare('SELECT password FROM membres WHERE login = :login');
            $q->bindValue(':login', $pseudo, PDO::PARAM_STR);
            $q->execute();
            $resultats = $q->fetch();

              if($resultats['password'] === $mdp) {// si le mot de passe est bien celui associé au pseudo dans la base de donnée
                // on démarre la session
		              session_start ();
		            // on enregistre les paramètres de notre visiteur comme variables de session ($login et $pwd) (notez bien que l'on utilise pas le $ pour enregistrer ces variables)
		              $_SESSION['pseudo'] = $_POST['pseudo'];
		              $_SESSION['password'] = $_POST['password'];

                 $user = [
                  "pseudo" => $pseudo,
                  "password" => $mdp
                ];

                $loginFailed = false;

              } else {// Si le couple pseudo / mdp n'est pas bon.

               $loginFailed = true;
               $errorMessage =
               '<div class="alert alert-danger"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                 <span class="sr-only">Error:</span>
                 Le mot de passe n\'est pas correct.
               </div>';
             }

        } else { // si le pseudo n'existe pas
          $loginFailed = true;
          $errorMessage =
          '<div class="alert alert-danger"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <span class="sr-only">Error:</span>
            Le pseudo n\'existe pas, voulez vous vous inscrire ?
          </div>';
        }

  }else {
      $loginFailed = true;
      $errorMessage =
      '<div class="alert alert-danger"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        <span class="sr-only">Error:</span>
        Erreur d\'identification, 4 caractères minimum.
      </div>';
    }
}

?>




<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Connexion</title>

  <?php
  include("coBootstrap.html");
  ?>

</head>

<body>
  <?php
  include("header.php");
  include("nav.html");


  if (!isset($user)) { ?>



    <div class="panel-group">

        <div id="login-form" class="panel panel-default" >

          <div class="panel-heading">
              Connexion
          </div>
        <div class="fields">
          <!-- si le login a échoué : afficher le message d'erreur -->
              <?php echo $errorMessage;?>

          <form id="loginForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">
                  <i class="fa fa fa-user-circle fa-fw" aria-hidden="true"></i>
                </span>
                <input id="chpPseudo" type="text" name="pseudo" class="form-control" placeholder="Votre pseudo" />
              </div>
            </div>


            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">
                  <i class="fa fa-key fa-fw" aria-hidden="true"></i>
                </span>
                <input id="chpPassword" type="password" name="password" class="form-control" placeholder="Saisissez votre mot de passe"/>
              </div>
            </div>


          </form>
        </div>
          <div class="panel-footer">
              <button type="submit" class="btn btn-primary" form="loginForm" name="button">Valider</button>
          </div>

        </div>

      </div>
    </div>

    <?php   }
    else {

    echo '<p class="loginOk">Bienvenue sur votre espace personnel '.$pseudo.'!</p>';
    };

     ?>



</body>
</html>
