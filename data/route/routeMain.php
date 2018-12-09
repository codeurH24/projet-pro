<?php
$requirePage = [
  'account' =>
    ['url' => 'data/view/account/account.php','connect' => false],
  'composants-processeur' =>
    ['url' => 'data/view/composants/processeurs.php','connect' => false],
  'composants-carte-graphique' =>
    ['url' => 'data/view/composants/cartes-graphique.php','connect' => false],
  'composants-carte-mere' =>
    ['url' => 'data/view/composants/cartes-mere.php','connect' => false],
  'composants-memoire-vive' =>
    ['url' => 'data/view/composants/memoire-vive.php','connect' => false],
  'registration' =>
    ['url' => 'data/view/user/registration.php','connect' => false],
  'mes-creations' =>
    ['url' => 'data/view/user/creations/creation.php','connect' => true],
  'registration-success' =>
    ['url' => 'data/view/user/registration-success.php','connect' => false],
  'login' =>
    ['url' => 'data/view/user/login.php','connect' => false],
  'mon-compte' =>
    ['url' => 'data/view/user/mon-compte.php','connect' => true],
  'logout' =>
    ['url' => 'data/view/user/logout.php','connect' => true],
  'admin' =>
    ['url' => 'data/view/admin/admin.php','connect' => true],
  'error' =>
    ['url' => 'data/view/error/error.php','connect' => false],
  'change-password' =>
    ['url' => 'data/view/pages/change-password.php','connect' => false]
];


$routeMainPage = NULL;
$requireDefaultPage = "data/view/pages/accueil.php";
if(! isset($_GET['page'])){
  // require_once($requireDefaultPage );
  $routeMainPage = $requireDefaultPage;
}else{




  $page = $_GET['page'];
  if( isset($requirePage[$page])){
    if($requirePage[$page]['connect'] === true){
      redirectIfNotSession();
      //echo '<br />Connection demander '.$requirePage[$page]['url'].'<br />';
    }else{
      //echo '<br />Page publique sur '.$requirePage[$page]['url'].'<br />';
    }
    // require_once($requirePage[$page]['url']);
    $routeMainPage = $requirePage[$page]['url'];
  }else{
    // require_once($requireDefaultPage);
    $routeMainPage = $requireDefaultPage;
  }

}

 ?>
