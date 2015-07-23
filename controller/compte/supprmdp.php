<?php
$interid = ($_GET['idinter']);



			
						function suppressionMdp($bdd, $id_inter)
						{
						$mdp = sha1('Gestab2015');
						var_dump($mdp);
						$query = "UPDATE internaute
						SET inter_user_pass = :mdp
						WHERE inter_id = :id";
						$sth = $bdd->prepare($query);
						$sth->bindValue(':mdp', $mdp, PDO::PARAM_STR);
					    $sth->bindValue(':id', $id_inter, PDO::PARAM_INT);
					    $sth->execute();

					    return $sth->fetch(PDO::FETCH_ASSOC);
		  				}




						suppressionMdp($bdd, $interid);

						redirection($page = "index.php?route=gestionUtilisateurs");
					
				
	$lead        = "BIENVENUE SUR LA MAQUETTE DE RESERVATION";
	$tagline     = "Ici vous avez la possibilité de creer vos codes promotionnels.";
	$breadcrumbs = array("suppr");
	$pageInclude = "promo/supprCode.php";
?>