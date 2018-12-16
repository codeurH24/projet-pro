<?php

//INSERT INTO `role` (`id`, `nom`) VALUES (NULL, 'role test'), (NULL, 'test test');

if( isset($_POST['createAccessTable'])  ){


  $mysqli = bddConnect();

  safeVar($mysqli, "post");
  bddCreateFlush($mysqli, "access", [
    "url" => $URLAccessCreate,
    "role_id" => $IDRoleUserCreate,
    "pass_right" => '0'
  ]);

  $mysqli->close();
  header('Location: /admin/acces/');
  exit('redirection de create access vers admin acces');
}

if( isset($pageDisplay) && $pageDisplay == true ){
  require 'data/view/admin/headerAdmin.php';

  $mysqli = bddConnect();

  $query = "SELECT * FROM `role`";
  $roleList = bddQuery($mysqli, $query);

  $mysqli->close();
?>
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8 col-xl-6">
      <div class="text-right mb-3">
        <a href="/admin/acces/" class="btn btn-secondary">Retour</a>
      </div>
      <form method="post">
        <fieldset>
          <legend>Creer un accès</legend>
          <div class="form-group">
            <label for="IDRoleUserCreate">Role</label>
            <select name="IDRoleUserCreate" type="text" class="form-control" id="IDRoleUserCreate" />
              <?php
              foreach ($roleList as $role) {
                  ?><option value="<?= $role['id'] ?>"><?= $role['nom'] ?></option><?php
              }?>
            </select>
          </div>
          <div class="form-group">
            <label for="URLAccessCreate">URL</label>
            <input name="URLAccessCreate" type="text" class="form-control" id="URLAccessCreate" />
          </div>
          <div class="text-right">
            <button type="submit" name="createAccessTable" class="btn btn-primary">Creer</button>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</div>
<?php require 'data/view/admin/footerAdmin.php';
} ?>
