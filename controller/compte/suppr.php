<?php
$interid = ($_GET['idinter']);

			
						function suppressionUtilisateur($bdd, $id_inter)
						{
						$query = "UPDATE internaute
						SET inter_datsup = NOW()
						WHERE inter_id = :id";
						$sth = $bdd->prepare($query);
					    $sth->bindValue(':id', $id_inter, PDO::PARAM_INT);
					    $sth->execute();

					    return $sth->fetch(PDO::FETCH_ASSOC);
		  				}




						suppressionUtilisateur($bdd, $interid);

						redirection($page = "index.php?route=gestionUtilisateurs");
					
				
	$lead        = "BIENVENUE SUR LA MAQUETTE DE RESERVATION";
	$tagline     = "Ici vous avez la possibilité de creer vos codes promotionnels.";
	$breadcrumbs = array("suppr");
	$pageInclude = "promo/supprCode.php";
?>