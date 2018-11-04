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
?><h2>Supprimer un Revendeur</h2>
<form method="post">
  <fieldset>
    <legend></legend>
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
    <button type="submit" class="btn btn-primary">Supprimer</button>
  </fieldset>
</form>
