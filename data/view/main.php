<?php
  if(! isset($_GET['page'])){
    require_once("data/view/pages/accueil.php");
  }else{

    $page = $_GET['page'];
    switch ($page) {

      case 'account':
        require_once("data/view/account/account.php");
        break;
      case 'composants-processeur':
        require_once("data/view/composants/processeurs.php");
        break;
      case 'composants-carte-graphique':
        require_once("data/view/composants/cartes-graphique.php");
        break;
      case 'composants-carte-mere':
        require_once("data/view/composants/cartes-mere.php");
        break;
      case 'registration':
        require_once("data/view/user/registration.php");
        break;
      case 'mes-creations':
        require_once("data/view/user/creations/creation.php");
        break;
      case 'registration-success':
        require_once("data/view/user/registration-success.php");
        break;
      case 'login':
        require_once("data/view/user/login.php");
        break;
      case 'mon-compte':
        require_once("data/view/user/mon-compte.php");
        break;
      case 'logout':
        require_once("data/view/user/logout.php");
        break;
      case 'admin':
        require_once("data/view/admin/admin.php");
        break;

      default:
        require_once("data/view/pages/accueil.php");
        break;
    }


  }
 ?>
