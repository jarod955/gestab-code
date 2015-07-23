<?php
  $routes  = array(
    array(
      "name"       => "listEvenement",
      "controller" => "evenement",
      "action"     => "list",
    ),
    array(
      "name"       => "listadminEvenement",
      "controller" => "evenement",
      "action"     => "listadmin",
    ),
    array(
      "name"       => "showEvenement",
      "controller" => "evenement",
      "action"     => "show",
    ),
    array(
      "name"       => "newEvenement",
      "controller" => "evenement",
      "action"     => "new",
    ),
    array(
      "name"       => "achatEvenement",
      "controller" => "evenement",
      "action"     => "achat",
    ),
    array(
      "name"       => "modifierEvenement",
      "controller" => "evenement",
      "action"     => "modifier",
    ),
    array(
      "name"       => "connexion",
      "controller" => "connexion",
      "action"     => "connexion",
    ),
    array(
      "name"       => "deconnexion",
      "controller" => "connexion",
      "action"     => "deconnexion",
    ),
    array(
      "name"       => "inscription",
      "controller" => "connexion",
      "action"     => "inscription",
    ),
    array(
      "name"       => "profil",
      "controller" => "compte",
      "action"     => "profil",
    ),
    array(
      "name"       => "newAdmin",
      "controller" => "compte",
      "action"     => "new",
    ),
    array(
      "name"       => "gestionUtilisateurs",
      "controller" => "compte",
      "action"     => "gestion",
    ),
    array(
      "name"       => "supprUtilisateurs",
      "controller" => "compte",
      "action"     => "suppr",
    ),
    array(
      "name"       => "supprUtilisateursMdp",
      "controller" => "compte",
      "action"     => "supprmdp",
    ),
    array(
      "name"       => "listFacture",
      "controller" => "facture",
      "action"     => "list",
    ),
    array(
      "name"       => "404",
      "controller" => "error",
      "action"     => "404",
    ),
    array(
      "name"       => "pdfFacture",
      "controller" => "pdf",
      "action"     => "pdf",
    ),
    array(
      "name"       => "achatCodePromo",
      "controller" => "codePromot",
      "action"     => "achat",
    ),
    array(
      "name"       => "codePromo",
      "controller" => "promo",
      "action"     => "code",
    ),
    array(
      "name"       => "traitementPaypal",
      "controller" => "paypal",
      "action"     => "traitement",
    ),
    array(
      "name"       => "supprCode",
      "controller" => "promo",
      "action"     => "suppr",
    ),
    array(
      "name"       => "createMail",
      "controller" => "mail",
      "action"     => "create",
   ),
);
?>