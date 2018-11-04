<?php
if( isset($_POST['pseudonyme']) and ! empty($_POST['pseudonyme']) ){

  $tErreur = array();
  if( $_POST['password1'] !=  $_POST['password2'] ){
    $tErreur['passwordDiff'] = "Les mot de passe ne sont pas identiques";
  }

  if( empty($tErreur) ){
    $mysqli = bddConnect();
    safeVar($mysqli, "post");
    bddCreateFlush($mysqli, "user", [
      "pseudo" => $pseudonyme,
      "email" => $mail,
      "age" => "0",
      "password" => md5($password1),
      "id_role" => "0",
      "date_registration" => $dbDate,
      "date_last_login" => $dbDate
    ]);
    header('Location: /mon-compte/inscription/reussi.php');
    exit("Inscription Reussi.".$dbDate);
  }

  $mysqli->close();
}
?>
<form method="post">
  <fieldset>
    <legend>Inscription</legend>
    <div class="form-group">
      <label for="pseudonyme">Pseudonyme</label>
      <input name="pseudonyme" type="text" class="form-control" id="pseudonyme" placeholder="Entrer un pseudonyme">
      <small id="nomHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Adresse e-mail</label>
      <input name="mail" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Mot de passe</label>
      <input name="password1" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Confirmer mot de passe</label>
      <input name="password2" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
      <?php if(isset($tErreur['passwordDiff'])){ ?>
      <small id="emailHelp" class="form-text text-muted"><?= $tErreur['passwordDiff'] ?></small>
      <?php } ?>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </fieldset>
</form>
