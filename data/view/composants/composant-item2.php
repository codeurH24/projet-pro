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
                  <?php if (empty($_SESSION['user'])){ ?>
                    <form method="post">
                      <button type="submit" name="button" title="Ajouter à la config">
                        <i class="fas fa-arrow-circle-up"></i>
                        <p>Vous devez vous connecter pour utiliser cette fonctionnalité</p>
                      </button>
                    </form>
                  <?php }else { ?>
                    <form method="post">
                      <input type="hidden" name="addToCreation"  value="<?= $id ?>" />
                      <button type="submit" name="button" title="Ajouter à la config">
                        <i class="fas fa-arrow-circle-up"></i>
                        <p>Ajouter</p>
                      </button>
                    </form>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
