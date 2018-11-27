<?php



/*************************
*    DATABASE CREATION   *
*************************/


// **** suppression si la base de donnée existe deja ****
$conn = new mysqli(mysql_host, mysql_user, mysql_pass);
// Check connection
if ($conn->connect_error) {
    die("Connection échoué: " . $conn->connect_error);
}

/// CREATE DATABASE
$sql = "SHOW DATABASES LIKE 'pc-config';";
if ($result = $conn->query($sql)) {
  if( $result->num_rows == 1){
    $sql = "DROP DATABASE `pc-config`";
    echo "Base de donnée trouvé<br >";
    if ($conn->query($sql) === true){
      echo "Base de donnée supprimé<br >";
    }else{
      echo "pc-confi non écrasé<br >$sql<br />";
    }
  }else{
    echo "Base de donnée absente<br >";
  }
} else {
    echo "Erreur sur la recheche de la base de donnée :<br />" . $conn->error."<br /><br />";
}
$conn->close();


// **** Creation de la base de donnée ****
$conn = new mysqli(mysql_host, mysql_user, mysql_pass);
// Check connection
if ($conn->connect_error) {
    die("Connection échoué: " . $conn->connect_error);
}

/// CREATE DATABASE
$sql = "CREATE DATABASE `pc-config` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;";
if ($conn->query($sql) === TRUE) {
    echo "Base de donnée creer avec succé<br >";
} else {
    echo "Base de donnée. Erreur pour creer la database pc-config:<br />" . $conn->error."<br /><br />";
}
$conn->close();

// CREATE TABLES
$conn = new mysqli(mysql_host, mysql_user, mysql_pass, mysql_base);

$sql = file_get_contents('pc-config.sql');
if( $sql === false){
  echo "fichier sql problème<br />";
}

if ($conn->multi_query($sql)) {
    echo "Tables crées avec succés<br />";
    // echo "Tables. Erreur:<br />" . $conn->error;
} else {
    echo "Tables. Erreur:<br />" . $conn->error;
}

$conn->close();


 ?>
