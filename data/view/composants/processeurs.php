<main class="container-fluid composants"><?php



$mysqli = bddConnect();

include("data/app/composants/add-to-creation.php");

$id_categorie = 8;
$numbersPerPage = 5;


include("page-split.php");
if( isset($_GET["limit"]) and $_GET["limit"] > 0 ){

  $socket = false;
  // filtre l'affichage par rapport à la carte mère de la création
  if( isset($UID) ){
    $query = "SELECT LOWER(GROUP_CONCAT(compatibility_tag.tag)) AS `tags` FROM `creation`
              INNER JOIN creation_conception ON creation_conception.id_creation = creation.id
              INNER JOIN composant ON creation_conception.id_composant = composant.id
              INNER JOIN compatibility_tag ON compatibility_tag.id_composant = composant.id
              WHERE creation.id_user = $UID AND `creation`.`enable` = 1 AND composant.id_cat = 9;";
    if ($result = $mysqli->query($query)) {
        $tagsString = $result->fetch_all(MYSQLI_ASSOC)[0]['tags'];
        $tags = explode(",", $tagsString);
        $result->free();
    }

    $tagSearch = strtolower('am4'); if (in_array($tagSearch, $tags) && $socket === false) $socket = $tagSearch;
    $tagSearch = strtolower('1151'); if (in_array($tagSearch, $tags) && $socket === false) $socket = $tagSearch;
  }

  // filtre l'affichage des composants sur la page
  if( $socket !== false){
    $query = "SELECT composant.*, compatibility_tag.id_composant, compatibility_tag.tag FROM `composant`
              INNER JOIN compatibility_tag ON  composant.id = compatibility_tag.id_composant
              WHERE composant.id_cat = $id_categorie AND compatibility_tag.tag = '$socket'
              LIMIT ".(($_GET["limit"]*$numbersPerPage)-$numbersPerPage).", $numbersPerPage";
  }else{

    $query = "SELECT * FROM `composant` WHERE `id_cat` = $id_categorie LIMIT ".(($_GET["limit"]*$numbersPerPage)-$numbersPerPage).", $numbersPerPage";
  }
  //$query = "SELECT * FROM `composant` WHERE `id_cat` = $id_categorie LIMIT ".(($_GET["limit"]*$numbersPerPage)-$numbersPerPage).", $numbersPerPage";
}else{
  $query = "SELECT * FROM `composant` WHERE `id_cat` = $id_categorie";// LIMIT 0, 3
}

if (!$mysqli->query($query)) {
  exit("Erreur creation composant.<br />$query<br />". mysqli_error($mysqli));
}

if ($result = $mysqli->query($query)) {
    $composantList = $result->fetch_all(MYSQLI_ASSOC);
    $result->free();
}

foreach ($composantList as  $composant) {

  $query = "SELECT * FROM `image_composant` WHERE `id_composant` = ".$composant['id'];

  if ($result = $mysqli->query($query)) {
      $row = $result->fetch_assoc();
      $image = $row["image"];
      $result->free();
  }

  // recuperes les tags du composant
  $query = "SELECT * FROM `compatibility_tag` WHERE `id_composant` = ".$composant['id'];
  $tagComponents = bddQuery($mysqli, $query);

  $id = $composant['id'];
  $titre = $composant["model"];
  $img = "/data/asset/image/composants/".$image;
  $bureautique=5;$multimedia=5;$jeuxVideo=5;$rendu3D=5;$prix="46,92";
  include("composant-item2.php");
}






include("page-split.php");
$mysqli->close();
?>



</main>
