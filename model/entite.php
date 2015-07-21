<?php
  function addEntite($bdd, $nom, $adr_id, $pdta = 1)
  {
    $query = "INSERT INTO entite(entite_nom, entite_pdta, entite_adr_id)
              VALUES(:nom, :pdta, :id)";
    $sth = $bdd->prepare($query);
    $sth->bindValue(':nom', $nom, PDO::PARAM_STR);
    $sth->bindValue(':pdta', $pdta, PDO::PARAM_INT);
    $sth->bindValue(':id', $adr_id, PDO::PARAM_INT);
    $sth->execute();

    return $bdd->lastInsertId();
  }

  function getEntite($bdd, $id)
  {
    $query = "SELECT *
              FROM entite
              WHERE entite_id = :id";
    $sth = $bdd->prepare($query);
    $sth->bindValue(':id', $id, PDO::PARAM_INT);
    $sth->execute();

    return $sth->fetch(PDO::FETCH_ASSOC);
  }
function updateEntite($bdd, $id, $nom)
{
  $query = "UPDATE entite
            SET entite_nom = :nom
            WHERE entite_id = :id";
  $sth = $bdd->prepare($query);
  $sth->bindValue(':id', $id, PDO::PARAM_INT);
  $sth->bindValue(':nom', $nom, PDO::PARAM_STR);
  $sth->execute();
}
?>