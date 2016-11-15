
<?php
$errorMessage = '';

if ((isset($_POST['pseudo']))&&(isset($_POST['password']))) {

  $pseudo = $_POST['pseudo'];
  $mdp = $_POST['password'];

    if(strlen($mdp)>3 && strlen($pseudo)>3) {

        try {
            // on ouvre une connexion à la base de données
            $connexion = new PDO(
                'mysql:host=localhost;dbname=loginv4;charset=utf8',
                'root', 'Root#1234');
        } catch (Exception $excp) {
            die('Erreur : ' . $excp->getMessage());
        };

        $q = $connexion->prepare('SELECT * FROM uilisateurs WHERE pseudo = :login');
        $q->bindValue(':login', $pseudo, PDO::PARAM_STR);
        $q->execute();

        if($q->fetchColumn() > 0){

            $q = $connexion->prepare('SELECT password FROM uilisateurs WHERE pseudo = :login');
            $q->bindValue(':login', $pseudo, PDO::PARAM_STR);
            $q->execute();
            $resultats = $q->fetch();

              if($resultats['password'] === $mdp) {// si le mot de passe est bien celui associé au pseudo dans la base de donnée

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
    <meta charset="utf-8">
    <title>Formulaire de connexion</title>

  <!--   <link	href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    BOOTSTRAP & JQuery-->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
  <link href="css/font-awesome.min.css" rel="stylesheet">  <!-- chargement icones Font Awesome-->
  <link href="style.css" rel="stylesheet"> <!-- chargement feuille style css-->

  </head>
  <body>

<?php
include("header.php");

if (!isset($user)) { ?>



  <div class="panel-group">

      <div id="login-form" class="panel panel-default" >

        <div class="panel-heading">
            Identification
        </div>
      <div class="fields">
        <!-- si le login a échoué : afficher le message d'erreur -->
            <?php echo $errorMessage;?>

        <form id="loginForm" action="formulaire.php" method="post" >

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
