<?php
$mysqli = bddConnect();

if( isset($_POST['deleteComposant']) and !empty($_POST['deleteComposant'])){
  $sql = "";
  foreach ($_POST['deleteComposant'] as $key => $value) {
    $sql .= "DELETE FROM `composant` WHERE `composant`.`id` = $value;";
  }
  if (!$mysqli->multi_query($sql)) {
    exit("Suppression composant erreur.<br />");
  }
}
?><?php
$query = "SELECT * FROM `composant` ORDER BY `composant`.`model` ASC";
if ($result = $mysqli->query($query)) {
    $composantList = $result->fetch_all(MYSQLI_ASSOC);
    $result->free();
}
$mysqli->close();
if( isset($pageDisplay) && $pageDisplay == true ){
require 'data/view/admin/headerAdmin.php';
?>

<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8 col-xl-6">
      <form method="post">
        <fieldset>
          <legend><h2>Supprimer un Composant</h2></legend>
          <fieldset class="form-group">
            <legend></legend>
            <?php foreach ($composantList as $value) { ?>
            <div class="form-check">
              <label class="form-check-label">
                <input name="deleteComposant[]" class="form-check-input" type="checkbox" value="<?= $value['id'] ; ?>" />
                <?= $value['model'] ; ?>
              </label>
            </div>
            <?php } ?>
          </fieldset>
          <div class="text-right">
            <button type="submit" class="btn btn-primary">Supprimer un composant</button>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</div>
<?php require 'data/view/admin/footerAdmin.php';
} ?>
