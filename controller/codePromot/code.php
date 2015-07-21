<?php
  include('model/evenement.php');

  $codePromots = listCodePromot($bdd);
  foreach ($codePromots as &$codePromot)
  {
    $codePromot['Evenement'] = getEvenement($bdd, $codePromot['code_ev_id']);
    unset($codePromot['code_ev_id']);
  }
  $lead        = "BIENVENUE SUR LA MAQUETTE DE RESERVATION";
  $tagline     = "Ici vous avez la possibilité de creer vos codes promotionnels.";
  $breadcrumbs = array("Evenement");
  $pageInclude = "promo/codePromo.php";
 ?>