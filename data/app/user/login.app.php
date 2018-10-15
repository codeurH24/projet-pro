<?php

if( isset($_POST['mail']) and !empty($_POST['mail'])){
  $mysqli = bddConnect();

  $_POST["mail"] = $mysqli->real_escape_string($_POST["mail"]);
  $_POST["password"] = $mysqli->real_escape_string($_POST["password"]);
  $tErreur = array();

  $query = "SELECT * FROM `user` WHERE `pseudo` LIKE 'Florent Corlouer' AND `password` LIKE '81dc9bdb52d04dc20036dbd8313ed055'";

  if( empty($tErreur) ){
    if (! $mysqli->query($query)) {
      exit("Erreur de connexion.<br />");
    }

    $result = $mysqli->query($query);

    $row = $result->fetch_assoc();

    if($row["password"] == md5($_POST["password"])){
      $_SESSION['user'] = [
        "id" => $row["id"],
        "pseudo" => $row["pseudo"],
      ];
    }



    $result->free();

    if (!isset($_SESSION['user']) and empty($_SESSION['user'])){
      exit("Probleme de session.");
    }else{
      header('Location: ./mon-compte.php');
      exit("Connexion Reussi.");
    }


  }

  $mysqli->close();
}


 ?>
