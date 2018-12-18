<?php
if( isset($_GET['section']) and $_GET['section'] == 'delete-resaleLink' ){

  $mysqli = bddConnect();
  $query = "DELETE FROM `revendeur_composant` WHERE `id` = ".$_GET['id-resaleLink'];
  bddQuery($mysqli, $query);
  $mysqli->close();

  header('location: /admin/resaleLink/');
  exit('Lien de revente '.$_GET['id-resaleLink'].' delete<br />');

}
 ?>
