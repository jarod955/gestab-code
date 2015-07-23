<?php
  $menus = array(
    "main" => array(
      array(
        "libelle" => "Accueil",
        "route"   => "listEvenement"
      ),
      array(
        "libelle"   => "Se connecter",
        "route"     => "connexion",
        "condition" => !isset($_SESSION['user']),
      ),
      array(
        "libelle"   => "Se déconnecter",
        "route"     => "deconnexion",
        "condition" => isset($_SESSION['user']),
      ),
      array(
        "libelle"   => "S'inscrire",
        "route"     => "inscription",
        "condition" => !isset($_SESSION['user']),
      ),
    ),
    "profil" => array(
      array(
        "libelle" => "Accueil",
        "route"   => "listEvenement",
        "condition" => isset($_SESSION['user']),
      ),
      array(
        "libelle" => "Mon profil",
        "route"   => "profil",
        "condition" => isset($_SESSION['user']),
      ),
      array(
        "libelle"   => "Creation évènement",
        "route"     => "newEvenement",
        "condition" => isset($_SESSION['user']) && ($_SESSION['user']['inter_stat_id'] == 2 || $_SESSION['user']['inter_stat_id'] == 3),
      ),
      array(
        "libelle"   => "Modifier évènements",
        "route"     => "listadminEvenement",
        "condition" => isset($_SESSION['user']) && ($_SESSION['user']['inter_stat_id'] == 2 || $_SESSION['user']['inter_stat_id'] == 3),
      ),
       array(
        "libelle"   => "Gerer code promo",
        "route"     => "codePromo",
        "condition" => isset($_SESSION['user']) && ($_SESSION['user']['inter_stat_id'] == 2 || $_SESSION['user']['inter_stat_id'] == 3),
      ),
      array(
        "libelle"   => "Factures",
        "route"     => "listFacture",
        "condition" => isset($_SESSION['user']),
      ),
       array(
        "libelle"   => "Créer un Administrateur",
        "route"     => "newAdmin",
        "condition" => isset($_SESSION['user']) && $_SESSION['user']['inter_stat_id'] == 3,
      ),
       array(
        "libelle"   => "Gestion des utilisateurs",
        "route"     => "gestionUtilisateurs",
        "condition" => isset($_SESSION['user']) && $_SESSION['user']['inter_stat_id'] == 3,
      ),
    )
  );
?>