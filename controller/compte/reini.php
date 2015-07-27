<?php 
if (empty($_SESSION['user'])){
	redirection($page = "index.php?route=error404");
}
elseif ($_SESSION['user']['inter_stat_id'] == 3) {
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
						 
						function chaine_aleatoire($nb_car, $chaine = 'azertyuiopqsdfghjklmwxcvbn123456789')
						{
						    $nb_lettres = strlen($chaine) - 1;
						    $generation = '';
						    for($i=0; $i < $nb_car; $i++)
						    {
						        $pos = mt_rand(0, $nb_lettres);
						        $car = $chaine[$pos];
						        $generation .= $car;
						    }
						    return $generation;
						}

						$mdpmail = chaine_aleatoire(8);
						$mdpbdd	 = sha1($mdpmail);
						

						function suppressionMdp($bdd, $id_inter, $mdp)
						{
						$query = "UPDATE internaute
						SET inter_user_pass = :mdp
						WHERE inter_id = :id";
						$sth = $bdd->prepare($query);
						$sth->bindValue(':mdp', $mdp, PDO::PARAM_STR);
					    $sth->bindValue(':id', $id_inter, PDO::PARAM_INT);
					    $sth->execute();

					    return $sth->fetch(PDO::FETCH_ASSOC);
		  				}

						suppressionMdp($bdd, $inter, $mdpbdd);

						$to      = $email;
                        $subject = 'le sujet';
                        $message = 'Bonjour, votre nouveau mot de passe est: ' . $mdpmail . ', merci de le changer a votre prochaine connexion.';
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
