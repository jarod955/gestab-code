<?php
	
$mail = $_POST['email'];

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

						  $caracteres = array("a", "b", "c", "d", "e", "f", 0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
                         $caracteres_aleatoires = array_rand($caracteres, 8);
                         $new_mdp = "";
                          
                         foreach($caracteres_aleatoires as $i)
                         {
                              $new_mdp .= $caracteres[$i];
                         }
                         
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

						suppressionMdp($bdd, $inter);
						
						ini_set("SMTP", "smtp.humansurfer.com");
                        ini_set("sendmail_from", "postmaster@humansurfer.com");
    
                        $to      = $email;
                        $subject = 'le sujet';
                        $message = 'Bonjour ' . $nom . '' . $prenom . ', bienvenue sur la centrifugeuse de projet! ';
                        $headers = 'From: projetgestab@centrifugeuse.com' . "\r\n" .
                                                     'Reply-To: postmaster@humansurfer.com' . "\r\n" .
                                                     'X-Mailer: PHP/' . phpversion();
                                                 
                                                     mail($to, $subject, $message, $headers);

						

  $lead        = "test";
  $breadcrumbs = array("Motdepasse");
  $pageInclude = "compte/reinitialisationMdp.php";
?>