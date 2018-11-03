<?php
if( isset($_POST['nameCreation']) and ! empty($_POST['nameCreation']) ){
  $mysqli = bddConnect();
  safeVar($mysqli, "post");
  bddCreateFlush($mysqli, "creation", [
    "id" => NULL,
    "name" => $nameCreation,
    "description" => $descriptionCreation,
    "id_user" => $UID,
    "date_creation" => $dbDate
  ]);
  $mysqli->close();
}
 ?>
<div class="text-right">
 <a href="/mes-creations/" class="btn btn-secondary">Retour</a>
</div>
<form method="post">
  <fieldset>
    <legend>Formulaire créer une création</legend>
    <div class="form-group">
      <label for="nameCreation">Nom</label>
      <input name="nameCreation" type="text" class="form-control" id="nameCreation" aria-describedby="nomHelp" placeholder="Entrer un nom">
    </div>
    <div class="form-group">
      <label for="descriptionCreation">Description</label>
      <input name="descriptionCreation" type="text" class="form-control" id="descriptionCreation" aria-describedby="nomHelp" placeholder="Entrer une description">
    </div>
    <button type="submit" class="btn btn-primary">Créer une création</button>
  </fieldset>
</form>
