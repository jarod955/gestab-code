<?php
	
$mail = $_POST['email'];
var_dump($mail);

						function mdpRein($bdd, $email)
						  {
						    $query = "SELECT *
						              FROM internaute
						              WHERE inter_mail = :inter_mail";
						    $sth = $bdd->prepare($query);
						    $sth->bindValue(':inter_mail', $email, PDO::PARAM_STR);
						    $sth->execute();

						    return $sth->fetch(PDO::FETCH_ASSOC);
						  }
						  $internaute = mdpRein($bdd, $mail);
						  
						  $inter = $internaute['inter_id'];
						  $nom = $internaute['inter_nom'];
						  $prenom = $internaute['inter_prenom'];

						
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

						var_dump($mdpmail);
						var_dump($mdpbdd);
						

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
						
    
                        $to      = $mail;
                        $subject = 'le sujet';
                        $message = 'Bonjour ' . $nom . '' . $prenom . ', votre nouveau mot de passe est : ' . $mdpmail . '! ';
                        $headers = 'From: projetgestab@centrifugeuse.com' . "\r\n" .
                        'Reply-To: postmaster@humansurfer.com' . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();
                                                 
                        mail($to, $subject, $message, $headers);

						redirection($page = "index.php?route=connexion");

  $lead        = "test";
  $breadcrumbs = array("Motdepasse");
  $pageInclude = "compte/reinitialisationMdp.php";
?>