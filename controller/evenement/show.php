<?php
//include le model des categories
include('model/categorie.php');
//inclure le model des factures
include('model/facture.php');
//informations de l'evenement
include('model/internaute.php');
$evenement   = showEvenement($bdd, $id);
//liste des categories de l'evenement
$categories  = listByEvenement($bdd, $evenement['ev_id']);
//recuperer la facture si elle existe, sinon null
$facture     = getFacture($bdd, $_SESSION['user']['inter_id'], $evenement['ev_id']);

$participants = intEvenement($bdd, $evenement['ev_id']);
//recuperation du nombre de place par categorie
foreach ($categories as $key => $categorie)
  $categories[$key]['place'] = placesRestantesByCategorie($bdd, $evenement['ev_id'], $categorie['cat_id']);
//formater la date de l'evenement
$datetimEvenement = new DateTime($evenement['ev_date']);
//pour le file d'ariane
$breadcrumbs      = array("Evenement", "show");
//la vue à afficher
$pageInclude      = "evenement/showEvenement.php";
?>