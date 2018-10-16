<?php
// $mysqli = bddConnect();
//
// $mysqli->close();
 ?><main class="container-fluid">
  <div class="row">
    <div class="col-2">


      <div class="btn-group-vertical" data-toggle="buttons">
        <div class="btn-group dropright">
          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Categorie
          </button>
          <div class="dropdown-menu alert-primary">
            <a class="dropdown-item" href="admin/creer-categorie.php">Creer</a>
            <a class="dropdown-item" href="admin/modifier-categorie.php">Modifier</a>
            <a class="dropdown-item" href="admin/supprimer-categorie.php">Supprimer</a>
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
      </div>


    </div>
    <div class="col-8">
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
      <h1>Mon compte</h1>

    </div>
  </div>
</main>
