<?php

  $mysqli = bddConnect();

  $query = "SELECT * FROM `compatibilite`";
  $compatibilityList = bddQuery($mysqli, $query);
  // print_r($roleList);

  $mysqli->close();

  if( isset($pageDisplay) && $pageDisplay == true ){
  require 'data/view/admin/headerAdmin.php';
?>

<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-8 mb-3">
      <div class="text-right">
        <a href="/admin/composant/compatibilite/creer-compatibilite.php" class="btn btn-secondary">Ajouter une compatibilité</a>
      </div>
    </div>
    <div class="col-12 col-md-11 col-lg-8 indexUser">
      <div class="row entete align-items-center">
        <div class="col-1">
          <span class="align-middle">ID</span>
        </div>
        <div class="col">
          <span class="align-middle">ID composant1</span>
        </div>
        <div class="col">
          <span class="align-middle">ID composant2</span>
        </div>
      </div>
      <?php
        foreach ($compatibilityList as $key => $value) { ?>
          <div class="row">
            <div class="col-1" style="height:21px;">
              <p><?= $value['id'] ?></p>
            </div>
            <div class="col" style="height:21px;">
              <p><?= $value['id_composant1'] ?></p>
            </div>
            <div class="col" style="height:21px;">
              <p><?= $value['id_composant2'] ?></p>
            </div>
            <div class="col-12 admin-tools-users" style="z-index:1">
              <span class="align-middle">
                <ul class="text-right">
                  <!-- <li><a href="/admin/composant/compatibilite/montrer-categorie-<?= $value['id'] ?>.php"><i class="far fa-2x fa-eye"></i></a></li> -->
                  <li><a href="/admin/composant/compatibilite/supprimer-compatibilite-<?= $value['id'] ?>.php"><i class="fas fa-2x fa-trash"></i></a></li>
                  <li><a href="/admin/composant/compatibilite/modifier-compatibilite-<?= $value['id'] ?>.php"><i class="fas fa-2x fa-pen-alt"></i></a></li>
                </ul>
              </span>
            </div>
          </div><?php
        }
       ?>
    </div>
  </div>
</div>
<?php require 'data/view/admin/footerAdmin.php';
} ?>
