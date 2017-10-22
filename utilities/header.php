<?php
session_start();
date_default_timezone_set('America/New_York');
require_once $_SERVER['DOCUMENT_ROOT'] . '/clients/curran_test/autoload.php';
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>	
	</head>
	<body>