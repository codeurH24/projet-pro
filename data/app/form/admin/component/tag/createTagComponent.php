<?php
$mysqli = bddConnect();
safeVar($mysqli, "post");

if( !empty($_POST['tagWord']) and !empty($_SESSION['sqlTagComponentCreate'])  ){
  $queryTag = str_replace("%%tag%%", $_POST['tagWord'], $_SESSION['sqlTagComponentCreate']);

  if ($mysqli->multi_query($queryTag)) {
    echo 'Requete de création de tag reussi<br />';
    $_SESSION['sqlTagComponentCreate'] = [];
  }else{
    echo 'ECHEC: Requete de création de tag<br />';
  }
}

if ( isset($_POST['keyWord']) and empty($_POST['keyWord']) ) {

  $query = "SELECT * FROM `composant` ";
  $listOfComponent = bddQuery($mysqli, $query);

}else if ( isset($_POST['keyWord']) and !empty($_POST['keyWord']) ) {

  $query = "SELECT * FROM `composant` WHERE `model` LIKE '%$keyWord%' ";
  $listOfComponent = bddQuery($mysqli, $query);
  $_SESSION['sqlTagComponentCreate'] = [];

}else{
  $listOfComponent = [];
}
if( isset($pageDisplay) && $pageDisplay == true ){
require 'data/view/admin/headerAdmin.php';
 ?>
 <h2>Recherche de composants</h2>
 <form method="post">
   <div class="form-group">
     <label for="keyWord">Mot clé</label>
     <input type="text" name="keyWord" id="keyWord" class="form-control" />
   </div>
   <div class="text-right">
     <button type="submit" class="btn btn-primary">Recherche</button>
   </div>
 </form>
 <form method="post">
   <div class="form-group">
     <label for="tagWord">Entrer en tag</label>
     <input type="text" name="tagWord" id="tagWord" class="form-control" />
   </div>
   <div class="text-right">
     <button type="submit" class="btn btn-primary">Tager</button>
   </div>
 </form>
 <?php
 $sqlTagCreate = "";
 foreach($listOfComponent as $key => $component){
   $id = $component['id'];
   $sqlTagCreate .= "INSERT INTO `compatibility_tag` (`id_composant`, `tag`) VALUES ('$id', '%%tag%%');";
   ?>
 <div>
   <?=  $component['model']; ?>
 </div>
<?php }
  $_SESSION['sqlTagComponentCreate'] = $sqlTagCreate;
?>
<?php require 'data/view/admin/footerAdmin.php';
} ?>
