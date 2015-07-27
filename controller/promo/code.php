<?php 
if (empty($_SESSION['user'])){
	redirection($page = "index.php?route=error404");
}
elseif ($_SESSION['user']['inter_stat_id'] == 2 or 3) {
 // Mettre ici tout le corps de la page 
	include('model/codePromot.php');
	$codes 		= getCodePromots($bdd);
	$lead        = "BIENVENUE SUR LA MAQUETTE DE RESERVATION";
	$tagline     = "Ici vous avez la possibilité de creer vos codes promotionnels.";
	$breadcrumbs = array("Evenement");
	$pageInclude = "promo/codePromo.php";
}
else{
 
redirection($page = "index.php?");
}
?>