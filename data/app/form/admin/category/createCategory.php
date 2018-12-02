<?php

if( isset($_POST['nameCategorie']) and ! empty($_POST['nameCategorie']) ){

  $tErreur = array();
  $mysqli = bddConnect();

  // $_POST["nameCategorie"] = $mysqli->real_escape_string($_POST["nameCategorie"]);
  // $query = "INSERT INTO `categorie` (`id`, `nom`) VALUES (NULL, '".$_POST["nameCategorie"]."')";

  if( empty($tErreur) ){
    safeVar($mysqli, "post");
    bddCreateFlush($mysqli, "categorie", [
      "nom" => $nameCategorie
    ]);
  }
  $mysqli->close();
}
?>



<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8 col-xl-4">
      <form method="post">
        <fieldset>
          <legend>Creer une Categorie</legend>
          <div class="form-group">
            <label for="nom">Nom de Categorie</label>
            <input name="nameCategorie" type="text" class="form-control" id="nom" aria-describedby="nomHelp" placeholder="Entrer un nom de categorie">
            <small id="nomHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="text-right">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</div>
