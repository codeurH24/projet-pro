<?php
//INSERT INTO `access` (`id`, `url`, `role_id`, `pass_right`) VALUES (NULL, 'admin/', '14', '1');


/*
  Cette fonctionnalité de l'admin s'appui sur le fichier
  data/app/func/log.func.php qui contient le CRUD sous forme de fonction.
  Pour le moment seule la fonction logCreate($idUser, $taskName) est déclaré
  car le besoin sur le ne demande pas les autres fonctionnalitées
*/


if( isset($pageDisplay) && $pageDisplay == true ){

  $mysqli = bddConnect();

  $query = 'SELECT access.*, role.nom FROM `access` INNER JOIN `role` ON role.id = access.role_id';
  $accessList = bddQuery($mysqli, $query);

  $mysqli->close();

  require 'data/view/admin/headerAdmin.php';
?>



<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-8 mb-3">
      <div class="text-right">
        <a href="/admin/acces/creer-acces.php" class="btn btn-secondary">Nouvel Accès</a>
      </div>
    </div>
    <div class="col-12 col-md-11 col-lg-8 indexUser">
      <div class="row entete align-items-center">
        <div class="col-3">
          <span class="align-middle">Role </span>
        </div>
        <div class="col">
          <span class="align-middle">URL</span>
        </div>
        <div class="col-3">
          <span class="align-middle">Droit de passage</span>
        </div>
      </div>
      <?php
        foreach ($accessList as $key => $value) {
          ?>
          <div class="row">
            <div class="col-3" style="height:21px;">
              <p><?= $value['nom'] ?></p>
            </div>
            <div class="col" style="height:21px;">
              <p><?= $value['url'] ?></p>
            </div>
            <div class="col-3" style="height:21px;">
              <p><?= $value['pass_right'] ?></p>
            </div>
            <div class="col-12 admin-tools-users" style="z-index:1">
              <span class="align-middle">
                <ul class="text-right">
                  <li><a href="/admin/acces/montrer-acces-<?= $value['id'] ?>.php"><i class="far fa-2x fa-eye"></i></a></li>
                  <li><a href="/admin/acces/supprimer-acces-<?= $value['id'] ?>.php"><i class="fas fa-2x fa-trash"></i></a></li>
                  <li><a href="/admin/acces/modifier-acces-<?= $value['id'] ?>.php"><i class="fas fa-2x fa-pen-alt"></i></a></li>
                </ul>
              </span>
            </div>
          </div>
          <?php
        }
       ?>
    </div>
  </div>
</div>












<?php

  require 'data/view/admin/footerAdmin.php';

 } ?>
