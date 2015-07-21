<?php

include('model/categorie.php');
include('model/facture.php');
include('model/codePromot.php');
include("model/paypal.php");
$lead             = "BIENVENUE SUR LA MAQUETTE DE RESERVATION";
$tagline          = "Ici vous avez la possibilité de vous inscrire aux évenements.";
$evenement        = showEvenement($bdd, $id);
$categories       = listByEvenement($bdd, $evenement['ev_id']);
$breadcrumbs      = array("Billeterie");
$pageInclude      = "evenement/achatEvenement.php";
$datetimEvenement = new DateTime($evenement['ev_date']);

if (!empty($_POST['code']))
{

  $codepromovalide = getCodePromot($bdd, $_POST["code"], $_POST["evenementid"]);
  
  if($codepromovalide['code_datsup'] != null)
  {
      error('Le code promo nest plus valide');
  }
  else{
    
    if (!$codepromovalide)
      {
        error('Code promo incorrect');
      }
      else
      {
        $codepromo = $codepromovalide['code_id'];
        $tauxreduc = $codepromovalide['code_taux_reduc'];
        $somme = $tauxreduc / 100;

      }
    }
    
}

foreach ($categories as $categorie)
{

  if(!empty($_POST['cat_'.$categorie['cat_id']]))
  {
    
    $categorieid  = $_POST['cat_'.$categorie['cat_id']];
    

    $evenementid  = $_POST["evenementid"];
    $internauteid = $_POST["internauteid"];
    
    

      if (isset($_POST['achat']))
      {
        if(!empty($_POST["codepromoid"])){
        $catprix = $_POST["newprix"];
        $codepromoid = $_POST["codepromoid"];
        
        }
        else{
        $catprix      = $categorie['cat_prix'];
        }
        $catprix = number_format($catprix ,1);

        $achatinfos = array (
        'catid' => $categorieid,
        'catprix' => $catprix,
        'evid' => $evenementid,
        'intid' => $internauteid,
        'codeid' => $codepromoid);

        $_SESSION['achat'] = $achatinfos;
        


$requete = construit_url_paypal();
$requete = $requete."&METHOD=SetExpressCheckout".
      "&CANCELURL=".urlencode("http://localhost/gestab-code/index.php?route=listEvenement").
      "&RETURNURL=".urlencode("http://localhost/gestab-code/index.php?route=traitementPaypal"."&amt=".$_SESSION['achat']['catprix']."&catid=".$_SESSION['achat']['catid']."&evid=".$_SESSION['achat']['evid']."&intid=".$_SESSION['achat']['intid']."&codeid=".$_SESSION['achat']['codeid']).
      "&AMT=".$_SESSION['achat']['catprix'].
      "&CURRENCYCODE=EUR".
      "&DESC=".urlencode("Test thibaud.)").
      "&LOCALECODE=FR".
      "&HDRIMG=".urlencode("http://www.siteduzero.com/Templates/images/designs/2/logo_sdz_fr.png");

$ch = curl_init($requete);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$resultat_paypal = curl_exec($ch);

if (!$resultat_paypal)
  {echo "<p>Erreur</p><p>".curl_error($ch)."</p>";}
else
{
  $liste_param_paypal = recup_param_paypal($resultat_paypal); // Lance notre fonction qui dispatche le résultat obtenu en un array

  // Si la requête a été traitée avec succès
  if ($liste_param_paypal['ACK'] == 'Success')
  {
    // Redirige le visiteur sur le site de PayPal
    header("Location: https://www.sandbox.paypal.com/webscr&cmd=_express-checkout&useraction=commit&token=".$liste_param_paypal['TOKEN']);
                exit();
  }
  else // En cas d'échec, affiche la première erreur trouvée.
  {echo "<p>Erreur de communication avec le serveur PayPal.<br />".$liste_param_paypal['L_SHORTMESSAGE0']."<br />".$liste_param_paypal['L_LONGMESSAGE0']."</p>";}   
}
curl_close($ch);

      }

    
  }
}




?>