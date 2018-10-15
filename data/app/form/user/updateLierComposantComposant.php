<?php
$mysqli = bddConnect();
if( isset($_POST['compatibleEnPourCentUpdate']) and !empty($_POST['compatibleEnPourCentUpdate'])){
  $query = "UPDATE `compatibilite`
  SET `degrer` = '".$_POST['compatibleEnPourCentUpdate']."',
      `auteur` = '".$_SESSION['user']['pseudo']."',
      `id_composant1` = '".$_POST['composant1']."',
      `id_composant2` = '".$_POST['composant2']."',
      `date_at` = '".date("Y-m-d H:i:s")."'
  WHERE `compatibilite`.`id` = ".$_POST['compatibleID'].";";
  if (!$mysqli->query($query)) {
    exit("Erreur update RevendeurLnkComposant. $query<br />");
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

foreach ($compatibiliteList as $key => $valueParent) {

 ?><h6 data-toggle="collapse" data-target="#formUpdateComposantLnkComposant<?= $valueParent['id']; ?>"><?= $valueParent['id'] ?></h6>
 <form method="post" id="formUpdateComposantLnkComposant<?= $valueParent['id']; ?>" class="collapse">
   <div class="form-group">
     <label for="compatibleID">ID</label>
     <input type="number" class="form-control" name="compatibleID" id="compatibleID" value="<?= $valueParent['id'] ?>" />
   </div>
   <div class="form-group">
      <label for="composant1">Composant 1</label>
      <select multiple class="form-control" name="composant1" id="composant1">
        <?php foreach ($composantList as $value) { ?>
          <?php if( $valueParent['id_composant1'] == $value['id']) { ?>
          <option value="<?= $value['id']; ?>" selected><?= $value['model']; ?></option>
          <?php }else{ ?>
          <option value="<?= $value['id']; ?>"><?= $value['model']; ?></option>
          <?php } ?>
        <?php } ?>
      </select>
    </div>
   <div class="form-group">
      <label for="composant2">Composant 2</label>
      <select multiple class="form-control" name="composant2" id="composant2">
        <?php foreach ($composantList as $value) { ?>
          <?php if( $valueParent['id_composant2'] == $value['id']) { ?>
          <option value="<?= $value['id']; ?>" selected><?= $value['model']; ?></option>
          <?php }else{ ?>
          <option value="<?= $value['id']; ?>"><?= $value['model']; ?></option>
          <?php } ?>
        <?php } ?>
      </select>
    </div>
    <div class="form-group">
      <label for="compatibleEnPourCentUpdate">Pourcentage de fiabilité</label>
      <input type="number" class="form-control" name="compatibleEnPourCentUpdate" id="compatibleEnPourCentUpdate" value="<?= $valueParent['degrer']  ?>" />
    </div>
    <button type="submit" class="btn btn-primary">Modifier</button>
 </form>
<?php
}
$mysqli->close();
?>
