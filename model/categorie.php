<?php
function listByEvenement($bdd, $id)
{
  $query = 'SELECT * 
            FROM categorie, evcat 
            WHERE evcat_cat_id = cat_id 
            AND evcat_ev_id = ?';
  $sth = $bdd->prepare($query);
  $res = $sth->execute(array($id));

  return $sth->fetchAll(PDO::FETCH_ASSOC);
}
function decrementCategorieModel($bdd)
{
  $query = 'SELECT evcat_ev_id, evcat_cat_id, evcat_nb_pl 
            FROM evcat, categorie 
            WHERE evcat_ev_id = cat_id';
  $sth   = $bdd->prepare($query);
  $res   = $sth->execute(array($id));

  return $sth->fetch(PDO::FETCH_ASSOC);
}
//liste les places prise, les places restante et les places totals des categorie de l'evenement
function placesRestantes($bdd, $id)
{
  $query = 'SELECT COUNT(fac_ev_id) AS "nb_place_prise",SUM(evcat_nb_place) - COUNT(fac_ev_id) AS "nb_place_restante", SUM(evcat_nb_place) AS "nb_total"
            FROM facture, evcat
            WHERE fac_ev_id = :fac_ev_id
            AND evcat_ev_id = :evcat_ev_id';
  $sth   = $bdd->prepare($query);
  $res   = $sth->execute(array(
    'fac_ev_id'   => $id,
    'evcat_ev_id' => $id,
  ));

  return $sth->fetchAll(PDO::FETCH_ASSOC);
}
//liste les places prise, les places restante et les places totals d'une categorie d'un evenement
function placesRestantesByCategorie($bdd, $idEnv, $idCat)
{
  $query = 'SELECT COUNT(fac_ev_id) AS "nb_place_prise",SUM(evcat_nb_place) - COUNT(fac_ev_id) AS "nb_place_restante", SUM(evcat_nb_place) AS "nb_total"
            FROM facture, evcat
            WHERE fac_ev_id = :fac_ev_id
            AND evcat_ev_id = :evcat_ev_id
            AND evcat_cat_id = :evcat_cat_id';
  $sth   = $bdd->prepare($query);
  $res   = $sth->execute(array(
    'fac_ev_id'    => $idEnv,
    'evcat_ev_id'  => $idEnv,
    'evcat_cat_id' => $idCat,
  ));

  return $sth->fetch(PDO::FETCH_ASSOC);
}
?>