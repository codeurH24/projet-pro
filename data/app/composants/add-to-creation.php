

<?php
if( isset($_POST['addToCreation']) and ! empty($_POST['addToCreation']) ){
  $creationsEnable = bddQuery($mysqli, "SELECT * FROM `creation` WHERE `enable` = 1 AND `id_user` = $UID");
  // si aucune tables creation est prete a accueillir un composant alors on en creer une par defaut
  if( count($creationsEnable) == 0){
    $lastID = bddCreateFlush($mysqli, "creation", [
                "id" => NULL,
                "name" => "Config No Name",
                "enable" => "1",
                "description" => "Config No Name",
                "id_user" => $UID,
                "date_creation" => $dbDate
              ]);
    addToCreation($mysqli,$lastID);
  }else{
    addToCreation($mysqli,$creationsEnable[0]["id"]);
  }
}

function addToCreation($mysqli, $id){
  $safeVar = safeVar($mysqli, "post");
  bddCreateFlush($mysqli, "creation_conception", [
    "id" => NULL,
    "id_composant" => "$safeVar->addToCreation",
    "id_creation" => $id,
    "id_user" => UID(),
    "date_create" => dbDate()
  ]);
  header('Location: '."http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
  exit("Composant ajouter à la création.");

}
 ?>
