<?php

$mysqli = bddConnect();

// DELETE FROM `creation_conception` WHERE `creation_conception`.`id` = 5
if( isset($_POST["showCreationDelete"]) ){
  bddQuery($mysqli, "DELETE FROM `creation_conception` WHERE `creation_conception`.`id` = ".$_POST["showCreationDelete"]);
  header('Location: '.$_SERVER['REQUEST_URI']);
  exit('Composant supprimé.');
  
}


if( isset($pageDisplay) && $pageDisplay == true ){
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
      '<div>
        <form method="post" class="showCreationItem">
          <div class="container-fluid">
            <div class="row">
              <div class="col">
                <input type="hidden" value="%id%" name="showCreationDelete" />
                <button class="buttonNone"><i class="fas fa-2x fa-trash icon-white"></i></button>
              </div>
              <div class="col-10">
                %model%
              </div>
            </div>
          </div>
        </form>
      </div>');
  require_once("data/view/user/creations/headerCreation.php");
  ?>
  <div class="text-right">
    <a href="/mes-creations/" class="btn btn-secondary">Mes créations</a>
  </div>

  <h1><?=$creation['name']?></h1>
  <div><?=$divListComposant?></div>

  <?php
  }
  require_once("data/view/user/creations/footerCreation.php");
}
$mysqli->close();
?>
