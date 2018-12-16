<?php


  if( isset($_POST['updateRetailerTable']) ){
    $mysqli = bddConnect();
    safeVar($mysqli, "post");
    $query = "UPDATE `revendeur`
              SET
              `nom` = '$nameRetailerUpdate'
              WHERE
              `id` = ".$_GET['id-revendeur'];

    if(bddQuery($mysqli, $query)){
      bddError($mysqli, $query);
    }

    $mysqli->close();
    header('Location: '.$_SERVER['REQUEST_URI']);
    exit('category update<br />');
  }


if( isset($pageDisplay) && $pageDisplay == true ){
  $mysqli = bddConnect();


  $query = "SELECT * FROM `revendeur` WHERE `id` = ".$_GET['id-revendeur'];
  $retailerList = bddQuery($mysqli, $query);

  $mysqli->close();

  require 'data/view/admin/headerAdmin.php';
?>
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8 col-xl-6">
      <div class="text-right mb-3">
        <a href="/admin/revendeur/" class="btn btn-secondary">Retour</a>
      </div>
      <form method="post">
        <fieldset>
          <legend>Modification d'un revendeur</legend>
          <div class="form-group">
            <label for="nameRetailerUpdate">Nom</label>
            <input name="nameRetailerUpdate" type="text" class="form-control" id="nameRetailerUpdate" value="<?= $retailerList[0]['nom'] ?>" />
          </div>
          <div class="text-right">
            <button type="submit" name="updateRetailerTable" class="btn btn-primary">Modifier</button>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</div>
<?php

require 'data/view/admin/footerAdmin.php';

 } ?>
