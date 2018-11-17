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
?><form method="post">
  <fieldset>
    <legend>Modifier une Categorie</legend>
    <?php foreach ($categorieComposant as $value) { ?>
      <div class="form-group">
        <label for="exampleInputPassword1"><?= $value['nom']; ?></label>
        <input type="text" name="updateCategorie[<?= $value['id']; ?>]" id="exampleInputPassword1" class="form-control" />
      </div>
    <?php } ?>
    <button type="submit" class="btn btn-primary">Modifier</button>
  </fieldset>
</form>
