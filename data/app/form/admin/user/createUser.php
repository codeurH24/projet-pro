<?php
if( isset($_POST['createUserTable'])  ){

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

  }

  $mysqli->close();
}

if( isset($pageDisplay) && $pageDisplay == true ){
  require 'data/view/admin/headerAdmin.php';
?>
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8 col-xl-6">
      <div class="text-right mb-3">
        <a href="/admin/utilisateurs/" class="btn btn-secondary">Retour</a>
      </div>
      <form method="post">
        <fieldset>
          <legend>Creer l'utilisateur</legend>
          <div class="form-group">
            <label for="pseudonyme">Pseudonyme</label>
            <input name="pseudonyme" type="text" class="form-control" id="pseudonyme" placeholder="">
            <p class="error">We'll never share your email with anyone else.</p>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Adresse e-mail</label>
            <input name="mail" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
            <p class="error">We'll never share your email with anyone else.</p>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Mot de passe</label>
            <input name="password1" type="password" class="form-control" id="exampleInputPassword1" placeholder="">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Confirmer le mot de passe</label>
            <input name="password2" type="password" class="form-control" id="exampleInputPassword1" placeholder="">
            <?php if(isset($tErreur['passwordDiff'])){ ?>
            <p class="error">We'll never share your email with anyone else.</p>
            <?php } ?>
          </div>
          <div class="text-right">
            <button type="submit" name="createUserTable" class="btn btn-primary">Creer</button>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</div>
<?php require 'data/view/admin/footerAdmin.php';
} ?>
