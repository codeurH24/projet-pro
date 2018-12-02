<?php
 if(! isset($_GET["section"])) $_GET["section"]='';

 switch ($_GET["section"]) {
   case 'create-creation':
     require_once("data/app/form/user/creations/createCreation.php");
     break;
   case 'update-creation':
     require_once("data/app/form/user/creations/updateCreation.php");
     break;
   case 'delete-creation':
     require_once("data/app/form/user/creations/deleteCreation.php");
     break;
   case 'show-creation':
     require_once("data/app/form/user/creations/showCreation.php");
     break;

   default:
     require_once("data/app/form/user/creations/indexCreation.php");
     break;
 }
?>
