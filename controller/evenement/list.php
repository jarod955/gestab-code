<?php
	$lead        = "BIENVENUE SUR LA MAQUETTE DE RESERVATION";
	$tagline     = "Ici vous avez la possibilité de vous inscrire aux évenements.";
	$breadcrumbs = array("Evenement");
	$evenements  = listModel($bdd);
	$pageInclude = "evenement/listEvenement.php";
 ?>