<?php
$requirePageCreation = [
  'create-creation' =>
    ['url' => 'data/app/form/user/creations/createCreation.php','connect' => true],
  'update-creation' =>
    ['url' => 'data/app/form/user/creations/updateCreation.php','connect' => true],
  'delete-creation' =>
    ['url' => 'data/app/form/user/creations/deleteCreation.php','connect' => true],
  'show-creation' =>
    ['url' => 'data/app/form/user/creations/showCreation.php','connect' => true]
];

$routeCreationPage = NULL;
$requireDefaultPage = 'data/app/form/user/creations/indexCreation.php';
if(! isset($_GET["section"])){
  $routeCreationPage = $requireDefaultPage;
}else{
  $page = $_GET["section"];
  if( isset($requirePageCreation[$page])){
    if($requirePageCreation[$page]['connect'] === true){
      redirectIfNotSession();
    }
    $routeCreationPage = $requirePageCreation[$page]['url'];
  }else{
    $routeCreationPage = $requireDefaultPage;
  }
}


 ?>
