<?php 
if (empty($_SESSION['user'])){
	redirection($page = "index.php?route=error404");
}
elseif ($_SESSION['user']['inter_stat_id'] == 1 or 2 or 3) {
 // Mettre ici tout le corps de la page 
  include('model/internaute.php');
  $internautes 		= getInternautes($bdd);
  $lead        = "Gestion des Utilisateurs";
  $breadcrumbs = array("Gestion des Utilisateurs");
  $pageInclude = "compte/gestionUtilisateurs.php";

}
else{
 
redirection($page = "index.php?");
}
?>

  
