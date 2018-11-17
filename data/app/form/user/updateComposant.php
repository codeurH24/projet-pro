<?php
$mysqli = bddConnect();
if( isset($_POST['idComposantUpdate']) and !empty($_POST['idComposantUpdate'])){

  $sql = "UPDATE `composant`
          SET `model` = '".$_POST['modelComposantUpdate']."',
             `marque` = '".$_POST['marqueComposantUpdate']."',
             `point_puissance` = '".$_POST['pointPuissanceComposantUpdate']."',
             `auteur` = '".$_SESSION['user']['pseudo']."',
             `id_cat` = '".$_POST['categorieComposantCreate']."',
             `date_at` = '".date('Y-m-d H:i:s')."'
          WHERE `composant`.`id` = ".$_POST['idComposantUpdate'].";";

  if (!$mysqli->query($sql)) {
      exit("Modifier composant erreur.<br />$sql<br />". mysqli_error($mysqli));
  }
  $lastID = $mysqli->insert_id;
  $mysqli->close();
  $mysqli = bddConnect();
  if( !empty($_FILES["imageComposantUpdate"]["name"]) ) {
    $mysqli = bddConnect();
    $target_dir = "./data/asset/image/composants/";
    $target_file = $target_dir . basename($_FILES["imageComposantUpdate"]["name"]);
    move_uploaded_file($_FILES["imageComposantUpdate"]["tmp_name"], $target_file);
    $query = "UPDATE `image_composant`
              SET `image` = '".$_FILES["imageComposantUpdate"]["name"]."'
              WHERE `image_composant`.`id_composant` = ".$_POST['idComposantUpdate'].";";
    if (!$mysqli->query($query)) {
      exit("Erreur update image composant.$query<br />");
    }
    
  }




}

$query = "SELECT * FROM `categorie` ORDER BY `categorie`.`nom` ASC";
if ($result = $mysqli->query($query)) {
    $categorieComposant = $result->fetch_all(MYSQLI_ASSOC);
    $result->free();
}

$composantList = [];
$query = "SELECT * FROM `composant` ORDER BY `composant`.`model` ASC";
if ($result = $mysqli->query($query)) {
    $composantList = $result->fetch_all(MYSQLI_ASSOC);
    $result->free();
}



$mysqli->close();
$mysqli = bddConnect();

foreach ($composantList as $value) {

// SELECT * FROM `image_composant` WHERE `id_composant` = 14
$query = "SELECT * FROM `image_composant` WHERE `id_composant` = ".$value['id'];

if ($result = $mysqli->query($query)) {
    $row = $result->fetch_assoc();
    $image = $row["image"];
    $result->free();
}




?>
<h4 data-toggle="collapse" data-target="#form<?= $value['id']; ?>" ><?= $value['model']; ?></h4>
<form method="post" id="form<?= $value['id']; ?>" class="collapse" enctype="multipart/form-data" style="padding-bottom:50px">
  <fieldset>
    <legend></legend>
      <div class="form-group d-none">
        <label for="exampleInputPassword1">ID:</label>
        <input type="text" value="<?= $value['id']; ?>" name="idComposantUpdate" id="exampleInputPassword1" class="form-control" />
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Model:</label>
        <input type="text" value="<?= $value['model']; ?>" name="modelComposantUpdate" id="exampleInputPassword1" class="form-control" />
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Marque:</label>
        <input type="text" value="<?= $value['marque']; ?>" name="marqueComposantUpdate" id="exampleInputPassword1" class="form-control" />
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">PassMark :</label>
        <input type="number" value="<?= $value['point_puissance']; ?>" name="pointPuissanceComposantUpdate" id="exampleInputPassword1" class="form-control" />
      </div>
      <div class="form-group">
        <label for="categorieComposantCreate">Categorie</label>
        <select multiple name="categorieComposantCreate" class="form-control" id="categorieComposantCreate">
          <?php foreach($categorieComposant as $row){ ?>
            <?php if($row["id"] == $value['id_cat'] ){ ?>
          <option value="<?= $row["id"] ; ?>" selected><?= $row["nom"] ; ?></option>
            <?php }else{ ?>
          <option value="<?= $row["id"] ; ?>"><?= $row["nom"] ; ?></option>
            <?php }
          } ?>
        </select>
      </div>
      <div class="form-group">
        <label for="imageComposantUpdate">Image</label>
        <input type="file" name="imageComposantUpdate" id="imageComposantUpdate" class="form-control-file" aria-describedby="fileHelp">
      </div>
      <div class="form-group">
        <img src="/data/asset/image/composants/<?= $image; ?>" alt="image de composant" style="max-width:200px">
      </div>
    <button type="submit" class="btn btn-primary">Modifier</button>
  </fieldset>
</form>
<?php

 }

 $mysqli->close(); ?>
