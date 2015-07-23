<?php
  include('model/internaute.php');
  $internautes 		= getInternautes($bdd);
  $lead        = "Gestion des Utilisateurs";
  $breadcrumbs = array("Gestion des Utilisateurs");
  $pageInclude = "compte/gestionUtilisateurs.php";
?>