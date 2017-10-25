<?php 
	require_once 'header.php'; 
	$info = Classes\Data::get("SELECT * FROM WorkOrders INNER JOIN Jobs ON WorkOrders.job_id = Jobs.id INNER JOIN Employees ON employee_id = Employees.id WHERE date = '$_GET[date]'");
?>	
<?php foreach ($info as $order): ?>
	<table class="dayJob" style="border-collapse: collapse;">
		<tr class="completeForm" style="background-color: #<?php echo "$order[color]"; ?>">
			<td><?php echo $order['customerAddress']; ?></td>
			<td><?php echo $order['customerPhone']; ?></td>
			<td><?php echo $order['customerFirst'] . ' ' . $order['customerLast']; ?></td>
		</tr>
	</table>
	<div class="details">
		<ul>
			<li>
				<strong>Customer:</strong> 
				<p><?php echo $order['customerFirst'] . ' ' . $order['customerLast']; ?></p>
			</li>
			<li>
				<strong>Description:</strong> 
				<p><?php echo $order['description']; ?></p>
			</li>
			<button class="jobComplete" <?php if ($_SESSION['id'][0]['id'] != $order['employee_id']) {
					echo "disabled";
				} ?>>End Job</button>
		</ul>
	</div>
<?php endforeach ?>

<script>
	$('.jobComplete').on('click', function(){
		$.get( 'utilities/workOrder.php', function(data){
			$('.completeOrder').empty();
			$('.completeOrder').addClass('inView');
			$('.completeOrder').append(data);
		});
	});
	$('.dayJob').on('click', function(){
		$(this).next('.details').slideToggle('slow');
	});
</script>



