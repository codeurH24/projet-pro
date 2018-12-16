<?php

//INSERT INTO `role` (`id`, `nom`) VALUES (NULL, 'role test'), (NULL, 'test test');

if( isset($_POST['createRoleTable'])  ){


  $mysqli = bddConnect();

  safeVar($mysqli, "post");
  bddCreateFlush($mysqli, "role", [
    "nom" => $adminNameCreateRole
  ]);

  $mysqli->close();
  header('Location: /admin/roles/');
  exit('redirection de create role vers admin role');
}

if( isset($pageDisplay) && $pageDisplay == true ){
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
          <legend>Creer un role</legend>
          <div class="form-group">
            <label for="adminNameCreateRole">Nom du role</label>
            <input name="adminNameCreateRole" type="text" class="form-control" id="adminNameCreateRole" />
          </div>
          <div class="text-right">
            <button type="submit" name="createRoleTable" class="btn btn-primary">Creer</button>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</div>
<?php require 'data/view/admin/footerAdmin.php';
} ?>
