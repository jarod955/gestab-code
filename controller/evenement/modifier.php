<?php
//include le model des categories
include('model/categorie.php');
//inclure le model des factures
include('model/facture.php');
//informations de l'evenement
include('model/internaute.php');

include('model/adresse.php');
if (isset($_SESSION['user']))
{
	if(isset($_POST['modifier']))
  	
  	{
  	  $evid = $_POST['evid'];
      $lieuid = $_POST['lieuid'];
  	  $adrid = $_POST['adrid'];

  	  $libelle = $_POST['libelle'];
      $nomsalle = $_POST['nom_salle'];
      $numrue = $_POST['adr_num_rue'];
      $rue = $_POST['adr_rue'];
      $ville = $_POST['adr_ville'];
      $codepostal = $_POST['adr_code_postal'];
      $date1      = $_POST['annee'].'-'.$_POST['mois'].'-'.$_POST['jour'].'-'.$_POST['heure'].'-'.$_POST['minute'];   

      
      

            if(!empty($nomsalle))
            {
            //$erreur = 'le mot de passe et le mot de passe de confirmation ne correspondent pas ';
            updateAdresse($bdd, $adrid, $numrue, $rue, $ville, $codepostal);
            updateLieu($bdd, $lieuid, $nomsalle);
            updateEvenement($bdd, $evid, $libelle, $date1);
            success("<strong>Félicitation!</strong> Le mot de passe a bien été changé .");
            redirection($page = "index.php?route=listadminEvenement");

            }             else 

            {
              //Les modifications dans la bdd
              error("Ca ne fonctionne pas");
              
            }
	}

$evenement   = showEvenement($bdd, $id);
//liste des categories de l'evenement
$categories  = listByEvenement($bdd, $evenement['ev_id']);
//recuperer la facture si elle existe, sinon null
$facture     = getFacture($bdd, $_SESSION['user']['inter_id'], $evenement['ev_id']);

$participants = intEvenement($bdd, $evenement['ev_id']);
//recuperation du nombre de place par categorie
foreach ($categories as $key => $categorie)
  	$categories[$key]['place'] = placesRestantesByCategorie($bdd, $evenement['ev_id'], $categorie['cat_id']);
//formater la date de l'evenement
		$datetimEvenement = new DateTime($evenement['ev_date']);
		$date = date_parse($evenement['ev_date']);
		$day = $date['day'];
		$month = $date['month'];
		$year = $date['year'];
		$hour = $date['hour'];
		$minut = $date['minute'];

	



//pour le file d'ariane
$breadcrumbs      = array("Evenement", "modifier");
//la vue à afficher
$pageInclude      = "evenement/modifierEvenement.php";
}
?>