<?php

      if( isset($_GET['section']) ){
        // echo $_GET['section']."<br />";
        switch ($_GET['section']) {
          case '404':
              require("data/view/error/404.php");
            break;
          case '500':
              require("data/view/error/500.php");
            break;
          default:
            echo 'page not found';
            break;
        }
      }else{
        // echo 'page sans section';
        require_once("data/view/error/404.php");
      }?>
