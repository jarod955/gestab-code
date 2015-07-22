<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="well">
                <form class="form-horizontal" action="index.php?route=newEvenement" method="post">
                    <!-- Une petite astuce, si tu veux qu'un utilisateur remplisse obligatoirement un champ, indique le mot clé "required" dans le champ, ainsi pas besoin de pitite * pour lui dire attention c'est obligatoire 

                    ici on va vérifier si une variable post nom existe et si oui on met sa valeur. En réalité quand ton utilisateur va ajouter un event avec le + ou - tout va se réinitialiser et c'est assez pénible, non ?
                    -->
                    <fieldset>
                        <legend>Evenement</legend>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Nom evenement :</label>
                            <div class="col-sm-5">
                                <input type="text" name="nom" id="name" class="form-control" value="Seance du"/>
                            </div>
                        </div>
                    </fieldset>
                    <!-- Ici tu demande à l'utilisateur d'entrer une date, en allant voir le cours que je t'ai donné tu pourrais remarquer qu'il existe des moyens plus simple comme la balise que je vais te mettre ci-dessous -->
                    <fieldset>
                        <legend>Date</legend>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                    <label for="nb_rue" class="col-sm-2 control-label">Jour</label>
                                    
                                        <select name="jour" id="jour" class="form-control">
                                        <?php for ($jour = 01 ; $jour <= 31 ; $jour++): ?>
                                        <option><?= $jour ?></option>
                                        <?php endfor ?>
                                        </select>
                                    
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                    <label for="nb_rue" class="col-sm-2 control-label">Mois</label>
                                    
                                        <select name="mois" id="mois" class="form-control">
                                        <?php for ($mois = 01 ; $mois <= 12 ; $mois++): ?>
                                        <option><?= $mois ?></option>
                                        <?php endfor ?>
                                        </select>
                                    
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                    <label for="nb_rue" class="col-sm-2 control-label">Annee</label>
                                    
                                        <select name="annee" id="annee" class="form-control">
                                        <?php for ($annee = 2015 ; $annee <= 2050 ; $annee++): ?>
                                        <option><?= $annee ?></option>
                                        <?php endfor ?>
                                        </select>
                                    

                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <label for="nb_rue" class="col-sm-2 control-label">Heure</label>
                                    
                                        <select name="heure" id="heure" class="form-control">
                                        <?php for ($heure = 00 ; $heure <= 23 ; $heure++): ?>
                                        <option><?= $heure ?></option>
                                        <?php endfor ?>
                                    </select>
                                    
                                    
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <label for="Rue" class="col-sm-2 control-label">Minute</label>
                                    
                                        <select name="minute" id="minute" class="form-control">
                                        <?php for ($minute = 00 ; $minute <= 59 ; $minute++): ?>
                                        <option><?= $minute ?></option>
                                        <?php endfor ?>
                                        </select></br>
                                
                        </div></br>
                    </fieldset>
                    <!-- Très important d'indiquer à ton utilisateur à quoi servent tes deux boutons  -->
                    <fieldset>
                        <legend>Adresse</legend>
                        <div class="form-group">
                            <label for="nb_rue" class="col-sm-2 control-label">Numero Rue :</label>
                            <div class="col-sm-2">
                                <input type="number" name="numerorue" id="nb_rue" class="form-control" value="<?php if (isset($_SESSION['numerorue'])) echo $_SESSION['numerorue']; unset($_SESSION['numerorue']); ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Rue" class="col-sm-2 control-label">Rue :</label>
                            <div class="col-sm-5">
                                <input type="text" name="rue" id="Rue" class="form-control" value="<?php if (isset($_SESSION['rue'])) echo $_SESSION['rue']; unset($_SESSION['rue']); ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cod" class="col-sm-2 control-label">Code Postal :</label>
                            <div class="col-sm-2">
                                <input type="text" name="codepostal" id="cod" class="form-control" value="<?php if (isset($_SESSION['codepostal'])) echo $_SESSION['codepostal']; unset($_SESSION['codepostal']); ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ville" class="col-sm-2 control-label">Ville :</label>
                            <div class="col-sm-5">
                                <input type="text" name="ville" id="ville" class="form-control" value="<?php if (isset($_SESSION['ville'])) echo $_SESSION['ville']; unset($_SESSION['ville']); ?>" />

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="salle" class="col-sm-2 control-label">Nom de la salle :</label>
                            <div class="col-sm-5">
                                <input type="text" name="salle" id="salle" class="form-control" value="<?php if (isset($_SESSION['salle'])) echo $_SESSION['salle']; unset($_SESSION['salle']); ?>" />

                            </div>
                        </div>
                    </fieldset>


                    <fieldset>
                        <legend>Catégories</legend>
                        <div class="form-group">
                            <label for="cat" class="col-sm-2 control-label">Ajouter / Supprimer des catégories :</label>
                            <div class="col-sm-10">
                                <input class="btn btn-default btn-xs" type="submit" name="inc" value="+" />
                                <input class="btn btn-default btn-xs" type="submit" name="dec" value="-" />
                            </div>
                        </div>
                    </fieldset>
                    <!-- La balise fieldset permet de faire un joli cadre c'est mieux pour encadrer tes champs de remplissage de catégories, ça va aider l'utilisateur à se repérer -->
                    <fieldset>
                        
                        <?php
                        // Boucle allant de 0 à ta variable de session où chaque tour de boucle incrémentera une variable $i de 1.
                        for ($i=0; $i < $_SESSION['ajout']; $i++) { ?>
                            <!-- Ici l'attribut name de tes inputs va varier en fonction de la valeu de la variable $i
                                EX: Pour ton input de nom de catégorie son attribut name vaudra nom_categorie1 et au prochain tour de boucle vaudra nom_categorie2 puis nom_categorie3...
                            -->
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <legend>Catégorie n°<?php echo $i+1; ?></legend>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">Nom de la categorie</div>
                                    <div class="panel-body">
                                    <input type="text" name="cat[<?= $i; ?>][nom_categorie]" class="form-control"/>
                                    </div>
                                                    
                            </div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">Prix</div>
                                    <div class="panel-body"><div class="col-sm-4"><input type="text" name="cat[<?= $i; ?>][prix]"  class="form-control"/>
                            </div></div>
                                                    
                            </div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">Nombre de place</div>
                                    <div class="panel-body"><div class="col-sm-4"><input type="text" name="cat[<?= $i; ?>][nombre_places]" class="form-control"/>
                            </div></div>
                                                    
                            </div>
                            </div>
                            
                        <?php } ?>
                    </fieldset>
                    <hr>
                    <form class="form-horizontal" action="index.php?route=newEvenement" method="post">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <fieldset>
                        <legend>Code Promo</legend>
                        <div class="form-group">
                            <label for="cat" class="col-sm-2 control-label">Ajouter / Supprimer des codes promo :</label>
                            <div class="col-sm-10">
                                <input class="btn btn-default btn-xs" type="submit" name="incr" value="+" />
                                <input class="btn btn-default btn-xs" type="submit" name="decr" value="-" />
                            </div>
                        </div>
                    </fieldset>
                    <!-- La balise fieldset permet de faire un joli cadre c'est mieux pour encadrer tes champs de remplissage de catégories, ça va aider l'utilisateur à se repérer -->
                    <fieldset>
                        
                        <?php
                        // Boucle allant de 0 à ta variable de session où chaque tour de boucle incrémentera une variable $i de 1.
                        for ($i=0; $i < $_SESSION['ajoute']; $i++) { ?>
                            <!-- Ici l'attribut name de tes inputs va varier en fonction de la valeu de la variable $i
                                EX: Pour ton input de nom de catégorie son attribut name vaudra nom_categorie1 et au prochain tour de boucle vaudra nom_categorie2 puis nom_categorie3...
                            -->
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <legend>Code n°<?php echo $i+1; ?></legend>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">Nom du code promo</div>
                                    <div class="panel-body">
                                    <input type="text" name="code[<?= $i; ?>][nom_code]" class="form-control"/>
                                    </div>
                                                    
                            </div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">% reduction</div>
                                    <div class="panel-body"><div class="col-sm-4"><input type="text" name="code[<?= $i; ?>][reduc]"  class="form-control"/>
                            </div></div>
                                                    
                            </div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">Nombre disponible</div>
                                    <div class="panel-body"><div class="col-sm-4"><input type="text" name="code[<?= $i; ?>][place]" class="form-control"/>
                            </div></div>
                                                    
                            </div>
                            </div>
                            
                        <?php } ?>
                    </fieldset>
            </div>
        </div>
                    <div class="text-center">
                        <input type="submit" class="btn btn-primary" name="send" value="Valider" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
