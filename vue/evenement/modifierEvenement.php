<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <h2><?= ucfirst(lcfirst($evenement['ev_libelle'])); ?></h2>
      <h2>Séance du <?= $datetimEvenement->format('d / m / Y') ?> à <?= $datetimEvenement->format('H:i') ?></h2>

      <p>
        Afin de modifier l'évenement, il vous suffit de remplacer les champs souhaités par les nouveaux et de cliquer sur le bouton modifier.
      </p>
    </div>
  </div>
  <div class="row">
    
    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
      <div class="well">
        <h2>Résumé de l'évenement</h2>
        <hr>
        <div class="row">
          
          <div class="form-group">
              <label for="nom" class="col-sm-4 control-label">Salle: </label>
              <div class="col-sm-8">
                  <input type="text" name="nom" id="nom" class="form-control" value="<?= $evenement['lieu_nomSalle']?>" required />
              </div>
          </div>
          <div class="form-group">
              <label for="prenom" class="col-sm-4 control-label">Numero rue:</label>
              <div class="col-sm-8">
                  <input type="text" name="prenom" id="prenom" class="form-control" value="<?= $evenement['adr_num_rue']?>" required />
              </div>
          </div>
          <div class="form-group">
              <label for="rue" class="col-sm-4 control-label">Rue :</label>
              <div class="col-sm-8">
                  <input type="text" name="numrue" id="numrue" class="form-control" value="<?= $evenement['adr_rue']?>" required />
              </div>
          </div>
          <div class="form-group">
              <label for="rue" class="col-sm-4 control-label">Ville :</label>
              <div class="col-sm-8">
                  <input type="text" name="rue" id="rue" class="form-control" value="<?= $evenement['adr_ville']?>" required />
              </div>
          </div>
          <div class="form-group">
              <label for="ville" class="col-sm-4 control-label">Code Postal:</label>
              <div class="col-sm-8">
                  <input type="text" name="ville" id="ville" class="form-control" value="<?= $evenement['adr_code_postal']?>" required />
              </div>
          </div>
          <div class="form-group">
              <label for="codepostal" class="col-sm-4 control-label">Jour :</label>
              <div class="col-sm-8">
                  <select name="jour" id="jour" class="form-control">
                                        <?php for ($jour = 01 ; $jour <= 31 ; $jour++): ?>
                                        <option><?= $day ?></option>
                                        <?php endfor ?>
                                        </select>
              </div>
          </div>
          <div class="form-group">
              <label for="telephone" class="col-sm-4 control-label">Mois :</label>
              <div class="col-sm-8">
                  <select name="mois" id="mois" class="form-control">
                                        <?php for ($mois = 01 ; $mois <= 12 ; $mois++): ?>
                                        <option><?= $month ?></option>
                                        <?php endfor ?>
                                        </select>
              </div>
          </div>
          <div class="form-group">
              <label for="email" class="col-sm-4 control-label">Annee :</label>
              <div class="col-sm-8">
                  <select name="annee" id="annee" class="form-control">
                                        <?php for ($annee = 2015 ; $annee <= 2050 ; $annee++): ?>
                                        <option><?= $year ?></option>
                                        <?php endfor ?>
                                        </select>
              </div>
          </div>
          <div class="form-group">
              <label for="email" class="col-sm-4 control-label">Heure :</label>
              <div class="col-sm-8">
                  <select name="heure" id="heure" class="form-control">
                                        <?php for ($heure = 00 ; $heure <= 23 ; $heure++): ?>
                                        <option><?= $hour ?></option>
                                        <?php endfor ?>
                                    </select>
              </div>
          </div>
          <div class="form-group">
              <label for="email" class="col-sm-4 control-label">Minute :</label>
              <div class="col-sm-8">
                  <select name="minute" id="minute" class="form-control">
                                        <?php for ($minute = 00 ; $minute <= 59 ; $minute++): ?>
                                        <option><?= $minut ?></option>
                                        <?php endfor ?>
                                        </select></br>
              </div>
          </div>

        </div>

      </div>

    </div>
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
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
  

  <?php if (isset($_SESSION['user']) && !empty($_SESSION['user']) && $_SESSION['user']['inter_stat_id'] > 1 && $_SESSION['user']['inter_stat_id'] < 4): ?>
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
        <p><a class="btn btn-primary btn-lg" href="index.php?route=listFacture" role="button">Modifier</a></p>
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
