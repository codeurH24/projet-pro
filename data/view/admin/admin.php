<main class="container-fluid" style="min-height:100%;">
   <div class="row justify-content-center" style="height: 100vh;">
     <div class="col-2 bg-dark">
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
              <a class="btn btn-primary w-100" href="creer-composant.php">Creer</a>
              <a class="btn btn-primary w-100" href="modifier-composant.php">Modifier</a>
              <a class="btn btn-primary w-100" href="supprimer-composant.php">Supprimer</a>
              <button type="button" class="btn btn-primary dropdown-toggle w-100" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Compatibilités
              </button>
              <div class="dropdown-menu">
                <a class="btn btn-primary w-100" href="creer-compatibilite-entre-composant.php">Creer</a>
                <a class="btn btn-primary w-100" href="modifier-compatibilite-entre-composant.php">Modifier</a>
                <a class="btn btn-primary w-100" href="supprimer-compatibilite-entre-composant.php">Supprimer</a>
              </div>
            </div>
          </div>
        </li>
        <li class="nav-item">
          <div class="btn-group dropright w-100">
            <button type="button" class="btn btn-primary dropdown-toggle w-100" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Revendeur
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="creer-revendeur.php">Creer</a>
              <a class="dropdown-item" href="modifier-revendeur.php">Modifier</a>
              <a class="dropdown-item" href="supprimer-revendeur.php">Supprimer</a>
              <button type="button" class="btn btn-primary dropdown-toggle w-100" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Referencer un composant
              </button>
              <div class="dropdown-menu">
                <a class="btn btn-primary w-100" href="creer-liaison-composant-revendeur.php">Creer</a>
                <a class="btn btn-primary w-100" href="modifier-liaison-composant-revendeur.php">Modifier</a>
                <a class="btn btn-primary w-100" href="supprimer-liaison-composant-revendeur.php">Supprimer</a>
              </div>
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
              require_once("data/app/form/admin/category/createCategory.php");
            break;
          case 'update-categorie':
              require_once("data/app/form/admin/category/updateCategory.php");
            break;
          case 'delete-categorie':
              require_once("data/app/form/admin/category/deleteCategory.php");
            break;
          case 'create-composant':
              require_once("data/app/form/admin/component/createComponent.php");
            break;
          case 'update-composant':
              require_once("data/app/form/admin/component/updateComponent.php");
            break;
          case 'delete-composant':
              require_once("data/app/form/admin/component/deleteComponent.php");
              break;
          case 'create-composantLnkComposant':
              require_once("data/app/form/admin/component/component/createLnkComponentComponent.php");
            break;
          case 'update-composantLnkComposant':

              require_once("data/app/form/admin/component/component/updateLnkComponentComponent.php");
              break;
          case 'delete-composantLnkComposant':
              require_once("data/app/form/admin/component/component/deleteLnkComponentComponent.php");
              break;
          case 'create-revendeur':
              require_once("data/app/form/admin/retailer/createRetailer.php");
            break;
          case 'update-revendeur':
              require_once("data/app/form/admin/retailer/updateRetailer.php");
              break;
          case 'delete-revendeur':
              require_once("data/app/form/admin/retailer/deleteRetailer.php");
              break;
          case 'create-revendeurLnkComposant':
              require_once("data/app/form/admin/retailer/component/createLnkRetailerComponent.php");
            break;
          case 'update-revendeurLnkComposant':
              require_once("data/app/form/admin/retailer/component/updateLnkRetailerComponent.php");
              break;
          case 'delete-revendeurLnkComposant':
              require_once("data/app/form/admin/retailer/component/deleteLnkRetailerComponent.php");
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
