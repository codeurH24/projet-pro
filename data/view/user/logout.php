<?php
if(isset($_GET['page']) and $_GET['page'] == 'logout'){
  logCreate($_SESSION['user']['id'], 'Se déconnecte');
  $_SESSION = array();
  header('Location: /');
  exit("Probleme de déconnexion.");
}

 ?>
