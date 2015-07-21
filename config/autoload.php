<?php
  if (session_status() == PHP_SESSION_NONE)
    session_start();
  include('param.php');
	if (isset($dev) && $dev)
	{
		error_reporting(E_ALL);
		ini_set("display_errors", 1);
	}
  date_default_timezone_set($timezone_identifier);
  include('function.php');
  include('config.php');
  include('routes.php');
  include('router.php');
  include('menu.php');
?>