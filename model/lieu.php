<?php 
  function addLieu($bdd, $salle, $lieuid)
  {
    $query = "INSERT INTO lieu(lieu_nomSalle, lieu_adr_id)
              VALUES(:salle, :lieu)";
    $sth = $bdd->prepare($query);
    $sth->bindValue(':salle', $salle, PDO::PARAM_STR);
    $sth->bindValue(':lieu', $lieuid, PDO::PARAM_INT);
    $sth->execute();

    return $bdd->lastInsertId();
  }

 ?>