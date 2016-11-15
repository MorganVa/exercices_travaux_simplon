<?php
$errorMessage = '';

if ((isset($_POST['pseudo']))&&(isset($_POST['mail']))&&(isset($_POST['password']))&&(isset($_POST['confirmPassword']))) {

  $pseudo = $_POST['pseudo'];
  $mdp = $_POST['password'];
  $mdpCOnfirm = $_POST['confirmPassword'];
  $email = $_POST['mail'];


    if(strlen($mdp)>3 && strlen($mdpCOnfirm)>3 && strlen($email)>3 && strlen($pseudo)>3) {

        if($mdp === $mdpCOnfirm){
          if(isset($_POST['understand'])===true){
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
              Vous n\'avez pas confirmé
            </div>';
          }
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
// afficher message erreur si rien n'est passé en variable ?

?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Formulaire inscription</title>

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
          <div class="checkbox">
            <label>
              <input type="checkbox" name ="understand" value="understand"> j’ai pas lu mais je suis d’accord
            </label>
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
  };

   ?>

  </body>
</html>
