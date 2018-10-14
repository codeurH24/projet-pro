<?php  session_start();



require_once("data/config.php");

function assetImg($nameImage){
  echo "data/asset/image/$nameImage";
}

function gImg($taille){
  echo "https://dummyimage.com/$taille";
}

function bddConnect(){
  $mysqli = new mysqli(mysql_host, mysql_user, mysql_pass, mysql_base);

  /* Vérification de la connexion */
  if (mysqli_connect_errno()) {
      printf("Échec de la connexion : %s\n", $mysqli->connect_error);
      exit();
  }
  return $mysqli;
}


 ?><!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="data/asset/css/bootstrap.min.css"  /> -->
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.1.3/flatly/bootstrap.min.css" rel="stylesheet" integrity="sha384-gJWVjz180MvwCrGGkC4xE5FjhWkTxHIR/+GgT8j2B3KKMgh6waEjPgzzh7lL7JZT" crossorigin="anonymous"> -->
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.1.3/lux/bootstrap.min.css" rel="stylesheet" integrity="sha384-ML9h/UCooefre72ZPxxOHyjbrLT1xKV0AHON1J+OlOV2iwcYemqmWyMfTcfyzLJ1" crossorigin="anonymous">
    <link rel="stylesheet" href="data/asset/css/master.css">

    <title>PC CONFIG</title>
  </head>
  <body>
    <?php require_once('data\view\header.php'); ?>
    <?php require_once('data\view\main.php'); ?>
    <?php require_once('data\view\footer.php'); ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
