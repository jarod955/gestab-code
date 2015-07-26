<?php
function addEvcat($bdd, $idEvenement, $idCategorie, $nombrePlace)
{
  $query = 'INSERT INTO evcat(evcat_ev_id, evcat_cat_id, evcat_nb_place)
            VALUES(:evid, :catid, :places)';
  $sth = $bdd->prepare($query);
  $sth->bindValue(':evid', $idEvenement, PDO::PARAM_INT);
  $sth->bindValue(':catid', $idCategorie, PDO::PARAM_INT);
  $sth->bindValue(':places', $nombrePlace, PDO::PARAM_INT);
  $sth->execute();
}
function addEvenement($bdd, $date, $libelle, $interid, $lieuid)
  {
    $query = "INSERT INTO evenement(ev_date, ev_libelle, ev_inter_id, ev_lieux_id, ev_datcre)
              VALUES(:dateev, :nom, :interid, :evlieuid, NOW())";
    $sth = $bdd->prepare($query);
    $sth->bindValue(':dateev', $date, PDO::PARAM_INT);
    $sth->bindValue(':nom', $libelle, PDO::PARAM_STR);
    $sth->bindValue(':interid', $interid, PDO::PARAM_STR);
    $sth->bindValue(':evlieuid', $lieuid, PDO::PARAM_STR);
    $sth->execute();
  }
  function addCategorie($bdd, $nom, $prix)
{
  $query = "INSERT INTO categorie(cat_nom, cat_prix, cat_datcre)
            VALUES(:nom, :prix, NOW())";
  $sth = $bdd->prepare($query);
  $sth->bindValue(':nom', $nom, PDO::PARAM_STR);
  $sth->bindValue(':prix', $prix);
  $sth->execute();
}
function addAdresse($bdd, $numrue, $rue, $ville, $codepostal)
  {
    $query = "INSERT INTO adresse(adr_num_rue, adr_rue, adr_ville, adr_code_postal, adr_datcre)
              VALUES(:numrue, :rue, :ville, :codepostal, NOW())";
    $sth = $bdd->prepare($query);
    $sth->bindValue(':numrue', $numrue, PDO::PARAM_INT);
    $sth->bindValue(':rue', $rue, PDO::PARAM_STR);
    $sth->bindValue(':ville', $ville, PDO::PARAM_STR);
    $sth->bindValue(':codepostal', $codepostal, PDO::PARAM_STR);
    $sth->execute();

    return $bdd->lastInsertId();
  }
  function addLieu($bdd, $nomsalle, $adrid)
{
  $query = "INSERT INTO lieu(lieu_nomSalle, lieu_adr_id, lieu_datcre)
            VALUES(:salle, :lieu, NOW())";
  $sth = $bdd->prepare($query);
  $sth->bindValue(':salle', $nomsalle, PDO::PARAM_STR);
  $sth->bindValue(':lieu', $adrid);
  $sth->execute();
}
  function addCode($bdd, $codenom, $reduc, $place, $evid)
  {
    $query = "INSERT INTO codepromo(code_nom, code_taux_reduc, code_nb, code_ev_id, code_datcre)
              VALUES(:code, :reduc, :place, :evid, NOW())";
    $sth = $bdd->prepare($query);
    $sth->bindValue(':code', $codenom, PDO::PARAM_INT);
    $sth->bindValue(':reduc', $reduc, PDO::PARAM_STR);
    $sth->bindValue(':place', $place, PDO::PARAM_STR);
    $sth->bindValue(':evid', $evid, PDO::PARAM_STR);
    $sth->execute();
  }
  function addEntite($bdd, $entite, $adride)
  {
    $query = "INSERT INTO entite(entite_nom, entite_pdta, entite_adr_id, entite_datcre)
              VALUES(:nom, :pdta, :id, NOW())";
    $sth = $bdd->prepare($query);
    $sth->bindValue(':nom', $entite, PDO::PARAM_STR);
    $sth->bindValue(':pdta', 1, PDO::PARAM_INT);
    $sth->bindValue(':id', $adride, PDO::PARAM_INT);
    $sth->execute();
  }  
  function addInternaute($bdd, $nom, $prenom, $adrid, $pass_hache, $email, $telephone)
{
  $query = "INSERT INTO internaute(inter_stat_id, inter_nom, inter_prenom, inter_entite_id, inter_adr_id, inter_user_pass, inter_mail, inter_telephone, inter_datcre)
            VALUES(:id, :nom, :prenom, :entiteid, :adrid, :pass_hache, :email, :telephone, NOW())";
  $sth = $bdd->prepare($query);
  $sth->bindValue(':id', 1, PDO::PARAM_INT);
  $sth->bindValue(':nom', $nom, PDO::PARAM_STR);
  $sth->bindValue(':prenom', $prenom, PDO::PARAM_STR);
  $sth->bindValue(':entiteid', null, PDO::PARAM_INT);
  $sth->bindValue(':adrid', $adrid, PDO::PARAM_INT);
  $sth->bindValue(':pass_hache', $pass_hache, PDO::PARAM_STR);
  $sth->bindValue(':email', $email, PDO::PARAM_STR);
  $sth->bindValue(':telephone', $telephone, PDO::PARAM_INT);
  $sth->execute();
}
function addInternautee($bdd, $nom, $prenom, $entiteid, $adrid, $pass_hache, $email, $telephone)
{
  $query = "INSERT INTO internaute(inter_stat_id, inter_nom, inter_prenom, inter_entite_id, inter_adr_id, inter_user_pass, inter_mail, inter_telephone, inter_datcre)
            VALUES(:id, :nom, :prenom, :entiteid, :adrid, :pass_hache, :email, :telephone, , NOW())";
  $sth = $bdd->prepare($query);
  $sth->bindValue(':id', 1, PDO::PARAM_INT);
  $sth->bindValue(':nom', $nom, PDO::PARAM_STR);
  $sth->bindValue(':prenom', $prenom, PDO::PARAM_STR);
  $sth->bindValue(':entiteid', $entiteid, PDO::PARAM_INT);
  $sth->bindValue(':adrid', $adrid, PDO::PARAM_INT);
  $sth->bindValue(':pass_hache', $pass_hache, PDO::PARAM_STR);
  $sth->bindValue(':email', $email, PDO::PARAM_STR);
  $sth->bindValue(':telephone', $telephone, PDO::PARAM_INT);
  $sth->execute();
}
?>