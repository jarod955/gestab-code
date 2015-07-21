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
                            <div class="col-sm-10">
                                <input type="text" name="nom" id="name" class="form-control" value="Seance du"/>
                            </div>
                        </div>
                    </fieldset>
                    <!-- Ici tu demande à l'utilisateur d'entrer une date, en allant voir le cours que je t'ai donné tu pourrais remarquer qu'il existe des moyens plus simple comme la balise que je vais te mettre ci-dessous -->
                    <fieldset>
                        <legend>Date</legend>
                        <label>Date de l'evenement :</label>
                        <input type="date" name ="date_event" value="<?php if (isset($_SESSION['date_event'])) echo $_SESSION['date_event']; unset($_SESSION['date_event']); ?>" />
                        <input type="time" name ="heure_event" value="<?php if (isset($_SESSION['heure_event'])) echo $_SESSION['heure_event']; unset($_SESSION['heure_event']); ?>" />
                    </fieldset>
                    <!-- Très important d'indiquer à ton utilisateur à quoi servent tes deux boutons  -->
                    <fieldset>
                        <legend>Adresse</legend>
                        <div class="form-group">
                            <label for="nb_rue" class="col-sm-2 control-label">Numero Rue :</label>
                            <div class="col-sm-10">
                                <input type="number" name="numerorue" id="nb_rue" class="form-control" value="<?php if (isset($_SESSION['numerorue'])) echo $_SESSION['numerorue']; unset($_SESSION['numerorue']); ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Rue" class="col-sm-2 control-label">Rue :</label>
                            <div class="col-sm-10">
                                <input type="text" name="rue" id="Rue" class="form-control" value="<?php if (isset($_SESSION['rue'])) echo $_SESSION['rue']; unset($_SESSION['rue']); ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cod" class="col-sm-2 control-label">Code Postal :</label>
                            <div class="col-sm-10">
                                <input type="text" name="codepostal" id="cod" class="form-control" value="<?php if (isset($_SESSION['codepostal'])) echo $_SESSION['codepostal']; unset($_SESSION['codepostal']); ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ville" class="col-sm-2 control-label">Ville :</label>
                            <div class="col-sm-10">
                                <input type="text" name="ville" id="ville" class="form-control" value="<?php if (isset($_SESSION['ville'])) echo $_SESSION['ville']; unset($_SESSION['ville']); ?>" />

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="salle" class="col-sm-2 control-label">Nom de la salle :</label>
                            <div class="col-sm-10">
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
                        <legend>Remplir vos catégories</legend>
                        <?php
                        // Boucle allant de 0 à ta variable de session où chaque tour de boucle incrémentera une variable $i de 1.
                        for ($i=0; $i < $_SESSION['ajout']; $i++) { ?>
                            <!-- Ici l'attribut name de tes inputs va varier en fonction de la valeu de la variable $i
                                EX: Pour ton input de nom de catégorie son attribut name vaudra nom_categorie1 et au prochain tour de boucle vaudra nom_categorie2 puis nom_categorie3...
                            -->
                            <label>Catégorie n°<?php echo $i+1; ?></label>
                            <label>Nom categorie :</label><input type="text" name="cat[<?= $i; ?>][nom_categorie]"/>
                            <label>Prix :</label><input type="text" name="cat[<?= $i; ?>][prix]"  />
                            <label>Places :</label><input type="text" name="cat[<?= $i; ?>][nombre_places]" />
                            </br>
                        <?php } ?>
                    </fieldset>
                    <hr>
                    <form class="form-horizontal" action="index.php?route=newEvenement" method="post">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  
                     <legend>Creation code promo</legend>
                    <hr>
                    <div class="row">   
                        
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">Votre nom de code</div>
                                    <div class="panel-body">
                                        
                                            <input type="text" class="form-control" id="code" name="code">
                                        
                                    </div>
                                                    
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">% reduction (exemple 50 = 50%)</div>
                                    <div class="panel-body">
                                        
                                            <input type="text" class="form-control" id="reduc" name="reduc">
                                        
                                    </div>
                                                    
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">Nombre de code</div>
                                    <div class="panel-body">
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="place" name="place">
                                        </div>
                                    </div>
                                                    
                            </div>
                        </div>
                    
                </div>
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
