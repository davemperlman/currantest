<?php require_once 'utilities/header.php'; ?>
	<?php 
		$id = $_SESSION['id'][0]['id'];
		$user = Classes\Data::get("SELECT name FROM Employees WHERE id = '$id'");
		$cal = new Classes\Calendar();
		echo $cal->show();
	 ?>
	 <div class="banner">
	 	<h1>United Piping & Welding</h1>
	 	<ul>
	 		<p>
	 			Hello, <?php echo $user[0]['name']; ?>
	 		</p>
	 		<li id="date">
	 			<?php echo date('Y-m-d'); ?>
	 		</li>
	 	</ul>
	 </div>
	 <div id="modalOverlay">
		<div id="modal">

		</div>
	</div>
	 <section id="jobs">
	
	</section>
	 <script src="_js/calFunction.js"></script>
	 <script>
	 	var today = $('#date').text().trim();
	 	var pre = '#li-';
	 	var both = pre + today;
	 	var day = $(both);

	 	day.addClass('activeDay');
	 </script>
<?php require_once 'utilities/footer.php'; ?>