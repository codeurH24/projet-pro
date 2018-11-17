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
?><h2>Supprimer un Composant</h2><?php
$query = "SELECT * FROM `composant` ORDER BY `composant`.`model` ASC";
if ($result = $mysqli->query($query)) {
    $composantList = $result->fetch_all(MYSQLI_ASSOC);
    $result->free();
}
$mysqli->close();
?><form method="post">
  <fieldset>
    <legend></legend>
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
    <button type="submit" class="btn btn-primary">Supprimer un composant</button>
  </fieldset>
</form>
