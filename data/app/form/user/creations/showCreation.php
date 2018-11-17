<?php

$mysqli = bddConnect();

// DELETE FROM `creation_conception` WHERE `creation_conception`.`id` = 5
if( isset($_POST["showCreationDelete"]) ){
  bddQuery($mysqli, "DELETE FROM `creation_conception` WHERE `creation_conception`.`id` = ".$_POST["showCreationDelete"]);
}

$creationList = bddQuery($mysqli, "SELECT * FROM `creation` WHERE creation.id = ".$_GET["id"]);

$query = "SELECT creation_conception.id, composant.model
          FROM creation_conception
          INNER JOIN composant ON composant.id = creation_conception.id_composant
          WHERE creation_conception.id_creation = ";

foreach ($creationList as $creation) {
  $composantList = bddQuery($mysqli, $query.$creation['id']);
  $divListComposant  = HTMLList($composantList, [
    "%id%" => "id",
    "%model%" => "model"
    ] ,
    '<div>%model%
      <form method="post">
        <input type="hidden" value="%id%" name="showCreationDelete" />
        <button>Suppr</button>
      </form>
    </div>');
?>
<div class="text-right">
  <a href="/mes-creations/" class="btn btn-secondary">Retour</a>
</div>

<h4><?=$creation['name']?></h4>
<div><?=$divListComposant?></div>

<?php
}
$mysqli->close();
?>
