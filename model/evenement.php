<?php 
function listModel($bdd)
{
  $query = 'SELECT ev_id, ev_libelle, ev_date, ev_lieux_id, lieu_nomSalle, count(evcat_cat_id) AS "nb_cat"
            FROM evenement, lieu, evcat
            WHERE lieu_id = ev_lieux_id
            AND ev_id = evcat_ev_id
            GROUP BY ev_id
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
function updateEvenement($bdd, $id, $libelle, $date)
{
  $query = "UPDATE evenement
            SET ev_libelle = :libelle, ev_date = :dat, ev_datmaj = NOW()
            WHERE ev_id = :id";
  $sth = $bdd->prepare($query);
  $sth->bindValue(':id', $id, PDO::PARAM_INT);
  $sth->bindValue(':libelle', $libelle, PDO::PARAM_STR);
  $sth->bindValue(':dat', $date, PDO::PARAM_STR);
  $sth->execute();
}

?>