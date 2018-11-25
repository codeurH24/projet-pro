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
      return $con->insert_id;
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

function safeVar($con, $method="post"){
  $arr = [];
  if( $method=="post"){
    foreach( $_POST as $key => $value ){
      global $$key;
      $$key = $con->real_escape_string($_POST[$key]);
      $arr[$key] = $$key;
    }
  }else if( $method=="get"){
    foreach( $_GET as $key => $value ){
      global $$key;
      $$key = $con->real_escape_string($_GET[$key]);
      $arr[$key] = $$key;
    }
  }
  return (object) $arr;
}

function bddCreate($nameTable ,$arr){
  $colName = ""; $lineValue = "";
  foreach ($arr as $key => $value) {
    if($value == NULL){
      $colName .=  "`$key`,\n";
      $lineValue .= "NULL,\n";
    }else{
      $colName .=  "`$key`,\n";
      $lineValue .= "'$value',\n";
    }
  }
  $colName = substr($colName, 0, -2);
  $lineValue = substr($lineValue, 0, -2);
  return "INSERT INTO `$nameTable` (\n$colName\n) VALUES (\n$lineValue\n)";
}

function bddCreateFlush($mysqli, $nameTable ,$arr){
  $query = bddCreate($nameTable ,$arr);
  if (($lastID = bddQuery($mysqli, $query)) === false) {
    bddError($mysqli, $query);
  }
  return $lastID;
}

function bddUpdate($nameTable ,$arr, $where){
  $setData = "\n";
  foreach ($arr as $key => $value) {
    if($value == NULL){
      $setData .= "`$key` = NULL,\n";
    }else{
      $setData .= "`$key` = '$value',\n";
    }
  }
  $setData = substr($setData, 0, -2);
  return "UPDATE `$nameTable`\n SET $setData \n$where";
}

function bddUpdateFlush($mysqli, $nameTable ,$arr, $where){
  $query = bddUpdate($nameTable ,$arr, $where);
  if (bddQuery($mysqli, $query) === false) {
    bddError($mysqli, $query);
  }
}

function bddError($mysqli, $query){

  $debug = debug_backtrace()[0];
  $file = $debug['file'];
  $line = strval($debug['line']);
  if( basename($file) == "function.php"){
    $debug = debug_backtrace()[1];
    $file = $debug['file'];
    $line = strval($debug['line']);
  }

  $erreurSQL = mysqli_error($mysqli);
  $numLine = substr($erreurSQL,-1);
  if(is_numeric($numLine)){
    $linesSQL = explode("\n", $query);
    $linesSQL[($numLine-1)] = "<span style=\"color:red\">".$linesSQL[($numLine-1)] ."</span>";
    $query = implode("\n", $linesSQL);
  }else{
    $erreurSQL = "<span style=\"color:red\">$erreurSQL</span>";
  }
  exit("Line: ".$line.".<br />".$file." .<br />".nl2br($query)."<br /><br />". $erreurSQL);
}


function UID(){
  global $UID;
  return $UID;
}
function dbDate(){
  global $dbDate;
  return $dbDate;
}

function modal($header, $content, $footer){
  ?>
  <form action="" method="post">
    <div class="modal fade" id="myModal" aria-hidden="true" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <?= $header ?>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?= $content ?>
          </div>
          <div class="modal-footer">
            <?= $footer ?>
          </div>
        </div>
      </div>
    </div>
  </form>
  <?php
}
