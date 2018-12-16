<?php
if( isset($_POST['createRetailerTable'])  ){
  $mysqli = bddConnect();

  safeVar($mysqli, "post");
  bddCreateFlush($mysqli, "revendeur", [
    "nom" => $adminNameCreateRetailer
  ]);

  $mysqli->close();
  header('Location: /admin/revendeur/');
  exit('redirection de create revendeur vers admin revendeur');
}

if( isset($pageDisplay) && $pageDisplay == true ){
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
          <legend>Creer un revendeur</legend>
          <div class="form-group">
            <label for="adminNameCreateRetailer">Nom du revendeur</label>
            <input name="adminNameCreateRetailer" type="text" class="form-control" id="adminNameCreateRetailer" />
          </div>
          <div class="text-right">
            <button type="submit" name="createRetailerTable" class="btn btn-primary">Creer</button>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</div>
<?php require 'data/view/admin/footerAdmin.php';
} ?>
