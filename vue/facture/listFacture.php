<div class="container">
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
    
    <?php 
    
    if(!empty($facture['fac_code_id']))
    {
              function listCode($bdd, $id_code)
              {
              $query = "SELECT code_id, code_taux_reduc
              FROM  codepromo, facture
              WHERE code_id = :fac_code_id";
              $sth   = $bdd->prepare($query);
              $sth->execute(array(
              ':fac_code_id' => $id_code
              ));

              return $sth->fetch(PDO::FETCH_ASSOC);
            }
              $test = listCode($bdd, $facture['fac_code_id']);
            
    ?><td><?= $facture['cat_prix'] - $reduction = $facture['cat_prix'] * $test['code_taux_reduc'] / 100; ?></td> <?php 
    }
    else{
    ?><td><?= $facture['cat_prix']; ?></td>  <?php 
    } 
    ?>
    
    <?php $datetimfacture = new DateTime($facture['fac_datcre']); ?>
   
    <td><?= $datetimfacture->format('d / m / Y') ?> à <?= $datetimfacture->format('H:i') ?></td>
    <!-- <td><?= $facture['code_nom']; ?></td> -->
    <td>
      <a href="index.php?route=pdfFacture&id=<?= $facture['ev_id']; ?>" type="button" class="btn btn-primary">
     <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>
      </a>
    </td>
   </tr>
      
  <?php endforeach ?>
 </table>
</div>
