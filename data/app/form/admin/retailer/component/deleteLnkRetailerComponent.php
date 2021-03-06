<?php
$mysqli = bddConnect();

if( isset($_POST['deleteRevendeurLnkComposant']) and !empty($_POST['deleteRevendeurLnkComposant'])){
  $sql = "";
  foreach ($_POST['deleteRevendeurLnkComposant'] as $key => $value) {
    $sql .= "DELETE FROM `revendeur_composant` WHERE `revendeur_composant`.`id` = $value;";
  }
  if (!$mysqli->multi_query($sql)) {
    bddError($mysqli, $sql);
  }
  $mysqli->next_result();
}

$query = "SELECT * FROM `revendeur_composant` ORDER BY `revendeur_composant`.`date_at` DESC";
if ($result = $mysqli->query($query)) {
    $revendeurComposantList = $result->fetch_all(MYSQLI_ASSOC);
    $result->free();
}

if( isset($pageDisplay) && $pageDisplay == true ){
require 'data/view/admin/headerAdmin.php';

?><h2>Supprimer Reference</h2>
<form method="post">
  <fieldset>
    <legend></legend>
    <fieldset class="form-group">
      <legend></legend>
      <?php foreach ($revendeurComposantList as $value) {
        $sql = "SELECT revendeur_composant.id, revendeur.nom, composant.model FROM revendeur_composant
              LEFT JOIN revendeur ON revendeur_composant.id_revendeur = revendeur.id
              RIGHT JOIN composant ON revendeur_composant.id_composant = composant.id
              WHERE revendeur_composant.id = ".$value['id'];
        if ($result = @$mysqli->query($sql)) {
            $titre = $result->fetch_assoc();
            $result->free();
        }
      ?>
      <div class="form-check">
        <label class="form-check-label">
          <input name="deleteRevendeurLnkComposant[]" class="form-check-input" type="checkbox" value="<?= $value['id'] ; ?>" />
          <?= $titre['nom'] ; ?> - <?= $titre['model'] ; ?>
        </label>
      </div>
      <?php } ?>
    </fieldset>
    <div class="text-right">
      <button type="submit" class="btn btn-primary">Supprimer</button>
    </div>
  </fieldset>
</form>
<?php
$mysqli->close(); ?>
<?php require 'data/view/admin/footerAdmin.php';
} ?>
