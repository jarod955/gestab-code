<?php 
if (empty($_SESSION['user'])){
	redirection($page = "index.php?route=error404");
}
elseif ($_SESSION['user']['inter_stat_id'] == 1 or 2 or 3) {
 // Mettre ici tout le corps de la page 
$interid = ($_GET['idinter']);

						function getMail($bdd, $id)
						  {
						    $query = "SELECT inter_mail
						              FROM internaute
						              WHERE inter_id = :inter_id";
						    $sth = $bdd->prepare($query);
						    $sth->bindValue(':inter_id', $id, PDO::PARAM_INT);
						    $sth->execute();

						    return $sth->fetch(PDO::FETCH_ASSOC);
						  }
						 $mail =  getMail($bdd, $interid);
						 $email = $mail['inter_mail'];
						 
						function suppressionMdp($bdd, $id_inter)
						{
						$mdp = sha1('Gestab2015');
						
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
						
						$to      = $email;
                        $subject = 'le sujet';
                        $message = 'Bonjour, votre nouveau mot de passe est: Gestab2015, merci de le changer a votre prochaine connexion.';
                        $headers = 'From: projetgestab@centrifugeuse.com' . "\r\n" .
                        'Reply-To: webmaster@example.com' . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();
                                                        
                        mail($to, $subject, $message, $headers);

						redirection($page = "index.php?route=gestionUtilisateurs");
					
				
	$lead        = "BIENVENUE SUR LA MAQUETTE DE RESERVATION";
	$tagline     = "Ici vous avez la possibilité de creer vos codes promotionnels.";
	$breadcrumbs = array("suppr");
	$pageInclude = "compte/reiniCompte.php";
}
else{
 
redirection($page = "index.php?");
}
?>
