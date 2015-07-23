<?php
  function construit_url_paypal()
  {
    $api_paypal = 'https://api-3t.sandbox.paypal.com/nvp?'; // Site de l'API PayPal. On ajoute déjà le ? afin de concaténer directement les paramètres.
    $version    = 56.0; // Version de l'API
    $user       = 'gestion.abonne-facilitator_api1.gmail.com'; // Utilisateur API
    $pass       = 'FRFP6DFD8VGEAK86'; // Mot de passe API
    $signature  = 'AiPC9BjkCyDFQXbSkoZcgqH3hpacADzp8Q4caT.S7SejuaMG15.2s7po'; // Signature de l'API
    $api_paypal = $api_paypal.'VERSION='.$version.'&USER='.$user.'&PWD='.$pass.'&SIGNATURE='.$signature; // Ajoute tous les paramètres

  	return 	$api_paypal; // Renvoie la chaîne contenant tous nos paramètres.
  }

  function recup_param_paypal($resultat_paypal)
  {
  	$liste_parametres = explode("&",$resultat_paypal); // Crée un tableau de paramètres
  	foreach($liste_parametres as $param_paypal) // Pour chaque paramètre
  	{
      list($nom, $valeur)       = explode("=", $param_paypal); // Sépare le nom et la valeur
      $liste_param_paypal[$nom] = urldecode($valeur); // Crée l'array final
  	}

  	return $liste_param_paypal; // Retourne l'array
  }
?>