<?php 
if (empty($_SESSION['user'])){
    header('location: error.php');
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
 
redirection($page = "http://localhost/gestab-code/index.php?");
}
?>
<?php
	




?>