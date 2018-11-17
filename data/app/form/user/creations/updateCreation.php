<?php

$mysqli = bddConnect();
if( isset($_POST['nameCreation']) and ! empty($_POST['nameCreation']) ){
  safeVar($mysqli, "post");
  $query = bddUpdateFlush(
            $mysqli,
            "creation", [
              "name" => $nameCreation,
              "description" => $descriptionCreation,
              "id_user" => $UID,
              "date_creation" => $dbDate
            ],
            "WHERE `creation`.`id` = $idCreationUpdate"
  );
}

$query = "SELECT * FROM `creation`";
$show = "";
if( isset($_GET["id"])){
  $query = "SELECT * FROM `creation`
            WHERE creation.id = ".$_GET["id"];
  $show = "show";
}
if (($creationList = bddQuery($mysqli, $query)) === false) {
  bddError($mysqli, $query);
}

$mysqli->close();
?>
<div class="text-right">
  <a href="/mes-creations/" class="btn btn-secondary">Retour</a>
</div>
<?php


foreach ($creationList as $creation) { ?>
<h4 data-toggle="collapse" data-target="#form<?= $creation['id']; ?>"><?= $creation['name']?></h4>
<form method="post" id="form<?= $creation['id']; ?>" class="collapse <?=$show?>" enctype="multipart/form-data" style="padding-bottom:50px">
  <fieldset>
    <legend></legend>
    <div class="form-group d-none">
      <label for="idCreationUpdate<?= $creation['id']; ?>">ID:</label>
      <input type="text" value="<?= $creation['id']; ?>" name="idCreationUpdate" id="idCreationUpdate<?= $creation['id']; ?>" class="form-control" />
    </div>
    <div class="form-group">
      <label for="nameCreation">Nom</label>
      <input name="nameCreation" type="text" class="form-control" id="nameCreation" aria-describedby="nomHelp" value="<?= $creation['name']; ?>" />
    </div>
    <div class="form-group">
      <label for="descriptionCreation">Description</label>
      <input name="descriptionCreation" type="text" class="form-control" id="descriptionCreation" aria-describedby="nomHelp" value="<?= $creation['description']; ?>" />
    </div>
    <button type="submit" class="btn btn-primary">Modifier une création</button>
  </fieldset>
</form>
<?php } ?>
