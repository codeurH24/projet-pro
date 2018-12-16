<?php
if( isset($_POST['createCategoryTable'])  ){
  $mysqli = bddConnect();

  safeVar($mysqli, "post");
  bddCreateFlush($mysqli, "categorie", [
    "nom" => $adminNameCreateCategory
  ]);

  $mysqli->close();
  header('Location: /admin/categorie/');
  exit('redirection de create rcategorie vers admin categorie');
}

if( isset($pageDisplay) && $pageDisplay == true ){
  require 'data/view/admin/headerAdmin.php';
?>
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8 col-xl-6">
      <div class="text-right mb-3">
        <a href="/admin/categorie/" class="btn btn-secondary">Retour</a>
      </div>
      <form method="post">
        <fieldset>
          <legend>Creer une catégorie</legend>
          <div class="form-group">
            <label for="adminNameCreateCategory">Nom de la catégorie</label>
            <input name="adminNameCreateCategory" type="text" class="form-control" id="adminNameCreateCategory" />
          </div>
          <div class="text-right">
            <button type="submit" name="createCategoryTable" class="btn btn-primary">Creer</button>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</div>
<?php require 'data/view/admin/footerAdmin.php';
} ?>
