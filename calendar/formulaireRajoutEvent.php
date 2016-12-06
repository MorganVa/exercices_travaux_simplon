
<div id="formulaire">

<div id="ajoutEvent" class="panel-group">

    <div id="login-form" class="panel panel-default" >
      <!-- header du form-->
      <div class="panel-heading">
          Ajout d'un évenement
      </div>
    <div class="fields">
      <!-- si l'ajout a échoué : afficher le message d'erreur -->
        <?php echo $errorMessage;?>

      <form id="formAjout" class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
        <!-- champ titre-->
        <div class="form-group">
          <div class="col-md-4">
              <label for="chpSummary">Titre</label>
          </div>
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">
              <i class="fa fa-file-text-o" aria-hidden="true"></i>
            </span>
            <input id="chpSummary" type="text" name="summary" class="form-control" placeholder="Ex: Réunion bureau 3" />
          </div>
        </div>

        <!-- champ date de début -->
        <div class="form-group">
          <div class="col-md-4">
              <label for="chpStart">Date de début <label>
          </div>
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">
              <i class="fa fa-hourglass-start" aria-hidden="true"></i>
            </span>
            <input id="chpStart" type="date" name="dStart" class="form-control" placeholder="Date de début" />
          </div>
        </div>

        <!-- champ date de fin -->
        <div class="form-group">
          <div class="col-md-4">
              <label for="chpEnd">Date de Fin <label>
          </div>
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">
              <i class="fa fa-hourglass-end" aria-hidden="true"></i>
            </span>
            <input id="chpEnd" type="date" name="dEnd" class="form-control" placeholder="Date de fin"/>
          </div>
        </div>

        <!-- champ email -->
        <div class="form-group">
          <div class="col-md-4">
              <label for="chpMailCreator">Email<label>
          </div>
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">
              <i class="fa fa fa-envelope-o fa-fw" aria-hidden="true"></i>
            </span>
            <input id="chpMailCreator" type="email" name="mailCreator" class="form-control" placeholder="Saississez votre email" />
          </div>
        </div>
      </form>
    </div>
    <!-- footer du form-->
      <div class="panel-footer">
          <button type="submit" class="btn btn-primary" form="formAjout" name="button">Ajouter</button>
      </div>
    </div>
  </div>
</div>
