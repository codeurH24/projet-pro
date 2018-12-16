<?php

if( isset($_GET['section']) and $_GET['section'] == 'delete-compatibility' ){

  $mysqli = bddConnect();
  $query = "DELETE FROM `compatibilite` WHERE `id` = ".$_GET['id-compatibility'];
  bddQuery($mysqli, $query);
  $mysqli->close();

  header('location: /admin/composant/compatibilite/');
  exit('Compatibilite '.$_GET['id-compatibility'].' delete<br /> Echec de redirection.');


}
 ?>
