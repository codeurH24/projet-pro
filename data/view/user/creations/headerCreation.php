<main class="container-fluid h-100"  style="display:flex;flex:1;flex-direction: column;justify-content: flex-start;align-items: stretch;align-content: stretch;display: flex;flex-direction: row;justify-content: flex-start;align-items: stretch;align-content: stretch;">
  <div class="row justify-content-center" style="flex:1;flex-direction: column;justify-content: flex-start;align-items: stretch;align-content: stretch;display: flex;flex-direction: row;justify-content: flex-start;align-items: stretch;align-content: stretch;">
    <div class="col-1 col-md-4 col-lg-3 col-xl-3 menu-left">
      <ul class="nav flex-column">
        <!-- <li class="nav-item">
          <div class="btn-group dropright w-100">
            <button type="button" class="btn btn-primary dropdown-toggle w-100" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-2x fa-screwdriver"></i><span>Mes créations</span>
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="/mes-creations/creer-une-creation.php">Creer</a>
              <a class="dropdown-item" href="/mes-creations/">Tout montrer</a>
              <a class="dropdown-item" href="/mes-creations/modifier-une-creation.php">Modifier</a>
              <a class="dropdown-item" href="/mes-creations/supprimer-une-creation.php">Supprimer</a>
            </div>
          </div>
        </li> -->
        <li class="nav-item">
          <div class="btn-group dropright w-100">
            <a class="btn btn-primary  w-100" href="/mes-creations/" style="color:white">
              <i class="fas fa-2x fa-screwdriver"></i><span>Mes créations</span>
            </a>
          </div>
        </li>
        <li class="nav-item">
          <div class="btn-group dropright w-100">
            <a class="btn btn-primary  w-100" href="/mon-compte/changer-mon-mot-de-passe/" style="color:white">
              <i class="fas fa-2x fa-lock"></i><span>Modifier<br />Le mot de passe</span>
            </a>
          </div>
        </li>
      </ul>
    </div>
    <div class="col-11 col-md-8 col-lg-9 col-xl-9 content-creation">
      <?php require "data/view/account/identity.php"; ?>
       <div class="row justify-content-md-center">
         <div class="col-12 col-sm-12 col-md-11 col-xl-8 creations" >
