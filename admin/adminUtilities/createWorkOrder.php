<?php require_once '../../utilities/header.php'; ?>
<?php 
	$employees = Classes\Data::get('SELECT * FROM Employees');
	$jobs = Classes\Data::get("SELECT * FROM Jobs WHERE complete = 0");
 ?>
<form id="workOrderForm" action="">
	<label >
		Employee:
		<select name="" id="employee">
			<?php foreach ($employees as $employee): ?>
				<option value="<?php echo $employee['id'] ?>">
					<?php echo $employee['name']; ?>
				</option>
			<?php endforeach ?>
		</select>
	</label>
	<label>
		Job:
		<select name="" id="job">
			<?php foreach ($jobs as $job): ?>
				<option value="<?php echo $job['id']; ?>">
					<?php echo $job['customerAddress']; ?>
				</option>
			<?php endforeach ?>
		</select>
	</label>
	<label>
		Date:
		<input id="date" type="date">
	</label>
	<label>
		Time:
		<input id="time" type="time">
	</label>
	<button type="submit">Create</button>
</form>
<script>
	$('#workOrderForm button').on('click', function(e){
		e.preventDefault();
		var type = 'workOrder';
		var employeeId = $('#employee').val();
		var jobId      = $('#job').val();
		var date       = $('#date').val();
		var time       = $('#time').val();
		$.post( 'adminUtilities/set.php', { 
				type:       type,
				employeeId: employeeId,
				jobId:      jobId,
				date:       date,
				time:       time
			}, function(data){
				console.log(data);
			});
	});
</script>
