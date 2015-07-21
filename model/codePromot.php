<?php 
  function getCodePromots($bdd)
  {
    $query = "SELECT code_id, code_nom, code_taux_reduc, code_nb, code_ev_id, code_datsup, ev_libelle 
              FROM codepromo, evenement
              WHERE code_ev_id = ev_id"; 
    $sth = $bdd->query($query);

  return $sth->fetchAll(PDO::FETCH_ASSOC);
  }
  function getCodePromot($bdd, $code, $evid)
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
 ?>