<?php
$mysqli = bddConnect();

if( isset($_POST['deleteCategorie']) and !empty($_POST['deleteCategorie'])){
  $sql = "";
  foreach ($_POST['deleteCategorie'] as $key => $value) {
    $sql .= "DELETE FROM `categorie` WHERE `categorie`.`id` = $value;";
  }
  if (!$mysqli->multi_query($sql)) {
    bddError($mysqli, $sql);
  }
}

$query = "SELECT * FROM `categorie` ORDER BY `categorie`.`nom` ASC";
if ($result = $mysqli->query($query)) {
    $categorieComposant = $result->fetch_all(MYSQLI_ASSOC);
    $result->free();
}
$mysqli->close();
if( isset($pageDisplay) && $pageDisplay == true ){
require 'data/view/admin/headerAdmin.php';
?>

<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8 col-xl-4">
      <form method="post">
        <fieldset>
          <legend></legend>
          <fieldset class="form-group">
            <legend>Supprimer une Categorie</legend>
            <?php foreach ($categorieComposant as $value) { ?>
            <div class="form-check">
              <label class="form-check-label">
                <input name="deleteCategorie[]" class="form-check-input" type="checkbox" value="<?= $value['id'] ; ?>" />
                <?= $value['nom'] ; ?>
              </label>
            </div>
            <?php } ?>
          </fieldset>
          <div class="text-right">
            <button type="submit" class="btn btn-primary">Supprimer</button>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</div>
<?php require 'data/view/admin/footerAdmin.php';
} ?>
