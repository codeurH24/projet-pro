<?php

 ?>

<main class="container-fluid h-100">
  <div class="row justify-content-center h-100">
    <div class="col-2 bg-dark">
      <ul class="nav flex-column">
        <li class="nav-item">
          <div class="btn-group dropright w-100">
            <button type="button" class="btn btn-primary dropdown-toggle w-100" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Mes créations
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="/mes-creations/creer-une-creation.php">Creer</a>
              <a class="dropdown-item" href="/mes-creations/">Tout montrer</a>
              <a class="dropdown-item" href="/mes-creations/modifier-une-creation.php">Modifier</a>
              <a class="dropdown-item" href="/mes-creations/supprimer-une-creation.php">Supprimer</a>
            </div>
          </div>
        </li>
      </ul>
    </div>
    <div class="col-10">
       <div class="row justify-content-md-center">
         <div class="col-6">
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
         </div>
       </div>
    </div>
  </div>
</main>
