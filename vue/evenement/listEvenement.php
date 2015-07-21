<style>
  .grid-item {   margin-bottom: 10px; }
</style>

<div class="container">
  <div class="grid">
  <?php foreach ($evenements as $evenement): ?>
    <?php $datetimEvenement = new DateTime($evenement['ev_date']); ?>
    <div class="col-md-12 grid-item">
      <div class="well">
          <h2><?= ucfirst(lcfirst($evenement['ev_libelle'])); ?></h2>
          <p>Séance du <?= $datetimEvenement->format('d / m / Y') ?> à <?= $datetimEvenement->format('H:i') ?><p>
          <p>Salle <?= $evenement['lieu_nomSalle']; ?></p>
          <a href="index.php?route=showEvenement&id=<?= $evenement['ev_id']; ?>" role="button">
            En savoir plus!
          </a>
      </div>
    </div>
    <?php endforeach ?>
  </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function(event) { 
  var elem = document.querySelector('.grid');
  var msnry = new Masonry( elem, {
    // options
    itemSelector: '.grid-item',
    // columnWidth: 200
  });
});
</script>