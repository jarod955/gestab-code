<?php
	include('model/categorie.php');
	include('model/internaute.php');
	$evenements  = listModel($bdd);
	$lead        = "BIENVENUE SUR LA MAQUETTE DE RESERVATION";
	$tagline     = "Ici vous avez la possibilité de modifier les évenements.";
	$breadcrumbs = array("list");
	$pageInclude = "evenement/listadminEvenement.php";
 ?>