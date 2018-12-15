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
    if( ($row = bddQuery($mysqli, $query)) !== false  ){

      if( !empty($row) ){
        $row = $row[0];
        if($row["password"] == $passwordMD5){



          $_SESSION['user'] = [
            "id" => $row["id"],
            "pseudo" => $row["pseudo"],
            "roleID" => $row["id_role"]
          ];

          // mise a jour de la date de la connexion
          $dateTime = dbDate();
          $query = "UPDATE `user` SET `date_last_login` = '$dateTime ' WHERE `user`.`id` = $row[id];";
          bddQuery($mysqli, $query);
        }
      }else{
        $error = 'Mauvais identifiants de connexion';
      }

    }

    if (!isset($_SESSION['user']) and empty($_SESSION['user'])){
      //exit("Probleme de session.");
    }else{
      logCreate($_SESSION['user']['id'], 'Se connect');
      header('Location: /mes-creations/');
      exit("Connexion Reussi.");
    }
  }
  $mysqli->close();
}
 ?>

 <div class="container-fluid">
   <div class="row justify-content-center">
     <div class="col-12 col-md-8 col-xl-4">
       <form method="post">
         <fieldset>
           <legend>Connexion</legend>
           <p class="error"><?= @$error; ?></p>
           <div class="form-group">
             <label for="exampleInputEmail1">Adresse E-mail</label>
             <input name="mail" type="email" class="form-control" id="exampleInputEmail1" value="<?= @$_POST['mail'] ?>">
           </div>
           <div class="form-group">
             <label for="exampleInputPassword1">Mot de passe</label>
             <input name="password" type="password" class="form-control" id="exampleInputPassword1">
           </div>
           <div class="text-right">
             <button type="submit" class="btn btn-primary">Se connecter</button>
           </div>
         </fieldset>
       </form>
     </div>
   </div>
 </div>
