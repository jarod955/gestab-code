<?php
function addEncat($bdd, $idEvenement, $idCategorie, $nombrePlace)
{
  $query = 'INSERT INTO evcat(evcat_ev_id, evcat_cat_id, evcat_nb_place)
            VALUES(:evid, :catid, :places)';
  $sth = $bdd->prepare($query);
  $sth->bindValue(':evid', $idEvenement, PDO::PARAM_INT);
  $sth->bindValue(':catid', $idCategorie, PDO::PARAM_INT);
  $sth->bindValue(':places', $nombrePlace, PDO::PARAM_INT);
  $sth->execute();
}
?>