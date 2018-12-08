<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="row justify-content-center">
        <div class="col-12 col-xl-8 conponent-item2-page">
          <div class="row">
            <div class="col-12 col-sm-4 text-center text-sm-left image-item">
              <img class="" src="<?= $img ?>" alt="Image Composant">
            </div>
            <div class="col-12 col-sm-8 infos-item">
              <div class="row">
                <h2><?= $titre ?></h2>
              </div>
              <div class="row">
                <div class="col-10 col-sm-8">
                  <div>
                    <div class="label">Bureautique</div>
                    <div class="pastie pastie<?= $bureautique ?>"><?= $bureautique ?></div>
                  </div>
                  <div>
                    <div class="label">Multimedia</div>
                    <div class="pastie pastie<?= $multimedia ?>"><?= $multimedia ?></div>
                  </div>
                  <div>
                    <div class="label">Jeux video</div>
                    <div class="pastie pastie<?= $jeuxVideo ?>"><?= $jeuxVideo ?></div>
                  </div>
                  <div>
                    <div class="label">Rendu 3D</div>
                    <div class="pastie pastie<?= $rendu3D ?>"><?= $rendu3D ?></div>
                  </div>
                </div>
                <div class="col-2 col-sm-4 tools">
                  <!-- <a href="#"><i class="fas fa-2x fa-info-circle"></i></a>
                  <a href="#"><i class="fas fa-2x fa-shopping-cart"></i></a> -->
                  <form method="post">
                    <input type="hidden" name="addToCreation"  value="<?= $id ?>" />
                    <!-- <button href="#" class="btn btn-primary" style="min-width:10rem;">Ajouter</button> -->
                    <button type="submit" name="button" title="Ajouter à la config">
                      <i class="fas fa-arrow-circle-up"></i>
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
