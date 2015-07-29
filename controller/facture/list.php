<?php 




 // Mettre ici tout le corps de la page
  $factures    = listFacture($bdd, $_SESSION['user']['inter_id']); 
  $lead        = "Vos factures";
  $tagline     = "Ici vous avez la possibilité de télecharger vos factures.";
  $breadcrumbs = array("Factures");
  $pageInclude = "facture/listFacture.php";

 


?>


  

