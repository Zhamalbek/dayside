<?php
session_start();

  require_once('controllers/db_connection.php');

  if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action     = $_GET['action'];
  } else {
    $controller = 'pages';
    $action     = 'home';
  }
  

	$page = '';
	$pages_count = '';
  require_once('views/layout.php');
?>