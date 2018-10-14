<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#createRevendeur">Creer</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#updateRevendeur">Modifier</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#deleteRevendeur">Supprimer</a>
  </li>
</ul>
<div id="myTabContent" class="tab-content">
  <div class="tab-pane fade show active" id="createRevendeur">
    <?php require_once("data/app/form/user/createRevendeur.php"); ?>
  </div>
  <div class="tab-pane fade" id="updateRevendeur">
    <?php require_once("data/app/form/user/updateRevendeur.php"); ?>
  </div>
  <div class="tab-pane fade" id="deleteRevendeur">
    <?php require_once("data/app/form/user/deleteRevendeur.php"); ?>
  </div>
</div>
