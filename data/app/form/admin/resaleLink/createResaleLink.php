<?php

$mysqli = bddConnect();

if( isset($_POST['lienCreateRevendeurLnkComposant']) and !empty($_POST['lienCreateRevendeurLnkComposant'])){
  $query = "INSERT INTO `revendeur_composant` (`id`, `prix`, `lien`, `auteur`, `id_revendeur`, `id_composant`, `date_at`)
            VALUES (NULL, '".$_POST['prixCreateRevendeurLnkComposant']."', '".$_POST['lienCreateRevendeurLnkComposant']."', '".$_SESSION['user']['pseudo']."', '".$_POST['revendeurCreateRevendeurLnkComposant']."', '".$_POST['composantCreateRevendeurLnkComposant']."', '".date("Y-m-d H:i:s")."');";
  if (!$mysqli->query($query)) {
    bddError($mysqli, $sql);
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

if( isset($pageDisplay) && $pageDisplay == true ){
require 'data/view/admin/headerAdmin.php';
?>
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8 col-xl-6">
      <div class="text-right mb-3">
        <a href="/admin/resaleLink/" class="btn btn-secondary">Retour</a>
      </div>

      <form method="post">
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
        <div class="text-right">
          <button type="submit" class="btn btn-primary">Creer</button>
        </div>
      </form>
    </div>
  </div>
</div>








<?php require 'data/view/admin/footerAdmin.php';
} ?>
