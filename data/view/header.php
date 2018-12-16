<?php

if ( isset($UID) ){
  $mysqli = bddConnect();
    $query = "SELECT * FROM `creation` WHERE `enable` = 1 AND `id_user` = $UID ";
    if( ($creaionActiveForMenu = bddQuery($mysqli, $query)) !== false){
      if( isset($creaionActiveForMenu[0]) ){
        $creaionActiveForMenu = $creaionActiveForMenu[0];
      }else{
        $creaionActiveForMenu = false;
      }

    }
  $mysqli->close();
}


 ?><header>
  <div class="banner">
    <p>Configurer votre PC comme un Pro</p>
  </div>
</header>
<nav class="navbar navbar-expand-lg navbar-dark bg-nav-master sticky-top">
  <a class="navbar-brand home" href="/accueil.php"><i class="fas fa-2x fa-screwdriver mr-1"></i> PC CONFIG</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/accueil.php">
          <i class="fas fa-2x fa-home"></i>
          Accueil <span class="sr-only">(current)</span>
        </a>
      </li>
      <?php if(! isset($UID) ){ ?>
      <li class="nav-item">
        <a class="nav-link" href="/mon-compte/connexion/">
          <i class="fas fa-2x fa-wifi"></i>
          Se connecter
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/mon-compte/inscription/">
          <i class="far fa-2x fa-address-book" id="registrationLink"></i>
          S'inscrire
        </a>
      </li>
      <?php } ?>
      <?php if( isset($UID) ){ ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-2x fa-user-alt"></i> Mon compte
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/mes-creations/">Mes Créations</a>
          <?php if ( accessElement('/admin/') ){ ?>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/admin/">Administration</a>
          <?php } ?>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/logout.php">Se Déconnecter</a>
        </div>
      </li>
      <?php } ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-2x fa-keyboard"></i> Composants
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/composants-carte-mere-1.php">Cartes mères</a>
          <a class="dropdown-item" href="/composants-processeur-1.php">Processeurs</a>
          <a class="dropdown-item" href="/composants-memoire-vive-1.php">Mémoires vives</a>
          <a class="dropdown-item" href="/composants-carte-graphique-1.php">Cartes Graphiques</a>
        </div>
      </li>
      <li class="nav-item">
        <?php if( isset($creaionActiveForMenu) and $creaionActiveForMenu !== false ) { ?>
        <!-- <a class="nav-link" href="/mes-creations/detail/<?= $creaionActiveForMenu['id'] ?>.php"><i class="fab fa-2x fa-creative-commons-remix"></i>Ma création</a> -->
        <a class="nav-link" href="/mes-creations/detail/<?= $creaionActiveForMenu['id'] ?>.php"><i class="fas fa-2x fa-puzzle-piece"></i>Ma création</a>
        <?php }  ?>
      </li>
    </ul>

    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" name="searchInput" placeholder="Rechercher">
      <button type="button" name="button">
        <img src="/data/asset/image/search.png" alt="search" />
      </button>
    </form>
  </div>
</nav>
