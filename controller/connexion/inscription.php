<?php
   
    if(isset($_POST['nom']) AND isset($_POST['prenom']) AND isset($_POST['entite']) AND isset($_POST['motdepasse']) AND isset($_POST['motdepasse2']) AND isset($_POST['email']) AND isset($_POST['telephone']) AND isset($_POST['numrue']) AND isset($_POST['rue']) AND(isset($_POST['codepostal']) AND isset($_POST['ville'])))
    {
        $nom              = htmlspecialchars(trim($_POST['nom']));
        $prenom           = htmlspecialchars(trim($_POST['prenom']));
        $entite           = htmlspecialchars(trim($_POST['entite']));
        $pass_hache       = sha1($_POST['motdepasse']);
        $pass_hache2      = sha1($_POST['motdepasse2']);
        $email            = htmlspecialchars(trim($_POST['email']));
        $email2           = htmlspecialchars(trim($_POST['email2']));
        $telephone        = htmlspecialchars(trim($_POST['telephone']));
        $numrue           = htmlspecialchars(trim($_POST['numrue']));
        $rue              = htmlspecialchars(trim($_POST['rue']));
        $codepostal       = htmlspecialchars(trim($_POST['codepostal']));
        $ville            = htmlspecialchars(trim($_POST['ville']));
        

        
        $numrueentite     = htmlspecialchars(trim($_POST['numrueentite']));
        $rueentite        = htmlspecialchars(trim($_POST['rueentite']));
        $codepostalentite = htmlspecialchars(trim($_POST['codepostalentite']));
        $villeentite      = htmlspecialchars(trim($_POST['villeentite']));
        $vide = "";
        
        if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['rue']) || empty($_POST['ville']) || empty($_POST['codepostal']) || empty($_POST['email']) || empty($_POST['email2']) || empty($_POST['telephone']) || empty($_POST['numrue']))
        {
            //$erreur = "Les champs marqué d'un * sont obligatoire";
            ?><?php error("Les champs marqué d'un * sont obligatoire"); ?><?php
        }
            else
            {
                if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email))
                {
                    if ((strlen($nom) >= 30) || (strlen($prenom) >= 30) || (strlen($rue) >= 30) || (strlen($ville) >= 30) || (strlen($email) >= 30))
                    {
                    //$erreur = 'Un des champs depasse la limite de 30 charactere';
                    ?><?php error("Un des champs depasse la limite de 30 characteres"); ?><?php
                    }
                        else
                        {
                            if ($pass_hache != $pass_hache2)
                            {
                            //$erreur = 'le mot de passe et le mot de passe de confirmation ne correspondent pas ';
                                ?><?php error("le mot de passe et le mot de passe de confirmation ne correspondent pas!"); ?><?php
                            }
                                else
                                {
                                    if ($email != $email2)
                                    {
                                    //$erreur = 'les emails rentré ne sont pas identique ';
                                        ?><?php error("les emails rentré ne sont pas identique"); ?><?php
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
                                                    ?><?php error("Cet email est déjà utilisé !"); ?><?php
                                                }
                                                    else
                                                    {
                                                        /*if (!is_numeric($numrue) || (!is_numeric($codepostal)))
                                                        {
                                                        //$erreur = "Saisissez une valeur numérique !";
                                                            ?><?php error("Saisissez une valeur numérique !"); ?><?php
                                                        }
                                                            else
                                                            {
                                        /*  if (is_string($nom) || (is_string($prenom)) || (is_string($ville)) || (is_string($rue)))
                                        {*
                                            $erreur = "Saisissez une chaîne de caractère pour le nom, prenom, ville et la rue.";
                                        }
                                        else
                                        {*/                     
                                                             
                                                                if (!empty($entite) || (!empty($numrueentite) || (!empty($rueentite) || (!empty($codepostalentite) || (!empty($villeentite))))))
                                                                {
                                                                $sth = $bdd->prepare('INSERT INTO adresse(adr_num_rue, adr_rue, adr_ville, adr_code_postal)VALUES(:numrue, :rue, :ville, :codepostal)');
                                                                $sth->bindValue(':numrue', $numrue, PDO::PARAM_INT);
                                                                $sth->bindValue(':rue', $rue, PDO::PARAM_STR);
                                                                $sth->bindValue(':ville', $ville, PDO::PARAM_STR);
                                                                $sth->bindValue(':codepostal', $codepostal, PDO::PARAM_STR);
                                                                $sth->execute();
                                                                $adrid= $bdd->lastInsertId();
                                                                
                                                                $sth = $bdd->prepare('INSERT INTO adresse(adr_num_rue, adr_rue, adr_ville, adr_code_postal)VALUES(:numrue, :rue, :ville, :codepostal)');
                                                                $sth->bindValue(':numrue', $numrueentite, PDO::PARAM_INT);
                                                                $sth->bindValue(':rue', $rueentite, PDO::PARAM_STR);
                                                                $sth->bindValue(':ville', $villeentite, PDO::PARAM_STR);
                                                                $sth->bindValue(':codepostal', $codepostalentite, PDO::PARAM_STR);
                                                                $sth->execute();
                                                                $adride= $bdd->lastInsertId();
                                                                
                                                                $sth = $bdd->prepare('INSERT INTO entite(entite_nom, entite_pdta, entite_adr_id)VALUES(:nom, :pdta, :id)');
                                                                $sth->bindValue(':nom', $entite, PDO::PARAM_STR);
                                                                $sth->bindValue(':pdta', 1, PDO::PARAM_INT);
                                                                $sth->bindValue(':id', $adride, PDO::PARAM_INT);
                                                                $sth->execute();
                                                                $entiteid= $bdd->lastInsertId();
                                                                
                                                                $sth = $bdd->prepare('INSERT INTO internaute(inter_stat_id, inter_nom, inter_prenom, inter_entite_id, adresse_adr_id, inter_user_pass, inter_mail, inter_telephone, inter_datcre)VALUES(:id, :nom, :prenom, :entiteid, :adrid, :pass_hache, :email, :telephone, NOW())');
                                                                $sth->bindValue(':id', 1, PDO::PARAM_INT);
                                                                $sth->bindValue(':nom', $nom, PDO::PARAM_STR);
                                                                $sth->bindValue(':prenom', $prenom, PDO::PARAM_STR);
                                                                $sth->bindValue(':entiteid', $entiteid, PDO::PARAM_INT);
                                                                $sth->bindValue(':adrid', $adrid, PDO::PARAM_INT);
                                                                $sth->bindValue(':pass_hache', $pass_hache, PDO::PARAM_STR);
                                                                $sth->bindValue(':email', $email, PDO::PARAM_STR);
                                                                $sth->bindValue(':telephone', $telephone, PDO::PARAM_INT);
                                                                $sth->execute();
                                                                //$succes   = '<strong>Félicitation!</strong> le compte a bien été créé avec votre entité.';
                                                                ?><?php success("<strong>Félicitation!</strong> le compte a bien été créé avec votre entité."); ?><?php
                                                                }
                                                                else 
                                                                {
                                                                $sth = $bdd->prepare('INSERT INTO adresse(adr_num_rue, adr_rue, adr_ville, adr_code_postal)VALUES(:numrue, :rue, :ville, :codepostal)');
                                                                $sth->bindValue(':numrue', $numrue, PDO::PARAM_INT);
                                                                $sth->bindValue(':rue', $rue, PDO::PARAM_STR);
                                                                $sth->bindValue(':ville', $ville, PDO::PARAM_STR);
                                                                $sth->bindValue(':codepostal', $codepostal, PDO::PARAM_STR);
                                                                $sth->execute();
                                                                $adrid= $bdd->lastInsertId();
                                                                
                                                                $sth = $bdd->prepare('INSERT INTO internaute(inter_stat_id, inter_nom, inter_prenom, inter_entite_id, inter_adr_id, inter_user_pass, inter_mail, inter_telephone, inter_datcre)VALUES(:id, :nom, :prenom, :entiteid, :adrid, :pass_hache, :email, :telephone, NOW())');
                                                                $sth->bindValue(':id', 1, PDO::PARAM_INT);
                                                                $sth->bindValue(':nom', $nom, PDO::PARAM_STR);
                                                                $sth->bindValue(':prenom', $prenom, PDO::PARAM_STR);
                                                                $sth->bindValue(':entiteid', null, PDO::PARAM_INT);
                                                                $sth->bindValue(':adrid', $adrid, PDO::PARAM_INT);
                                                                $sth->bindValue(':pass_hache', $pass_hache, PDO::PARAM_STR);
                                                                $sth->bindValue(':email', $email, PDO::PARAM_STR);
                                                                $sth->bindValue(':telephone', $telephone, PDO::PARAM_INT);
                                                                $sth->execute();
                                                                //$succes   = '<strong>Félicitation!</strong> le compte a bien été créé';
                                                                ?><?php success("<strong>Félicitation!</strong> le compte a bien été créé."); ?><?php
                                                                }
                                                            }
                                                    
                                            }
                                            else
                                            {
                                            //$erreur = "Merci d'écrire un numero de telephone français ou valide";
                                                ?><?php error("Merci d'écrire un numero de telephone français ou valide"); ?><?php
                                            }   
                                        }
                                }
                        }
                }
                else
                {
                //$erreur = "Merci d'écrire une adresse email valide !";
                 ?><?php error("Merci d'écrire une adresse email valide !"); ?><?php
                }

        // }
        // else
        // {
        //     $erreur = "Merci d'écrire un numrue/codepostal valide !";
        // }
            }
    }

	$lead        = "Inscription";
	$breadcrumbs = array("Inscription");
	$pageInclude = "connexion/inscription.php";
?>