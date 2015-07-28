<?php
include('model/facture.php');
$lead = "Participez à un evenement";
$tagline = "";
$breadcrumbs = array("Evenement");
$evenements = listModel($bdd);
foreach ($evenements as $key => $evenement)
{
$evenements[$key]['facture'] = false;
if (isset($_SESSION['user']))
{
$evenements[$key]['facture'] = getFacture($bdd, $_SESSION['user']['inter_id'], $evenement['ev_id']);
}
}
$pageInclude = "evenement/listEvenement.php";
?>