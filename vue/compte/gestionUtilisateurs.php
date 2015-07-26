

<div class="container">
 <table class="table table-bordered table-striped">
  <tr>
   <th>Nom</th>
   <th>Prenom</th>
   <th>Email</th>
   <th>Date de creation</th>
   <th>Supprimer le compte</th>
   <th>Reinitialiser Motdepasse</th>
  </tr>
    <?php foreach ($internautes as $internaute): ?>
      <?php if($internaute['inter_datsup'] == null){ ?>
   <tr>
    <td><?= $internaute['inter_nom']; ?></td>
    <td><?= $internaute['inter_prenom']; ?></td>
    <td><?= $internaute['inter_mail']; ?></td>
   


    <?php $datetiminternaute = new DateTime($internaute['inter_datcre']); ?>
   
    <td><?= $datetiminternaute->format('d / m / Y') ?> à <?= $datetiminternaute->format('H:i') ?></td>
     <td><center><a href="index.php?route=supprCompte&idinter=<?= $internaute['inter_id']; ?>" type="button" class="btn btn-primary">
     <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
      </a></center>
    </td>

     <td><center><a href="index.php?route=reiniCompte&idinter=<?= $internaute['inter_id']; ?>" type="button" class="btn btn-primary">
     <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
      </a></center>
    </td>
     <?php
     } ?>
   </tr>
  <?php endforeach ?>
 </table>
</div>