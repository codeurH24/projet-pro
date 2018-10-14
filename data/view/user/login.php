<main class="container">
<div class="row">
  <div class="col">
<?php
  require_once("data/app/user/login.app.php");
 ?>

    <form method="post">
      <fieldset>
        <legend>Connexion</legend>
        <div class="form-group">
          <label for="exampleInputEmail1">Adresse e-mail</label>
          <input name="mail" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Mot de passe</label>
          <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </fieldset>
    </form>

  </div>
</div>
</main>
