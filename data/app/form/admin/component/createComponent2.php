<?php
$mysqli = bddConnect();

if( isset($_POST['modelComposantCreate']) and ! empty($_POST['modelComposantCreate']) ){

  $tErreur = array();
  //
  // $_POST["modelComposantCreate"] = $mysqli->real_escape_string($_POST["modelComposantCreate"]);
  // $_POST["marqueComposantCreate"] = $mysqli->real_escape_string($_POST["marqueComposantCreate"]);
  // if( empty($_POST["scoreComposantCreate"])  )
  //   $_POST["scoreComposantCreate"] = 0;
  // else
  //   $_POST["scoreComposantCreate"] = $mysqli->real_escape_string($_POST["scoreComposantCreate"]);
  //
  // $_POST["categorieComposantCreate"] = $mysqli->real_escape_string($_POST["categorieComposantCreate"]);
  //
  // $query = "INSERT INTO `composant` (`id`, `model`, `marque`, `point_puissance`, `auteur`, `id_cat`, `date_at`)
  //           VALUES (NULL, '".$_POST["modelComposantCreate"]."', '".$_POST["marqueComposantCreate"]."', '".$_POST["scoreComposantCreate"]."', '".$_SESSION['user']['pseudo']."', '".$_POST["categorieComposantCreate"]."', '".date('Y-m-d H:i:s')."');";

  if( empty($tErreur) ){
    safeVar($mysqli, "post");
    if( empty($_POST["scoreComposantCreate"])  ){
      $scoreComposantCreate = 0;
    }

    $lastID = bddCreateFlush($mysqli, "composant", [
      "model" => $modelComposantCreate,
      "marque" => $marqueComposantCreate,
      "point_puissance" => $scoreComposantCreate,
      "auteur" => $_SESSION['user']['pseudo'],
      "id_cat" => $categorieComposantCreate,
      "date_at" => $dbDate
    ]);
    //$lastID = $mysqli->insert_id;
    if( !empty($_FILES["imageComposantCreate"]) ) {
      $target_dir = "./data/asset/image/composants/";
      $target_file = $target_dir . basename($_FILES["imageComposantCreate"]["name"]);
      move_uploaded_file($_FILES["imageComposantCreate"]["tmp_name"], $target_file);
      $query = "INSERT INTO `image_composant` (`id`, `image`, `id_composant`)
      VALUES (NULL, '".basename($_FILES["imageComposantCreate"]["name"])."', '$lastID');";
      if (!$mysqli->query($query)) {
        exit("Erreur creation image composant.<br />");
      }
    }// si l'upload de l'image n'est pas vide
  }// si aucune erreurs
} // si formumaire soumis

$query = "SELECT * FROM `categorie` ORDER BY `categorie`.`nom` ASC";
if ($result = $mysqli->query($query)) {
    $categorieComposant = $result->fetch_all(MYSQLI_ASSOC);
    $result->free();
}

$mysqli->close();
if( isset($pageDisplay) && $pageDisplay == true ){
require 'data/view/admin/headerAdmin.php';
 ?>
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8 col-xl-6">
      <form method="post" enctype="multipart/form-data">
        <fieldset>
          <legend><h2>Creer un composant</h2></legend>
           <div class="form-group">
             <label for="modelComposantCreate">Model</label>
             <input type="text" name="modelComposantCreate" id="modelComposantCreate" class="form-control" aria-describedby="emailHelp" autocomplete="off">
           </div>
           <div class="form-group">
             <label for="marqueComposantCreate">Marque</label>
             <input type="text" name="marqueComposantCreate" id="marqueComposantCreate" class="form-control" aria-describedby="emailHelp">
           </div>
           <div class="form-group">
             <label for="scoreComposantCreate">Score Passmark</label>
             <input type="number" name="scoreComposantCreate" id="scoreComposantCreate" class="form-control" aria-describedby="emailHelp">
           </div>
           <div class="form-group">
             <label for="categorieComposantCreate">Categorie</label>
             <select multiple name="categorieComposantCreate" class="form-control" id="categorieComposantCreate">
               <?php foreach($categorieComposant as $row){ ?>
               <option value="<?= $row["id"] ; ?>"><?= $row["nom"] ; ?></option>
               <?php } ?>
             </select>
           </div>
           <div class="form-group">
             <label for="imageComposantCreate">Image</label>
             <input type="file" name="imageComposantCreate" id="imageComposantCreate" class="form-control-file" aria-describedby="fileHelp">
           </div>
           <div class="text-right">
             <button type="submit" class="btn btn-primary">Enregister</button>
           </div>
       </fieldset>
     </form>
    </div>
  </div>
</div>
<?php require 'data/view/admin/footerAdmin.php';
} ?>
