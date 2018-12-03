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
require_once("data/view/user/creations/headerCreation.php");
 ?>

  <div class="text-right">
   <a href="/mes-creations/" class="btn btn-secondary">Retour</a>
  </div>


  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <form method="post">
          <fieldset>
            <legend>Créer une création</legend>
            <div class="form-group">
              <label for="nameCreation">Nom</label>
              <input name="nameCreation" type="text" class="form-control" id="nameCreation" aria-describedby="nomHelp">
            </div>
            <div class="form-group">
              <label for="descriptionCreation">Description</label>
              <input name="descriptionCreation" type="text" class="form-control" id="descriptionCreation" aria-describedby="nomHelp">
            </div>
            <div class="text-right">
              <button type="submit" class="btn btn-primary">Créer une création</button>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
<?php
require_once("data/view/user/creations/footerCreation.php");
 ?>
