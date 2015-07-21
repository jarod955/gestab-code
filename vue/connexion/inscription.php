<div class="container"> 
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <center><h2>Merci de remplir les champs</h2></center></br>
        </div>
    </div>

    <form action="index.php?route=inscription" method="post"  class="form-horizontal">
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="well">
                    <h3>Informations personnelles <h6>(obligatoire)</h6></h3>
                    <div class="form-group">
                        <label for="nom"  class="col-sm-4 control-label">Nom*:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="nom" name="nom">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="prenom"  class="col-sm-4 control-label">Prenom*:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="prenom" name="prenom">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="telephone"  class="col-sm-4 control-label">Telephone*:</label>
                        <div class="col-sm-4">
                            <input type="tel" class="form-control" id="telephone" name="telephone">
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="well">
                    <h3>Adresse <h6>(obligatoire)</h6></h3>    
                    <div class="form-group">
                        <label for="numrue"  class="col-sm-4 control-label">Numero de rue*:</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="numrue" name="numrue">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rue"  class="col-sm-4 control-label">Rue*:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="rue" name="rue">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ville"  class="col-sm-4 control-label">Ville*:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="ville" name="ville">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="codepostal"  class="col-sm-4 control-label">Code Postal*:</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="codepostal" name="codepostal">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="well">
                    <h3>Entité partenaire</h3>
                    <div class="form-group">
                        <label for="entite" class="col-sm-4 control-label">Nom:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="entite" name="entite"><!-- A modifier: voir comment intégrer Entité|Société (boutton radio) -->
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="numrue"  class="col-sm-4 control-label">Numero de rue*:</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="numrue" name="numrueentite">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rue"  class="col-sm-4 control-label">Rue*:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="rue" name="rueentite">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ville"  class="col-sm-4 control-label">Ville*:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="ville" name="villeentite">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="codepostal"  class="col-sm-4 control-label">Code Postal*:</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="codepostal" name="codepostalentite">
                        </div>
                    </div>
                </div>
            </div>
        </div>
  
            
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="well">
                    <h3>Identifiant de connexion <h6>(obligatoire)</h6></h3>
                    <div class="form-group">
                        <label for="email" class="col-sm-4 control-label">Adresse email*:</label>
                        <div class="col-sm-4">
                            <input type="mail" class="form-control" id="email" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="retapez" class="col-sm-4 control-label">Retapez votre email*:</label>
                        <div class="col-sm-4">
                            <input type="mail" class="form-control" id="retapez" name="email2">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mdp" class="col-sm-4 control-label">Mot de passe*:</label>
                        <div class="col-sm-4">
                            <input type="password" class="form-control" id="mdp" name="motdepasse">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rmdp" class="col-sm-4 control-label">Retapez votre mot de passe*:</label>
                        <div class="col-sm-4">
                            <input type="password" class="form-control" id="rmdp" name="motdepasse2">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <input type="submit" class="btn btn-primary" name="envoyer" value="Valider" />
            </div>
        </div>
    </form>
</div>