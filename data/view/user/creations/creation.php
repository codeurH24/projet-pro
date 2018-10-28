<?php

 ?>

<main class="container-fluid">
  <div class="row">
    <div class="col-2">
      <ul class="nav flex-column">
        <li class="nav-item">
          <div class="btn-group dropright w-100">
            <button type="button" class="btn btn-primary dropdown-toggle w-100" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Mes créations
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="creer-une-creation.php">Creer</a>
              <a class="dropdown-item" href="modifier-une-creation.php">Modifier</a>
              <a class="dropdown-item" href="supprimer-une-creation.php">Supprimer</a>
            </div>
          </div>
        </li>
      </ul>
    </div>
    <div class="col-10">
      <?php
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

          default:
            echo "Aucune section";
            break;
        }
       ?>
    </div>
  </div>
</main>

 hello mes créations
