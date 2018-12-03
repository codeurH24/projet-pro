<?php
// UPDATE `compatibilite` SET `degrer` = '99', `auteur` = 'codeurh24', `id_composant1` = '12', `id_composant2` = '13', `date_at` = '2018-10-15 14:23:39' WHERE `compatibilite`.`id` = 4;
$mysqli = bddConnect();
if( isset($_POST['compatibleEnPourCent']) and !empty($_POST['compatibleEnPourCent'])){
  $query = "INSERT INTO `compatibilite` (`id`, `degrer`, `auteur`, `id_composant1`, `id_composant2`, `date_at`)
            VALUES (NULL, '".$_POST['compatibleEnPourCent']."',
                          '".$_SESSION['user']['pseudo']."',
                          '".$_POST['composant1']."',
                          '".$_POST['composant2']."',
                          '".date("Y-m-d H:i:s")."');";
  if (!$mysqli->query($query)) {
    exit("Erreur update RevendeurLnkComposant. $query<br />");
  }
}
$composantList = [];
$query = "SELECT * FROM `composant` ORDER BY `composant`.`model` ASC";
if ($result = $mysqli->query($query)) {
    $composantList = $result->fetch_all(MYSQLI_ASSOC);
    $result->free();
}
$mysqli->close();
 ?><h2>Créer une compatibilitée</h2>
 <form method="post">
   <div class="form-group">
      <label for="composant1">Composant 1</label>
      <select multiple class="form-control" name="composant1" id="composant1">
        <?php foreach ($composantList as $value) { ?>
          <option value="<?= $value['id']; ?>"><?= $value['model']; ?></option>
        <?php } ?>
      </select>
    </div>
   <div class="form-group">
      <label for="composant2">Composant 2</label>
      <select multiple class="form-control" name="composant2" id="composant2">
        <?php foreach ($composantList as $value) { ?>
          <option value="<?= $value['id']; ?>"><?= $value['model']; ?></option>
        <?php } ?>
      </select>
    </div>
    <div class="form-group">
      <label for="compatibleEnPourCent">Pourcentage de fiabilité</label>
      <input type="number" class="form-control" name="compatibleEnPourCent" id="compatibleEnPourCent" value="100" />
    </div>
    <div class="text-right">
      <button type="submit" class="btn btn-primary">Creer une compatibilité</button>
    </div>
 </form>
