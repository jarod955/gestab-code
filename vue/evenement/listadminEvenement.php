

<div class="container">
  <div class="grid">
  <?php foreach ($evenements as $evenement): ?>
<?php
if($evenement['ev_datsup'] == null)
{ ?>
    <?php $datetimEvenement = new DateTime($evenement['ev_date']); ?>
    <div class="col-md-4 grid-item">
      <div class="well">
          <h2><?= ucfirst(lcfirst($evenement['ev_libelle'])); ?> <?= $datetimEvenement->format('d / m / Y') ?> à <?= $datetimEvenement->format('H:i') ?></h2>
          <p>Salle <?= $evenement['lieu_nomSalle']; ?></p>
          <a href="index.php?route=modifierEvenement&id=<?= $evenement['ev_id']; ?>" role="button">
            Modifier!
          </a>
      </div>
    </div>
<?php 
}
else
{
  
} ?>
    <?php endforeach ?>
  </div>
</div>
