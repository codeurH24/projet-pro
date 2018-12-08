<?php

$mysqli = bddConnect();
if( isset($_POST['idCreationUpdate']) and ! empty($_POST['idCreationUpdate']) ){
  safeVar($mysqli, "post");
  $query = "DELETE FROM `creation`
            WHERE `creation`.`id` = ".$idCreationUpdate;
  if (bddQuery($mysqli, $query) === false) {
    bddError($mysqli, $query);
  }
  header('Location: /mes-creations/');
  exit('Config supprimé.');
}
$query = "SELECT * FROM `creation`";
$show = "";
if( isset($_GET["id"])){
  $query = "SELECT * FROM `creation` WHERE creation.id = ".$_GET["id"];
  $show = "show";
}
if (($creationList = bddQuery($mysqli, $query)) === false) {
  bddError($mysqli, $query);
}
$mysqli->close();



if( isset($pageDisplay) && $pageDisplay == true ){
require_once("data/view/user/creations/headerCreation.php");
?>
<div class="text-right">
  <a href="/mes-creations/" class="btn btn-secondary">Retour</a>
</div>
<?php

foreach ($creationList as $creation) { ?>
<h4 data-toggle="collapse" data-target="#form<?= $creation['id']; ?>" ><?= $creation['name']; ?></h4>
<form method="post" id="form<?= $creation['id']; ?>" class="collapse <?=$show?>" enctype="multipart/form-data" style="padding-bottom:50px">
  <div class="form-group d-none">
    <label for="idCreationUpdate<?= $creation['id']; ?>">ID:</label>
    <input type="text" value="<?= $creation['id']; ?>" name="idCreationUpdate" id="idCreationUpdate<?= $creation['id']; ?>" class="form-control" />
  </div>
  <p>Souhaitez-vous vraiment supprimer ?</p>
  <div class="text-right">
    <button type="submit" class="btn btn-primary">Supprimer</button>
  </div>
</form>
<?php }
require_once("data/view/user/creations/footerCreation.php");
}
 ?>
