<?php 
if (empty($_SESSION['user'])){
	redirection($page = "index.php?route=error404");
}
elseif ($_SESSION['user']['inter_stat_id'] == 2 or 3) {
 // Mettre ici tout le corps de la page 
	include('model/codePromot.php');
	$codes 		= getCodePromots($bdd);
	$lead        = "Espace de gestion de vos code promotionnels";
	$tagline     = "Les code promotionnels sont créés lors de la création d'un evenement";
	$breadcrumbs = array("Evenement");
	$pageInclude = "promo/codePromo.php";
}
else{
 
redirection($page = "index.php?");
}
?>