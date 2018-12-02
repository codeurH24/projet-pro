<main class="container-fluid">
<div class="row">
  <div class="col">
    <?php
    $section = $_GET['section'];
    switch ($section) {
      case 'login':
        require_once("data/app/form/account/login.php");
        break;
      case 'registration':
        require_once("data/app/form/account/registration.php");
        break;
      case 'registration-success':
        require_once("data/view/account/registration-success.php");
        break;

      default:
        require_once("data/view/account/myAccount.php");
        break;
    }

     ?>

  </div>
</div>
</main>
