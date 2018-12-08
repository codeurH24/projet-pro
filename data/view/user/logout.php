<?php
if(isset($_GET['page']) and $_GET['page'] == 'logout'){
  $_SESSION = array();
  header('Location: /');
  exit("Probleme de déconnexion.");
}

 ?>
