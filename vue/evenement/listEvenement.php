<div class="container">
  <?php foreach ($evenements as $evenement): ?>
    <?php $datetimEvenement = new DateTime($evenement['ev_date']); ?>
    <div class="col-md-12">
      <div class="well">
          <h2>Séance du <?= $datetimEvenement->format('d / m / Y') ?> à <?= $datetimEvenement->format('H:i') ?></h2>
          <span class="label label-info">
          <?= $evenement['nb_cat']; ?>
          <?php if ($evenement['nb_cat'] == 1): ?>
            Catégorie
          <?php else: ?>
            Catégories
          <?php endif ?>
          </span>
          <?php if ($evenement['facture']): ?>
            <span class="label label-warning">Deja inscrit</span>
          <?php endif ?>
          <p>Salle <?= $evenement['lieu_nomSalle']; ?></p>
          <a href="index.php?route=showEvenement&id=<?= $evenement['ev_id']; ?>" role="button">
            En savoir plus!
          </a>
      </div>
    </div>
  <?php endforeach ?>
</div>