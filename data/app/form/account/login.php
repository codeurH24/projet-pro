<?php
if( isset($_POST['mail']) and !empty($_POST['mail'])){
  $mysqli = bddConnect();

  $_POST["mail"] = $mysqli->real_escape_string($_POST["mail"]);
  $_POST["password"] = $mysqli->real_escape_string($_POST["password"]);
  $tErreur = array();


  if( empty($tErreur) ){
    safeVar($mysqli, "post");
    $passwordMD5 = md5($password);
    $query = "SELECT * FROM `user` WHERE `email` LIKE '$mail' AND `password` LIKE '$passwordMD5'";
    $row = bddQuery($mysqli, $query)[0];
    if($row["password"] == $passwordMD5){
      $_SESSION['user'] = [
        "id" => $row["id"],
        "pseudo" => $row["pseudo"],
      ];
    }
    if (!isset($_SESSION['user']) and empty($_SESSION['user'])){
      exit("Probleme de session.");
    }else{
      header('Location: /mon-compte/');
      exit("Connexion Reussi.");
    }
  }
  $mysqli->close();
}
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
     <button type="submit" class="btn btn-primary">Se connecter</button>
   </fieldset>
 </form>
