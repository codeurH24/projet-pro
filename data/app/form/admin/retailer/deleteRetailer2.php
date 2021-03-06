<?php
$mysqli = bddConnect();

if( isset($_POST['deleteRevendeur']) and !empty($_POST['deleteRevendeur'])){
  $sql = "";
  foreach ($_POST['deleteRevendeur'] as $key => $value) {
    $sql .= "DELETE FROM `revendeur` WHERE `revendeur`.`id` = $value;";
  }
  if (!$mysqli->multi_query($sql)) {
    bddError($mysqli, $sql);
  }
}

$query = "SELECT * FROM `revendeur` ORDER BY `revendeur`.`nom` ASC";
if ($result = $mysqli->query($query)) {
    $revendeurComposant = $result->fetch_all(MYSQLI_ASSOC);
    $result->free();
}

$mysqli->close();

if( isset($pageDisplay) && $pageDisplay == true ){
require 'data/view/admin/headerAdmin.php';
?>




<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12 col-md-11 col-xl-8">
      <form method="post">
        <fieldset>
          <legend><h2>Supprimer un Revendeur</h2></legend>
          <fieldset class="form-group">
            <legend></legend>
            <?php foreach ($revendeurComposant as $value) { ?>
            <div class="form-check">
              <label class="form-check-label">
                <input name="deleteRevendeur[]" class="form-check-input" type="checkbox" value="<?= $value['id'] ; ?>" />
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
