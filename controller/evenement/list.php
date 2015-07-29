<?php
include('model/facture.php');
$lead = "Bienvenue sur la plateforme centrifugeuse";
if(isset($_SESSION['user'])){
	$tagline = "Participez a un evenement";
	}
	else
	{
		$tagline = "Connectez vous ou inscrivez vous pour participer à un événement";
	}
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