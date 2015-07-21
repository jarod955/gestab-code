<?php
  function addAdresse($bdd, $numrue, $rue, $ville, $codepostal)
  {
    $query = "INSERT INTO adresse(adr_num_rue, adr_rue, adr_ville, adr_code_postal)
              VALUES(:numrue, :rue, :ville, :codepostal)";
    $sth = $bdd->prepare($query);
    $sth->bindValue(':numrue', $numrue, PDO::PARAM_INT);
    $sth->bindValue(':rue', $rue, PDO::PARAM_STR);
    $sth->bindValue(':ville', $ville, PDO::PARAM_STR);
    $sth->bindValue(':codepostal', $codepostal, PDO::PARAM_STR);
    $sth->execute();

    return $bdd->lastInsertId();
  }

  function getAdresse($bdd, $id)
  {
    $query = "SELECT *
              FROM adresse
              WHERE adr_id = :adr_id";
    $sth = $bdd->prepare($query);
    $sth->bindValue(':adr_id', $id, PDO::PARAM_INT);
    $sth->execute();

    return $sth->fetch(PDO::FETCH_ASSOC);
  }

  function updateAdresse($bdd, $id, $rue, $adr, $vil, $cp)
  {
    $query = "UPDATE adresse
              SET adr_num_rue = :rue, adr_rue = :adr, adr_ville = :vil, adr_code_postal = :cp
              WHERE adr_id = :id";
    $sth = $bdd->prepare($query);
    $sth->bindValue(':rue', $rue, PDO::PARAM_STR);
    $sth->bindValue(':adr', $adr, PDO::PARAM_STR);
    $sth->bindValue(':vil', $vil, PDO::PARAM_STR);
    $sth->bindValue(':cp', $cp, PDO::PARAM_STR);
    $sth->bindValue(':id', $id, PDO::PARAM_INT);
    $sth->execute();
  }
?>