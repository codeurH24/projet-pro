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

$query = "SELECT compatibilite.id AS compatibiliteID, comp1.model AS model1, comp2.model AS model2
FROM compatibilite
INNER JOIN composant comp1
ON comp1.id = compatibilite.id_composant1
INNER JOIN composant comp2
ON comp2.id = compatibilite.id_composant2
WHERE compatibilite.id = ";
foreach ($compatibiliteList as $key => $valueParent) {

  $composantList2D = bddQuery($mysqli, $query.$valueParent['id'])[0];
if( isset($pageDisplay) && $pageDisplay == true ){
  require 'data/view/admin/headerAdmin.php';
 ?>


   <div class="container-fluid">
     <div class="row justify-content-center">
       <div class="col-1 text-right">
         <i class="fas fa-2x fa-link"></i>
       </div>
       <div class="col-8">
         <h6 data-toggle="collapse" data-target="#formUpdateComposantLnkComposant<?= $valueParent['id']; ?>"><?= $composantList2D['model1'] ?></h6>
         <h6 data-toggle="collapse" data-target="#formUpdateComposantLnkComposant<?= $valueParent['id']; ?>" style="padding-bottom:30px;"><?= $composantList2D['model2'] ?></h6>
       </div>
     </div>
   </div>
 <div class="container-fluid">
   <div class="row justify-content-center">
     <div class="col-12 col-md-8 col-xl-6">
       <form method="post" id="formUpdateComposantLnkComposant<?= $valueParent['id']; ?>" class="collapse" style="padding-bottom:30px;">
         <fieldset>
           <legend><h2>Modifier une compatibilitée</h2></legend>
           <div class="form-group">
             <!-- <label for="compatibleID">ID</label> -->
             <input type="hidden" class="form-control" name="compatibleID" id="compatibleID" value="<?= $valueParent['id'] ?>" />
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
            <div class="text-right">
              <button type="submit" class="btn btn-primary">Modifier</button>
            </div>
        </fieldset>
       </form>
     </div>
   </div>
 </div>




<?php
}
$mysqli->close();

?>
<?php require 'data/view/admin/footerAdmin.php';
} ?>
