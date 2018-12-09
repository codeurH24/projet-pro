<?php






  $mysqli = bddConnect();

  $query = "SELECT * FROM `user` WHERE `id` = ".$_GET['id-user'];
  $userArr = bddQuery($mysqli, $query)[0];

  $query = "SELECT * FROM `role`";
  $roleList = bddQuery($mysqli, $query);

  $query = "SHOW COLUMNS FROM `pc-config`.`user` ";
  $nameOfColumnsList = bddQuery($mysqli, $query);

  $mysqli->close();

  $role = 'non trouvé';
  if( $userArr['id_role'] == 0 ){
    $role = 'aucun';
  }
  foreach ($roleList as $role) {
    if( $userArr['id_role'] == $role['id']){
      $role = $role['nom'];
    }
  }





  if( isset($pageDisplay) && $pageDisplay == true ){
  require 'data/view/admin/headerAdmin.php';
?>
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8 col-xl-6">
      <div class="text-right mb-3">
        <a href="/admin/utilisateurs/" class="btn btn-secondary">Retour</a>
      </div>
      <div class="arrayHTML">
        <table>
        <?php foreach ($nameOfColumnsList as $key => $row): ?>
        <tr>
          <?php if ($row['Field'] == 'id_role'): ?>
            <td class="entete"><?= $row['Field']; ?>: </td><td><?= $role['nom'] ?? ($role ?? '') ?></td>
          <?php else: ?>
            <td class="entete"><?= $row['Field']; ?>: </td><td><?= $userArr[$row['Field']] ?></td>
          <?php endif; ?>
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
