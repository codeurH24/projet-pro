<?php

if( isset($_GET['section']) and $_GET['section'] == 'delete-access' ){
  $mysqli = bddConnect();

  $query = "DELETE FROM `access` WHERE `id` = ".$_GET['id-access'];
  bddQuery($mysqli, $query);
  header('location: /admin/acces/');
  exit('Access '.$_GET['id-access'].' delete<br />');

  $mysqli->close();
}

 ?>
