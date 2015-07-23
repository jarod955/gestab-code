<?php
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
            //verifi si le code promot existe
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
                error("Le code promo n'est plus valide");
            }
            else
              error('Code promo incorrect');
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
?>