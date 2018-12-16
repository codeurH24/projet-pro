<?php


  if( isset($_POST['updateCategoryTable']) ){
    $mysqli = bddConnect();

    $query = "UPDATE `categorie`
              SET
              `nom` = '".$_POST['nomCategoryUpdate']."'
              WHERE
              `id` = ".$_GET['id-categorie'];

    if(bddQuery($mysqli, $query)){
      bddError($mysqli, $query);
    }

    $mysqli->close();
    header('Location: '.$_SERVER['REQUEST_URI']);
    exit('category update<br />');
  }


if( isset($pageDisplay) && $pageDisplay == true ){
  $mysqli = bddConnect();


  $query = "SELECT * FROM `categorie` WHERE `id` = ".$_GET['id-categorie'];
  $categoryList = bddQuery($mysqli, $query);

  $mysqli->close();

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
          <legend>Modification d'une catégorie</legend>
          <div class="form-group">
            <label for="nomCategoryUpdate">Nom</label>
            <input name="nomCategoryUpdate" type="text" class="form-control" id="nomCategoryUpdate" value="<?= $categoryList[0]['nom'] ?>" />
          </div>
          <div class="text-right">
            <button type="submit" name="updateCategoryTable" class="btn btn-primary">Modifier</button>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</div>
<?php

require 'data/view/admin/footerAdmin.php';

 } ?>
