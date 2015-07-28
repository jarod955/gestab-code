
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
     <td>
     
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Supprimer
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Suppression</h4>
      </div>
      <div class="modal-body">
        Etes vous certain de vouloir supprimer votre compte ? 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
        <a href="index.php?route=supprCompte&idinter=<?= $internaute['inter_id']; ?>" type="button" class="btn btn-primary"></a>
      </div>
    </div>
  </div>
</div>
</div></td>

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