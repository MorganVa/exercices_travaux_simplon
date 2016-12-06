<div class="formLangues">
  <h4>Ajouter des langues</h4>
  <form id="loginFormLangue" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

    <label for="chpLangue">
        Langue
    </label>
    <input id="chpLangue" type="text" name="langue"/><br>

    <div>
        <button form="loginFormLangue" type="submit">Valider</button>
    </div>
  </form>
</div>
