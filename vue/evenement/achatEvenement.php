<div class="container">

  <div class="well">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h3>Recapitulatif de l'inscription</h3></br>
      </div>
    </div>
    <div class="row">
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
                    Nouveau prix : <?= $categorie['cat_prix'] - $test ?>
                  <?php else: ?>
                    <?= $categorie['cat_prix'] ?>
                  <?php endif ?>
                </div>
              </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
              <div class="panel panel-default">
                <div class="panel-heading">Prendre une place</div>
                <div class="panel-body">
                  <form class="form-horizontal" action="index.php?route=achatCodePromo" method="post">
                    <input type="hidden" name="categorieid" value="<?= $categorie['cat_id']?>">
                    <input type="hidden" name="evenementid" value="<?= $evenement['ev_id']?>">
                    <input type="submit" class="btn btn-primary" value="Acheter" />
                  </form>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      </div>

    </div>
</div>