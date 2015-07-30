<?php
function getInternautes($bdd)
  {
    $query = "SELECT *
              FROM internaute
              GROUP BY inter_id
              ORDER BY inter_stat_id DESC";
    $sth = $bdd->query($query);

  return $sth->fetchAll(PDO::FETCH_ASSOC);
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
function updateInternaute($bdd, $id, $nom, $prenom, $telephone)
{
  $query = "UPDATE internaute
            SET inter_nom = :nom, inter_prenom = :prenom, inter_datmaj = NOW(), inter_telephone = :telephone
            WHERE inter_id = :id";
  $sth = $bdd->prepare($query);
  $sth->bindValue(':id', $id, PDO::PARAM_INT);
  $sth->bindValue(':nom', $nom, PDO::PARAM_STR);
  $sth->bindValue(':prenom', $prenom, PDO::PARAM_STR);
  $sth->bindValue(':telephone', $telephone, PDO::PARAM_INT);
  $sth->execute();
}

?>