<?php

if( isset($_POST['nameRevendeur']) and ! empty($_POST['nameRevendeur']) ){

  $tErreur = array();
  $mysqli = bddConnect();

  $_POST["nameRevendeur"] = $mysqli->real_escape_string($_POST["nameRevendeur"]);
  $query = "INSERT INTO `revendeur` (`id`, `nom`) VALUES (NULL, '".$_POST["nameRevendeur"]."')";

  if( empty($tErreur) ){
    if (!$mysqli->query($query)) {
      exit("Erreur creation revendeur.<br />");
    }
  }
  $mysqli->close();
}
?>
<form method="post">
  <fieldset>
    <legend>Creer un Revendeur</legend>
    <div class="form-group">
      <label for="nom">Nom</label>
      <input name="nameRevendeur" type="text" class="form-control" id="nom" aria-describedby="nomHelp" placeholder="Entrer un nom">
      <small id="nomHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="text-right">
      <button type="submit" class="btn btn-primary">Enregistrer</button>
    </div>
  </fieldset>
</form>
