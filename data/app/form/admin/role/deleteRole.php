<?php

if( isset($_GET['section']) and $_GET['section'] == 'delete-role' ){
  $mysqli = bddConnect();

  $query = "DELETE FROM `role` WHERE `role`.`id` = ".$_GET['id-role'];
  bddQuery($mysqli, $query);
  header('location: /admin/roles/');
  exit('Role '.$_GET['id-user'].' delete<br />');

  $mysqli->close();
}

 ?>
