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
?><h2>Supprimer une Compatibilité</h2><?php
$query = "SELECT * FROM `composant` ORDER BY `composant`.`model` ASC";
if ($result = $mysqli->query($query)) {
    $composantList = $result->fetch_all(MYSQLI_ASSOC);
    $result->free();
}
$mysqli->close();

$mysqli = bddConnect();
if( isset($_POST['deleteCompatibilite']) and !empty($_POST['deleteCompatibilite'])){
  $sql = "";
  foreach ($_POST['deleteCompatibilite'] as $key => $value) {
    $sql .= "DELETE FROM `compatibilite` WHERE `compatibilite`.`id` = $value;";
  }
  if (!$mysqli->multi_query($sql)) {
    bddError($mysqli, $sql);
  }
}
$compatibiliteList = [];
$query = "SELECT * FROM `compatibilite` ORDER BY `compatibilite`.`date_at` DESC";
if ($result = $mysqli->query($query)) {
    $compatibiliteList = $result->fetch_all(MYSQLI_ASSOC);
    $result->free();
}
$composantList = [];
$query = "SELECT * FROM `composant` ORDER BY `composant`.`model` ASC";
if ($result = $mysqli->query($query)) {
    $composantList = $result->fetch_all(MYSQLI_ASSOC);
    $result->free();
}

$query = "SELECT compatibilite.id AS compatibiliteID, comp1.model AS model1, comp2.model AS model2
FROM compatibilite
INNER JOIN composant comp1
ON comp1.id = compatibilite.id_composant1
INNER JOIN composant comp2
ON comp2.id = compatibilite.id_composant2
WHERE compatibilite.id = ";

?>
<form method="post">
  <fieldset>
    <legend></legend>
    <fieldset class="form-group">
      <legend></legend>
<?php


foreach ($compatibiliteList as $key => $valueParent) {

  $composantList2D = bddQuery($mysqli, $query.$valueParent['id'])[0];
 ?>
       <div class="form-check">
         <input name="deleteCompatibilite[]" class="form-check-input" type="checkbox" value="<?= $valueParent['id'] ; ?>" />
         <label class="form-check-label">
           <?=$composantList2D['model1']?> -
           <?=$composantList2D['model2']?>
         </label>
       </div>
<?php
}
$mysqli->close();
?>
</fieldset>
<button type="submit" class="btn btn-primary">Supprimer une compatibilitée</button>
</fieldset>
</form>
