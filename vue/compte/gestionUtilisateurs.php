

<div class="container">
 <table class="table table-bordered table-striped">
  <tr>
   <th>Nom</th>
   <th>Prenom</th>
   <th>Email</th>
   <th>Date de creation</th>
   <th>Supprimer le compte</th>
  </tr>
    <?php foreach ($internautes as $internaute): ?>
   <tr>
    <td><?= $internaute['inter_nom']; ?></td>
    <td><?= $internaute['inter_prenom']; ?></td>
    <td><?= $internaute['inter_mail']; ?></td>
   


    <?php $datetiminternaute = new DateTime($internaute['inter_datcre']); ?>
   
    <td><?= $datetiminternaute->format('d / m / Y') ?> à <?= $datetiminternaute->format('H:i') ?></td>
     <td><a href="index.php?route=suprCode&idcode=<?= $internaute['inter_id']; ?>" type="button" class="btn btn-primary">
     <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
      </a>
    </td>
   </tr>
  <?php endforeach ?>
 </table>
</div>