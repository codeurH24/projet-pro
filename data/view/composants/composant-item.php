<div class="row mt-2 mb-3">
  <div class="col-12 col-sm-5 col-md-4 col-lg-3 text-center ">
    <img class="" src="<?= $img ?>" alt="Image Composant">
  </div>
  <div class="col-12 col-sm-7 col-md-8 col-lg-7">
    <div class="row">
      <div class="col-12 ">
        <h5><?= $titre ?></h5>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div>
          <div class="label">Bureautique</div>
          <meter low="1" optimum="5" high="10" value="<?= $bureautique ?>" min="0" max="10"></meter>
        </div>
        <div>
          <div class="label">Multimedia</div>
          <meter low="1" optimum="5" high="10" value="<?= $multimedia ?>" min="0" max="10"></meter>
        </div>
        <div>
          <div class="label">Jeux video</div>
          <meter low="1" optimum="5" high="10" value="<?= $jeuxVideo ?>" min="0" max="10"></meter>
        </div>
        <div>
          <div class="label">Rendu 3D</div>
          <meter low="1" optimum="5" high="10" value="<?= $rendu3D ?>" min="0" max="10"></meter>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 col-lg-2 text-right">
    <div>
      <form method="post">
        <input type="hidden" name="detailOfComposant"  value="<?= $id ?>" />
        <button href="#" class="btn btn-primary" style="min-width:10rem;">Detail</button>
      </form>
    </div>
    <div>
      <form method="post">
        <input type="hidden" name="addToCreation"  value="<?= $id ?>" />
        <button href="#" class="btn btn-primary" style="min-width:10rem;">Ajouter</button>
      </form>
    </div>
    <div class="text-nowrap">Meilleur Prix: <cite title="Source Title"><?= $prix ?>€</cite></div>
  </div>
</div>
