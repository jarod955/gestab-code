<?php
$interid = ($_GET['idinter']);
						
						function getStatut($bdd, $id)
						  {
						    $query = "SELECT inter_stat_id
						              FROM internaute
						              WHERE inter_id = :inter_id";
						    $sth = $bdd->prepare($query);
						    $sth->bindValue(':inter_id', $id, PDO::PARAM_INT);
						    $sth->execute();

						    return $sth->fetch(PDO::FETCH_ASSOC);
						  }
						$statut =   getStatut($bdd, $interid);
						$statu = $statut['inter_stat_id'];
						
						if($statu == 3)
    					{
      					error("Vous ne pouvez pas supprimer un compte superadmin.");
    					}
    					else
    					{
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
						}
				
	$lead        = "BIENVENUE SUR LA MAQUETTE DE RESERVATION";
	$tagline     = "Ici vous avez la possibilité de creer vos codes promotionnels.";
	$breadcrumbs = array("suppr");
	$pageInclude = "promo/supprCode.php";
?>