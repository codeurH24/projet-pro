<?php

if( isset($_GET['section']) and $_GET['section'] == 'delete-user' ){
  $mysqli = bddConnect();

  $query = "DELETE FROM `user` WHERE `user`.`id` = ".$_GET['id-user'];
  bddQuery($mysqli, $query);
  header('location: /admin/utilisateurs/');
  exit('user '.$_GET['id-user'].' delete<br />');

  $mysqli->close();
}

 ?>
