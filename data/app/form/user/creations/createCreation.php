<?php


if( isset($_POST['nameCreation']) and ! empty($_POST['nameCreation']) ){
  $mysqli = bddConnect();

  $_POST["nameCreation"] = $mysqli->real_escape_string($_POST["nameCreation"]);
  $_POST["descriptionCreation"] = $mysqli->real_escape_string($_POST["descriptionCreation"]);

  $query = "INSERT INTO `creation` (`id`, `name`, `description`, `id_user`, `date_creation`)
            VALUES (NULL, '".$_POST['nameCreation']."',
            '".$_POST['descriptionCreation']."',
            '".$_SESSION['user']['id']."',
            '".date('Y-m-d H:i:s')."');";
  if (!$mysqli->query($query)) {
    exit("Erreur creer creation .<br />$query<br />". mysqli_error($mysqli));
  }
  $mysqli->close();
}

 ?>

<form method="post">
  <fieldset>
    <legend>Formulaire créer une création</legend>
    <div class="form-group">
      <label for="nameCreation">Nom</label>
      <input name="nameCreation" type="text" class="form-control" id="nameCreation" aria-describedby="nomHelp" placeholder="Entrer un nom">
    </div>
    <div class="form-group">
      <label for="descriptionCreation">Description</label>
      <input name="descriptionCreation" type="text" class="form-control" id="descriptionCreation" aria-describedby="nomHelp" placeholder="Entrer une description">
    </div>
    <button type="submit" class="btn btn-primary">Créer une création</button>
  </fieldset>
</form>
