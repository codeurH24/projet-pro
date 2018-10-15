<?php



if( isset($_POST['nameCategorie']) and ! empty($_POST['nameCategorie']) ){

  $tErreur = array();


  //INSERT INTO `user` (`id`, `nom`, `prenom`, `pseudo`, `age`, `password`, `date_registration`, `date_last_login`, `id_adresse`, `id_role`) VALUES (NULL, 'corlouer', 'florent', 'codeurh24', '25', 'azerty1234', '2018-09-24 00:00:00', '2018-09-24 00:00:00', '0', '0');
  $mysqli = bddConnect();

  $_POST["nameCategorie"] = $mysqli->real_escape_string($_POST["nameCategorie"]);
  $query = "INSERT INTO `categorie` (`id`, `nom`) VALUES (NULL, '".$_POST["nameCategorie"]."')";

  if( empty($tErreur) ){
    if (!$mysqli->query($query)) {
      exit("Erreur creation categorie.<br />");
    }
    // header('Location: ./inscription-reussi.php');
    // exit("Inscription Reussi.".date('Y-m-d H:i:s'));
  }
  $mysqli->close();
}
?>
<form method="post">
  <fieldset>
    <legend></legend>
    <div class="form-group">
      <label for="nom">Nom</label>
      <input name="nameCategorie" type="text" class="form-control" id="nom" aria-describedby="nomHelp" placeholder="Entrer un nom">
      <small id="nomHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
  </fieldset>
</form>
