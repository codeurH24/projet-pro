<?php


  if( isset($_POST['updateRoleTable']) ){
    $mysqli = bddConnect();

    $query = "UPDATE `role`
              SET
              `nom` = '".$_POST['nomRoleUpdate']."'
              WHERE
              `id` = ".$_GET['id-role'];

    if(bddQuery($mysqli, $query)){
      bddError($mysqli, $query);
    }

    $mysqli->close();
    header('Location: '.$_SERVER['REQUEST_URI']);
    exit('role update<br />');
  }


if( isset($pageDisplay) && $pageDisplay == true ){
  $mysqli = bddConnect();


  $query = "SELECT * FROM `role` WHERE `id` = ".$_GET['id-role'];
  $roleList = bddQuery($mysqli, $query);

  $mysqli->close();

  require 'data/view/admin/headerAdmin.php';
?>
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8 col-xl-6">
      <div class="text-right mb-3">
        <a href="/admin/roles/" class="btn btn-secondary">Retour</a>
      </div>

      <form method="post">
        <fieldset>
          <legend>Modification du role</legend>
          <div class="form-group">
            <label for="nomRoleUpdate">Nom</label>
            <input name="nomRoleUpdate" type="text" class="form-control" id="nomRoleUpdate" value="<?= $roleList[0]['nom'] ?>" />
          </div>
          <div class="text-right">
            <button type="submit" name="updateRoleTable" class="btn btn-primary">Modifier</button>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</div>
<?php

require 'data/view/admin/footerAdmin.php';

 } ?>
