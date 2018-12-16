<?php

if( isset($_GET['section']) and $_GET['section'] == 'delete-role' ){

  if ( isNumber($_GET['id-role']) ){
    if( $_GET['id-role'] >= 1 && $_GET['id-role'] <= 4 ){
      // ces ID ne sont pas autorisé a etre supprimés
    }else{
      $mysqli = bddConnect();
      $query = "DELETE FROM `role` WHERE `role`.`id` = ".$_GET['id-role'];
      bddQuery($mysqli, $query);
      $mysqli->close();
    }
  }

  header('location: /admin/roles/');
  exit('Role '.$_GET['id-role'].' delete<br />');


}

 ?>
