<?php


  if( isset($_POST['updateUserTable']) ){

    // si tu n 'est pas admin ou surper admin alors tu ne pas pas modifier un utilisateur
    if( isset($_SESSION['user']['roleID']) and ($_SESSION['user']['roleID'] == 3 or $_SESSION['user']['roleID'] == 4) ){
      //si tu est admin alors du ne peux pas changer le role en super admin or admin
      if( $_SESSION['user']['roleID'] == 3 and ($_POST['IDRoleUserUpdate'] == 4 or $_POST['IDRoleUserUpdate'] == 3)){
        $_POST['IDRoleUserUpdate'] = 2;
      }




      $mysqli = bddConnect();

      $query = "UPDATE `user`
                SET
                `nom` = '".$_POST['nomUserUpdate']."',
                `prenom` = '".$_POST['prenomUserUpdate']."',
                `pseudo` = '".$_POST['pseudoUserUpdate']."',
                `email` = '".$_POST['emailUserUpdate']."',
                `age` = '".$_POST['ageUserUpdate']."',
                `id_role` = '".$_POST['IDRoleUserUpdate']."'
                WHERE
                `user`.`id` = ".$_POST['idUserUpdate'];

      if(bddQuery($mysqli, $query)){
        bddError($mysqli, $query);
      }
      if($_SESSION['user']['id'] == $_GET['id-user'] ){
        $_SESSION['user']['pseudo'] = $_POST['pseudoUserUpdate'];
      }

      $mysqli->close();
      header('Location: '.$_SERVER['REQUEST_URI']);
      exit('user update<br />');
    }
  }


if( isset($pageDisplay) && $pageDisplay == true ){
  $mysqli = bddConnect();

  $query = "SELECT * FROM `user` WHERE `id` = ".$_GET['id-user'];
  $userArr = bddQuery($mysqli, $query)[0];

  $query = "SELECT * FROM `role`";
  $roleList = bddQuery($mysqli, $query);

  $mysqli->close();

  require 'data/view/admin/headerAdmin.php';
?>
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8 col-xl-6">
      <div class="text-right mb-3">
        <a href="/admin/utilisateurs/" class="btn btn-secondary">Retour</a>
      </div>
      <form method="post">
        <fieldset>
          <legend>Modification de l'utilisateur</legend>
          <div class="form-group">
            <label for="idUserUpdate">id</label>
            <input name="idUserUpdate" type="text" class="form-control" id="idUserUpdate" value="<?= $_GET['id-user'] ?>" />
          </div>
          <div class="form-group">
            <label for="nomUserUpdate">Nom</label>
            <input name="nomUserUpdate" type="text" class="form-control" id="nomUserUpdate" value="<?= $userArr['nom'] ?>" />
          </div>
          <div class="form-group">
            <label for="prenomUserUpdate">Prénom</label>
            <input name="prenomUserUpdate" type="text" class="form-control" id="prenomUserUpdate" value="<?= $userArr['prenom'] ?>" />
          </div>
          <div class="form-group">
            <label for="pseudoUserUpdate">Pseudo</label>
            <input name="pseudoUserUpdate" type="text" class="form-control" id="pseudoUserUpdate" value="<?= $userArr['pseudo'] ?>" />
          </div>
          <div class="form-group">
            <label for="emailUserUpdate">E-mail</label>
            <input name="emailUserUpdate" type="text" class="form-control" id="emailUserUpdate" value="<?= $userArr['email'] ?>" />
          </div>
          <div class="form-group">
            <label for="ageUserUpdate">Age</label>
            <input name="ageUserUpdate" type="text" class="form-control" id="ageUserUpdate" value="<?= $userArr['age'] ?>" />
          </div>
          <div class="form-group">
            <label for="IDRoleUserUpdate">Role</label>
            <!-- <?= $userArr['id_role'] ?> -->
            <select name="IDRoleUserUpdate" type="text" class="form-control" id="IDRoleUserUpdate" value="<?= $userArr['id_role'] ?>" />
              <?php
              if( $userArr['id_role'] == 0 ){
                ?><option value="0" selected>Aucun</option><?php
              }
              foreach ($roleList as $role) {
                if( $userArr['id_role'] == $role['id']){
                  ?><option value="<?= $role['id'] ?>" selected><?= $role['nom'] ?></option><?php
                }else{
                  ?><option value="<?= $role['id'] ?>"><?= $role['nom'] ?></option><?php
                }
              }?>
            </select>
          </div>
          <div class="text-right">
            <button type="submit" name="updateUserTable" class="btn btn-primary">Modifier</button>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</div>
<?php

require 'data/view/admin/footerAdmin.php';

 } ?>
