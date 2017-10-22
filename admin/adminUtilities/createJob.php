<?php require_once '../../utilities/header.php'; ?>
<form id="jobForm" action="">
	<label>
		Customer First:
		<input id="customerFirst" type="text">
	</label>
	<label>
		Customer Last:
		<input id="customerLast" type="text">
	</label>
	<label>
		Address:
		<input id="customerAddress" type="text">
	</label>
	<label>
		Phone:
		<input id="customerPhone" type="text">
	</label>
	<label>
		Email:
		<input id="customerEmail" type="email">
	</label>
	<label>
		Description:
		<textarea id="description" cols="30" rows="10"></textarea>
	</label>
	<button type="submit">Create</button>
</form>
<script>
	$('#jobForm button').on('click', function(e){
		e.preventDefault();
		var type = 'job';
		var customerFirst = $('#customerFirst').val();
		var customerLast = $('#customerLast').val();
		var customerAddress = $('#customerAddress').val();
		var customerPhone = $('#customerPhone').val();
		var customerEmail = $('#customerEmail').val();
		var description = $('#description').val();
		$.post( 'adminUtilities/set.php', { 
				type:            type,
				customerFirst:   customerFirst,
				customerLast:    customerLast,
				customerAddress: customerAddress,
				customerPhone:   customerPhone,
				customerEmail:   customerEmail,
				description:     description
			}, function(data){
				console.log(data);
			});
	});
</script>