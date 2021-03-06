<?php  session_start();
// rappel pour codeurh24 "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
// ascii generator http://patorjk.com/software/taag/ police calbin S width smush R

require_once("data/config.php");
$dbDate = date('Y-m-d H:i:s');

if ( isset($_SESSION['user'])){
  $UID = $_SESSION['user']['id'];
  $UPseudo = $_SESSION['user']['pseudo'];
}
require_once("data/app/func/function.php");
require_once("data/app/func/log.func.php");

if ( isset($_SESSION['user'])){
  if ( access() === false ) {
    header('Location: http://'.$_SERVER['HTTP_HOST']);
  }
}

// Route main

require_once("data/route/routeMain.php");
require_once("data/route/routeCreation.php");

// traitement des formulaires
$pageDisplay = false;
/*


╔╦╗╦═╗╔═╗╦╔╦╗╔═╗╔╦╗╔═╗╔╗╔╦╗╔═╗  ╔═╗╔═╗╔╦╗  ╔═╗╔╦╗  ╔═╗╔═╗╔═╗╔╦╗
 ║ ╠╦╝╠═╣║ ║ ║╣ ║║║║╣ ║║║║ ╚═╗  ║ ╦║╣  ║   ║╣  ║   ╠═╝║ ║╚═╗ ║
 ╩ ╩╚═╩ ╩╩ ╩ ╚═╝╩ ╩╚═╝╝╚╝╩ ╚═╝  ╚═╝╚═╝ ╩   ╚═╝ ╩   ╩  ╚═╝╚═╝ ╩


    ┬ ┬┌┬┐┬  ┬┌─┐┌─┐┌┬┐┌─┐┬ ┬┬─┐
    │ │ │ │  │└─┐├─┤ │ ├┤ │ │├┬┘
    └─┘ ┴ ┴─┘┴└─┘┴ ┴ ┴ └─┘└─┘┴└─
    */
      // CREATION (CRUD)
    require 'data/app/form/user/creations/indexCreation.php'; //  liste les entitées
    require 'data/app/form/user/creations/createCreation.php'; // Create
    require 'data/app/form/user/creations/showCreation.php'; // read
    require 'data/app/form/user/creations/deleteCreation.php'; // delete
    /*
    ┌─┐┌┬┐┌┬┐┬┌┐┌┬┌─┐┌┬┐┬─┐┌─┐┌┬┐┬┌─┐┌┐┌
    ├─┤ ││││││││││└─┐ │ ├┬┘├─┤ │ ││ ││││
    ┴ ┴─┴┘┴ ┴┴┘└┘┴└─┘ ┴ ┴└─┴ ┴ ┴ ┴└─┘┘└┘
    */
    // CATEGORIE (CRUD)
    require 'data/app/form/admin/category/createCategory.php'; // create
    require 'data/app/form/admin/category/updateCategory.php'; // update
    require 'data/app/form/admin/category/deleteCategory.php'; // delete

    // COMPOSANT (CRUD)
    require 'data/app/form/admin/component/createComponent.php'; // create
    require 'data/app/form/admin/component/updateComponent.php'; // update
    require 'data/app/form/admin/component/deleteComponent.php'; // delete

    // REVENDEUR (CRUD)
    require 'data/app/form/admin/retailer/createRetailer.php'; // create
    require 'data/app/form/admin/retailer/updateRetailer.php'; // update
    require 'data/app/form/admin/retailer/deleteRetailer.php'; // delete

    // LIEN DE REVENTE (CRUD)
    // require 'data/app/form/admin/resaleLink/createResaleLink.php'; // create
    // require 'data/app/form/admin/resaleLink/updateResaleLink.php'; // update
    require 'data/app/form/admin/resaleLink/deleteResaleLink.php'; // delete

    // COMPATIBILITE (CRUD)
    require 'data/app/form/admin/component/compatibility/createCompatibility.php'; // create
    require 'data/app/form/admin/component/compatibility/updateCompatibility.php'; // update
    require 'data/app/form/admin/component/compatibility/deleteCompatibility.php'; // delete

      // UTILISATEUR (CRUD)
    require 'data/app/form/admin/user/createUser.php'; // create
    require 'data/app/form/admin/user/updateUser.php'; // update
    require 'data/app/form/admin/user/deleteUser.php'; // delete

    // ROLE (CRUD)
    require 'data/app/form/admin/role/createRole.php'; // create
    require 'data/app/form/admin/role/updateRole.php'; // update
    require 'data/app/form/admin/role/deleteRole.php'; // delete

    // ACCES (CRUD)
    require 'data/app/form/admin/access/createAccess.php'; // create
    require 'data/app/form/admin/access/updateAccess.php'; // update
    require 'data/app/form/admin/access/deleteAccess.php'; // delete

    // envoi un mail a l'utilisateur qui en a fait la demande.
    // le demandeur peut-etre un admin en passant pas l'administration du site.
    require 'data/app/form/admin/user/newPassword.php'; // reset passord for user

    // Déconnexion du site
    require 'data/view/user/logout.php'; //

    // rediretion pour confirmer le changement du mot de passe avec succes
    require 'data/view/pages/change-password.php';

    // Enregistrement du nouveau mot de passe user et redirection
    require 'data/app/form/user/changePassword/indexChangePassword.php';


 ?><!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="data/asset/css/bootstrap.min.css"  /> -->
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.1.3/flatly/bootstrap.min.css" rel="stylesheet" integrity="sha384-gJWVjz180MvwCrGGkC4xE5FjhWkTxHIR/+GgT8j2B3KKMgh6waEjPgzzh7lL7JZT" crossorigin="anonymous"> -->

    <link href="https://fonts.googleapis.com/css?family=Bowlby+One+SC|Roboto" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display|Source+Sans+Pro" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.1.3/lux/bootstrap.min.css" rel="stylesheet" integrity="sha384-ML9h/UCooefre72ZPxxOHyjbrLT1xKV0AHON1J+OlOV2iwcYemqmWyMfTcfyzLJ1" crossorigin="anonymous">
    <link rel="stylesheet" href="data/asset/css/form.css">
    <link rel="stylesheet" href="data/asset/css/master.css">
    <link rel="stylesheet" href="data/asset/css/componentItemPage.css">


    <title>PC CONFIG</title>
  </head>
  <body>
    <?php require_once('data/view/header.php'); ?>
    <?php //require "data/view/account/identity.php"; ?>
    <?php require_once('data/view/main.php'); ?>
    <?php require_once('data/view/footer.php'); ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script>
      $('#myModal').modal('show');
    </script>
  </body>
</html>
