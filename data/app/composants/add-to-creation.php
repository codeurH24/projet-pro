

<?php
print_r($_POST);
if( isset($_POST['addToCreation']) and ! empty($_POST['addToCreation']) ){
  $safeVar = safeVar($mysqli, "post");
  $creationsEnable = bddQuery($mysqli, "SELECT * FROM `creation` WHERE `enable` = 1 AND `id_user` = $UID");
  $idCreation = $creationsEnable[0]["id"];
  // si aucune tables creation est prete a accueillir un composant alors on en creer une par defaut
  if( count($creationsEnable) == 0){
    $lastID = bddCreateFlush($mysqli, "creation", [
                "id" => NULL,
                "name" => "Config No Name",
                "enable" => "1",
                "description" => "Config No Name",
                "id_user" => $UID,
                "date_creation" => $dbDate
              ]);
    addToCreation($mysqli,$lastID);
  }else{

    $componentExist = processeurExistOnCreation($idCreation, $mysqli);

    if( $componentExist == false && !isset($_POST['addForceToCreation']) ){
      addToCreation($mysqli,$creationsEnable[0]["id"]);
    }elseif( isset($_POST['addForceToCreation'])){
      processeurDeleteOnCreation($idCreation, $mysqli);
      addToCreation($mysqli,$idCreation);
    }else{
      addToCreationModal_ReplaceComponent($safeVar,$componentExist);
    }
  }
}

function addToCreation($mysqli, $id){
  $safeVar = safeVar($mysqli, "post");
  bddCreateFlush($mysqli, "creation_conception", [
    "id" => NULL,
    "id_composant" => "$safeVar->addToCreation",
    "id_creation" => $id,
    "id_user" => UID(),
    "date_create" => dbDate()
  ]);
  header('Location: '."http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
  exit("Composant ajouter à la création.");

}

// affiche un modal qui demande à l"utilisateur si par exemple
// le processeur qui viens d'etre ajouter, doit remplacer celui deja ajouter
// a la creation
function addToCreationModal_ReplaceComponent($safeVar,$componentExist ){
  ob_start();

  ?><h5 class="modal-title">Attention !</h5><?php
  $headerModal = ob_get_contents();
  ob_end_clean();
  ob_start();
    ?>
    <input type="hidden" name="addToCreation" value="<?= $safeVar->addToCreation; ?>">
    <input type="hidden" name="addForceToCreation" value="<?= $safeVar->addToCreation; ?>">
    <p>Vous avez déjà un <?= $componentExist[0]['nom']; ?> dans votre création.</p>
    <p>Voulez-vous le remplacer ?</p>
    <?php

  $bodyModal = ob_get_contents();
  ob_end_clean();
  ob_start();
  ?>
    <!-- <button type="button" class="btn btn-primary">Oui</button> -->
    <button type="button" class="close btn btn-secondary" data-dismiss="modal" aria-label="Close">Non</button>
    <button type="submit" name="replaceComponentYes" class="btn btn-secondary">Oui</button>
  <?php

  $footerModal = ob_get_contents();

  ob_end_clean();

  modal($headerModal, $bodyModal, $footerModal);
}


function processeurExistOnCreation($idCreation, $mysqli){
  //$query = "SELECT * FROM `creation_conception` WHERE `id_composant` = $addToCreation AND `id_creation` = $idCreation AND `id_user` = $UID ";
  $query = "SELECT id_cat, categorie.nom FROM `creation_conception`
            INNER JOIN composant ON composant.id = creation_conception.id_composant
            INNER JOIN categorie ON categorie.id = composant.id_cat
            WHERE categorie.id = 8
                  AND creation_conception.id_creation = $idCreation
                  AND creation_conception.id_user = ".UID();
  $componentExist = bddQuery($mysqli, $query);
  if(count($componentExist) == 0){
    return false;
  }else{
    return $componentExist;
  }
}


function processeurDeleteOnCreation($idCreation, $mysqli){
  $query = "DELETE creation_conception.*
            FROM creation_conception
            INNER JOIN composant ON composant.id = creation_conception.id_composant
            INNER JOIN categorie ON categorie.id = composant.id_cat
            WHERE categorie.id = 8
                  AND creation_conception.id_creation = $idCreation
                  AND creation_conception.id_user = ".UID();
  bddQuery($mysqli, $query);
}
 ?>
