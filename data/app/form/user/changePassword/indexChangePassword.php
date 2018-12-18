<?php

if( !isset($_SESSION['user']) ){
  header('Location: http://'.$_SERVER['HTTP_HOST']);
}


if( isset($_POST['changePasswordUserFromUser'])  ){
  $mysqli = bddConnect();
  // UPDATE `user` SET `password` = '81dc9bdb52d04dc20036dbd8313ed056' WHERE `user`.`id` = 29;
  safeVar($mysqli, "post");

  if ( isset($password1UserFromUser) && isset($password2UserFromUser) ) {
    if ( $password1UserFromUser == $password2UserFromUser ) {

      $query = "SELECT * FROM `user` WHERE `id` = ".$_SESSION['user']['id'];
      $resultUser = bddQuery($mysqli, $query);



      if( $resultUser[0]['password'] == md5($currentPasswordUserFromUser) ){
        $query = "UPDATE `user`
                  SET
                  `password` = '".md5($password1UserFromUser)."'
                  WHERE
                  `user`.`id` = ".$_SESSION['user']['id'];

        if(bddQuery($mysqli, $query)){
          bddError($mysqli, $query);
        }
        $mysqli->close();
        header('Location: /mon-compte/changer-mon-mot-de-passe/');
        exit('Redirection Echec sur la page indexChangePassword');
      }else{
        $error = 'Ce n\'est pas le bon mot de passe actuel';
      }

    }else{
      $error = 'Les mots de passes ne sont pas identiques';
    }
  }
  // echo 'Fin<br />';
  $mysqli->close();



}

if( isset($pageDisplay) && $pageDisplay == true ){

  require 'data/view/user/creations/headerCreation.php';
?>
<main class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8 col-xl-8">
      <form method="post">
        <fieldset>
          <legend>Changer le mot de passe</legend>
          <div class="error">
            <?= $error ?? ''; ?>
          </div>
          <div class="form-group">
            <label for="currentPasswordUserFromUser">Mot de passe actuel</label>
            <input name="currentPasswordUserFromUser" type="password" class="form-control" id="currentPasswordUserFromUser" />
          </div>
          <div class="form-group">
            <label for="password1UserFromUser">Nouveau mot de passe</label>
            <input name="password1UserFromUser" type="password" class="form-control" id="password1UserFromUser" />
          </div>
          <div class="form-group">
            <label for="password2UserFromUser">Retapez le nouveau mot de passe</label>
            <input name="password2UserFromUser" type="password" class="form-control" id="password2UserFromUser" />
          </div>
          <div class="text-right">
            <button type="submit" name="changePasswordUserFromUser" class="btn btn-primary">Changer</button>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</main>
<?php

  require 'data/view/user/creations/footerCreation.php';
 } ?>
