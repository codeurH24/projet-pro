<?php

$mysqli = bddConnect();
if( isset($_POST['idCreationUpdate']) and ! empty($_POST['idCreationUpdate']) ){


  $_POST["idCreationUpdate"] = $mysqli->real_escape_string($_POST["idCreationUpdate"]);

  $query = "DELETE FROM `creation` WHERE `creation`.`id` = ".$_POST["idCreationUpdate"];
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
  <div class="form-group d-none">
    <label for="idCreationUpdate<?= $creation['id']; ?>">ID:</label>
    <input type="text" value="<?= $creation['id']; ?>" name="idCreationUpdate" id="idCreationUpdate<?= $creation['id']; ?>" class="form-control" />
  </div>
  <button type="submit" class="btn btn-primary">Supprimer</button>
</form>
<?php } ?>
