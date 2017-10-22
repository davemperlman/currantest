<?php 
session_start();
require_once '../autoload.php';
$id = $_SESSION['id'][0]['id'];
$admin = Classes\Data::get("SELECT admin FROM Employees WHERE id = '$id'");
$jobs = Classes\Data::get("SELECT * FROM Jobs WHERE complete = 0");
if ( $admin[0]['admin'] != 1 && $id == true ) {
	header('location:../home.php');
}elseif($id == false) {
	header('location:../index.php');
}
 ?>
 <!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" href="../_css/calendar.css">
		<link rel="stylesheet" href="../_css/main.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>	
	</head>
	<body>
		<h1>Admin</h1>
	<ul id="adminNav">
		<li data-source='createJob.php'>Create Job</li>
		<li data-source='createWorkOrder.php'>Create Work Order</li>
		<li data-source='search.php'>Search</li>
		<li data-source='employees.php'>Employees</li>
		<li>Inventory</li>
	</ul>
	<hr>
	<section id="action">
		
	</section>

	<hr>

	<section id="current">
		<h1>Current Jobs</h1>
		<?php foreach ($jobs as $job): ?>
			<div class="jobWrap">
				<table class="job">
					<tr>
						<td>
							<?php echo $job['customerAddress']; ?>
						</td>
						<td>
							<?php echo $job['customerFirst'] . ' ' . $job['customerLast']; ?>
						</td>
						<td>
							<?php echo $job['created']; ?>
						</td>
						<td>
							<button>Complete</button>
						</td>
						<td>
							<button>Edit</button>
						</td>
					</tr>
				</table>
				<div class="orders">
					<?php $joborders = Classes\Data::get("SELECT * FROM WorkOrders INNER JOIN Employees ON employee_id = Employees.id WHERE job_id = '$job[id]'"); ?>
					<?php foreach ($joborders as $order): ?>
						<ul>
							<li>
								<?php echo $order['name']; ?>
							</li>
							<li>
								<?php echo $order['date'] ?>
							</li>
							<li>
								<?php echo $order['time']; ?>
							</li>
							<li>
								<?php echo $order['description']; ?>
							</li>
							<li>
								<button>Edit</button>
							</li>
						</ul>
					<?php endforeach ?>
				</div>
			</div>
		<?php endforeach ?>
	</section>
	<script>
		$('#adminNav li').on('click', function(){
			$('#adminNav li').removeClass('active');
			$(this).addClass('active');
			var source = $(this).attr('data-source');
			$.get('adminUtilities/' + source, function(data){
				$('#action').empty();
				$('#action').append(data);
			});
		});
		$('.job').on('click', function(){
			$('.orders').removeClass('open');
			$(this).next().addClass('open');
		});
	</script>


<?php require_once '../utilities/footer.php'; ?>