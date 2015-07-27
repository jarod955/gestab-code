<?php 
if (empty($_SESSION['user'])){
	redirection($page = "index.php?route=error404");
}
elseif ($_SESSION['user']['inter_stat_id'] == 1 or 2 or 3) {
 // Mettre ici tout le corps de la page
  $factures    = listFacture($bdd, $_SESSION['user']['inter_id']); 
  $lead        = "Vos factures";
  $tagline     = "Ici vous avez la possibilité de télecharger vos factures.";
  $breadcrumbs = array("Factures");
  $pageInclude = "facture/listFacture.php";
  
  $date = date("Y-m-d H:i:s");
  $evid = $evenement['ev_id'];
}
else{
 
redirection($page = "index.php?");
}
?>


  

