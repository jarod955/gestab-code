<div class="container">
  <div class="row">
    <div class="col-sm-offset-1 col-sm-9">
      <div class="well">
        <form action="index.php?route=connexion" method="post" class="form-horizontal">
          <div class="form-group">
            <label for="email" class="col-sm-3 control-label">Email : </label>
            <div class="col-sm-4">
              <input type="email" name="email" class="form-control" id="email" placeholder="Entrez votre email">
            </div>
          </div>
          <div class="form-group">
            <label for="mdp" class="col-sm-3 control-label">Mot de passe : </label>
            <div class="col-sm-4">
              <input type="password" name="motdepasse" class="form-control" id="mdp" placeholder="Entrez votre mot de passe">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
              <button type="submit" class="btn btn-default">Connexion</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-offset-1 col-sm-9">
      <div class="well">
        <form action="index.php?route=reinitialisationMdp" method="post" class="form-horizontal">
          <div class="form-group">
            <label for="mdp" class="col-sm-3 control-label">Mot de passe oublié ? </label>
            <div class="col-sm-4">
              <input type="email" name="email" class="form-control" id="mdp" placeholder="Entrez votre email">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
              <button type="submit" class="btn btn-default">Reinitialiser</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>