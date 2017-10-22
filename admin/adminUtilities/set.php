<?php 
require_once '../../autoload.php'; 

	switch ($_POST['type']) {
		case 'job':
			Classes\Data::set("INSERT INTO Jobs (customerFirst, customerLast, customerAddress, customerPhone, customerEmail, description, created, complete) VALUES ('$_POST[customerFirst]', '$_POST[customerLast]', '$_POST[customerAddress]', '$_POST[customerPhone]', '$_POST[customerEmail]', '$_POST[description]', CURDATE(), 0)");
			break;

		case 'workOrder': 
			Classes\Data::set("INSERT INTO WorkOrders (employee_id, job_id, date, time) VALUES ('$_POST[employeeId]', '$_POST[jobId]', '$_POST[date]', '$_POST[time]')");
			break;
	}
