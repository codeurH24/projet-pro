<?php
if ( isset($_POST['newPasswordForUser']) ){
   // $to      = 'tefuddiddek-1134@yopmail.com';
   // $subject = 'PC-CONFIG.FR - Nouveau mot de passe';
   // $message = 'Bonjour. Vous venez de faire une demande de nouveau mot de passe';
   // $headers = 'From: webmaster@pc-config.fr' . "\r\n" .
   // 'Reply-To: tefuddiddek-1134@yopmail.com' . "\r\n" .
   // 'X-Mailer: PHP/' . phpversion();
   //
   // $success = mail($to, $subject, $message, $headers);
  $envoiEmail = mail('tefuddiddek-1134@yopmail.com', 'Demande de nouveau mot de passe', "Bonjour. \n
  Vous avez fait une demande pour ré-initialiser votre mot de passe. \n Je vous invite à present a en choisir un nouveau en suivant ce lien: \n
  http://mon-site.lol/change-mot-de-passse/?noepassword=1&id=14");


}
 ?>
