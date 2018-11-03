

<?php
if( isset($_POST['addToCreation']) and ! empty($_POST['addToCreation']) ){
  $creationsEnable = bddQuery($mysqli, "SELECT * FROM `creation` WHERE `enable` = 1 AND `id_user` = ".$_SESSION['user']['id']);
  if( count($creationsEnable) == 0){
    $lastID = bddQuery(
      $mysqli,
      " INSERT INTO `creation` (`id`, `name`, `enable`, `description`, `id_user`, `date_creation`)
        VALUES (NULL, 'Config No Name', '1', 'Config No Name', '".$_SESSION['user']['id']."', '2018-11-07 00:00:00');"
    );
    addToCreation($mysqli,$lastID);
  }else{
    print_r($creationsEnable);
    addToCreation($mysqli,$creationsEnable[0]["id"]);
  }
}

function addToCreation($mysqli, $id){


    $_POST["addToCreation"] = $mysqli->real_escape_string($_POST["addToCreation"]);
    $query = "INSERT INTO `creation_conception`
              (`id`, `id_composant`, `id_creation`, `id_user`, `date_create`)
              VALUES (NULL,
                '".$_POST["addToCreation"]."',
                '$id',
                '14',
                '2018-10-10 10:00:00')";
    if (!$mysqli->query($query)) {
      exit("Erreur add to creation.<br />$query<br />". mysqli_error($mysqli));
    }
    header('Location: '."http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
    exit("Composant ajouter à la création.");

}
 ?>
