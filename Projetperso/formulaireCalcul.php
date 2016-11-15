<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>formulaire inscription</title>

  <?php
  include("coBootstrap.html");
  ?>

</head>
<body>

  <?php
  include("header.php");
  include("nav.html");
  ?>

  <h2>Simulation de calcul de salaire en année complète</h2>
  <h5 id="conseil">Merci de renseigner les champs suivants</h5>

  <div id="login-formBis" class="panel panel-default" >

  <form class="form-horizontal">
      <fieldset>
        <legend>Salaire sans indemnités</legend>
          <div class="form-group">
              <label for="chpTauxHoraire" class="col-md-4 control-label">
                  Taux horaire
              </label>
              <div class="col-md-5">
                <div class="input-group">
                   <input id="chpTauxHoraire" type="text" class="form-control" style="text-align:right">
                   <span class="input-group-addon">€</span>
                </div>
              </div>
             <input type="radio" name="brutNet" value="brut" checked> Brut</input>
             <input type="radio" name="brutNet" value="net"> Net</input>
          </div>

          <div class="form-group">
              <label for="chpNbrH" class="col-md-4 control-label">
                  Nombre d'heures de garde
              </label>
              <div class="col-md-5">
                <div class="input-group">
                   <input id="chpNbrH" type="text" class="form-control" style="text-align:right">
                   <span class="input-group-addon">h / semaine</span>
                </div>
              </div>

          </div>

          <div class="form-group">
              <label for="chpSalaire" class="col-md-4 control-label">
                  Total net mensuel
              </label>
              <div class="col-md-5">
                <div class="input-group">
                   <input id="chpSalaire" type="text" class="form-control" style="text-align:right">
                   <span class="input-group-addon">€/mois</span>
                </div>
              </div>
          </div>
      </fieldset>

      <hr/>

      <fieldset>
        <legend>Indemnités</legend>

          <div class="form-group">
              <label for="chpNbrJ" class="col-md-4 control-label">
                  Nombre de jours de garde
              </label>
              <div class="col-md-5">
                <div class="input-group">
                   <input id="chpNbrJ" type="text" class="form-control" style="text-align:right">
                   <span class="input-group-addon">jr</span>
                </div>
              </div>
              <input type="radio" name="semaineMoisJr" value="semaine" checked> Par semaine</input>
              <input type="radio" name="semaineMoisJr" value="mois"> Par mois</input>
          </div>


          <div class="form-group">
              <label for="chpEntretien" class="col-md-4 control-label">
                  Indemnités d'entretien
              </label>
              <div class="col-md-5">
                <div class="input-group">
                   <input id="chpEntretien" type="text" class="form-control" style="text-align:right">
                   <span class="input-group-addon">€/jour</span>
                </div>
              </div>
          </div>

          <div class="form-group">
              <label for="chpRepas" class="col-md-4 control-label">
                  Indemnités de repas
              </label>
              <div class="col-md-5">
                <div class="input-group">
                   <input id="chpRepas" type="text" class="form-control" style="text-align:right">
                   <span class="input-group-addon">€/repas</span>
                </div>
              </div>
          </div>

          <div id="plus">
            <a href="#" >+Ajouter des indemnités</a>
          </div>

          <div class="form-group">
              <label for="chpIndemnités" class="col-md-4 control-label">
                  Total indemnités
              </label>
              <div class="col-md-5">
                <div class="input-group">
                   <input id="chpIndemnités" type="text" class="form-control" style="text-align:right">
                   <span class="input-group-addon">€/mois</span>
                </div>
              </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label" for=""></label>
            <div class="col-md-8">
              <button id="buttonCalcul" name="" class="btn btn-primary">Calculer</button>
            </div>
          </div>
    </fieldset>
    </form>
      </form>
  </div>





</body>
</html>