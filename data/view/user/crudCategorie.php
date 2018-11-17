<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#createCategorie">Creer</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#updateCategorie">Modifier</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#deleteCategorie">Supprimer</a>
  </li>
</ul>
<div id="myTabContent" class="tab-content">
  <div class="tab-pane fade show active" id="createCategorie">
    <?php require_once("data/app/form/user/createCategorie.php"); ?>
  </div>
  <div class="tab-pane fade" id="updateCategorie">
    <?php require_once("data/app/form/user/updateCategorie.php"); ?>
  </div>
  <div class="tab-pane fade" id="deleteCategorie">
    <?php require_once("data/app/form/user/deleteCategorie.php"); ?>
  </div>
</div>
