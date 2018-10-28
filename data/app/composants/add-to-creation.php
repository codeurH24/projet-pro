

<?php

if( isset($_POST['addToCreation']) and ! empty($_POST['addToCreation']) ){

  $_POST["addToCreation"] = $mysqli->real_escape_string($_POST["addToCreation"]);
  $query = "INSERT INTO `creation_conception`
            (`id`, `id_composant`, `id_creation`, `id_user`, `date_create`)
            VALUES (NULL,
              '".$_POST["addToCreation"]."',
              '6',
              '14',
              '2018-10-10 00:00:00')";
  if (!$mysqli->query($query)) {
    exit("Erreur add to creation.<br />$query<br />". mysqli_error($mysqli));
  }
  header('Location: '."http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
  exit("Composant ajouter à la création.");
}
 ?>
