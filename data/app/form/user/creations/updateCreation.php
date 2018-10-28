<?php

$mysqli = bddConnect();
if( isset($_POST['nameCreation']) and ! empty($_POST['nameCreation']) ){


  $_POST["nameCreation"] = $mysqli->real_escape_string($_POST["nameCreation"]);
  $_POST["descriptionCreation"] = $mysqli->real_escape_string($_POST["descriptionCreation"]);

  $query = "UPDATE `creation`
            SET
              `name` = '".$_POST['nameCreation']."',
              `description` = '".$_POST['descriptionCreation']."',
              `id_user` = '".$_SESSION['user']['id']."',
              `date_creation` = '".date('Y-m-d H:i:s')."'
            WHERE
              `creation`.`id` = ".$_POST['idCreationUpdate'];
  if (!$mysqli->query($query)) {
    exit("Erreur modification creation .<br />$query<br />". mysqli_error($mysqli));
  }

}

$query = "SELECT * FROM `creation`";
if ($result = $mysqli->query($query)) {
    $creationList = $result->fetch_all(MYSQLI_ASSOC);
    $result->free();
}

$mysqli->close();


foreach ($creationList as $creation) { ?>
<h4 data-toggle="collapse" data-target="#form<?= $creation['id']; ?>" ><?= $creation['name']; ?></h4>
<form method="post" id="form<?= $creation['id']; ?>" class="collapse" enctype="multipart/form-data" style="padding-bottom:50px">
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
