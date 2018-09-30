<main class="container">
<div class="row">
  <div class="col">
<?php
  require_once("data/app/user/registration.app.php");
 ?>




    <form method="post">
      <fieldset>
        <legend>Inscription</legend>
        <div class="form-group">
          <label for="nom">Nom</label>
          <input name="name" type="text" class="form-control" id="nom" aria-describedby="nomHelp" placeholder="Entrer un nom">
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

  </div>
</div>
</main>
