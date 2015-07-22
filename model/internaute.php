<?php
function addInternaute($bdd, $nom, $prenom, $entiteid, $adrid, $pass_hache, $email, $telephone, $status)
{
  $query = "INSERT INTO internaute(inter_stat_id, inter_nom, inter_prenom, inter_entite_id, adresse_adr_id, inter_user_pass, inter_mail, inter_telephone)
            VALUES(:id, :nom, :prenom, :entiteid, :adrid, :pass_hache, :email, :telephone)";
  $sth = $bdd->prepare($query);
  $sth->bindValue(':id', $status, PDO::PARAM_INT);
  $sth->bindValue(':nom', $nom, PDO::PARAM_STR);
  $sth->bindValue(':prenom', $prenom, PDO::PARAM_STR);
  $sth->bindValue(':entiteid', $entiteid, PDO::PARAM_INT);
  $sth->bindValue(':adrid', $adrid, PDO::PARAM_INT);
  $sth->bindValue(':pass_hache', $pass_hache, PDO::PARAM_STR);
  $sth->bindValue(':email', $email, PDO::PARAM_STR);
  $sth->bindValue(':telephone', $telephone, PDO::PARAM_INT);
  $sth->execute();
}
function getInternaute($bdd, $id)
{
  $query = "SELECT *
            FROM internaute
            WHERE inter_id = :id";
  $sth = $bdd->prepare($query);
  $sth->bindValue(':id', $id, PDO::PARAM_STR);
  $sth->execute();

  return $sth->fetch(PDO::FETCH_ASSOC);
}
function intEvenement($bdd, $id_ev)
{
  $query = "SELECT inter_nom, inter_prenom, inter_mail
            FROM facture, internaute
            WHERE fac_inter_id = inter_id
            AND fac_ev_id = ?";

    $sth   = $bdd->prepare($query);
    $sth->execute(array($id_ev));

    return $sth->fetchAll(PDO::FETCH_ASSOC);
}
function searchInternaute($bdd, $email, $motdepasse)
{
  $query = "SELECT *
            FROM internaute
            WHERE inter_mail = :email
            AND inter_user_pass = :motdepasse";
  $sth = $bdd->prepare($query);
  $sth->bindValue(':email', $email, PDO::PARAM_STR);
  $sth->bindValue(':motdepasse', sha1($motdepasse), PDO::PARAM_STR);
  $sth->execute();

  return $sth->fetch(PDO::FETCH_ASSOC);
}

function updateInternautemdp($bdd, $id, $nom, $prenom, $email, $telephone, $mdp)
{
  $query = "UPDATE internaute
            SET inter_nom = :nom, inter_prenom = :prenom, inter_mail = :email, inter_datmaj = NOW(), inter_telephone = :telephone, inter_user_pass = :mdp
            WHERE inter_id = :id";
  $sth = $bdd->prepare($query);
  $sth->bindValue(':id', $id, PDO::PARAM_INT);
  $sth->bindValue(':nom', $nom, PDO::PARAM_STR);
  $sth->bindValue(':prenom', $prenom, PDO::PARAM_STR);
  $sth->bindValue(':email', $email, PDO::PARAM_STR);
  $sth->bindValue(':telephone', $telephone, PDO::PARAM_INT);
  $sth->bindValue(':mdp', $mdp, PDO::PARAM_STR);
  $sth->execute();
}
function updateInternaute($bdd, $id, $nom, $prenom, $email, $telephone)
{
  $query = "UPDATE internaute
            SET inter_nom = :nom, inter_prenom = :prenom, inter_mail = :email, inter_datmaj = NOW(), inter_telephone = :telephone
            WHERE inter_id = :id";
  $sth = $bdd->prepare($query);
  $sth->bindValue(':id', $id, PDO::PARAM_INT);
  $sth->bindValue(':nom', $nom, PDO::PARAM_STR);
  $sth->bindValue(':prenom', $prenom, PDO::PARAM_STR);
  $sth->bindValue(':email', $email, PDO::PARAM_STR);
  $sth->bindValue(':telephone', $telephone, PDO::PARAM_INT);
  $sth->execute();
}

?>