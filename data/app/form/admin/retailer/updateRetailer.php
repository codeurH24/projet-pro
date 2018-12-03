<?php
$mysqli = bddConnect();
if( isset($_POST['updateRevendeur']) and !empty($_POST['updateRevendeur'])){
  $sql = "";
  foreach ($_POST['updateRevendeur'] as $key => $value) {
    if( !empty($value)){
      $sql .= "UPDATE `revendeur` SET `nom` = '$value' WHERE `revendeur`.`id` = $key;";
    }
  }
  if (!$mysqli->multi_query($sql)) {
      exit("Mise a jour revendeur erreur.<br />");
  }
}

$revendeurComposant = [];
$query = "SELECT * FROM `revendeur` ORDER BY `revendeur`.`nom` ASC";
if ($result = $mysqli->query($query)) {
    $revendeurComposant = $result->fetch_all(MYSQLI_ASSOC);
    $result->free();
}

$mysqli->close();
?><h2>Modifier un revendeur</h2>
<form method="post">
  <fieldset>
    <legend></legend>
    <?php foreach ($revendeurComposant as $value) { ?>
      <div class="form-group">
        <label for="exampleInputPassword1"><?= $value['nom']; ?></label>
        <input type="text" name="updateRevendeur[<?= $value['id']; ?>]" id="exampleInputPassword1" class="form-control" />
      </div>
    <?php } ?>
    <div class="text-right">
      <button type="submit" class="btn btn-primary">Modifier</button>
    </div>
  </fieldset>
</form>
