<?php 
if (empty($_SESSION['user'])){
  redirection($page = "index.php?route=error404");
}
elseif ($_SESSION['user']['inter_stat_id'] == 2 or 3) {
 // Mettre ici tout le corps de la page 

  include('model/fonctionAdd.php');

 if (isset($_POST['inc']))
  {
      $_SESSION['ajoutcat']++;
  }
  elseif (isset($_POST['dec']))
  {
      if ($_SESSION['ajoutcat'] > 1)
      {
          $_SESSION['ajoutcat']--;
      }
  }

  if (isset($_POST['plus']))
  {
      $_SESSION['ajoutcode']++;
  }
  elseif (isset($_POST['moins']))
  {
      if ($_SESSION['ajoutcode'] > 1)
      {
          $_SESSION['ajoutcode']--;
      }
  }
  
if (isset($_POST['send']))
  {

      $interid    = $_SESSION['user']['inter_id'];
      $nom        = htmlspecialchars(trim($_POST["nom"]));
      if (htmlspecialchars(trim($_POST["numerorue"] < 0)))
      {
      $numrue = abs($_POST["numerorue"]);
      }
      else{
      $numrue     = htmlspecialchars(trim($_POST["numerorue"]));
      }
      
      $rue        = htmlspecialchars(trim($_POST["rue"]));
      $codepostal = htmlspecialchars(trim($_POST["codepostal"]));
      $ville      = htmlspecialchars(trim($_POST["ville"]));
      $salle      = htmlspecialchars(trim($_POST["salle"]));
      $date1      = $_POST['annee'].'-'.$_POST['mois'].'-'.$_POST['jour'].'-'.$_POST['heure'].'-'.$_POST['minute'];   

      // Met ici tes requetes SQL
      // Tu te souviens que ton nom va ressembler par exemple à nom_categorie1 / nom_categorie2... bah ici il suffit de faire pareil quand tu récupère. Tu récupère nom_categorie + la valeur $i de ta boucle

      // $categorie['nom'] = $_POST['cat'][$i]['nom_categorie'];
      // $categorie['prix'] = $_POST['cat'][$i]['prix'];
      // $places = $_POST['cat'][$i]['nombre_places'];
      if(!empty($_POST['reduc']))
      {
          foreach ($_POST['cat'] as $categorie)
          {
            foreach ($_POST['code'] as $codepromo)
            {
              
              if(is_numeric($codepromo['place']) && is_numeric($codepromo['reduc']))
              //if(is_numeric($codepromo['place']) || is_numeric($codepromo['reduc']))
              {
                  if(is_numeric($categorie['prix']) && is_numeric($categorie['nombre_places']))
                  {
              //if(is_numeric($codepromo['place']) || is_numeric($codepromo['reduc']))
                      
                            
                            if ($categorie['prix'] || $categorie['nombre_places'] < 0)
                            {
                              $categorie['prix'] = abs($categorie['prix']); # code...
                              $categorie['nombre_places'] = abs($categorie['nombre_places']);
                              
                              addCategorie($bdd, $categorie['nom_categorie'], $categorie['prix']);
                              $categories[$bdd->lastInsertId()] = $categorie['nombre_places'];
                            }
                            else
                            {
                              addCategorie($bdd, $categorie['nom_categorie'], $categorie['prix']);
                              $categories[$bdd->lastInsertId()] = $categorie['nombre_places'];
                            }
                           

                            addAdresse($bdd, $numrue, $rue, $ville, $codepostal);
                            $adrid = $bdd->lastInsertId();
                            
                            addLieu($bdd, $salle, $adrid);
                            $evlieuid = $bdd->lastInsertId();

                            addEvenement($bdd, $date1, $nom, $interid, $evlieuid);
                            $evid = $bdd->lastInsertId();
           
                            
                            if ($codepromo['reduc'] || $codepromo['place'] < 0)
                            {
                              $codepromo['reduc'] = abs($codepromo['reduc']); # code...
                              $codepromo['place'] = abs($codepromo['place']);
                              
                              addCode($bdd, $codepromo['nom_code'], $codepromo['reduc'], $codepromo['place'], $evid);
                            }
                            else
                            {
                              addCode($bdd, $codepromo['nom_code'], $codepromo['reduc'], $codepromo['place'], $evid);
                            }
                          
                            foreach ($categories as $cat_id => $cat_nb_place)
                            {   
                              addEvcat($bdd, $evid, $cat_id, $cat_nb_place);
                            } 
                          
                            success("L'événement à bien été enregistré.");
                  }
                  else
                  {
                    error("Le prix ou le nombre de places doit etre de type numerique");
                  }

              }
              else
              {
                error("La reduction ou le nombre de code promo doit etre de type numerique");
              }
            }
          }

      }
      else
      {
          foreach ($_POST['cat'] as $categorie)
          {
                if(is_numeric($categorie['prix']) && is_numeric($categorie['nombre_places']))
                    {
              //if(is_numeric($codepromo['place']) || is_numeric($codepromo['reduc']))
                      
                            
                            if ($categorie['prix'] || $categorie['nombre_places'] < 0)
                            {
                              $categorie['prix'] = abs($categorie['prix']); # code...
                              $categorie['nombre_places'] = abs($categorie['nombre_places']);
                              
                              addCategorie($bdd, $categorie['nom_categorie'], $categorie['prix']);
                              $categories[$bdd->lastInsertId()] = $categorie['nombre_places'];
                            }
                            else
                            {
                              addCategorie($bdd, $categorie['nom_categorie'], $categorie['prix']);
                              $categories[$bdd->lastInsertId()] = $categorie['nombre_places'];
                            }
                           

                            addAdresse($bdd, $numrue, $rue, $ville, $codepostal);
                            $adrid = $bdd->lastInsertId();
                            
                            addLieu($bdd, $salle, $adrid);
                            $evlieuid = $bdd->lastInsertId();

                            addEvenement($bdd, $date1, $nom, $interid, $evlieuid);
                            $evid = $bdd->lastInsertId();
           
                          
                            foreach ($categories as $cat_id => $cat_nb_place)
                            {   
                              addEvcat($bdd, $evid, $cat_id, $cat_nb_place);
                            } 
                          
                            success("L'événement à bien été enregistré.");
                  }
                  else
                  {
                    error("Le prix ou le nombre de places doit etre de type numerique");
                  }
    }     }
            
  }
  else
  {
      // Si l'utilisateur n'a pas envoyé le formulaire alors
      // On récupère tes champs envoyés et on les stock en variable de session
      if (isset($_POST['nom']))
          $_SESSION['nom'] = $_POST['nom'];
      if (isset($_POST['date_event']))
          $_SESSION['date_event'] = $_POST['date_event'];
      if (isset($_POST['heure_event']))
          $_SESSION['heure_event'] = $_POST['heure_event'];
      if (isset($_POST['numerorue']))
          $_SESSION['numerorue'] = $_POST['numerorue'];
      if (isset($_POST['rue']))
          $_SESSION['rue'] = $_POST['rue'];
      if (isset($_POST['codepostal']))
          $_SESSION['codepostal'] = $_POST['codepostal'];
      if (isset($_POST['ville']))
          $_SESSION['ville'] = $_POST['ville'];
      if (isset($_POST['salle']))
          $_SESSION['salle'] = $_POST['salle'];
  }

  // Déclaration de variables
  if (!isset($_SESSION['ajoutcat']))
      $_SESSION['ajoutcat'] = 1;
  if (!isset($_SESSION['ajoutcode']))
      $_SESSION['ajoutcode'] = 1;

  $lead        = "Ici vous pouvez creer des events";
  $tagline     = (isset($_SESSION['user'])) ? $_SESSION['user']['inter_mail'] : "";
  $breadcrumbs = array("Evenement", "Creation");
  $pageInclude = "evenement/newEvenement.php";
}
else{
 
redirection($page = "index.php?");
}
?>
