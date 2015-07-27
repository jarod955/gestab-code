<?php 
if (empty($_SESSION['user'])){
	redirection($page = "index.php?route=error404");
}
elseif ($_SESSION['user']['inter_stat_id'] == 1 or 2 or 3) {
 // Mettre ici tout le corps de la page 
	include('model/categorie.php');
	include('model/internaute.php');
	$evenements  = listModel($bdd);
	$lead        = "Reservation d'evenement Centrifugeuse de projets";
	$tagline     = "Ici vous avez la possibilité de modifier les évenements.";
	$breadcrumbs = array("list");
	$pageInclude = "evenement/listadminEvenement.php";
 
}
else{
 
redirection($page = "index.php?");
}
?>

	