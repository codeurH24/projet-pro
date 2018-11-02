<?php

function assetImg($nameImage){
  echo "data/asset/image/$nameImage";
}

function gImg($taille){
  echo "https://dummyimage.com/$taille";
}

function bddConnect(){
  $mysqli = new mysqli(mysql_host, mysql_user, mysql_pass, mysql_base);

  /* Vérification de la connexion */
  if (mysqli_connect_errno()) {
      printf("Échec de la connexion : %s\n", $mysqli->connect_error);
      exit();
  }
  $mysqli->set_charset("utf8");
  return $mysqli;
}


function bddQuery($con, $query){
  $list = "";
  if ($result = $con->query($query)) {
      if( $result !== true ){
        $list = $result->fetch_all(MYSQLI_ASSOC);
        $result->free();
        return $list;
      }
  }
  return false;
}

function HTMLList($arrList, $arrNameCol, $html){
  $divList = ""; // rendu html de la list
  // creer le rendu d'un element de la liste.
  foreach ($arrList as $value) { // pour chaque element de la liste le mettre en html
    $htmlReplace = $html; // html pret a etre traiter plusieurs fois pour plusieurs replace dans un element de la liste
    foreach($arrNameCol as $key => $nameCol ){
      $htmlReplace = str_replace($key , $value[$nameCol], $htmlReplace );
    }
    // rendu de un element a ajouter a la creation de la liste html
    $divList .= $htmlReplace;
  }
  return $divList; // retourn la liste generer
}
