<?php 
	// Validate Session Data
	require_once 'utilities/header.php';
	if ( isset($_SESSION['id']) ) {
	if ( $_SESSION['admin'] == true ) {
		header('location: /admin');
	}else{
		header('location:home.php');
	}
} ?>
		<form id="login" method="post" action="utilities/login.php">
			<fieldset>
				<label>
				username
				<input type="text" name="username" required>
			</label>
			<label>
				password
				<input name="password" type="password" required>
			</label>
			</fieldset>
			<button id="submitLogin" type="submit">Submit</button>
		</form>
<?php require_once 'utilities/footer.php'; ?>