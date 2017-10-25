<?php
session_start();
date_default_timezone_set('America/New_York');
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= '/clients/curran_test/autoload.php';
require_once $path;
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" href="_css/calendar.css">
		<link rel="stylesheet" href="_css/main.css">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
		<script src="<?php echo "/clients/curran_test/_js/jq.js"; ?>" ></script>	
	</head>
	<body>