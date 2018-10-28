<?php

$mysqli = bddConnect();

$query = "SELECT * FROM `creation`";
if ($result = $mysqli->query($query)) {
    $creationList = $result->fetch_all(MYSQLI_ASSOC);
    $result->free();
}




foreach ($creationList as $creation) { ?>
<h4 data-toggle="collapse" data-target="#form<?= $creation['id']; ?>" ><?= $creation['name']; ?></h4>
<div id="form<?= $creation['id']; ?>" class="collapse" style="padding-bottom:50px">
  <?php $query = "SELECT composant.model
                  FROM creation_conception
                  INNER JOIN composant ON composant.id = creation_conception.id_composant
                  WHERE creation_conception.id_creation = ".$creation['id'];
      if ($result = $mysqli->query($query)) {
          $composantList = $result->fetch_all(MYSQLI_ASSOC);
          $result->free();
      }
      foreach ($composantList as $composant) { ?>
        <div><?= $composant["model"] ?></div>
  <?php } ?>
</div>

<?php
}
$mysqli->close();
 ?>
