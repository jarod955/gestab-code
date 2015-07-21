<?php
/**
  boucle qui permet de transformer les varibles de
  la méthode get en variable générale.
*/
$varAuthorized = array('route', 'id');
foreach ($_GET as $key => $value)
{
  if (in_array($key, $varAuthorized))
    $$key = $value;
}

/**
  Check de la bonne route
*/
if (!isset($route))
  $route = $routes[0];
else
{
  $route = checkRoute($routes, $route);
  if ($route === false)
    $route = checkRoute($routes, "404");
}

/**
  inclusion de la page model si elle existe
*/
$model = "model/".$route['controller'].".php";
if (file_exists($model))
  include($model);

/**
  inclusion du controller de la page demander
*/
$controller = "controller/".$route['controller']."/".$route['action'].".php";
include($controller);

/**
  Si la route est trouver alors il retourne la route,
  sinon il retourne 'false'
*/
function checkRoute($routes, $nameRouteSearch)
{
  foreach ($routes as $route)
  {
    if ($route['name'] == $nameRouteSearch)
      return $route;
  }
  return false;
}
?>