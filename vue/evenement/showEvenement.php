<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <h2><?= ucfirst(lcfirst($evenement['ev_libelle'])); ?></h2>
      <h2>Séance du <?= $datetimEvenement->format('d / m / Y') ?> à <?= $datetimEvenement->format('H:i') ?></h2>
      <p>
        Vous allez être Centrifugé ?
        Vous devez rencontrer l’animateur de la séance pour vous assurez que vous en tirerez un réel bénéfice.
        Cette rencontre est obligatoire.
      </p>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
      <div class="well">
        <h2>Lieu</h2>
        <hr>
        <address>
          <strong>Salle: <?= $evenement['lieu_nomSalle']?></strong><br>
          <?= $evenement['adr_num_rue']?> <?= $evenement['adr_rue']?><br>
          <?= $evenement['adr_ville']?>, <?= $evenement['adr_code_postal']?><br>
        </address>
      </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
      <div class="well">
        <h2>Organisateur</h2>
        <hr>
        <strong><?= $evenement['inter_nom']?> <?= $evenement['inter_prenom']?></strong><br>
        <p>Courriel : <?= $evenement['inter_mail']?></a></p>
        <p>Site web : <a href="www.centrifugeusedeprojets.org">www.centrifugeusedeprojets.org</a></p>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <div class="well">
        <h2>Categories</h2>
        <hr>
        <div class="row">
          <?php foreach ($categories as $categorie): ?>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
              <div class="well" style="background-color: #FFF;">
                <h3><?= ucfirst(lcfirst($categorie['cat_nom'])); ?></h3>
                <p><strong>Prix:</strong> <?= $categorie['cat_prix']?> €</p>
                <p><strong>Nombre de place restantes:</strong></p> 
                    <?php  
                          if(!empty($categorie['place']['nb_total']))
                          {
                          ?>        <p> <?= $categorie['place']['nb_place_restante'] ?> </p> 
                          <?php
                          }
                          else
                          {
                          ?>        <p> <?= $categorie['evcat_nb_place'] ?> </p>
                          <?php
                          }
                    ?>
              </div>
            </div>
          <?php endforeach ?>
        </div>
      </div>
    </div>
  </div>
  

  <?php if ($facture != false): ?>
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
        <p><a class="btn btn-primary btn-lg" href="index.php?route=listFacture" role="button">Deja inscrit</a></p>
      </div>
    </div>
  <?php elseif (isset($_SESSION['user']) && !empty($_SESSION['user']) && $_SESSION['user']['inter_stat_id'] > 0 && $_SESSION['user']['inter_stat_id'] < 4): ?>
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
        <p> <a class="btn btn-primary btn-lg" href="index.php?route=achatEvenement&id=<?= $evenement['ev_id']; ?>" role="button">  S'inscrire à l'évenement</a></p>
      </div>
    </div>


  <?php else: ?>
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
        <p><a class="btn btn-primary btn-lg" href="index.php?route=connexion" role="button">Se connecter pour s'inscrire</a></p>
      </div>
    </div>

  <?php endif ?>
</div>
