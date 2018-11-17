<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#createComposant">Creer</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#updateComposant">Modifier</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#deleteComposant">Supprimer</a>
  </li>
</ul>
<div id="myTabContent" class="tab-content">
  <div class="tab-pane fade show active" id="createComposant">
    <?php require_once("data/app/form/user/createComposant.php"); ?>
  </div>
  <div class="tab-pane fade" id="updateComposant">
    <?php require_once("data/app/form/user/updateComposant.php"); ?>
  </div>
  <div class="tab-pane fade" id="deleteComposant">
    <?php require_once("data/app/form/user/deleteComposant.php"); ?>
  </div>
</div>
