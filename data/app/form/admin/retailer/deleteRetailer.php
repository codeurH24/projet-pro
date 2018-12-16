<?php

if( isset($_GET['section']) and $_GET['section'] == 'delete-revendeur' ){

  $mysqli = bddConnect();
  $query = "DELETE FROM `revendeur` WHERE `id` = ".$_GET['id-revendeur'];
  bddQuery($mysqli, $query);
  $mysqli->close();

  header('location: /admin/revendeur/');
  exit('Retailer '.$_GET['id-role'].' delete<br />');


}
 ?>
