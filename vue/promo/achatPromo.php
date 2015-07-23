<div class="container">
<?php if (!empty($somme)): ?>
  <div class="well">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <form class="form-horizontal" action="index.php?route=achatEvenement&id=<?= $evenementid ?>" method="post">
          <div class="form-group">
            <p>Le prix de base : <?= $prix?> €</p>
            <p>Reduction de : <?= $test = $prix * $somme ?> €</p>
            <p>Nouveau prix : <?= $prix - $test ?> €</p>
            <input type="hidden" name="categorieid" value="<?= $categorieid?>">
            <input type="hidden" name="evenementid" value="<?= $evenementid?>">
            <input type="hidden" name="codepromoid" value="<?= $codepromoid?>">
            <input type="submit" class="btn btn-primary" name="send" value="Valider">
          </div>
        </form>
      </div>
    </div>
  </div>
<?php else: ?>
    <div class="well">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <form class="form-horizontal" action="index.php?route=achatCodePromo" method="post">
            <div class="form-group">
              <label for="prenom"  class="col-sm-4 control-label">Avez vous un code promotionel?</label>
              <div class="col-sm-4">
                <input type="text" name="code" class="form-control" id="promo">
              </div>
              <div class="col-sm-4">
                <input type="hidden" name="categorieid" value="<?= $categorieid ?>">
                <input type="hidden" name="evenementid" value="<?= $evenementid ?>">
                <input type="submit" name="send" value="Valider" class="btn btn-primary">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <form class="form-horizontal" action="index.php?route=achatEvenement&id=<?= $evenementid ?>" method="post">
          <div class="form-group">
            <input type="hidden" name="categorieid" value="<?= $categorieid?>">
            <input type="hidden" name="evenementid" value="<?= $evenementid?>">
            <input type="submit" class="btn btn-primary" name="send" value="Non">
          </div>
        </form>
      </div>
    </div>
<?php endif ?>
</div>