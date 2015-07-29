<div class="container">
<div class="table-responsive"> 
 <table class="table table-bordered table-striped">
  <tr>
   <th>Date de l'évenement</th>
   <th>Evenement</th>
   <th>Catégorie</th>
   <th>Prix</th>
   <th>Date d'achat</th>
   <!-- <th>Code</th> -->
   <th>Telecharger pdf</th>
  </tr>
   
    <?php foreach ($factures as $facture): ?>
   
    <?php $datetimfacture = new DateTime($facture['ev_date']); ?>
   <tr>
    <td><?= $datetimfacture->format('d / m / Y') ?> à <?= $datetimfacture->format('H:i') ?></td>
    <td><a href="index.php?route=showEvenement&id=<?= $facture['ev_id']; ?>"><?= $facture['ev_libelle']; ?></a></td>
    <td><?= $facture['cat_nom']; ?></td>
    
    <td><?= $facture['cat_prix']; ?>
    </td> 
    <?php $datetimfacture = new DateTime($facture['fac_datcre']); ?>
   
    <td><?= $datetimfacture->format('d / m / Y') ?> à <?= $datetimfacture->format('H:i') ?></td>
    <!-- <td><?= $facture['code_nom']; ?></td> -->
    <td><center>
      <a href="index.php?route=pdfFacture&id=<?= $facture['ev_id']; ?>" type="button" class="btn btn-primary">
     <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>
      </a></center>
    </td>
   </tr>
      
  <?php endforeach ?>
 </table>
 </div> 
</div>