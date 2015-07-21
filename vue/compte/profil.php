<form class="form-horizontal" action="index.php?route=profil" method="post">
  <div class="container">
    <div class="row">
      <div class="col-xs-6 col-md-6 col-sm-6 col-lg-6">
        <div class="well">
          <h2>Profil</h2>
          <hr>
          <div class="form-group">
              <label for="nom" class="col-sm-4 control-label">Nom* :</label>
              <div class="col-sm-8">
                  <input type="text" name="nom" id="nom" class="form-control" value="<?= $nom ?>" required />
              </div>
          </div>
          <div class="form-group">
              <label for="prenom" class="col-sm-4 control-label">Prenom* :</label>
              <div class="col-sm-8">
                  <input type="text" name="prenom" id="prenom" class="form-control" value="<?= $prenom ?>" required />
              </div>
          </div>
          <div class="form-group">
              <label for="rue" class="col-sm-4 control-label">Numero de rue* :</label>
              <div class="col-sm-8">
                  <input type="text" name="numrue" id="numrue" class="form-control" value="<?= $numrue ?>" required />
              </div>
          </div>
          <div class="form-group">
              <label for="rue" class="col-sm-4 control-label">Rue* :</label>
              <div class="col-sm-8">
                  <input type="text" name="rue" id="rue" class="form-control" value="<?= $rue ?>" required />
              </div>
          </div>
          <div class="form-group">
              <label for="ville" class="col-sm-4 control-label">Ville* :</label>
              <div class="col-sm-8">
                  <input type="text" name="ville" id="ville" class="form-control" value="<?= $ville ?>" required />
              </div>
          </div>
          <div class="form-group">
              <label for="codepostal" class="col-sm-4 control-label">Code Postal* :</label>
              <div class="col-sm-8">
                  <input type="text" name="codepostal" id="codepostal" class="form-control" value="<?= $codepostal ?>" required />
              </div>
          </div>
          <div class="form-group">
              <label for="telephone" class="col-sm-4 control-label">Telephone* :</label>
              <div class="col-sm-8">
                  <input type="text" name="telephone" id="telephone" class="form-control" value="<?= $telephone ?>" required />
              </div>
          </div>
          <div class="form-group">
              <label for="email" class="col-sm-4 control-label">Adresse email* :</label>
              <div class="col-sm-8">
                  <input type="text" name="email" id="email" class="form-control" value="<?= $email ?>" required />
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
      <?php if ($_SESSION['user']['entite'] != false): ?>
        <div class="col-xs-6 col-md-6 col-sm-6 col-lg-6">
          <div class="well">
            <h2>Entité</h2>
            <hr>
            <div class="form-group">
                <label for="entite" class="col-sm-4 control-label">Entité partenaire* :</label>
                <div class="col-sm-8">
                    <input type="text" name="entite" id="entite" class="form-control" value="<?= $entite ?>" required />
                </div>
            </div>
            <div class="form-group">
                <label for="entiteRue" class="col-sm-4 control-label">Rue* :</label>
                <div class="col-sm-8">
                    <input type="text" name="entiteRue" id="entiteRue" class="form-control" value="<?= $entiteRue ?>" required />
                </div>
            </div>
            <div class="form-group">
                <label for="entiteVille" class="col-sm-4 control-label">Ville* :</label>
                <div class="col-sm-8">
                    <input type="text" name="entiteVille" id="entiteVille" class="form-control" value="<?= $entiteVille ?>" required />
                </div>
            </div>
            <div class="form-group">
                <label for="entiteCp" class="col-sm-4 control-label">Code Postal* :</label>
                <div class="col-sm-8">
                    <input type="text" name="entiteCp" id="entiteCp" class="form-control" value="<?= $entiteCp ?>" required />
                </div>
            </div>
          </div>
        </div>
      <?php endif ?>
    </div>
    <div class="row">
      <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12">
        <div class="text-center">
          <input type="submit" class="btn btn-primary" name="modifier" value="Modifier" />
          <input type="submit" class="btn btn-primary" name="supprimer" value="Supprimer le compte" />
        </div>
      </div>
    </div>
  </div>
</form>