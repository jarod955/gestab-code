<?php
	include('model/facture.php');
	

$requete = construit_url_paypal(); // Construit les options de base

// On ajoute le reste des options
// La fonction urlencode permet d'encoder au format URL les espaces, slash, deux points, etc.)
$requete = $requete."&METHOD=DoExpressCheckoutPayment".
			"&TOKEN=".htmlentities($_GET['token'], ENT_QUOTES). // Ajoute le jeton qui nous a été renvoyé
			"&AMT=".htmlentities($_GET['amt'], ENT_QUOTES). // On récupère ici la somme par la méthode GET qui a transitée par l'URL
			"&CURRENCYCODE=EUR".
			"&PayerID=".htmlentities($_GET['PayerID'], ENT_QUOTES). // Ajoute l'identifiant du paiement qui nous a également été renvoyé
			"&PAYMENTACTION=sale";

// Initialise notre session cURL. On lui donne la requête à exécuter.
$ch = curl_init($requete);

// Modifie l'option CURLOPT_SSL_VERIFYPEER afin d'ignorer la vérification du certificat SSL. Si cette option est à 1, une erreur affichera que la vérification du certificat SSL a échoué, et rien ne sera retourné. 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
// Retourne directement le transfert sous forme de chaîne de la valeur retournée par curl_exec() au lieu de l'afficher directement. 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// On lance l'exécution de la requête URL et on récupère le résultat dans une variable
$resultat_paypal = curl_exec($ch);

if (!$resultat_paypal) // S'il y a une erreur, on affiche "Erreur", suivi du détail de l'erreur.
	{echo "<p>Erreur</p><p>".curl_error($ch)."</p>";}
// S'il s'est exécuté correctement, on effectue les traitements...
else
{
	$liste_param_paypal = recup_param_paypal($resultat_paypal); // Lance notre fonction qui dispatche le résultat obtenu en un array
	
	// On affiche tous les paramètres afin d'avoir un aperçu global des valeurs exploitables (pour vos traitements). Une fois que votre page sera comme vous le voulez, supprimez ces 3 lignes. Les visiteurs n'auront aucune raison de voir ces valeurs s'afficher.
	
	
	// Si la requête a été traitée avec succès
	if ($liste_param_paypal['ACK'] == 'Success')
	{
		
		if(!empty($_GET['codeid'])){
		$codepromoid  = ($_GET['codeid']);
		$categorieid  = ($_GET['catid']);
		$evenementid  = ($_GET['evid']);
		$internauteid = ($_GET['intid']);

    	addFacture($bdd, $evenementid, $internauteid, $categorieid, $codepromoid);

    	redirection($page = "".$base."index.php?route=listFacture");

		}
    	else{// On affiche la page avec les remerciements, et tout le tralala...
		/*var_dump($_GET['catid']);
		var_dump($_GET['evid']);
		var_dump($_GET['intid']);
		exit;*/
		$categorieid  = ($_GET['catid']);
		$evenementid  = ($_GET['evid']);
		$internauteid = ($_GET['intid']);

    	addFacture($bdd, $evenementid, $internauteid, $categorieid, null);

    	redirection($page = "".$base."index.php?route=listFacture");
			}
		// Mise à jour de la base de données & traitements divers...
		/*mysql_query("UPDATE commandes SET etat='OK' WHERE id_commande='".$liste_param_paypal['TRANSACTIONID']."'");*/
	}
	else // En cas d'échec, affiche la première erreur trouvée.
	{echo "<p>Erreur de communication avec le serveur PayPal.<br />".$liste_param_paypal['L_SHORTMESSAGE0']."<br />".$liste_param_paypal['L_LONGMESSAGE0']."</p>";}
}
// On ferme notre session cURL.
curl_close($ch);

	$lead        = "BIENVENUE SUR LA MAQUETTE DE RESERVATION";
	$tagline     = "Ici vous avez la possibilité de vous inscrire aux évenements.";
	$breadcrumbs = array("Paypal");
	$pageInclude = "paypal/traitementPaypal.php";
?>