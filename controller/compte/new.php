<?php

include('model/adresse.php');
include('model/entite.php');
include('model/internaute.php');

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
        error("Les champs marqué d'un * sont obligatoire");
    }
    else
    {
        if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email))
        {
            if ((strlen($nom) >= 30) || (strlen($prenom) >= 30) || (strlen($rue) >= 30) || (strlen($ville) >= 30) || (strlen($email) >= 30))
            {
                error("Un des champs depasse la limite de 30 characteres");
            }
            else
            {
                if ($pass_hache != $pass_hache2)
                {
                    error("le mot de passe et le mot de passe de confirmation ne correspondent pas!");
                }
                else
                {
                    if ($email != $email2)
                    {
                        error("les emails rentré ne sont pas identique");
                    }
                    else
                    {
                        if (preg_match("#^0[1-78]([-. ]?[0-9]{2}){4}$#", ($telephone)))
                        {
                            $res = searchInternaute($bdd, $_POST['email']);

                            if ($res)
                            {
                                error("Cet email est déjà utilisé !");
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
                                            $adrid  = addAdresse($bdd, $numrue, $rue, $ville, $codepostal);
                                            $entite = null;
                                            if (!empty($entite) || (!empty($numrueentite) || (!empty($rueentite) || (!empty($codepostalentite) || (!empty($villeentite))))))
                                            {
                                                $adride = addAdresse($bdd, $numrueentite, $rueentite, $villeentite, $codepostalentite);
                                                $entite = addEntite($bdd, $entite, $adride);
                                            }
                                            addInternaute($bdd, $nom, $prenom, $entite, $adrid, $pass_hache, $email, $telephone, 2);

                                            if (is_null($entite))
                                                success("<strong>Félicitation!</strong> le compte a bien été créé.");
                                            else
                                                success("<strong>Félicitation!</strong> le compte a bien été créé avec votre entité.");
                                        }

                                    }
                                    else
                                    {
                                        error("Merci d'écrire un numero de telephone français ou valide");
                                    }
                                }
                            }
                        }
                    }
                    else
                    {
                       error("Merci d'écrire une adresse email valide !");
                   }

        // }
        // else
        // {
        //     $erreur = "Merci d'écrire un numrue/codepostal valide !";
        // }
               }
           }

   $lead        = "Créer un nouvel Administrateur";
   $breadcrumbs = array("Créer un nouvel Administrateur");
   $pageInclude = "compte/newAdmin.php";
?>