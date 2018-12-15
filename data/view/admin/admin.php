<?php

      if( isset($_GET['section']) ){
        // echo $_GET['section']."<br />";
        switch ($_GET['section']) {
          case 'create-categorie':
              require("data/app/form/admin/category/createCategory.php");
            break;
          case 'update-categorie':
              require("data/app/form/admin/category/updateCategory.php");
            break;
          case 'delete-categorie':
              require("data/app/form/admin/category/deleteCategory.php");
            break;
          case 'create-composant':
              require("data/app/form/admin/component/createComponent.php");
            break;
          case 'update-composant':
              require("data/app/form/admin/component/updateComponent.php");
            break;
          case 'delete-composant':
              require("data/app/form/admin/component/deleteComponent.php");
              break;
          case 'create-composantLnkComposant':
              require("data/app/form/admin/component/component/createLnkComponentComponent.php");
            break;
          case 'update-composantLnkComposant':
              require("data/app/form/admin/component/component/updateLnkComponentComponent.php");
              break;
          case 'delete-composantLnkComposant':
              require("data/app/form/admin/component/component/deleteLnkComponentComponent.php");
              break;
          case 'create-tagComposant':
              require("data/app/form/admin/component/tag/createTagComponent.php");
              break;
          case 'create-revendeur':
              require("data/app/form/admin/retailer/createRetailer.php");
            break;
          case 'update-revendeur':
              require("data/app/form/admin/retailer/updateRetailer.php");
              break;
          case 'delete-revendeur':
              require("data/app/form/admin/retailer/deleteRetailer.php");
              break;
          case 'create-revendeurLnkComposant':
              require("data/app/form/admin/retailer/component/createLnkRetailerComponent.php");
            break;
          case 'update-revendeurLnkComposant':
              require("data/app/form/admin/retailer/component/updateLnkRetailerComponent.php");
              break;
          case 'delete-revendeurLnkComposant':
              require("data/app/form/admin/retailer/component/deleteLnkRetailerComponent.php");
              break;
          case 'index-users':
              require("data/app/form/admin/user/index.php");
              break;
          case 'delete-user':
              require("data/app/form/admin/user/index.php");
              break;
          case 'update-user':
              require("data/app/form/admin/user/updateUser.php");
              break;
          case 'create-user':
              require("data/app/form/admin/user/createUser.php");
              break;
          case 'show-user':
              require("data/app/form/admin/user/showUser.php");
              break;
          case 'index-role':
              require("data/app/form/admin/role/indexRole.php");
              break;
          case 'create-role':
              require("data/app/form/admin/role/createRole.php");
              break;
          case 'show-role':
              require("data/app/form/admin/role/showRole.php");
              break;
          case 'update-role':
              require("data/app/form/admin/role/updateRole.php");
              break;
          case 'delete-role':
              require("data/app/form/admin/role/deleteRole.php");
              break;


          default:
            echo 'page not found';
            break;
        }
      }else{
        // echo 'page sans section';
        require_once("data/view/admin/default.php");
      }?>
