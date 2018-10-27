<header>

  <div class="card bg-dark banner">
    <img class="card-img" src="https://dummyimage.com/1000x250" alt="Card image">
    <div class="card-img-overlay">
      <h5 class="card-title"><a href="./">PC CONFIG</a></h5>
      <p class="card-text">Montez votre propre PC sans stress. Amis Gamers tester vos performances avant meme de l'utilisé sans dépasser votre budget</p>
    </div>
  </div>

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="accueil">PC CONFIG</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/accueil.php">Accueil <span class="sr-only">(current)</span></a>
        </li>
        <?php if(! isset($_SESSION['user']) ){ ?>
        <li class="nav-item">
          <a class="nav-link" href="/connexion.php">Se connecter</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/inscription.php">S'inscrire</a>
        </li>
        <?php } ?>
        <?php if( isset($_SESSION['user']) ){ ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Mon compte
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Mes Créations</a>
            <a class="dropdown-item" href="/mon-compte.php">Mon Profile</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="/admin/">Administration</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="/logout.php">Se Déconnecter</a>
          </div>
        </li>
        <?php } ?>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Search">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>
</header>
