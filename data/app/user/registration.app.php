<?php



if( isset($_POST['name']) and ! empty($_POST['name']) ){

  $tErreur = array();
  if( $_POST['password1'] !=  $_POST['password2'] ){
    $tErreur['passwordDiff'] = "Les mot de passe ne sont pas identiques";
  }



  //INSERT INTO `user` (`id`, `nom`, `prenom`, `pseudo`, `age`, `password`, `date_registration`, `date_last_login`, `id_adresse`, `id_role`) VALUES (NULL, 'corlouer', 'florent', 'codeurh24', '25', 'azerty1234', '2018-09-24 00:00:00', '2018-09-24 00:00:00', '0', '0');
  $mysqli = bddConnect();

  $_POST["name"] = $mysqli->real_escape_string($_POST["name"]);
  $_POST["mail"] = $mysqli->real_escape_string($_POST["mail"]);
  $_POST["password1"] = $mysqli->real_escape_string($_POST["password1"]);

  $query = "INSERT INTO `user` (`id`, `nom`, `prenom`, `pseudo`, `age`, `password`, `date_registration`, `date_last_login`, `id_adresse`, `id_role`)
  VALUES (NULL, '', '', '".$_POST['name']."', '0', '".md5($_POST['password1'])."', '".date('Y-m-d H:i:s')."', '2018-09-24 00:00:00', '0', '0');";

  if( empty($tErreur) ){
    if (!$mysqli->query($query)) {
      exit("Erreur d'inscription.<br />");
    }
    header('Location: ./inscription-reussi.php');
    exit("Inscription Reussi.".date('Y-m-d H:i:s'));
  }

  /* Fermeture de la connexion */
  $mysqli->close();

}



?>
