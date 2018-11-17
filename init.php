<?php
require 'data/config.php';
require_once("data/app/func/function.php");
echo "Initialisation Démarrer<br />";


/*************************
*    GIT UPDATE          *
*************************/
$out = shell_exec ("git status");
if( strstr($out, "Your branch is up to date with") !== false ){
  exit("[Anglais]  Cette version du projet est la plus récente. Aucun besoin de mettre à jour.(pull)<br />");
}

if( strstr($out, "Votre branche est à jour avec") !== false ){
  exit("[Français] Cette version du projet est la plus récente. Aucun besoin de mettre à jour.(pull)<br />");
}
$out = shell_exec ('git add --a');
echo var_dump($out)."<br />";
$out = shell_exec ('git commit -m "update"');
echo var_dump($out)."<br />";
$out = shell_exec ('git pull');
echo var_dump($out)."<br />";
exit("Script coupé<br />");








/*************************
*    DATABASE CREATION   *
*************************/

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
