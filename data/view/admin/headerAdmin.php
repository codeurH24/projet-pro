<main class="container-fluid h-100"  style="display:flex;flex:1;flex-direction: column;justify-content: flex-start;align-items: stretch;align-content: stretch;display: flex;flex-direction: row;justify-content: flex-start;align-items: stretch;align-content: stretch;">
  <div class="row justify-content-center" style="flex:1;flex-direction: column;justify-content: flex-start;align-items: stretch;align-content: stretch;display: flex;flex-direction: row;justify-content: flex-start;align-items: stretch;align-content: stretch;">
    <div class="col-1 col-md-4 col-lg-3 col-xl-2 menu-left">
      <ul class="nav flex-column">
        <?php if ( accessElement('/admin/') ){ ?>
          <li class="nav-item">
            <div class="btn-group dropright w-100">
              <a class="btn btn-primary  w-100" href="/admin/categorie/" style="color:white">
                <i class="fas fa-2x fa-stream"></i><span>Categories</span>
              </a>
            </div>
          </li>
          <!-- <li class="nav-item">
            <div class="btn-group dropright w-100">
              <button type="button" class="btn btn-primary dropdown-toggle w-100" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-2x fa-stream"></i><span>Categorie</span>
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="/admin/creer-categorie.php">Creer</a>
                <a class="dropdown-item" href="/admin/modifier-categorie.php">Modifier</a>
                <a class="dropdown-item" href="/admin/supprimer-categorie.php">Supprimer</a>
              </div>
            </div>
          </li> -->
        <?php } ?>
        <?php if ( accessElement('/admin/') ){ ?>
          <li class="nav-item">
            <div class="btn-group dropright w-100">
              <a class="btn btn-primary  w-100" href="/admin/composant/" style="color:white">
                <img src="/data/asset/image/gpu.png" alt="carte graphique" width="40" /><span>Composants</span>
              </a>
            </div>
          </li>
          <!-- <li class="nav-item">
            <div class="btn-group dropright w-100">
              <button type="button" class="btn btn-primary dropdown-toggle w-100" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="/data/asset/image/gpu.png" alt="carte graphique" width="40" /><span>Composant</span>
              </button>
              <div class="dropdown-menu">
                <a class="btn btn-primary w-100" href="/admin/creer-composant.php">Creer</a>
                <a class="btn btn-primary w-100" href="/admin/modifier-composant.php">Modifier</a>
                <a class="btn btn-primary w-100" href="/admin/supprimer-composant.php">Supprimer</a>
                <button type="button" class="btn btn-primary dropdown-toggle w-100" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Compatibilités
                </button>
                <div class="dropdown-menu">
                  <a class="btn btn-primary w-100" href="/admin/creer-compatibilite-entre-composant.php">Creer</a>
                  <a class="btn btn-primary w-100" href="/admin/modifier-compatibilite-entre-composant.php">Modifier</a>
                  <a class="btn btn-primary w-100" href="/admin/supprimer-compatibilite-entre-composant.php">Supprimer</a>
                </div>
                <a class="btn btn-primary w-100" href="/admin/creer-tag-composant.php">tag</a>
              </div>
            </div>
          </li> -->
        <?php } ?>
        <?php if ( accessElement('/admin/') ){ ?>
          <li class="nav-item">
            <div class="btn-group dropright w-100">
              <a class="btn btn-primary  w-100" href="/admin/revendeur/" style="color:white">
                <i class="fas fa-2x fa-hand-holding-usd"></i><span>Revendeurs</span>
              </a>
            </div>
          </li>
          <!-- <li class="nav-item">
            <div class="btn-group dropright w-100">
              <button type="button" class="btn btn-primary dropdown-toggle w-100" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-2x fa-hand-holding-usd"></i><span>Revendeur</span>
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="/admin/creer-revendeur.php">Creer</a>
                <a class="dropdown-item" href="/admin/modifier-revendeur.php">Modifier</a>
                <a class="dropdown-item" href="/admin/supprimer-revendeur.php">Supprimer</a>
                <button type="button" class="btn btn-primary dropdown-toggle w-100" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Referencer un composant
                </button>
                <div class="dropdown-menu">
                  <a class="btn btn-primary w-100" href="/admin/creer-liaison-composant-revendeur.php">Creer</a>
                  <a class="btn btn-primary w-100" href="/admin/modifier-liaison-composant-revendeur.php">Modifier</a>
                  <a class="btn btn-primary w-100" href="/admin/supprimer-liaison-composant-revendeur.php">Supprimer</a>
                </div>
              </div>
            </div>
          </li> -->
        <?php } ?>
        <?php if ( accessElement('/admin/utilisateurs/') ){ ?>
          <li class="nav-item">
            <div class="btn-group dropright w-100">
              <a class="btn btn-primary  w-100" href="/admin/utilisateurs/" style="color:white">
                <i class="fas fa-2x fa-user-alt icon-white"></i><span>Utilisateurs</span>
              </a>
            </div>
          </li>
        <?php } ?>
        <?php if ( accessElement('/admin/roles/') ){ ?>
          <li class="nav-item">
            <div class="btn-group dropright w-100">
              <a class="btn btn-primary  w-100" href="/admin/roles/" style="color:white">
                <i class="fas fa-2x fa-users"></i><span>Roles</span>
              </a>
            </div>
          </li>
        <?php } ?>
        <?php if ( accessElement('/admin/log/') ){ ?>
          <li class="nav-item">
            <div class="btn-group dropright w-100">
              <a class="btn btn-primary  w-100" href="/admin/log/" style="color:white">
                <i class="fas fa-2x fa-exclamation-circle"></i><span>Logs</span>
              </a>
            </div>
          </li>
        <?php } ?>
        <?php if ( accessElement('/admin/acces/') ){ ?>
          <li class="nav-item">
            <div class="btn-group dropright w-100">
              <a class="btn btn-primary  w-100" href="/admin/acces/" style="color:white">
                <i class="fas fa-2x fa-unlock-alt"></i><span>Accès</span>
              </a>
            </div>
          </li>
        <?php } ?>
      </ul>
    </div>
    <div class="col-11 col-md-8 col-lg-9 col-xl-10 content-admin">
      <?php require "data/view/account/identity.php"; ?>
      <h1></i>Administration</h1>
