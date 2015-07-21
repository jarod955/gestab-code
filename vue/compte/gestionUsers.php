<div class="container">
 <table class="table table-bordered table-striped">
  <tr>
   <th>Nom</th>
   <th>Prenom</th>
   <th>Email</th>
   <th>Entité</th>
   <th>Date d'achat</th>
   <th>Supprimer le compte</th>
  </tr>
    <?php foreach ($factures as $facture): ?>
    <?php $datetimfacture = new DateTime($facture['ev_date']); ?>
   <tr>
    <td><?= $datetimfacture->format('d / m / Y') ?> à <?= $datetimfacture->format('H:i') ?></td>
    <td><a href="index.php?route=showEvenement&id=<?= $facture['ev_id']; ?>"><?= $facture['ev_libelle']; ?></a></td>
    <td><?= $facture['cat_prix']; ?> €</td>
    <?php $datetimfacture = new DateTime($facture['fac_datcre']); ?>
   
    <td><?= $datetimfacture->format('d / m / Y') ?> à <?= $datetimfacture->format('H:i') ?></td>
    <!-- <td><?= $facture['code_nom']; ?></td> -->
    <td>
      <a href="index.php?route=pdfFacture&id=<?= $facture['ev_id']; ?>" type="button" class="btn btn-primary">
     <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
      </a>
    </td>
   </tr>
  <?php endforeach ?>
 </table>
</div>