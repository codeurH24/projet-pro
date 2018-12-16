<?php

  if( isset($_GET['section']) && $_GET['section'] == 'confirmation-successful'){

    if( isset($pageDisplay) && $pageDisplay == true ){
  ?>
    <main>
      <div class="modal fade" id="myModal" aria-hidden="true" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Comfirmation !</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Votre mot de passe à été changé</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button>
            </div>
          </div>
        </div>
      </div>
    </main>
  <?php
    }
  }else if( isset($_GET['section']) && $_GET['section'] == 'new-password'){


  // mot de passe 1234 = 81dc9bdb52d04dc20036dbd8313ed055
  // http://localhost:8080/change-mot-de-passse/14/token-600df80fda07f9a94dd15c774fe2c8d0.php
  $tokenPatern = $_GET['id-user'].secure_key;
  $tokenMD5 = md5($tokenPatern);
  $mysqli = bddConnect();

  // condition de sécurité. le tokenPartern attendu permet de ne pas pouvoir changer l'id utilisateur dans l'url
 if(isset($_GET['token']) && ! ($_GET['token'] == $tokenMD5) ){
   exit('Problème url');
 }

 // recupere les informations de l'utilisateur en base de donnée pour verifier sont mot de passe actuel
 $query = "SELECT * FROM `user` WHERE `user`.`id` = ".$_GET['id-user'];

 if ( ($rows = bddQuery($mysqli, $query)) === false  ){
   bddError($mysqli, $query);
 }
 // simplifie le resultat mysql a une seul ligne de resultat vue qu'il ne peux y en avoir qu'une
 // car ont recherche un seuk user
 $row = $rows[0];

 // si le mot de passe de l'utilisateur est celui attendu c'est donc que la demande
 // de changer sont mot de passe a reellement été faite
 if( $row['password'] != 'newpassord'){
   exit('Problème, la demande de changement de mot de passe n\'est plus valide');
 }

 if( isset($_POST['newpassword1']) && isset($_POST['newpassword2']) && isset($_GET['id-user'])){

    if( $_POST['newpassword1'] == $_POST['newpassword2'] ){

      // changement de sont mot de passe
      $query = "UPDATE `user`
                SET
                `password` = '".md5($_POST['newpassword1'])."'
                WHERE
                `user`.`id` = ".$_GET['id-user'];

      if(bddQuery($mysqli, $query) === false){
        bddError($mysqli, $query);
      }
      header("Location: http://$_SERVER[HTTP_HOST]/change-mot-de-passse/success.php");
      //RewriteRule ^change-mot-de-passse/success.php$ ?page=change-password&section=confirmation-successful [L]
      exit("Location: http://$_SERVER[HTTP_HOST]/change-mot-de-passse/success.php");

    }else{
      $erreur = 'Les mots de passe ne sont pas identiques';
    }
 }
 $mysqli->close();
  if( isset($pageDisplay) && $pageDisplay == true ){
 ?><main class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8 col-xl-4">
      <form method="post">
        <fieldset>
          <legend>Changement de mot de passe</legend>
          <p class="error"><?= $erreur ?? '' ?></p>
          <div class="form-group">
            <label for="newpassword1">Mot de passe</label>
            <input name="newpassword1" type="password" class="form-control" id="newpassword1">
          </div>
          <div class="form-group">
            <label for="newpassword2">Confirmer le même mot de passe</label>
            <input name="newpassword2" type="password" class="form-control" id="newpassword2">
          </div>
          <div class="text-right">
            <button type="submit" class="btn btn-primary">Changer</button>
          </div>
        </fieldset>
      </form>
    </div>
</main>
<?php
  }
} ?>
