<?php 
if (empty($_SESSION['user'])){
    redirection($page = "index.php?route=error404");
}
elseif ($_SESSION['user']['inter_stat_id'] == 3) {
 // Mettre ici tout le corps de la page 
 
include('model/fonctionAdd.php');
    if(isset($_POST['nom']) AND isset($_POST['prenom']) AND isset($_POST['entite']) AND isset($_POST['motdepasse']) AND isset($_POST['motdepasse2']) AND isset($_POST['email']) AND isset($_POST['telephone']) AND isset($_POST['numrue']) AND isset($_POST['rue']) AND(isset($_POST['codepostal']) AND isset($_POST['ville'])))
    {
        $nom              = htmlspecialchars(trim($_POST['nom']));
        $prenom           = htmlspecialchars(trim($_POST['prenom']));
        $entite           = htmlspecialchars(trim($_POST['entite']));
        
        $email            = htmlspecialchars(trim($_POST['email']));
        $email2           = htmlspecialchars(trim($_POST['email2']));
        $telephone        = htmlspecialchars(trim($_POST['telephone']));
        $rue              = htmlspecialchars(trim($_POST['rue']));
        $ville            = htmlspecialchars(trim($_POST['ville']));
        $codepostal       = htmlspecialchars(trim($_POST['codepostal']));

        $rueentite        = htmlspecialchars(trim($_POST['rueentite']));
        $codepostalentite = htmlspecialchars(trim($_POST['codepostalentite']));
        $villeentite      = htmlspecialchars(trim($_POST['villeentite']));
        $vide = "";

        if (htmlspecialchars($_POST["numrue"] < 0) || ($_POST["numrueentite"] < 0))
        {
        $numrue = abs($_POST["numerorue"]);
        $numrueentite = abs($_POST["numrueentite"]);
        }
        else{
        $numrue = ($_POST["numrue"]);
        $numrueentite = ($_POST["numrueentite"]);
        }
       
        if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['rue']) || empty($_POST['ville']) || empty($_POST['codepostal']) || empty($_POST['email']) || empty($_POST['email2']) || empty($_POST['telephone']) || empty($_POST['numrue']))
        {
            //$erreur = "Les champs marqué d'un * sont obligatoire";
             error("Les champs marqué d'un * sont obligatoire"); 
        }
        else
        {

                #[^0-9]#
            if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email))
            {
                if ((strlen($nom) >= 30) || (strlen($prenom) >= 30) || (strlen($rue) >= 30) || (strlen($ville) >= 30))
                {
                    //$erreur = 'Un des champs depasse la limite de 30 charactere';
                    error("Un des champs depasse la limite de 30 caractères"); 
                }
                else
                {
                        if (strlen($verifmdp) < 8)
                        {
                            error("le mot de passe doit contenir au moins 8 caractères!"); 
                        }
                        else
                        {

                            if ($email != $email2)
                            {
                                    //$erreur = 'les emails rentré ne sont pas identique ';
                                error("les emails rentré ne sont pas identique"); 
                            }
                            else
                            {
                                if (preg_match("#^0[1-78]([-. ]?[0-9]{2}){4}$#", ($telephone)))
                                {
                                    $sql = $bdd->prepare('SELECT inter_mail FROM internaute WHERE inter_mail = \''.$email.'\';');
                                    $sql->execute(array('.$email.' => $_POST['email']));
                                    $res = $sql->fetch();

                                    if ($res)
                                    {
                                                //$erreur = "Cet email est déjà utilisé !";
                                        error("Cet email est déjà utilisé !"); 
                                    }
                                    else
                                    {
                                                

                                        if (is_numeric($numrue))
                                        {
                                                        //$erreur = "Saisissez une valeur numérique !";
                                            if (preg_match('#^[0-9]{5}$#',$codepostal))
                                            {               
                                                            
                                                            /*if (preg_match("#[^0-9]#", $nom))*/
                                            $pattern = '#[^0-9]#';
                                            if (preg_match($pattern, $nom) && preg_match($pattern, $prenom) && preg_match($pattern, $ville))
                                            {
                                                                
                                                if (empty($entite) && empty($numrueentite) && empty($rueentite) && empty($codepostalentite) && empty($villeentite))
                                                {   
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
                                                    $mdpbdd  = sha1($mdpmail);

                                                    addAdresse($bdd, $numrue, $rue, $ville, $codepostal);
                                                    $adrid= $bdd->lastInsertId();

                                                                    
                                                                    /*addInternaute($bdd, 1, $nom, $prenom, NULL, $adrid, $pass_hache, $email, $telephone);*/
                                                    addInternaute($bdd, $nom, $prenom, $adrid, $mdpbdd, $email, $telephone);
                                                                    
                                                                    //$succes   = '<strong>Félicitation!</strong> le compte a bien été créé';
                                                    success("<strong>Félicitation!</strong> le compte a bien été créé."); 

                                                        $to       = $email;
                                                        $subject  = 'Inscription centrifugeuse';
                                                        $message  = 'Bonjour ' . $prenom . ' ' . $nom . ', vous etes désormais Administrateur sur la plateforme centrifugeuse de projet! ' . "\r\n";
                                                        $message .= 'Votre login est: '  . $email . ' et votre mot de passe est: ' .  $mdpmail . "\r\n";
                                                        $message .= 'Vous pouvez désormais créer des evenements et les administrer.' . "\r\n";
                                                        $headers  = 'From: projetgestab@centrifugeuse.com' . "\r\n" .
                                                        'Reply-To: webmaster@example.com' . "\r\n" .
                                                        'X-Mailer: PHP/' . phpversion();
                                                        
                                                        mail($to, $subject, $message, $headers);
                                                    
                                                }
                                                else 
                                                {
                                                    if (is_numeric($numrueentite) && is_numeric($codepostalentite))
                                                    {
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
                                                        $mdpbdd  = sha1($mdpmail);


                                                        addAdresse($bdd, $numrue, $rue, $ville, $codepostal);
                                                        $adrid= $bdd->lastInsertId();
                                                                    
                                                        addAdresse($bdd, $numrueentite, $rueentite, $villeentite, $codepostalentite);
                                                        $adride= $bdd->lastInsertId();
                                                                    
                                                        addEntite($bdd, $entite, $adride);
                                                        $entiteid= $bdd->lastInsertId();
                                                                    
                                                        addInternautee($bdd, $nom, $prenom, $entiteid, $adrid, $mdpbdd, $email, $telephone);
                                                                    //$succes   = '<strong>Félicitation!</strong> le compte a bien été créé avec votre entité.';
                                                        success("<strong>Félicitation!</strong> le compte a bien été créé avec votre entité."); 

                                                        $to       = $email;
                                                        $subject  = 'Inscription centrifugeuse';
                                                        $message  = 'Bonjour ' . $prenom . ' ' . $nom . ', vous etes désormais Administrateur sur la plateforme centrifugeuse de projet! ' . "\r\n";
                                                        $message .= 'Votre login est: '  . $email . ' et votre mot de passe est: ' .  $mdpmail . "\r\n";
                                                        $message .= 'Vous pouvez désormais créer des evenements et les administrer.' . "\r\n";
                                                        $headers  = 'From: projetgestab@centrifugeuse.com' . "\r\n" .
                                                        'Reply-To: webmaster@example.com' . "\r\n" .
                                                        'X-Mailer: PHP/' . phpversion();
                                                        
                                                        mail($to, $subject, $message, $headers);
                                                    



                                                    }
                                                    else
                                                    {
                                                        error("Le numero de la rue et/ou le code postal doit etre de type numerique pour entité !"); 
                                                    }
                                                }

                                                            
                                            }   
                                            else
                                            {
                                                error("Le nom et/ou prenom et/ou ville doivent etre de type caractères");
                                            }
                                            }
                                            else
                                            {
                                                error("Le code postal n'est pas valide !"); 
                                            }                        
                                        }
                                        else
                                        { 
                                            error("Le numero de la rue doit etre de type numerique !"); 
                                        }

                                    }

                                }
                                else
                                {
                                            //$erreur = "Merci d'écrire un numero de telephone français ou valide";
                                    error("Merci d'écrire un numero de telephone français ou valide");
                                }   
                            } 

                        }

                    

                }

            }
            else
            {
                //$erreur = "Merci d'écrire une adresse email valide !";
                error("Merci d'écrire une adresse email valide !"); 
            }

        }

    }

   $lead        = "Créer un nouvel Administrateur";
   $tagline     = "L'administrateur peut créer et modifier des évènements";
   $breadcrumbs = array("Créer un nouvel Administrateur");
   $pageInclude = "compte/newAdmin.php";
}
else{
 
redirection($page = "index.php?");
}
?>

