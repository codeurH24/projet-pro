<?php
  $requireDefaultPage = "data/view/pages/accueil.php";
  if(! isset($_GET['page'])){
    require_once($requireDefaultPage );
  }else{

    $page = $_GET['page'];
    if( isset($requirePage[$page])){
      if($requirePage[$page]['connect'] === true){
        redirectIfNotSession();
        //echo '<br />Connection demander '.$requirePage[$page]['url'].'<br />';
      }else{
        //echo '<br />Page publique sur '.$requirePage[$page]['url'].'<br />';
      }
      require_once($requirePage[$page]['url']);
    }else{
      require_once($requireDefaultPage);
    }

  }
 ?>
