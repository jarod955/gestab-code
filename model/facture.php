<?php
  //recuperer les factures d'un internaute
  
  function listFacture($bdd, $id_inter)
  {
    $query = "SELECT *
              FROM facture, categorie, evenement, codepromo
              WHERE fac_ev_id = ev_id
              AND fac_cat_id = cat_id
              AND fac_code_id = code_id
              AND fac_inter_id = ?";
    $sth   = $bdd->prepare($query);
    $sth->execute(array($id_inter));

    return $sth->fetchAll(PDO::FETCH_ASSOC);
  }
  //recuperer une facture
  function getFacture($bdd, $id_inter, $id_ev)
  {
    $query = 'SELECT * 
              FROM facture 
              WHERE fac_ev_id = :fac_ev_id 
              AND fac_inter_id = :fac_inter_id';
    $sth   = $bdd->prepare($query);
    $sth->execute(array(
      ':fac_inter_id' => $id_inter, 
      ':fac_ev_id' => $id_ev
    ));

    return $sth->fetch(PDO::FETCH_ASSOC);
  }
  //ajote une facture
  function addFacture($bdd, $evenementid, $internauteid, $categorieid, $codepromoid)
  {
    $query = 'INSERT INTO facture(fac_ev_id, fac_inter_id, fac_cat_id, fac_code_id, fac_datcre)
              VALUES(:evid, :interid, :catid, :codeid, NOW())';
    $sth = $bdd->prepare($query);
    $sth->bindValue(':evid', $evenementid, PDO::PARAM_INT);
    $sth->bindValue(':interid', $internauteid, PDO::PARAM_INT);
    $sth->bindValue(':catid', $categorieid, PDO::PARAM_INT);
    $sth->bindValue(':codeid', $codepromoid, PDO::PARAM_INT);
    $sth->execute();
  }



?>