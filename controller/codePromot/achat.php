<?php 
if (empty($_SESSION['user'])){
    header('location: error.php');
}
elseif ($_SESSION['user']['statut'] == 2 or 3) {
 // Mettre ici tout le corps de la page 
  include('model/categorie.php');

  //si les variables existe
  if (isset($_POST['categorieid']) && isset($_POST['evenementid']))
  {
    $categorieid = $_POST['categorieid'];
    $evenementid = $_POST['evenementid'];
    $Categorie   = getCategorie($bdd, $categorieid);
    $prix        = $Categorie['cat_prix'];
    //si le formulaire a ete envoyé
    if (isset($_POST['send']))
    {
      //si le formulaire comprend un code promot
      if ($_POST['send'] === "Valider")
      {
        
                      //si le code existe
        if (isset($_POST['code']))
        {
        $code = $_POST['code'];
                        //si le code promot ne'est pas vide
          if ($code !== "")
          {
                          //recuparation dans la bdd
                          $codepromovalide = getCodePromotByCode($bdd, $code, $evenementid);
                          
                          
                              function placesRestantesByCodePromo($bdd, $idcod, $idev)
                              {
                              $query = 'SELECT COUNT(fac_code_id) AS "code_pris",SUM(code_nb) - COUNT(fac_code_id) AS "code_restant", SUM(code_nb) AS "nb_total"
                              FROM facture, codepromo
                              WHERE fac_code_id = :faccodeid
                              AND code_id = :codeid
                              AND fac_ev_id = :facevid';
                              $sth   = $bdd->prepare($query);
                              $res   = $sth->execute(array(
                              'faccodeid'    => $idcod,
                              'codeid' => $idcod,
                              'facevid' => $idev,
                              ));

                              return $sth->fetch(PDO::FETCH_ASSOC);
                              }

                              $codePromoNb = placesRestantesByCodePromo($bdd, $codepromovalide['code_id'], $codepromovalide['code_ev_id']);
                             
                              if(empty($codePromoNb['code_pris'])) 
                              {
                                
                                    if ($codepromovalide !== null)
                                    {
                              

                            //verifi si il a ete supprimer
                                        if($codepromovalide['code_datsup'] == null)
                                        {
                                            $codepromoid = $codepromovalide['code_id'];
                                            $tauxreduc   = $codepromovalide['code_taux_reduc'];
                                            $somme       = $tauxreduc / 100;
                                        }
                                        else
                                        {
                                          error("Le code promo n'est plus valide");
                                        }
                                    }    
                                    else
                                    {
                                        error('Code promo incorrect');
                                    }
                              } 
                              elseif($codePromoNb['code_restant'] > 0)
                              {
                                    
                                        if ($codepromovalide !== null)
                                        {
                                          

                                        //verifi si il a ete supprimer
                                            if($codepromovalide['code_datsup'] == null)
                                            {
                                                $codepromoid = $codepromovalide['code_id'];
                                                $tauxreduc   = $codepromovalide['code_taux_reduc'];
                                                $somme       = $tauxreduc / 100;
                                            }
                                            else
                                            {
                                              error("Le code promo n'est plus valide");
                                            }
                                        }    
                                        else
                                        {
                                          error('Code promo incorrect');
                                        }
                                
                              } 
                              else
                              {
                              error('Le code promo est épuisé'); 
                              } 
                                      
                          //verifi si le code promot existe
           }                
        }
      }
    }

    $lead        = "BIENVENUE SUR LA MAQUETTE DE RESERVATION";
    $tagline     = "Ici vous avez la possibilité de vous inscrire aux évenements.";
    $breadcrumbs = array("Code promotionel");
    $pageInclude = "promo/achatPromo.php";
  }
  else
  {
    error("Un problème est survenue.");
    redirection();
    exit();
  }

}
else{
 
redirection($page = "http://localhost/gestab-code/index.php?");
}
?>


