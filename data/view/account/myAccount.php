<?php
      if( isset($_SESSION['user']) )
        echo $_SESSION['user']['pseudo']."<br />";
      else
        echo "Aucune session<br />";


      if( !isset($_SESSION['user']) ){
        header('Location: /mon-compte/connexion/');
        exit("Manque session.");
      }


      ?>
      <h1>Mon compte</h1>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#">Features</a>
            </li>
          </ul>
        </div>
      </nav>
      <!-- <ul class="nav nav-tabs">
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
          <?php //require_once("data/app/form/user/profil.php"); ?>
        </div>
        <div class="tab-pane fade" id="adresse">
          <?php //require_once("data/app/form/user/adresse.php"); ?>
        </div>
        <div class="tab-pane fade" id="newPassword">
          <?php //require_once("data/app/form/user/changePassword.php"); ?>
        </div>
      </div> -->
