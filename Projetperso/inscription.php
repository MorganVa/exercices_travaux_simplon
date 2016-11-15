
<?php
$errorMessage = '';

if ((isset($_POST['pseudo']))&&(isset($_POST['mail']))&&(isset($_POST['password']))&&(isset($_POST['confirmPassword']))) {



  $pseudo = $_POST['pseudo'];
  $mdp = $_POST['password'];
  $mdpCOnfirm = $_POST['confirmPassword'];
  $email = $_POST['mail'];


    if(strlen($mdp)>3 && strlen($mdpCOnfirm)>3 && strlen($email)>3 && strlen($pseudo)>3) {

        if($mdp === $mdpCOnfirm){

            $user = [
              "pseudo" => $pseudo,
              "mail" => $email,
              "password" => $mdp,
            ];
            $loginFailed = false;

        }else {
          $loginFailed = true;
          $errorMessage =
          '<div class="alert alert-danger"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <span class="sr-only">Error:</span>
            Erreur d\'identification, les mots de passe ne correspondent pas.
          </div>';
        }

    } else {
      $loginFailed = true;
      $errorMessage =
      '<div class="alert alert-danger"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        <span class="sr-only">Error:</span>
        Erreur d\'identification, 4 caractères minimum.
      </div>';     }
}

?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Inscription</title>
    
<!-- Lien vers fichier avec cdn de bootstrap -->
    <?php
    include("coBootstrap.html");
    ?>

  </head>
  <body>

<?php
include("header.php");
include("nav.php");

if (!isset($user)) { ?>



  <div class="panel-group">

      <div id="login-form" class="panel panel-default" >

        <div class="panel-heading">
            Inscription
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
                <i class="fa fa fa-envelope-o fa-fw" aria-hidden="true"></i>
              </span>
              <input id="chpMail" type="text" name="mail" class="form-control" placeholder="Votre Email" />
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

          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1">
                <i class="fa fa-key fa-fw" aria-hidden="true"></i>
              </span>
              <input id="chpPassword" type="password" name="confirmPassword" class="form-control" placeholder="Confirmez votre mot de passe" />
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

  echo '<p class="loginOk">Votre compte a été créé '.$pseudo.' ! Un mail de confirmation a été envoyé à <span>' .$email; "</span> </p>";

  try {
    // on ouvre une connexion à la base de données
    $connexion = new PDO('mysql:host=localhost;dbname=helpmenounou;charset=utf8','root', 'Root#1234');
    } catch (Exception $excp) {
      die('Erreur : ' . $excp->getMessage());
    };

$qInsertion = 'INSERT INTO `membres`(`login`, `email`, `password`) VALUES (:login, :email, :password)';

 $rq = $connexion->prepare($qInsertion);
 $rq->bindParam(":login", $pseudo, PDO::PARAM_STR);
 $rq->bindParam(":email", $email, PDO::PARAM_STR);
 $rq->bindParam(":password", $mdp, PDO::PARAM_STR);
 $rq->execute();

  };

   ?>

  </body>
</html>
