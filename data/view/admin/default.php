<?php
$mysqli = bddConnect();
  $query = "SELECT COUNT(id) AS numberOfUser FROM `user` WHERE 1 ";
  $numberOfUser = bddQuery($mysqli, $query)[0]['numberOfUser'];
$mysqli->close();
 ?>
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-11 col-md-8">
      <p>Nombres d'utilisateurs enregistré sur le site: <?= $numberOfUser;  ?></p>
    </div>
  </div>
</div>
