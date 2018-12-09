<?php

function modal_NewPassword(){
  ob_start();

  ?><h5 class="modal-title">Nouveau mot de passe</h5><?php
  $headerModal = ob_get_contents();
  ob_end_clean();
  ob_start();
    ?>
    <input type="hidden" name="newPasswordForUser" value="1">
    <p>Désirez-vous faire une demande de réinitialisation du mot de passe ?</p>
    <p>Cela enverra un e-mail à l'utilisateur.</p>
    <?php

  $bodyModal = ob_get_contents();
  ob_end_clean();
  ob_start();
  ?>
    <!-- <button type="button" class="btn btn-primary">Oui</button> -->
    <button type="button" class="close btn btn-secondary" data-dismiss="modal" aria-label="Close">Non</button>
    <button type="submit" name="replaceComponentYes" class="btn btn-secondary">Oui</button>
  <?php

  $footerModal = ob_get_contents();

  ob_end_clean();

  modal($headerModal, $bodyModal, $footerModal);
}


  $mysqli = bddConnect();

  if( isset($_GET['section']) and $_GET['section'] == 'delete-user' ){
    $query = "DELETE FROM `user` WHERE `user`.`id` = ".$_GET['id-user'];
    bddQuery($mysqli, $query);
    header('location: /admin/utilisateurs/');
    exit('user '.$_GET['id-user'].' delete<br />');
  }

  // if( isset($_GET['section']) and $_GET['section'] == 'update-user' ){
  //   $query = "UPDATE `user` SET `nom` = 'florent', `prenom` = 'Corlouer', `pseudo` = 'admin master', `email` = 'cci.corlouer@gmail.fr', `age` = '33', `id_role` = '2' WHERE `user`.`id` = ".$_GET['id-user'];
  //   bddQuery($mysqli, $query);
  //   header('location: /admin/utilisateurs/');
  //   exit('user '.$_GET['id-user'].' update<br />');
  // }


  // UPDATE `user` SET `nom` = 'florent', `prenom` = 'Corlouer', `pseudo` = 'admin master', `email` = 'cci.corlouer@gmail.fr', `age` = '33', `id_role` = '2' WHERE `user`.`id` = 14;

  $query = "SELECT * FROM `user`";
  $userList = bddQuery($mysqli, $query);

  $query = "SELECT * FROM `role`";
  $roleList = bddQuery($mysqli, $query);
  // print_r($roleList);

  $mysqli->close();

  if( isset($pageDisplay) && $pageDisplay == true ){
  require 'data/view/admin/headerAdmin.php';
?>

<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-8 mb-3">
      <?php
      if (isset($_GET['ask-password']) && !isset($_POST['newPasswordForUser'])){
        modal_NewPassword();
      }
      if (isset($_POST['newPasswordForUser'])){
        if(isset($envoiEmail) && $envoiEmail == true){
          ?><p>Email envoyé</p><?php
        }else{
          ?><p>Envoi de l'email erreur.</p><?php
        }
      }?>
      <div class="text-right">
        <a href="/admin/utilisateurs/create-user.php" class="btn btn-secondary">Nouvel Utilisateur</a>
      </div>
    </div>
    <div class="col-12 col-md-11 col-lg-8 indexUser">
      <div class="row entete align-items-center">
        <div class="col-1">
          <span class="align-middle">ID</span>
        </div>
        <div class="col">
          <span class="align-middle">Pseudo</span>
        </div>
        <div class="col">
          <span class="align-middle">E-mail</span>
        </div>
        <div class="col">
          <span class="align-middle">Droit</span>
        </div>
        <div class="col">
          <span class="align-middle">Date d'inscription</span>
        </div>
        <!-- <div class="col">
          <span class="align-middle">Actions</span>
        </div> -->
      </div>
      <?php
        foreach ($userList as $key => $value) {
          ?>
          <div class="row">
            <div class="col-1" style="height:21px;">
              <p><?= $value['id'] ?></p>
            </div>
            <div class="col" style="height:21px;">
              <p><?= $value['pseudo'] ?></p>
            </div>
            <div class="col" style="height:21px;">
              <p><?= $value['email'] ?></p>
            </div>
            <div class="col" style="height:21px;z-index:10">
              <!-- <p><?= $value['id_role'] ?></p> -->
              <select name="" disabled>
                <?php
                if( $value['id_role'] == 0 ){
                  ?><option value="0" selected>Aucun</option><?php
                }
                foreach ($roleList as $role) {



                  if( $value['id_role'] == $role['id']){
                    ?><option value="<?= $role['id'] ?>" selected><?= $role['nom'] ?></option><?php
                  }else{
                    ?><option value="<?= $role['id'] ?>"><?= $role['nom'] ?></option><?php
                  }
                } ?>

              </select>
            </div>
            <div class="col" style="height:21px;">
              <p><?= date( "d-m-y", strtotime($value['date_registration']) ) ?></p>
            </div>
            <div class="col-12 admin-tools-users" style="z-index:1">
              <span class="align-middle">
                <ul class="text-right">
                  <li><a href="/admin/utilisateurs/show-user-<?= $value['id'] ?>.php"><i class="far fa-2x fa-eye"></i></a></li>
                  <li><a href="/admin/utilisateurs/supprimer-user-<?= $value['id'] ?>.php"><i class="fas fa-2x fa-trash"></i></a></li>
                  <li><a href="/admin/utilisateurs/modifier-user-<?= $value['id'] ?>.php"><i class="fas fa-2x fa-pen-alt"></i></a></li>
                  <li><a href="/admin/utilisateurs/demander-un-nouveau-mot-de-passe"><i class="fas fa-undo-alt"></i> <i class="fas fa-2x fa-key"></i></a></li>
                </ul>
              </span>
            </div>
          </div>
          <?php
        }
       ?>
    </div>
  </div>
</div>
<?php require 'data/view/admin/footerAdmin.php';













} ?>
