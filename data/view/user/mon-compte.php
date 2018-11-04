<?php
// $mysqli = bddConnect();
//
// $mysqli->close();
 ?><main class="container-fluid">
  <div class="row">
    <div class="col">
      <?php
      if( isset($_SESSION['user']) )
        echo $_SESSION['user']['pseudo']."<br />";
      else
        echo "Aucune session<br />";


      if( !isset($_SESSION['user']) ){
        //header('Location: ./');
        exit("Manque session.");
      }


      ?>
      <h1>Mon compte</h1>
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#profil">Profil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#adresse">Adresse</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#newPassword">Changer Mot de passe</a>
        </li>
      </ul>
      <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade show active" id="profil">
          <?php require_once("data/app/form/user/profil.php"); ?>
        </div>
        <div class="tab-pane fade" id="adresse">
          <?php require_once("data/app/form/user/adresse.php"); ?>
        </div>
        <div class="tab-pane fade" id="newPassword">
          <?php require_once("data/app/form/user/changePassword.php"); ?>
        </div>
      </div>
    </div>
  </div>
</main>
