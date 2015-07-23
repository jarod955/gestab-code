<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <form class="form-horizontal" action="index.php?route=achatEvenement&id=<?= $evenement['ev_id']; ?>" method="post">
        <div class="row">
          <div class="well">
            <h2>Merci de choisir votre place</h2>
            <hr>
            <?php foreach ($categories as $categorie): ?>
              <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                  <div class="panel panel-default">
                    <div class="panel-heading">Catégorie</div>
                    <div class="panel-body">
                      <?= ucfirst(lcfirst($categorie['cat_nom'])); ?>
                    </div>
                  </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                  <div class="panel panel-default">
                    <div class="panel-heading">Prix</div>
                    <div class="panel-body">
                      <?php if (!empty($somme)): ?>
                        Reduction de : <?= $test = $categorie['cat_prix'] * $somme ?>
                        Nouveau prix : <?= $categorie['cat_prix'] = $categorie['cat_prix'] - $test ?>
                        <input type="hidden" name="codepromoid" value="<?= $codepromo ?>">
                        
                      <?php else: ?>
                        <?= $categorie['cat_prix'] ?>
                      <?php endif ?>
                      <input type="hidden" name="prix_<?= $categorie['cat_prix'] ?>" value="<?= $categorie['cat_prix'] ?>">
                    </div>
                  </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                  <div class="panel panel-default">
                    <div class="panel-heading">Nombre de place</div>
                    <div class="panel-body">
                      <select name="cat_<?= $categorie['cat_id']?>" class="form-control">
                        <option value="" selected></option>
                        <option value="<?= $categorie['cat_id']?>">1</option>
                      </select>
                    </div><?php var_dump($categorie['cat_id']); ?>
                  </div>
                </div>
              </div>
            <?php endforeach ?>

            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                  <label for="prenom"  class="col-sm-4 control-label">Avez vous un code promo ?</label>
                  <div class="col-sm-4">
                    <input type="text" name="code" class="form-control" id="promo">
                  </div>
                  <input type="hidden" name="evenementid" value="<?= $evenement['ev_id']?>">
                  <input type="submit" class="btn btn-primary" name="send" value="Valider" />
                </div>
              </div>
            </div>

          </div>
          <div class="well">
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h3>Recapitulatif de l'inscription</h3></br>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                  <strong><p>Nom de l'évenement :</strong></br></br>
                  <?= $evenement['ev_libelle']?></p>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                  <strong><p>Adresse :</p></strong>
                  <address>
                    <?= $evenement['adr_num_rue']?> <?= $evenement['adr_rue']?><br>
                    <?= $evenement['adr_ville']?>, <?= $evenement['adr_code_postal']?><br>
                    <strong>Salle: </strong><?= $evenement['lieu_nomSalle']?><br>
                  </address>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                  <strong><p>Organisateur :</strong> <?= $evenement['inter_nom']?> <?= $evenement['inter_prenom']?><br>
                  <strong><p>Courriel : </strong><?= $evenement['inter_mail']?></a></p></p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
              <?php if (isset($code)){ ?>
              <input type="hidden" name="codepromo" value="<?= $codeid?>"> <?php } ?>
              <input type="hidden" name="catprix" value="<?= $categorie['cat_prix']?>">
              <input type="hidden" name="evenementid" value="<?= $evenement['ev_id']?>">
              <input type="hidden" name="internauteid" value="<?= $_SESSION['user']['inter_id']?>">
              <input type="submit" class="btn btn-primary" name="achat" value="Acheter" />
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>