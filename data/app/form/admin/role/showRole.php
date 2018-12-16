<?php






  $mysqli = bddConnect();


  $query = "SELECT * FROM `role` WHERE `id` = ".$_GET['id-role'];
  $roleList = bddQuery($mysqli, $query);

  $query = "SHOW COLUMNS FROM `pc-config`.`role` ";
  $nameOfColumnsList = bddQuery($mysqli, $query);

  $mysqli->close();







  if( isset($pageDisplay) && $pageDisplay == true ){
  require 'data/view/admin/headerAdmin.php';
?>
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8 col-xl-6">
      <div class="text-right mb-3">
        <a href="/admin/roles/" class="btn btn-secondary">Retour</a>
      </div>
      <div class="arrayHTML">
        <table>
        <?php foreach ($nameOfColumnsList as $key => $row): ?>
        <tr>
            <td class="entete"><?= $row['Field']; ?>: </td><td><?= $roleList[0][$row['Field']] ?></td>
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
