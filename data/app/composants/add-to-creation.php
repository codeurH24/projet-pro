

<?php
print_r($_POST);
if( isset($_POST['addToCreation']) and ! empty($_POST['addToCreation']) ){
  $safeVar = safeVar($mysqli, "post");
  $creationsEnable = bddQuery($mysqli, "SELECT * FROM `creation` WHERE `enable` = 1 AND `id_user` = $UID");

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

    $idCreation = $creationsEnable[0]["id"];

    $catComponent = false;
    if (isProcesseur($mysqli, $addToCreation)){
      $componentExist = processeurExistOnCreation($idCreation, $mysqli);
      $catComponent = 8;
    }else if (isMainboard($mysqli, $addToCreation)){
      $componentExist = mainboardExistOnCreation($idCreation, $mysqli);
      $catComponent = 9;
    }else{
      $componentExist = false;
    }

    // si ont n'a pas deja ajouter un processeur ou une carte mere
    // alors on ajoute ce composant
    if( $componentExist == false && !isset($_POST['addForceToCreation']) ){
      addToCreation($mysqli,$creationsEnable[0]["id"]);
    // sinon ont peut le forcer a etre ajouté mais dans ce cas ont remplace
    }elseif( isset($_POST['addForceToCreation'])){
      if( $catComponent == 8){
        processeurDeleteOnCreation($idCreation, $mysqli);
      }elseif ( $catComponent == 9){
        mainboardDeleteOnCreation($idCreation, $mysqli);
      }
      addToCreation($mysqli,$idCreation);
    // sinon c'est qu'il existe deja mais qu'on n'a pas confirmé l'ajout par force
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
  //header('Location: '."http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
  //exit("Composant ajouter à la création.");

}

// function replaceProcesseurToCreation(){
//   addToCreation($mysqli,$idCreation);
// }

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
    <p>Voulez-vous remplacer ce composant ?</p>
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

function isProcesseur($mysqli, $IDComponent){
  $query = 'SELECT * FROM `composant` WHERE `id` = '.$IDComponent;
  $component = bddQuery($mysqli, $query)[0];
  if ($component['id_cat'] == 8){
    return true;
  }else{
    return false;
  }
}

function isMainboard($mysqli,$IDComponent){
  $query = 'SELECT * FROM `composant` WHERE `id` = '.$IDComponent;
  $component = bddQuery($mysqli, $query)[0];
  if ($component['id_cat'] == 9){
    return true;
  }else{
    return false;
  }
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

function mainboardExistOnCreation($idCreation, $mysqli){
  //$query = "SELECT * FROM `creation_conception` WHERE `id_composant` = $addToCreation AND `id_creation` = $idCreation AND `id_user` = $UID ";
  $query = "SELECT id_cat, categorie.nom FROM `creation_conception`
            INNER JOIN composant ON composant.id = creation_conception.id_composant
            INNER JOIN categorie ON categorie.id = composant.id_cat
            WHERE categorie.id = 9
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

function mainboardDeleteOnCreation($idCreation, $mysqli){
  $query = "DELETE creation_conception.*
            FROM creation_conception
            INNER JOIN composant ON composant.id = creation_conception.id_composant
            INNER JOIN categorie ON categorie.id = composant.id_cat
            WHERE categorie.id = 9
                  AND creation_conception.id_creation = $idCreation
                  AND creation_conception.id_user = ".UID();
  bddQuery($mysqli, $query);
}
 ?>
