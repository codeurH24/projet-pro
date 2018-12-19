<?php
$mysqli = bddConnect();
safeVar($mysqli, "post");

if( isset($_POST['tagsComposant']) and !empty($_POST['tagWord']) and !empty($_SESSION['sqlTagComponentCreate'])  ){
  $queryTag = str_replace("%%tag%%", $_POST['tagWord'], $_SESSION['sqlTagComponentCreate']);

  if ($mysqli->multi_query($queryTag)) {
    echo 'Requete de création de tag reussi<br />';
    $_SESSION['sqlTagComponentCreate'] = [];
  }else{
    echo 'ECHEC: Requete de création de tag<br />';
  }
}

if ( isset($_POST['searchForTagComposant']) and isset($_POST['keyWord']) and empty($_POST['keyWord']) ) {

  $query = "SELECT * FROM `composant` ";
  $listOfComponent = bddQuery($mysqli, $query);

}else if (isset($_POST['searchForTagComposant']) and isset($_POST['keyWord']) and !empty($_POST['keyWord']) ) {

  $query = "SELECT * FROM `composant` WHERE `model` LIKE '%$keyWord%' ";
  $listOfComponent = bddQuery($mysqli, $query);
  $_SESSION['sqlTagComponentCreate'] = [];

}else{
  $listOfComponent = [];
}
if( isset($pageDisplay) && $pageDisplay == true ){
require 'data/view/admin/headerAdmin.php';
 ?>
 <div class="container-fluid">
   <div class="row justify-content-center">
     <div class="col-8 mb-3">
       <div class="row">
         <div class="col-12 mt-3">
           <div class="text-right">
             <a href="/admin/composant/creer-composant.php" class="btn btn-secondary">Retour</a>
           </div>
         </div>
       </div>
     </div>
     <div class="col-12 col-md-11 col-lg-8">
       <form method="post">
         <fieldset>
           <legend>Tager les composants</legend>
           <div class="form-group">
             <label for="keyWord">Mot clé</label>
             <input type="text" name="keyWord" id="keyWord" class="form-control" />
           </div>
           <div class="text-right">
             <button type="submit" name="searchForTagComposant" class="btn btn-primary">Recherche</button>
           </div>
         <div class="form-group">
           <label for="tagWord">Entrer en tag</label>
           <input type="text" name="tagWord" id="tagWord" class="form-control" />
         </div>
         <div class="text-right">
           <button type="submit" name="tagsComposant" class="btn btn-primary">Tager</button>
         </div>
        </fieldset>
       </form>
       <div class="arrayHTML mt-4">
         <table>
         <?php
          $sqlTagCreate = "";
          foreach($listOfComponent as $key => $component){
           $id = $component['id'];
           $sqlTagCreate .= "INSERT INTO `compatibility_tag` (`id_composant`, `tag`) VALUES ('$id', '%%tag%%');";
           ?><tr><td class="entete"><?=  $component['model']; ?></td></tr><?php
          }
          $_SESSION['sqlTagComponentCreate'] = $sqlTagCreate;
         ?>
        </table>
      </div>
     </div>
   </div>
 </div>
<?php require 'data/view/admin/footerAdmin.php';
} ?>
