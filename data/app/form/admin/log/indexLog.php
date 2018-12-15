<?php
/*
  Cette fonctionnalité de l'admin s'appui sur le fichier
  data/app/func/log.func.php qui contient le CRUD sous forme de fonction.
  Pour le moment seule la fonction logCreate($idUser, $taskName) est déclaré
  car le besoin sur le ne demande pas les autres fonctionnalitées
*/


if( isset($pageDisplay) && $pageDisplay == true ){

  $mysqli = bddConnect();

  $query = 'SELECT * FROM `log`';
  $logList = bddQuery($mysqli, $query);

  $mysqli->close();

  require 'data/view/admin/headerAdmin.php';
?>
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8 col-xl-6">
      <div class="arrayHTML">
        <table>
        <tr>
          <td class="entete">Utilisateur</td>
          <td class="entete">Action</td>
          <td class="entete">Date et Heure</td>
        </tr>
        <?php foreach ($logList as $key => $row): ?>
        <tr>
            <td><?= $row['user_id']; ?></td>
            <td><?= $row['name_task']; ?></td>
            <td><?= $row['date']; ?></td>
        </tr>
        <?php endforeach; ?>
        </table>
      </div>
    </div>
  </div>
</div>
<?php

  require 'data/view/admin/footerAdmin.php';

 } ?>
