<?php 
	require_once 'header.php';
	if ( Classes\Data::get("SELECT id FROM Employees WHERE username = '$_POST[username]' AND password = '$_POST[password]' AND admin = 1") ) {
		session_start();
		$_SESSION['id'] = Classes\Data::get("SELECT id FROM Employees WHERE username = '$_POST[username]' AND password = '$_POST[password]'");
		$_SESSION['admin'] == true;
		header('location: ../admin');
	}elseif ( Classes\Data::get("SELECT id FROM Employees WHERE username = '$_POST[username]' AND password = '$_POST[password]' AND admin = 0") ) {
		session_start();
		$_SESSION['id'] = Classes\Data::get("SELECT id FROM Employees WHERE username = '$_POST[username]' AND password = '$_POST[password]'");
		header('location: ../home.php');
	}else {
		header('location: ../');
	}