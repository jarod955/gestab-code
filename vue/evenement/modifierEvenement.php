<div class="container">
  <div class="row">
  <form class="form-horizontal" action="index.php?route=modifierEvenement&id=<?= $evenement['ev_id']; ?>" method="post">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <h2><?= ucfirst(lcfirst($evenement['ev_libelle'])); ?> <?= $datetimEvenement->format('d / m / Y') ?> à <?= $datetimEvenement->format('H:i') ?></h2>
      <p>
        Afin de modifier l'événement, il vous suffit de remplacer les champs souhaités par les nouveaux et de cliquer sur le bouton modifier.
      </p>
    </div>
  </div>
  <div class="row">
    
    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
      <div class="well">
        <h2>Résumé de l'événement</h2>
        <hr>
        <div class="row">

          <div class="form-group">
              <label for="nom" class="col-sm-4 control-label">Nom événement: </label>
              <div class="col-sm-8">
                  <input type="text" name="libelle" id="libelle" class="form-control" value="<?= $evenement['ev_libelle']?>" required />
              </div>
          </div>
          <div class="form-group">
              <label for="nom" class="col-sm-4 control-label">Salle: </label>
              <div class="col-sm-8">
                  <input type="text" name="nom_salle" id="nom" class="form-control" value="<?= $evenement['lieu_nomSalle']?>" required />
              </div>
          </div>
          <div class="form-group">
              <label for="prenom" class="col-sm-4 control-label">Numero rue:</label>
              <div class="col-sm-8">
                  <input type="text" name="adr_num_rue" id="num" class="form-control" value="<?= $evenement['adr_num_rue']?>" required />
              </div>
          </div>
          <div class="form-group">
              <label for="rue" class="col-sm-4 control-label">Rue :</label>
              <div class="col-sm-8">
                  <input type="text" name="adr_rue" id="adrrue" class="form-control" value="<?= $evenement['adr_rue']?>" required />
              </div>
          </div>
          <div class="form-group">
              <label for="rue" class="col-sm-4 control-label">Ville :</label>
              <div class="col-sm-8">
                  <input type="text" name="adr_ville" id="ville" class="form-control" value="<?= $evenement['adr_ville']?>" required />
              </div>
          </div>
          <div class="form-group">
              <label for="ville" class="col-sm-4 control-label">Code postal:</label>
              <div class="col-sm-8">
                  <input type="text" name="adr_code_postal" id="cp" class="form-control" value="<?= $evenement['adr_code_postal']?>" required />
              </div>
          </div>
          <div class="form-group">
              <label for="codepostal" class="col-sm-4 control-label">Jour :</label>
              <div class="col-sm-8">
                  <select name="jour" id="jour" class="form-control">
                                        <option selected="selected"><?= $day ?></option>
                                        <?php for ($jour = 01 ; $jour <= 31 ; $jour++): ?>
                                        <option><?= $jour ?></option>
                                        
                                        <?php endfor ?>
                                        
                                        </select>
              </div>
          </div>
          <div class="form-group">
              <label for="telephone" class="col-sm-4 control-label">Mois :</label>
              <div class="col-sm-8">
                  <select name="mois" id="mois" class="form-control">
                                        <option selected="selected"><?= $month ?></option>
                                        <?php for ($mois = 01 ; $mois <= 12 ; $mois++): ?>
                                        <option><?= $mois ?></option>
                                        <?php endfor ?>
                                        
                                        </select>
              </div>
          </div>
          <div class="form-group">
              <label for="email" class="col-sm-4 control-label">Année :</label>
              <div class="col-sm-8">
                  <select name="annee" id="annee" class="form-control">
                                        <option selected="selected"><?= $year ?></option>
                                        <?php for ($annee = 2015 ; $annee <= 2050 ; $annee++): ?>
                                        <option><?= $annee ?></option>
                                        <?php endfor ?>
                                        
                                        </select>
              </div>
          </div>
          <div class="form-group">
              <label for="email" class="col-sm-4 control-label">Heure :</label>
              <div class="col-sm-8">
                  <select name="heure" id="heure" class="form-control">
                                       <option selected="selected"><?= $hour ?></option>
                                        <?php for ($heure = 00 ; $heure <= 23 ; $heure++): ?>
                                        <option><?= $heure ?></option>
                                        <?php endfor ?>
                                        
                                    </select>
              </div>
          </div>
          <div class="form-group">
              <label for="email" class="col-sm-4 control-label">Minute :</label>
              <div class="col-sm-8">
                  <select name="minute" id="minute" class="form-control">
                                        <option selected="selected"><?= $minut ?></option>
                                        <?php for ($minute = 00 ; $minute <= 59 ; $minute++): ?>
                                        <option><?= $minute ?></option>
                                        <?php endfor ?>
                                        
                                        </select></br>
              </div>
          </div>

        </div>

      </div>

    </div>
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
      <div class="well">
        <h2>Participants</h2>
        <hr>
        <?php foreach ($participants as $participant): ?>
        <h6><?= $participant['inter_nom']; ?> <?= $participant['inter_prenom']; ?> <div style="color:blue;"><?= $participant['inter_mail']; ?></div></h6>
        
        </tr>
        <?php endforeach ?>
      </div>
    </div>
  </div>
  <input type="hidden" name="lieuid" value="<?= $evenement['lieu_id']?>">
  <input type="hidden" name="adrid" value="<?= $evenement['adr_id']?>">
  <input type="hidden" name="evid" value="<?= $evenement['ev_id']?>">

  <?php if (isset($_SESSION['user']) && !empty($_SESSION['user']) && $_SESSION['user']['inter_stat_id'] > 1 && $_SESSION['user']['inter_stat_id'] < 4): ?>
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
          Modifier
        </button>

        <!-- Modal -->
        
              
              
              <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modification</h4>
              </div>
              <div class="modal-body">
               
                <?php if(!empty($participant)){ ?>
                  Etes vous certain de vouloir modifier votre evenement ? Si des participants sont inscrits pensé a les avertir.
                
                  <h6><?= $participant['inter_nom']; ?> <?= $participant['inter_prenom']; ?> <div style="color:blue;"><?= $participant['inter_mail']; ?></div></h6>
                <?php }
                else
                { ?>
                  Etes vous certain de vouloir modifier l'evenement ?
                <?php } ?>
                
                  </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                <input type="submit" class="btn btn-primary" name="modifier" value="Valider" />
              </div>
            </div>
          </div>
        </div>
      
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModall">
          Supprimer
        </button>

        <!-- Modal -->
        
              
              
              <div class="modal fade" id="myModall" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Suppression</h4>
              </div>
              <div class="modal-body">
               
                <?php if(!empty($participant)){ ?>
                  Etes vous certain de vouloir supprimer votre événement ? Si des participants sont inscrits pensez à les avertir ainsi qu'a proceder au remboursement
                
                  <h6><?= $participant['inter_nom']; ?> <?= $participant['inter_prenom']; ?> <div style="color:blue;"><?= $participant['inter_mail']; ?></div></h6>
                <?php }
                else
                { ?>
                  Etes vous certain de vouloir supprimer votre événement ?
                <?php } ?>
                
                  </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                <input type="submit" class="btn btn-primary" name="supprimer" value="Valider" />
              </div>
            </div>
          </div>
        </div>
              
              
              
              
              
        </div>
    </div>
    

  <?php else: ?>
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
        <p><a class="btn btn-primary btn-lg" href="index.php?route=connexion" role="button">Etre admin pour modifier</a></p>
      </div>
    </div>

  <?php endif ?>
</div>
