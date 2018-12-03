<main class="container-fluid h-100"  style="display:flex;flex:1;flex-direction: column;justify-content: flex-start;align-items: stretch;align-content: stretch;display: flex;flex-direction: row;justify-content: flex-start;align-items: stretch;align-content: stretch;">
  <div class="row justify-content-center" style="flex:1;flex-direction: column;justify-content: flex-start;align-items: stretch;align-content: stretch;display: flex;flex-direction: row;justify-content: flex-start;align-items: stretch;align-content: stretch;">
    <div class="col-1 col-md-4 col-lg-3 col-xl-2 menu-left">
      <ul class="nav flex-column">
        <li class="nav-item">
          <div class="btn-group dropright w-100">
            <button type="button" class="btn btn-primary dropdown-toggle w-100" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-2x fa-stream"></i><span>Categorie</span>
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
            <img src="/data/asset/image/gpu.png" alt="carte graphique" width="40" /><span>Composant</span>
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
              <a class="btn btn-primary w-100" href="creer-tag-composant.php">tag</a>
            </div>
          </div>
        </li>
        <li class="nav-item">
          <div class="btn-group dropright w-100">
            <button type="button" class="btn btn-primary dropdown-toggle w-100" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-2x fa-hand-holding-usd"></i><span>Revendeur</span>
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
        <li class="nav-item">
          <div class=" w-100">
            <button type="button" class="btn btn-primary w-100" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <a href="#" class="w-100" style="color:#FFF;">
                <i class="fas fa-2x fa-user-alt icon-white"></i><span>Utilisateurs</span>
              </a>
            </button>
          </div>
        </li>
      </ul>
    </div>
    <div class="col-11 col-md-8 col-lg-9 col-xl-10 content-admin" style="">
      <?php require "data/view/account/identity.php"; ?>
      <h1>Administration</h1>
      <?php

      if( isset($_GET['section']) ){
        echo $_GET['section']."<br />";
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
          case 'create-tagComposant':
              require_once("data/app/form/admin/component/tag/createTagComponent.php");
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
        // echo 'page sans section';
        require_once("data/view/admin/default.php");
      }?>
    </div>
  </div>
</main>
