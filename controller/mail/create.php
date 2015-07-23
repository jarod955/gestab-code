<?php


$lead             = "BIENVENUE SUR LA MAQUETTE DE RESERVATION";
$tagline          = "Ici vous avez la possibilité de vous inscrire aux évenements.";
$breadcrumbs      = array("mail");
$pageInclude      = "mail/createMail.php";
?>

<?php
// TEST FONCTION MAIL() PHP
// CREEZ UNE FICHIER email.php

// *** A configurer
$to = "thomas.jomeau@gmail.com";  
$from  = "postmaster@humansurfer.com";  

// *** Laisser tel quel
$jour  = date("d-m-Y");
$heure = date("H:i");

$sujet = "Essai Mail - $jour $heure";

$contenu = "";
$contenu .= "<html> \n";
$contenu .= "<head> \n";
$contenu .= "<title> TEST </title> \n";
$contenu .= "</head> \n";
$contenu .= "<body> \n";
$contenu .= "Mail au format HTML simple avec la fonction PHP mail().<br> <b>$sujet </b> <br> \n";
$contenu .= "</body> \n";	
$contenu .= "</HTML> \n";

$headers  = "MIME-Version: 1.0 \n";
$headers .= "Content-Transfer-Encoding: 8bit \n";
$headers .= "Content-type: text/html; charset=utf-8 \n";
$headers .= "From: $from  \n";
// $headers .= "Disposition-Notification-To: $from  \n"; // accuse de reception
var_dump($to, $sujet, $contenu, $headers);
exit;

$verif_envoi_mail = TRUE;

$verif_envoi_mail = @mail ($to, $sujet, $contenu, $headers);
 
if ($verif_envoi_mail === FALSE) echo " ### Verification Envoi du Mail=$verif_envoi_mail - Erreur envoi mail <br> \n";
else echo " *** Verification Envoi du Mail=$verif_envoi_mail - Mail envoy&eacute; avec succ&egrave;s de $to vers $from <br> avec comme sujet: $sujet \n"; 
?>
