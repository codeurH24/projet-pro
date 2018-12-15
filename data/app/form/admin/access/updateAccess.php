<?php


  if( isset($_POST['updateAccessTable']) ){
    $mysqli = bddConnect();

    $query = "UPDATE `access`
              SET
              `url` = '".$_POST['URLAccessUpdate']."',
              `role_id` = '".$_POST['IDRoleAccessUpdate']."',
              `pass_right` = '".$_POST['passRightAccessUpdate']."'
              WHERE
              `id` = ".$_GET['id-access'];
    if(bddQuery($mysqli, $query)){
      bddError($mysqli, $query);
    }

    $mysqli->close();
    header('Location: '.$_SERVER['REQUEST_URI']);
    exit('access update<br />');
  }


if( isset($pageDisplay) && $pageDisplay == true ){
  $mysqli = bddConnect();


  $query = "SELECT * FROM `access` WHERE `id` = ".$_GET['id-access'];
  $accessList = bddQuery($mysqli, $query);

  $query = "SELECT * FROM `role`";
  $roleList = bddQuery($mysqli, $query);

  $mysqli->close();

  require 'data/view/admin/headerAdmin.php';
?>
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8 col-xl-6">
      <div class="text-right mb-3">
        <a href="/admin/acces/" class="btn btn-secondary">Retour</a>
      </div>
      <form method="post">
        <fieldset>
          <legend>Modification de l'accès</legend>
          <div class="form-group">
            <label for="IDRoleAccessUpdate">ID Role</label>
            <select name="IDRoleAccessUpdate" type="text" class="form-control" id="IDRoleUserUpdate" value="<?= $accessList[0]['role_id'] ?>" />
              <?php
              foreach ($roleList as $role) {
                if( $accessList[0]['role_id'] == $role['id']){
                  ?><option value="<?= $role['id'] ?>" selected><?= $role['nom'] ?></option><?php
                }else{
                  ?><option value="<?= $role['id'] ?>"><?= $role['nom'] ?></option><?php
                }
              }?>
            </select>
          </div>
          <div class="form-group">
            <label for="URLAccessUpdate">URL</label>
            <input name="URLAccessUpdate" type="text" class="form-control" id="URLAccessUpdate" value="<?= $accessList[0]['url'] ?>" />
          </div>
          <div class="form-group">
            <label for="passRightAccessUpdate">Droit d'accès</label>
            <input name="passRightAccessUpdate" type="text" class="form-control" id="passRightAccessUpdate" value="<?= $accessList[0]['pass_right'] ?>" />
          </div>
          <div class="text-right">
            <button type="submit" name="updateAccessTable" class="btn btn-primary">Modifier</button>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</div>
<?php

require 'data/view/admin/footerAdmin.php';

 } ?>
