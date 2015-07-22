<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <h2><?= ucfirst(lcfirst($evenement['ev_libelle'])); ?></h2>
      <h2>Séance du <?= $datetimEvenement->format('d / m / Y') ?> à <?= $datetimEvenement->format('H:i') ?></h2>
      <p>
        Vous allez être Centrifugé ?
        Vous devez rencontrer l’animateur de la séance pour vous assurez que vous en tirerez un réel bénéfice.
        Cette rencontre est obligatoire.
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
              <label for="codepostal" class="col-sm-4 control-label">Code Postal* :</label>
              <div class="col-sm-8">
                  <input type="text" name="codepostal" id="codepostal" class="form-control" value="" required />
              </div>
          </div>
          <div class="form-group">
              <label for="telephone" class="col-sm-4 control-label">Telephone* :</label>
              <div class="col-sm-8">
                  <input type="text" name="telephone" id="telephone" class="form-control" value="" required />
              </div>
          </div>
          <div class="form-group">
              <label for="email" class="col-sm-4 control-label">Adresse email* :</label>
              <div class="col-sm-8">
                  <input type="text" name="email" id="email" class="form-control" value="" required />
              </div>
          </div>
          <div class="form-group">
              <label for="email" class="col-sm-4 control-label">Mot de passe :</label>
              <div class="col-sm-8">
                  <input type="text" name="mdp" id="mdp" class="form-control" value=""/>
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
        <h6><?= $participant['inter_nom']; ?> <?= $participant['inter_prenom']; ?> <div style="color:red;"><?= $participant['inter_mail']; ?></div></h6>
        
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
