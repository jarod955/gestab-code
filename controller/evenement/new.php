<?php
  $lead        = (isset($_SESSION['user'])) ? $_SESSION['user']['inter_prenom'] : "";
  $tagline     = "Ici vous pouvez creer des events";
  $breadcrumbs = array("Evenement", "Creation");
  // $evenements  = listModel($bdd);
  $pageInclude = "evenement/newEvenement.php";
?>
<?php

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
      $nom        = $_POST["nom"];
      $numrue     = htmlspecialchars(trim($_POST["numerorue"]));
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
     
          
      if(!empty($_POST['code']))
      {
        
                  
                  foreach ($_POST['cat'] as $categorie)
                  {
                  $sth = $bdd->prepare("INSERT INTO categorie(cat_nom, cat_prix, cat_datcre)VALUES(:nom, :prix, NOW())");
                  $sth->bindValue(':nom', $categorie['nom_categorie'], PDO::PARAM_STR);
                  $sth->bindValue(':prix', $categorie['prix']);
                  $sth->execute();
                  $categories[$bdd->lastInsertId()] = $categorie['nombre_places'];
                  }
                  
                  $sth = $bdd->prepare('INSERT INTO adresse(adr_num_rue, adr_rue, adr_ville, adr_code_postal, adr_datcre)VALUES(:numrue, :rue, :ville, :codepostal, NOW())');
                  $sth->bindValue(':numrue', $numrue, PDO::PARAM_INT);
                  $sth->bindValue(':rue', $rue, PDO::PARAM_STR);
                  $sth->bindValue(':ville', $ville, PDO::PARAM_STR);
                  $sth->bindValue(':codepostal', $codepostal, PDO::PARAM_STR);
                  $sth->execute();
                  $adrid = $bdd->lastInsertId();
                  
                  $sth = $bdd->prepare('INSERT INTO lieu(lieu_nomSalle, lieu_adr_id, lieu_datcre)VALUES(:salle, :lieu, NOW())');
                  $sth->bindValue(':salle', $salle, PDO::PARAM_STR);
                  $sth->bindValue(':lieu', $adrid, PDO::PARAM_INT);
                  $sth->execute();
                  $evlieuid = $bdd->lastInsertId();

                  $sth = $bdd->prepare('INSERT INTO evenement(ev_date, ev_libelle, ev_inter_id, ev_lieux_id, ev_datcre)VALUES(:dateev, :nom, :interid, :evlieuid, NOW())');
                  $sth->bindValue(':dateev', $date1, PDO::PARAM_STR);
                  $sth->bindValue(':nom', $nom, PDO::PARAM_STR);
                  $sth->bindValue(':interid', $interid, PDO::PARAM_INT);
                  $sth->bindValue(':evlieuid', $evlieuid, PDO::PARAM_INT);
                  $sth->execute();
                  $evid = $bdd->lastInsertId();

                  foreach ($_POST['code'] as $codepromo)
                  {
                           
                  if ($codepromo['reduc'] || $codepromo['place'] < 0){
                  $codepromo['reduc'] = abs($codepromo['reduc']); # code...
                  $codepromo['place'] = abs($codepromo['place']);

                  $sth = $bdd->prepare('INSERT INTO codepromo(code_nom, code_taux_reduc, code_nb, code_ev_id)VALUES(:code, :reduc, :place, :evid)');
                  $sth->bindValue(':code', $codepromo['nom_code'], PDO::PARAM_STR);
                  $sth->bindValue(':reduc', $codepromo['reduc'], PDO::PARAM_INT);
                  $sth->bindValue(':place', $codepromo['place'], PDO::PARAM_INT);
                  $sth->bindValue(':evid', $evid, PDO::PARAM_INT);
                  $sth->execute();
                  }
                  else{
                  $sth = $bdd->prepare('INSERT INTO codepromo(code_nom, code_taux_reduc, code_nb, code_ev_id)VALUES(:code, :reduc, :place, :evid)');
                  $sth->bindValue(':code', $codepromo['nom_code'], PDO::PARAM_STR);
                  $sth->bindValue(':reduc', $codepromo['reduc'], PDO::PARAM_INT);
                  $sth->bindValue(':place', $codepromo['place'], PDO::PARAM_INT);
                  $sth->bindValue(':evid', $evid, PDO::PARAM_INT);
                  $sth->execute();
                  }
                  }

                  foreach ($categories as $cat_id => $cat_nb_place)
                  {   
                  $sth = $bdd->prepare('INSERT INTO evcat(evcat_ev_id, evcat_cat_id, evcat_nb_place)VALUES(:evid, :catid, :places)');
                  $sth->bindValue(':evid', $evid, PDO::PARAM_INT);
                  $sth->bindValue(':catid', $cat_id, PDO::PARAM_INT);
                  $sth->bindValue(':places', $cat_nb_place, PDO::PARAM_INT);
                  $sth->execute();
                  }
                  
                  success("L'événement à bien été enregistré.");
            
            
      }
      else{

      foreach ($_POST['cat'] as $categorie)
      {
          $sth = $bdd->prepare("INSERT INTO categorie(cat_nom, cat_prix, cat_datcre)VALUES(:nom, :prix, NOW())");
          $sth->bindValue(':nom', $categorie['nom_categorie'], PDO::PARAM_STR);
          $sth->bindValue(':prix', $categorie['prix']);
          $sth->execute();
          $categories[$bdd->lastInsertId()] = $categorie['nombre_places'];
      }

      $sth = $bdd->prepare('INSERT INTO adresse(adr_num_rue, adr_rue, adr_ville, adr_code_postal, adr_datcre)VALUES(:numrue, :rue, :ville, :codepostal, NOW())');
      $sth->bindValue(':numrue', $numrue, PDO::PARAM_INT);
      $sth->bindValue(':rue', $rue, PDO::PARAM_STR);
      $sth->bindValue(':ville', $ville, PDO::PARAM_STR);
      $sth->bindValue(':codepostal', $codepostal, PDO::PARAM_STR);
      $sth->execute();
      $adrid = $bdd->lastInsertId();
      
      $sth = $bdd->prepare('INSERT INTO lieu(lieu_nomSalle, lieu_adr_id, lieu_datcre)VALUES(:salle, :lieu, NOW())');
      $sth->bindValue(':salle', $salle, PDO::PARAM_STR);
      $sth->bindValue(':lieu', $adrid, PDO::PARAM_INT);
      $sth->execute();
      $evlieuid = $bdd->lastInsertId();

      $sth = $bdd->prepare('INSERT INTO evenement(ev_date, ev_libelle, ev_inter_id, ev_lieux_id, ev_datcre)VALUES(:dateev, :nom, :interid, :evlieuid, NOW())');
      $sth->bindValue(':dateev', $date1, PDO::PARAM_STR);
      $sth->bindValue(':nom', $nom, PDO::PARAM_STR);
      $sth->bindValue(':interid', $interid, PDO::PARAM_INT);
      $sth->bindValue(':evlieuid', $evlieuid, PDO::PARAM_INT);
      $sth->execute();
      $evid = $bdd->lastInsertId();

      foreach ($categories as $cat_id => $cat_nb_place)
      {   
          $sth = $bdd->prepare('INSERT INTO evcat(evcat_ev_id, evcat_cat_id, evcat_nb_place)VALUES(:evid, :catid, :places)');
          $sth->bindValue(':evid', $evid, PDO::PARAM_INT);
          $sth->bindValue(':catid', $cat_id, PDO::PARAM_INT);
          $sth->bindValue(':places', $cat_nb_place, PDO::PARAM_INT);
          $sth->execute();
      }

      success("L'événement à bien été enregistré.");
      }

      
            
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


 ?>