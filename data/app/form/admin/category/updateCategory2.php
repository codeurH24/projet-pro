<?php
$mysqli = bddConnect();
if( isset($_POST['updateCategorie']) and !empty($_POST['updateCategorie'])){
  $sql = "";
  foreach ($_POST['updateCategorie'] as $key => $value) {
    if( !empty($value)){
      $sql .= "UPDATE `categorie` SET `nom` = '$value' WHERE `categorie`.`id` = $key;";
    }
  }
  if (!$mysqli->multi_query($sql)) {
      bddError($mysqli, $sql);
  }
}

$query = "SELECT * FROM `categorie` ORDER BY `categorie`.`nom` ASC";
$categorieComposant = bddQuery($mysqli, $query);

$mysqli->close();
if( isset($pageDisplay) && $pageDisplay == true ){
require 'data/view/admin/headerAdmin.php';
?>

<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8 col-xl-4">
      <form method="post">
        <fieldset>
          <legend>Modifier une Categorie</legend>
          <?php foreach ($categorieComposant as $value) { ?>
            <div class="form-group">
              <label for="exampleInputPassword1"><?= $value['nom']; ?></label>
              <input type="text" name="updateCategorie[<?= $value['id']; ?>]" id="exampleInputPassword1" class="form-control" />
            </div>
          <?php } ?>
          <div class="text-right">
            <button type="submit" class="btn btn-primary">Modifier</button>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</div>
<?php require 'data/view/admin/footerAdmin.php';
} ?>
