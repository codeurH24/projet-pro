<main class="container-fluid composants"><?php



$mysqli = bddConnect();
$id_categorie = 8;
$numbersPerPage = 5;


include("page-split.php");

if( isset($_GET["limit"]) and $_GET["limit"] > 0 ){
  $query = "SELECT * FROM `composant` WHERE `id_cat` = 8 LIMIT ".(($_GET["limit"]*$numbersPerPage)-$numbersPerPage).", $numbersPerPage";
}else{
  $query = "SELECT * FROM `composant` WHERE `id_cat` = 8";// LIMIT 0, 3
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

  $titre = $composant["model"];
  $img = "/data/asset/image/composants/".$image;
  $bureautique=5;$multimedia=5;$jeuxVideo=5;$rendu3D=5;$prix="46,92";
  include("composant-item.php");
}






include("page-split.php");
$mysqli->close();
?>



</main>
