<?php
$test = ($_GET['idcode']);

			
						function updateCodePromo($bdd, $id_code)
						{
						$query = "UPDATE codepromo
						SET code_datsup = NOW()
						WHERE code_id = :id";
						$sth = $bdd->prepare($query);
					    $sth->bindValue(':id', $id_code, PDO::PARAM_INT);
					    $sth->execute();

					    return $sth->fetch(PDO::FETCH_ASSOC);
		  				}
						updateCodePromo($bdd, $test);

						redirection($page = "index.php?route=codePromo");
					
				
	$lead        = "BIENVENUE SUR LA MAQUETTE DE RESERVATION";
	$tagline     = "Ici vous avez la possibilité de creer vos codes promotionnels.";
	$breadcrumbs = array("supr");
	$pageInclude = "promo/suprCode.php";
?>