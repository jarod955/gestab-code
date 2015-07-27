<?php 
if (empty($_SESSION['user'])){
  redirection($page = "index.php?route=error404");
}
elseif ($_SESSION['user']['inter_stat_id'] == 1 or 2 or 3) {
 // Mettre ici tout le corps de la page 
  include('model/categorie.php');
include('model/facture.php');
include('model/codePromot.php');
include("model/paypal.php");
$lead             = "BIENVENUE SUR LA MAQUETTE DE RESERVATION";
$tagline          = "Ici vous avez la possibilité de vous inscrire aux évenements.";
$evenement        = showEvenement($bdd, $id);
$categories       = listByEvenement($bdd, $evenement['ev_id']);
foreach ($categories as $key => $categorie)
  $categories[$key]['place'] = placesRestantesByCategorie($bdd, $evenement['ev_id'], $categorie['cat_id']);
$breadcrumbs      = array("Billeterie");
$pageInclude      = "evenement/achatEvenement.php";
$datetimEvenement = new DateTime($evenement['ev_date']);

if (isset($_POST['categorieid']) && isset($_POST['evenementid']))
{
  $categorieid = $_POST['categorieid'];
  $evenementid = $_POST['evenementid'];
  //si le formulaire a ete envoyé
  if (isset($_POST['send']))
  {
    //recherche la categorie
    $categorie = getCategorie($bdd, $categorieid);

    //si la categorie a ete trouver
    if ($categorie !== false)
    {
      $evenementid = $_POST["evenementid"];
      $codepromoid = null;
      $catprix     = $categorie['cat_prix'];
      if(!empty($_POST["codepromoid"]))
      {
        $codepromoid = $_POST["codepromoid"];
        $codepromo   = getCodePromot($bdd, $codepromoid);
        if ($codepromo !== false)
        {
          if($codepromo['code_datsup'] == null)
          {
            $catprix = $catprix - $catprix * $codepromo['code_taux_reduc'] / 100;
          }
        }
      }
      $achatinfos = array (
        'catid'   => $categorie['cat_id'],
        'catprix' => number_format($catprix ,1),
        'evid'    => $evenementid,
        'intid'   => $_SESSION['user']['inter_id'],
        'codeid'  => $codepromoid
      );

      function selectEvenement($bdd, $id)
      {
        $query = 'SELECT * 
                  FROM internaute, evenement, lieu, adresse 
            WHERE ev_inter_id = inter_id 
            AND ev_lieux_id = lieu_id 
            AND lieu_adr_id = adr_id 
            AND ev_id = ?';
        $sth   = $bdd->prepare($query);
        $sth->execute(array($id));
        return $sth->fetch(PDO::FETCH_ASSOC);
      }
      $ev = selectEvenement($bdd, $evenementid);

      $_SESSION['achat'] = $achatinfos;

      $requete = construit_url_paypal();
      $requete = $requete."&METHOD=SetExpressCheckout".
          "&CANCELURL=".urlencode("http://www.google.fr").
          "&RETURNURL=".urlencode("http://localhost/gestab-code/index.php?route=traitementPaypal"."&amt=".$_SESSION['achat']['catprix']."&catid=".$_SESSION['achat']['catid']."&evid=".$_SESSION['achat']['evid']."&intid=".$_SESSION['achat']['intid']."&codeid=".$_SESSION['achat']['codeid']).
          "&AMT=".$_SESSION['achat']['catprix'].
          "&CURRENCYCODE=EUR".
          "&DESC=".urlencode("". $ev['ev_libelle'] ." ". $ev['ev_date'] ." en salle : ". $ev['lieu_nomSalle'] ." 
            à l'adresse suivante : ". $ev['adr_num_rue'] ." ". $ev['adr_rue'] ." ". $ev['adr_ville'] ." ". $ev['adr_code_postal'] ."").
          "&LOCALECODE=FR".
          "&HDRIMG=".urlencode("http://www.siteduzero.com/Templates/images/designs/2/logo_sdz_fr.png");

      $ch = curl_init($requete);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

      $resultat_paypal = curl_exec($ch);

      if (!$resultat_paypal)
      {
        echo "<p>Erreur</p><p>".curl_error($ch)."</p>";
      }
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
        {
          echo "<p>Erreur de communication avec le serveur PayPal.<br />".$liste_param_paypal['L_SHORTMESSAGE0']."<br />".$liste_param_paypal['L_LONGMESSAGE0']."</p>";
        }
      }
      curl_close($ch);
    }
  }
}

}
else{
 
redirection($page = "index.php?");
}
?>

