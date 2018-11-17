<?php

$mysqli = bddConnect();

$query = "SELECT * FROM `creation` WHERE `id_user` = $UID ORDER BY `creation`.`enable` DESC";
if ($result = $mysqli->query($query)) {
    $creationList = $result->fetch_all(MYSQLI_ASSOC);
    $result->free();
}
?>
<div class="text-right">
 <a href="/mes-creations/creer-une-creation.php" class="btn btn-secondary">Nouvelle Configuration</a>
</div>
<?php

foreach ($creationList as $creation) { ?>
<div>
<h4 data-toggle="collapse" data-target="#form<?= $creation['id']; ?>" class="d-inline-block">
  <?= $creation['name']; ?>
</h4>
<a href="detail/<?=$creation['id']?>.php" class="d-inline-block">detail</a>
<a href="/mes-creations/modifier-une-creation-<?=$creation['id']?>.php" class="d-inline-block">Modifier</a>
<a href="/mes-creations/supprimer-une-creation-<?=$creation['id']?>.php" class="d-inline-block">Supprimer</a>
<?php if ($creation['enable']){ ?>
<a href="detail/<?=$creation['id']?>.php" class="d-inline-block">Actif</a>
<?php }else{ ?>
<a href="detail/<?=$creation['id']?>.php" class="d-inline-block">Inactif</a>
<?php } ?>
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
</div>

<?php
}
$mysqli->close();
 ?>
