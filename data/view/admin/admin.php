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
            <a class="dropdown-item" href="creer-une-categorie.php">Creer</a>
            <a class="dropdown-item" href="modifier-une-categorie.php">Modifier</a>
            <a class="dropdown-item" href="supprimer-une-categorie.php">Supprimer</a>
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
      <h1>Administration</h1>
      <?php
      if( isset($_GET['section'])) {
        switch ($_GET['section']) {
          case 'create-categorie':
          require_once("data/view/admin/categorie/create-categorie.php");
          break;
          case 'update-categorie':
          require_once("data/view/admin/categorie/update-categorie.php");
          break;
          case 'delete-categorie':
          require_once("data/view/admin/categorie/delete-categorie.php");
          break;
        }
      }
      ?>

    </div>
  </div>
</main>
