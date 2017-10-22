<?php require_once '../../autoload.php';	
	$method = $_POST['method'];
	$name = $_POST['search'];
	$results = Classes\Data::get("SELECT * FROM Jobs WHERE customerFirst LIKE '%$name%' OR customerLast LIKE '%$name%' LIMIT 5");
	$results
?>
<ul>
	<?php foreach ($results as $key => $value): ?>
		<li class="searchResult" data-id='<?php echo $value['id']; ?>'><?php echo $value['customerFirst'] . ' ' . $value['customerLast']; ?></li>
	<?php endforeach ?>
</ul>

<script>
	$('.searchResult').on('click', function(){
		console.log(this.value);
	})
</script>
