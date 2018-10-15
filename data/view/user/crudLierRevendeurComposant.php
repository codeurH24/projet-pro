<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#createLierRevendeurComposant">Creer</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#updateLierRevendeurComposant">Modifier</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#deleteLierRevendeurComposant">Supprimer</a>
  </li>
</ul>
<div id="myTabContent" class="tab-content">
  <div class="tab-pane fade show active" id="createLierRevendeurComposant">
    <?php require_once("data/app/form/user/createLierRevendeurComposant.php"); ?>
  </div>
  <div class="tab-pane fade" id="updateLierRevendeurComposant">
    <?php require_once("data/app/form/user/updateLierRevendeurComposant.php"); ?>
  </div>
  <div class="tab-pane fade" id="deleteLierRevendeurComposant">
    <?php require_once("data/app/form/user/deleteLierRevendeurComposant.php"); ?>
  </div>
</div>
