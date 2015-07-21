<?php
  /*
    Faire une redirection sans passer par les headers qui bug avec la session start.
    Cette fonction prend en argument le chemin pour la redirection.
  */
  function redirection($page = "index.php")
  {
    echo '<script language="javascript">';
      echo 'document.location.href="'.$page.'";';
    echo '</script>';
  }

  function success($message)
  {
    $_SESSION['success'][] = $message;
  }

  function error($message)
  {
    $_SESSION['errors'][] = $message;
  }

  function displayMenu($base, $menus, $name = "main")
  {
    if (isset($menus[$name]))
    {
      foreach($menus[$name] as $lien)
      {
        //Partie pour l'url (les variables en get)
        if (isset($lien['route']))
          $url = $base.'index.php?route='.$lien['route'];
        else
          $url = $base.'index.php';

        $check = false;
        if (isset($lien['condition']))
        {
          if ($lien['condition'])
            $check = true;
        }
        else
          $check = true;

        if ($check)
        {
          echo '<li>';
            echo '<a href="'.$url.'">';
              echo $lien['libelle'];
            echo '</a>';
          echo '</li>';
        }
      }
    }
    else
    {
      throw new Exception("Le menu:".$name." n'existe pas.", 1);
    }
  }
?>