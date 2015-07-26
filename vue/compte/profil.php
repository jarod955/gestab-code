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
                  <input type="password" name="mdp" id="mdp" class="form-control" value=""/>
              </div>
          </div>
          <div class="form-group">
              <label for="email" class="col-sm-4 control-label">Retappez votre mot de passe :</label>
              <div class="col-sm-8">
                  <input type="password" name="mdp2" id="mdp" class="form-control" value=""/>
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
          <script type="text/javascript">
// Méthode pour changer la visiblité d'une balise dont l'ID est passée en paramètre
function toggleVisibility(tagId) {
if (!document.getElementById) {
msg = 'Votre navigateur est trop ancien pour profiter de votre visite\n';
msg += 'Veuillez le mettre à jour ou vous en procurer un autre';
return false;
}
var tagToToggle;
try { // On tente de récupérer la balise cible dont on doit changer la visibilité
tagToToggle = document.getElementById(tagId);
} catch (e) { // Si échec de la récupération de la balise cible
alert('Je n\'ai pas pu trouver la balise cible');
}
try { // Seulement pour les non IE
if (tagToToggle.style.display == 'none') {
tagToToggle.style.display = 'inline';
} else {
tagToToggle.style.display = 'none';
}
} catch (e) {
}
// Pour IE
if (tagToToggle.style.visibility == 'hidden') {
tagToToggle.style.visibility = 'visible';
} else {
tagToToggle.style.visibility = 'hidden';
}
}
</script>
</head>
<body>
<div>
<a href="javascript:toggleVisibility('texte1')">
Changer la visibilité du texte 1
</a>
</div>
<div id="texte1" style="visibility: hidden; display: none;">
Texte test, Texte test, Texte test, Texte test, Texte test, Texte test, Texte test, Texte test, Texte test,
Texte test, Texte test, Texte test, Texte test, Texte test, Texte test, Texte test, Texte test, Texte test,
Texte test, Texte test, Texte test, Texte test, Texte test, Texte test, Texte test, Texte test, Texte test,
Texte test, Texte test, Texte test, Texte test, Texte test, Texte test, Texte test, Texte test, Texte test,
</div>
<div>
<a href="javascript:toggleVisibility('texte2')">
Changer la visibilité du texte 2
</a>
</div>
<div id="texte2" style="visibility: hidden; display: none;">
Texte test, Texte test, Texte test, Texte test, Texte test, Texte test, Texte test, Texte test, Texte test,
Texte test, Texte test, Texte test, Texte test, Texte test, Texte test, Texte test, Texte test, Texte test,
Texte test, Texte test, Texte test, Texte test, Texte test, Texte test, Texte test, Texte test, Texte test,
Texte test, Texte test, Texte test, Texte test, Texte test, Texte test, Texte test, Texte test, Texte test,
</div>
<div>
<a href="javascript:toggleVisibility('texte3')">
Changer la visibilité du texte 3
</a>
</div>
<div id="texte3" style="visibility: hidden; display: none;">
Texte test, Texte test, Texte test, Texte test, Texte test, Texte test, Texte test, Texte test, Texte test,
Texte test, Texte test, Texte test, Texte test, Texte test, Texte test, Texte test, Texte test, Texte test,
Texte test, Texte test, Texte test, Texte test, Texte test, Texte test, Texte test, Texte test, Texte test,
Texte test, Texte test, Texte test, Texte test, Texte test, Texte test, Texte test, Texte test, Texte test,
</div>
          <input type="submit" class="btn btn-primary" name="supprimer" value="Supprimer le compte" />
        </div>
      </div>
    </div>
  </div>
</form>