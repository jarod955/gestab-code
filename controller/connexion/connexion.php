<?php
include('model/adresse.php');
include('model/entite.php');
include('model/internaute.php');

if(isset($_POST['email']) AND isset($_POST['motdepasse']))
{
  $email      = $_POST['email'];
  $motdepasse = $_POST['motdepasse'];

	if (!empty($email) && !empty($motdepasse))
  {
		$internaute = searchInternaute($bdd, $email, $motdepasse);

		if (!$internaute)
		{
		  error('Mauvais identifiant ou mot de passe !');
		}
    elseif ($internaute['inter_datsup'] != null)
    {
      error('Votre compte a été supprimé !');
    }
		else
		{
      //Pour avoir l'adresse de l'internaute
      $internaute['adresse'] = getAdresse($bdd, $internaute['inter_adr_id']);

      //Pour avoir lentite
      $internaute['entite'] = getEntite($bdd, $internaute['inter_entite_id']);

      //Pour avoir l'adresse de lentite
      if ($internaute['entite'] != false)
        $internaute['entite']['adresse'] = getAdresse($bdd, $internaute['entite']['entite_id']);

      unset($internaute['adresse_adr_id'], $internaute['inter_entite_id']);

		 	success('Vous êtes connecté, Vous allez être redirigé');
      $_SESSION['user'] = $internaute;
      redirection('index.php?page=profil');
    }
  }
	else
	{
    error('Merci de remplir les champs');
	}
}
$lead        = "BIENVENUE SUR LA MAQUETTE DE RESERVATION";
$tagline     = "Ici vous avez la possibilité de vous inscrire aux évenements.";
$breadcrumbs = array("Connexion");
// $evenements  = listModel($bdd);
$pageInclude = "connexion/connexion.php";
?>