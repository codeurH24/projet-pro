<?php
// une fois le mail envoyer.
// La page data/view/pages/change-password.php
// est appeler  apres par l'utilisateur pour changer sont mot de passe
// rappel RewriteRule ^change-mot-de-passse/([0-9]+)/token-([0-9a-fA-F]+)\.php$ ?page=change-password&section=new-passwordr&id-user=$1&token=$2 [L]

if ( isset($_POST['newPasswordForUser']) ){
  $IDUser = $_POST['newPasswordForUser'];

  $mysqli = bddConnect();

  // change le mot de passe pour s'assurer de la demande du status qui est le changement de mot de passe
    $query = "UPDATE `user`
              SET
              `password` = 'newpassord'
              WHERE
              `user`.`id` = ".$IDUser;

    if(bddQuery($mysqli, $query) === false){
      bddError($mysqli, $query);
    }

    // recupere l'adresse email pour envoyer la demande à son adresse email

    $query = "SELECT * FROM `user` WHERE `user`.`id` = $IDUser ";
    $rows = bddQuery($mysqli, $query);
    $row = $rows[0];

  $mysqli->close();
  // echo($row['email']);

  // prépare le e-mail et l'envoi
  $tokenPatern = $IDUser.secure_key;
  $tokenMD5 = md5($tokenPatern);

  $headers = 'From: administrateur@pc-config.fr' . "\r\n" .
  'X-Mailer: PHP/' . phpversion();

  $message = "
Bonjour. \n
Vous avez fait une demande pour ré-initialiser votre mot de passe. \n Je vous invite à present a en choisir un nouveau en suivant ce lien: \n
http://$_SERVER[HTTP_HOST]/change-mot-de-passse/$IDUser/token-$tokenMD5.php";

  // $data = array('password' => '1234', 'id' => 123);
  $data = array(
    'password' => '1234',
    'to' => 'tefuddiddek-1134@yopmail.com',
    'subject' => 'Demande de nouveau mot de passe',
    'message' => $message,
    'headers' => $headers,
  );
  $envoiEmail = redirect_post('http://sendmail.codeurh24.com/', $data);



}
 ?>
