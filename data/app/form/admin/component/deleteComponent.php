<?php

if( isset($_GET['section']) and $_GET['section'] == 'delete-composant' ){

  $mysqli = bddConnect();
  $query = "DELETE FROM `composant` WHERE `id` = ".$_GET['id-composant'];
  bddQuery($mysqli, $query);
  $mysqli->close();

  header('location: /admin/composant/');
  exit('Composant '.$_GET['id-composant'].' delete<br />');


}
 ?>
