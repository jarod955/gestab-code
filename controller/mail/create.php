<?php


$lead             = "BIENVENUE SUR LA MAQUETTE DE RESERVATION";
$tagline          = "Ici vous avez la possibilité de vous inscrire aux évenements.";
$breadcrumbs      = array("mail");
$pageInclude      = "mail/createMail.php";
?>

<?php

 //----------------------------------------------- 
 //DECLARE LES VARIABLES 
 //----------------------------------------------- 

 $destinataire='thomas.jomeau@gmail.com';
 $email_expediteur='admin@gestab.fr'; 
 $email_reply='admin@gestab.fr';

 $message_texte='Bonjour,'."\n\n".'Voici un message au format texte'; 
 $message_html='<html> 
 <head> 
 <t>Titre</title> 
 </head> 
 <body>Test de message</body> 
 </html>'; 
  //----------------------------------------------- 
  //GENERE LA FRONTIERE DU MAIL ENTRE TEXTE ET HTML 
  //----------------------------------------------- 

 $frontiere = '-----=' . md5(uniqid(mt_rand())); 

  //----------------------------------------------- 
  //HEADERS DU MAIL 
  //----------------------------------------------- 
  $headers = 'From: "Nom" <'.$email_expediteur.'>'."\n"; 
  $headers .= 'Return-Path: <'.$email_reply.'>'."\n"; 
  $headers .= 'MIME-Version: 1.0'."\n"; 
  $headers .= 'Content-Type: multipart/alternative; boundary="'.$frontiere.'"'; 

 //----------------------------------------------- 
 //MESSAGE TEXTE 
 //----------------------------------------------- 
 $message  = 'This is a multi-part message in MIME format.'."\n\n"; 
 $message .= '--'.$frontiere."\n"; 
 $message .= 'Content-Type: text/plain; charset="iso-8859-1"'."\n"; 
 $message .= 'Content-Transfer-Encoding: 8bit'."\n\n"; 
 $message .= $message_texte."\n\n"; 
 //----------------------------------------------- 
 //MESSAGE HTML 
 //----------------------------------------------- 
 $message .= '--'.$frontiere."\n";
 $message .= 'Content-Type: text/html; charset="iso-8859-1"'."\n"; 
 $message .= 'Content-Transfer-Encoding: 8bit'."\n\n"; 
 $message .= $message_html."\n\n"; 

 $message .= '--'.$frontiere."\n"; 

     if(mail($destinataire,$sujet,$message,$headers)) 
     { 
          echo 'Le mail a été envoyé'; 
     } 
     else 
     { 
          echo 'Le mail n\'a pu être envoyé'; 
     } 
?>







<!-- $verif_envoi_mail = TRUE;

$verif_envoi_mail = @mail ($to, $sujet, $contenu, $headers);
 
if ($verif_envoi_mail === FALSE) echo " ### Verification Envoi du Mail=$verif_envoi_mail - Erreur envoi mail <br> \n";
else echo " *** Verification Envoi du Mail=$verif_envoi_mail - Mail envoy&eacute; avec succ&egrave;s de $to vers $from <br> avec comme sujet: $sujet \n"; 
?> -->
