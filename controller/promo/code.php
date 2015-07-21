<?php
	include('model/codePromot.php');
	$codes 		= getCodePromots($bdd);
	$lead        = "BIENVENUE SUR LA MAQUETTE DE RESERVATION";
	$tagline     = "Ici vous avez la possibilité de creer vos codes promotionnels.";
	$breadcrumbs = array("Evenement");
	$pageInclude = "promo/codePromo.php";




?>