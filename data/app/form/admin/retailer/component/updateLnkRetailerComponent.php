<?php
/*
SELECT compatibilite.id, c1.model AS 'model1', c2.model AS 'model2' FROM `compatibilite`
JOIN composant AS c1 ON compatibilite.id_composant1 = c1.id
JOIN composant AS c2 ON compatibilite.id_composant2 = c2.id
WHERE compatibilite.id = 3
*/
$mysqli = bddConnect();

if( isset($_POST['lienUpdateRevendeurLnkComposant']) and !empty($_POST['lienUpdateRevendeurLnkComposant'])){

  $query = "UPDATE `revendeur_composant`
            SET `prix` = '".$_POST['prixUpdateRevendeurLnkComposant']."',
                `lien` = '".$_POST['lienUpdateRevendeurLnkComposant']."',
                `auteur` = '".$_SESSION['user']['pseudo']."',
                `id_revendeur` = '".$_POST['revendeurUpdateRevendeurLnkComposant']."',
                `id_composant` = '".$_POST['composantUpdateRevendeurLnkComposant']."',
                `date_at` = '".date("Y-m-d H:i:s")."'
            WHERE `revendeur_composant`.`id` = ".$_POST['idUpdateRevendeurLnkComposant'].";";
  if (!$mysqli->query($query)) {
    exit("Erreur update RevendeurLnkComposant. $query<br />");
  }
}


$revendeurComposanttList = [];
$query = "SELECT * FROM `revendeur_composant`";
if ($result = $mysqli->query($query)) {
    $revendeurComposanttList = $result->fetch_all(MYSQLI_ASSOC);
    $result->free();
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

if( isset($pageDisplay) && $pageDisplay == true ){
require 'data/view/admin/headerAdmin.php';
?>
<h2>Modifier Reference</h2>
<?php

foreach ($revendeurComposanttList as $key => $valueParent) {

  $sql = "SELECT revendeur_composant.id, revendeur.nom, composant.model FROM revendeur_composant
        LEFT JOIN revendeur ON revendeur_composant.id_revendeur = revendeur.id
        RIGHT JOIN composant ON revendeur_composant.id_composant = composant.id
        WHERE revendeur_composant.id = ".$valueParent['id'].";";
  if ($result = $mysqli->query($sql)) {
      $titre = $result->fetch_assoc();
      $result->free();
  }


?><h6 data-toggle="collapse" data-target="#formUpdateRevendeurLnkComposant<?= $valueParent['id']; ?>"><?= @$titre['nom']; ?> - <?= @$titre['model']; ?></h6>
<form method="post" id="formUpdateRevendeurLnkComposant<?= $valueParent['id']; ?>" class="collapse">
  <div class="form-group">
    <label>ID</label>
    <input type="type" value="<?= $valueParent['id']; ?>" name="idUpdateRevendeurLnkComposant" class="form-control"  />
  </div>
  <div class="form-group">
    <label for="revendeurUpdateRevendeurLnkComposant">Revendeur</label>
    <select multiple class="form-control" name="revendeurUpdateRevendeurLnkComposant" id="revendeurUpdateRevendeurLnkComposant">
      <?php foreach ($revendeurComposant as $value) { ?>
        <?php if( $valueParent['id_revendeur'] == $value['id']) { ?>
        <option value="<?= $value['id']; ?>" selected><?= $value['nom']; ?></option>
        <?php }else{ ?>
        <option value="<?= $value['id']; ?>"><?= $value['nom']; ?></option>
        <?php } ?>
      <?php } ?>
    </select>
  </div>
  <div class="form-group">
    <label for="composantUpdateRevendeurLnkComposant">Composant</label>
    <select multiple class="form-control" name="composantUpdateRevendeurLnkComposant" id="composantUpdateRevendeurLnkComposant">
      <?php foreach ($composantList as $value) { ?>
        <?php if( $valueParent['id_composant'] == $value['id']) { ?>
        <option value="<?= $value['id']; ?>" selected><?= $value['model']; ?></option>
        <?php }else{ ?>
        <option value="<?= $value['id']; ?>"><?= $value['model']; ?></option>
        <?php } ?>
      <?php } ?>
    </select>
  </div>
  <div class="form-group">
    <label for="lienUpdateRevendeurLnkComposant">Lien</label>
    <input type="type" value="<?= $valueParent['lien']; ?>" class="form-control" name="lienUpdateRevendeurLnkComposant" id="lienUpdateRevendeurLnkComposant">
  </div>
  <div class="form-group">
    <label for="prixUpdateRevendeurLnkComposant">Prix</label>
    <input type="type" value="<?= $valueParent['prix']; ?>" class="form-control" name="prixUpdateRevendeurLnkComposant" id="prixUpdateRevendeurLnkComposant">
  </div>
  <div class="text-right">
    <button type="submit" class="btn btn-primary">Creer</button>
  </div>
</form>

<?php
}
$mysqli->close();
 ?>
<?php require 'data/view/admin/footerAdmin.php';
} ?>
