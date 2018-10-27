<?php

$mysqli = bddConnect();

if( isset($_POST['lienCreateRevendeurLnkComposant']) and !empty($_POST['lienCreateRevendeurLnkComposant'])){
  $query = "INSERT INTO `revendeur_composant` (`id`, `prix`, `lien`, `auteur`, `id_revendeur`, `id_composant`, `date_at`)
            VALUES (NULL, '".$_POST['prixCreateRevendeurLnkComposant']."', '".$_POST['lienCreateRevendeurLnkComposant']."', '".$_SESSION['user']['pseudo']."', '".$_POST['revendeurCreateRevendeurLnkComposant']."', '".$_POST['composantCreateRevendeurLnkComposant']."', '".date("Y-m-d H:i:s")."');";
  if (!$mysqli->query($query)) {
    exit("Erreur creation RevendeurLnkComposant. $query<br />");
  }
}

$revendeurComposant = [];
$query = "SELECT * FROM `revendeur` ORDER BY `revendeur`.`nom` ASC";
if ($result = $mysqli->query($query)) {
    $revendeurComposant = $result->fetch_all(MYSQLI_ASSOC);
    $result->free();
}
$composantList = [];
$query = "SELECT * FROM `composant` ORDER BY `composant`.`model` ASC";
if ($result = $mysqli->query($query)) {
    $composantList = $result->fetch_all(MYSQLI_ASSOC);
    $result->free();
}
$mysqli->close();
?><form method="post">
  <div class="form-group">
    <label for="revendeurCreateRevendeurLnkComposant">Revendeur</label>
    <select multiple class="form-control" name="revendeurCreateRevendeurLnkComposant" id="revendeurCreateRevendeurLnkComposant">
      <?php foreach ($revendeurComposant as $value) { ?>
        <option value="<?= $value['id']; ?>"><?= $value['nom']; ?></option>
      <?php } ?>
    </select>
  </div>
  <div class="form-group">
    <label for="composantCreateRevendeurLnkComposant">Composant</label>
    <select multiple class="form-control" name="composantCreateRevendeurLnkComposant" id="composantCreateRevendeurLnkComposant">
      <?php foreach ($composantList as $value) { ?>
        <option value="<?= $value['id']; ?>"><?= $value['model']; ?></option>
      <?php } ?>
    </select>
  </div>
  <div class="form-group">
    <label for="lienCreateRevendeurLnkComposant">Lien</label>
    <input type="type" class="form-control" name="lienCreateRevendeurLnkComposant" id="lienCreateRevendeurLnkComposant">
  </div>
  <div class="form-group">
    <label for="prixCreateRevendeurLnkComposant">Prix</label>
    <input type="type" class="form-control" name="prixCreateRevendeurLnkComposant" id="prixCreateRevendeurLnkComposant">
  </div>
  <button type="submit" class="btn btn-primary">Creer</button>
</form>