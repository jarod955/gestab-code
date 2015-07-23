<?php
	include('model/categorie.php');
	include('model/internaute.php');
	$evenements  = listModel($bdd);
	$lead        = "Reservation d'evenement Centrifugeuse de projets";
	$tagline     = "Ici vous avez la possibilité de modifier les évenements.";
	$breadcrumbs = array("list");
	$pageInclude = "evenement/listadminEvenement.php";
 ?>