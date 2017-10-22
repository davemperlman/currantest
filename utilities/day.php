<?php 
	require_once 'header.php'; 
	$info = Classes\Data::get("SELECT * FROM WorkOrders INNER JOIN Jobs ON WorkOrders.job_id = Jobs.id INNER JOIN Employees ON employee_id = Employees.id WHERE date = '$_GET[date]'");
?>	
<?php foreach ($info as $order): ?>
	<table class="dayJob" style="border-collapse: collapse;">
		<tr class="completeForm" style="background-color: #<?php echo "$order[color]"; ?>">
			<td><?php echo $order['customerAddress']; ?></td>
			<td><?php echo $order['customerPhone']; ?></td>
			<td>
				<button class="jobComplete" <?php if ($_SESSION['id'][0]['id'] != $order['employee_id']) {
					echo "disabled";
				} ?>>End Job</button>
			</td>
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
		</ul>
	</div>
<?php endforeach ?>

<script>
	$('.jobComplete').on('click', function(){
		var x = $(this).parents().next('.details');
		console.log(x);
		$.get( 'utilities/workOrder.php', function(data){
			x.append("<div class='modal'>" + data + "</div>");
		});
	});
	$('.dayJob').on('click', function(){
		$('.details').slideUp('slow');
		$(this).next('.details').slideToggle('slow');
	});
</script>



