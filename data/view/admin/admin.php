<?php
// $mysqli = bddConnect();
//
// $mysqli->close();
 ?><main class="container-fluid ">
  <div class="row">
    <div class="col-2">
      <!-- <div class="btn-group-vertical" data-toggle="buttons">
        <div class="btn-group dropright">
          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Categorie
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="creer-categorie.php">Creer</a>
            <a class="dropdown-item" href="modifier-categorie.php">Modifier</a>
            <a class="dropdown-item" href="supprimer-categorie.php">Supprimer</a>
          </div>
        </div>
        <div class="btn-group dropright">
          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Composant
          </button>
          <div class="dropdown-menu alert-primary">
            <a class="dropdown-item" href="#">Creer</a>
            <a class="dropdown-item" href="#">Modifier</a>
            <a class="dropdown-item" href="#">Supprimer</a>
            <a class="dropdown-item" href="#">Compatibilités</a>
          </div>
        </div>
        <div class="btn-group dropright">
          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Revendeur
          </button>
          <div class="dropdown-menu alert-primary">
            <a class="dropdown-item" href="#">Creer</a>
            <a class="dropdown-item" href="#">Modifier</a>
            <a class="dropdown-item" href="#">Supprimer</a>
            <a class="dropdown-item" href="#">Ajouter Composant</a>
          </div>
        </div>
      </div> -->
      <ul class="nav flex-column">
        <li class="nav-item">
          <div class="btn-group dropright w-100">
            <button type="button" class="btn btn-primary dropdown-toggle w-100" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Categorie
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="creer-categorie.php">Creer</a>
              <a class="dropdown-item" href="modifier-categorie.php">Modifier</a>
              <a class="dropdown-item" href="supprimer-categorie.php">Supprimer</a>
            </div>
          </div>
        </li>
        <li class="nav-item">
          <div class="btn-group dropright w-100">
            <button type="button" class="btn btn-primary dropdown-toggle w-100" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Composant
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="creer-composant.php">Creer</a>
              <a class="dropdown-item" href="modifier-composant.php">Modifier</a>
              <a class="dropdown-item" href="supprimer-composant.php">Supprimer</a>
              <a class="dropdown-item" href="#">Compatibilités</a>
            </div>
          </div>
        </li>
        <li class="nav-item">
          <div class="btn-group dropright w-100">
            <button type="button" class="btn btn-primary dropdown-toggle w-100" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Revendeur
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">Creer</a>
              <a class="dropdown-item" href="#">Modifier</a>
              <a class="dropdown-item" href="#">Supprimer</a>
              <a class="dropdown-item" href="#">Ajouter Composant</a>
            </div>
          </div>
        </li>
      </ul>
    </div>
    <div class="col-10">
      <?php
      if( isset($_SESSION['user']) )
        echo $_SESSION['user']['pseudo']."<br />";
      else
        echo "Aucune session<br />";


      if( !isset($_SESSION['user']) ){
        header('Location: ./');
        exit("Manque session.");
      }


      ?>
      <h1>Administration</h1>
      <?php
      if( isset($_GET['section']) ){
        switch ($_GET['section']) {
          case 'create-categorie':
              require_once("data/app/form/user/createCategorie.php");
            break;
          case 'update-categorie':
              require_once("data/app/form/user/updateCategorie.php");
            break;
          case 'delete-categorie':
              require_once("data/app/form/user/deleteCategorie.php");
            break;
          case 'create-composant':
              require_once("data/app/form/user/createComposant.php");
            break;
          case 'update-composant':
              require_once("data/app/form/user/updateComposant.php");
            break;
          case 'delete-composant':
              require_once("data/app/form/user/deleteComposant.php");
              break;

          default:
            echo 'page not found';
            break;
        }

      }else{
        echo 'page sans section';
      }?>

    </div>
  </div>
</main>
