<?php 
  function getCodePromots($bdd)
  {
    $query = "SELECT code_id, code_nom, code_taux_reduc, code_nb, code_ev_id, code_datsup, ev_libelle 
              FROM codepromo, evenement
              WHERE code_ev_id = ev_id"; 
    $sth = $bdd->query($query);

  return $sth->fetchAll(PDO::FETCH_ASSOC);
  }
  function getCodePromotByCode($bdd, $code, $evid)
  {
    $query = "SELECT * 
              FROM codepromo 
              WHERE code_nom = :nom 
              AND code_ev_id = :evid";
    $sth = $bdd->prepare($query);
    $sth->execute(array(
      'nom'  => $code,
      'evid' => $evid
    ));

    return $sth->fetch(PDO::FETCH_ASSOC);
  }
  function getCodePromot($bdd, $id)
  {
    $query = "SELECT *
              FROM codepromo
              WHERE code_id = :id";
    $sth = $bdd->prepare($query);
    $sth->bindValue(':id', $id, PDO::PARAM_INT);
    $sth->execute();

    return $sth->fetch(PDO::FETCH_ASSOC);
  }
   $sth = $bdd->prepare('INSERT INTO codepromo(code_nom, code_taux_reduc, code_nb, code_ev_id, code_datcre)VALUES(:code, :reduc, :place, :evid, NOW())');
  function addCode($bdd, $nom, $reduc, $place, $evid)
  {
    $query = "INSERT INTO codepromo(code_nom, code_taux_reduc, code_nb, code_ev_id, code_datcre)
              VALUES(:code, :reduc, :place, :evid, NOW())";
    $sth = $bdd->prepare($query);
    $sth->bindValue(':dateev', $date, PDO::PARAM_INT);
    $sth->bindValue(':nom', $libelle, PDO::PARAM_STR);
    $sth->bindValue(':interid', $interid, PDO::PARAM_STR);
    $sth->bindValue(':evlieuid', $lieuid, PDO::PARAM_STR);
    $sth->execute();
  }
 ?>