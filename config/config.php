<?php
  try
  {
    $bdd = new PDO($driver.':host='.$host.';dbname='.$bddname, $user, $pass, array (PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"));
  }
  catch (Exception $e)
  {
    die('Erreur : ' . $e->getMessage());
  }
?>