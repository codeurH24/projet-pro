<?php

if( isset($_GET['section']) and $_GET['section'] == 'delete-categorie' ){

  $mysqli = bddConnect();
  $query = "DELETE FROM `categorie` WHERE `id` = ".$_GET['id-categorie'];
  bddQuery($mysqli, $query);
  $mysqli->close();

  header('location: /admin/categorie/');
  exit('Category '.$_GET['id-role'].' delete<br />');


}
 ?>
