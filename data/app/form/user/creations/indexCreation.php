<?php

$mysqli = bddConnect();

if( isset($_GET['enableCreation']) ){
  $enableCreation = $_GET['enableCreation'];

  $query = "UPDATE `creation` SET `enable` = '0' WHERE `id_user` = $UID;";
  if ( $mysqli->query($query) === TRUE ) {
    //echo "$UID - Remise a zero des creations<br />";
    $query = "UPDATE `creation` SET `enable` = '1' WHERE `id` = $enableCreation;";
    if ( $mysqli->query($query) === TRUE ) {
      redirect('mes-creations/');
      exit("Activation de la creation $enableCreation<br />");
    }
  }else{
    //echo "$UID - Aucune Remise a zero des creations<br />";
  }
}


$query = "SELECT * FROM `creation` WHERE `id_user` = $UID ORDER BY `creation`.`enable` DESC";
if ($result = $mysqli->query($query)) {
    $creationList = $result->fetch_all(MYSQLI_ASSOC);
    $result->free();
}
require_once("data/view/user/creations/headerCreation.php");

$sql = "SELECT composant.model
                FROM creation_conception
                INNER JOIN composant ON composant.id = creation_conception.id_composant
                WHERE creation_conception.id_creation = ";


?>
<div class="text-right">
  <a href="/mes-creations/creer-une-creation.php" class="btn btn-secondary">Nouvelle Configuration</a>
</div>


<!-- liste les créations pour pouvoir manipuler ces configs par la suite et avoir un aperçu pour le moment -->
<?php foreach ($creationList as $creation) { ?>
  <div class="creationsIndex">
    <!-- titre de la creation -->
    <h4 data-toggle="collapse" data-target="#form<?= $creation['id']; ?>" class="d-inline-block">
      <?= $creation['name']; ?>
    </h4>

    <!-- boutons des actions possible sur la création -->
    <div class="toolsCreations">
      <a href="detail/<?=$creation['id']?>.php" class="d-inline-block"><i class="fas fa-2x fa-file-invoice icon-white"></i></a>
      <a href="/mes-creations/modifier-une-creation-<?=$creation['id']?>.php" class="d-inline-block"><i class="fas fa-2x fa-pen icon-white"></i></a>
      <a href="/mes-creations/supprimer-une-creation-<?=$creation['id']?>.php" class="d-inline-block"><i class="fas fa-2x fa-trash icon-white"></i></a>
      <?php if ($creation['enable']){ ?>
      <a href="/mes-creations/activer-une-creation-<?=$creation['id']?>.php" class="d-inline-block"><i class="far fa-3x fa-lightbulb icon-white"></i></a>
      <?php }else{ ?>
      <a href="/mes-creations/activer-une-creation-<?=$creation['id']?>.php" class="d-inline-block"><i class="fas fa-2x fa-lightbulb"></i></a>
      <?php } ?>
    </div>

    <!-- liste les conposants mis dans la création, cela permet un bref aperçu de ce qui la création contient -->
    <div id="form<?= $creation['id']; ?>" class="collapse info" >
      <?php $query = $sql.$creation['id'];
          if ($result = $mysqli->query($query)) {
              $composantList = $result->fetch_all(MYSQLI_ASSOC);
              $result->free();
          }
          foreach ($composantList as $composant) { ?>
            <div><?= $composant["model"] ?></div>
      <?php } ?>
    </div>
  </div>

<?php }
$mysqli->close();

require_once("data/view/user/creations/footerCreation.php");
?>
