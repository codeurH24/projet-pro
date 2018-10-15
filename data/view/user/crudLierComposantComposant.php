<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#createLierComposantComposant">Creer</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#updateLierComposantComposant">Modifier</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#deleteLierComposantComposant">Supprimer</a>
  </li>
</ul>
<div id="myTabContentCompatibilite" class="tab-content">
  <div class="tab-pane fade show active" id="createLierComposantComposant">
    <?php require_once("data/app/form/user/createLierComposantComposant.php"); ?>
  </div>
  <div class="tab-pane fade" id="updateLierComposantComposant">
    <?php require_once("data/app/form/user/updateLierComposantComposant.php"); ?>
  </div>
  <div class="tab-pane fade" id="deleteLierComposantComposant">
    <?php //require_once("data/app/form/user/deleteLierComposantComposant.php"); ?>
    delete composant compatibilité
  </div>
</div>
