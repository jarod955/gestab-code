<?php 
if (empty($_SESSION['user'])){
	redirection($page = "index.php?route=error404");
}

elseif ($_SESSION['user']['statut'] == 2 or 3) {
 // Mettre ici tout le corps de la page 

$codeid = ($_GET['idcode']);

			
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
						updateCodePromo($bdd, $codeid);

						redirection($page = "index.php?route=codePromo");
					
				
	$lead        = "BIENVENUE SUR LA MAQUETTE DE RESERVATION";
	$tagline     = "Ici vous avez la possibilité de creer vos codes promotionnels.";
	$breadcrumbs = array("suppr");
	$pageInclude = "promo/supprCode.php";

}
else{
 
redirection($page = "index.php?");
}
?>
