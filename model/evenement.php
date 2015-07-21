<?php 
function listModel($bdd)
{
  $query = 'SELECT ev_id, ev_libelle, ev_date, ev_lieux_id, lieu_nomSalle
            FROM evenement, lieu
            WHERE lieu_id = ev_lieux_id
            ORDER BY ev_date DESC';
  $sth = $bdd->query($query);

  return $sth->fetchAll(PDO::FETCH_ASSOC);
}
function showEvenement($bdd, $id)
{
  $query = 'SELECT * 
            FROM internaute, evenement, lieu, adresse 
            WHERE ev_inter_id = inter_id 
            AND ev_lieux_id = lieu_id 
            AND lieu_adr_id = adr_id 
            AND ev_id = ?';
  $sth   = $bdd->prepare($query);
  $sth->execute(array($id));

  return $sth->fetch(PDO::FETCH_ASSOC);
}
?>