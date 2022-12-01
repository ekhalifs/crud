<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
	<meta name="viewport" content="width=device-width initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<title>Crud php</title>
</head>
<body>
	<div class="container">
		<div class="text-center">
			<strong>Check Our Products</strong>
		</div>
		<table class="table table-hover">
		<thead class="table-dark">
			<tr>
				<th>No.</th>
				<th>Name</th>
				<th>Price</th>
				<th>Expiry Date</th>
				<th>Description</th>
				<th>Location</th>
				<th>Phone Number</th>
				<th>Warranty</th>
				<th>Update</th>
				<th>Delete</th>
			</tr>
		</thead>

		<tfoot class="table-dark">
			<tr>
				<th>No.</th>
				<th>Name</th>
				<th>Price</th>
				<th>Expiry Date</th>
				<th>Description</th>
				<th>Location</th>
				<th>Phone Number</th>
				<th>Warranty</th>
				<th>Update</th>
				<th>Delete</th>
			</tr>
		</tfoot>
		<?php
		$count = 1;
		include 'db.php';
		$db =  new db_connect;
		$results =  $db->select_product('product');
		$message = '';
		if(isset($message)){
			echo $message;
			unset($message);
		}
		 foreach($results as $products) { ?>
			<tbody>
				<tr>
					<td><?php echo  $count++ ?></td>
					<td><?php echo $products['name'];?></td>
					<td><?php echo $products['price'];?></td>
					<td><?php echo $products['validity'];?></td>
					<td><?php echo $products['description'];?></td>
					<td><?php echo $products['location'];?></td>
					<td><?php echo $products['phone'];?></td>
					<td><?php echo $products['warranty'];?></td>
					<td><a href="view.php?user=<?php echo $products['hash']?>"><button class="btn btn-primary">Update</button></a></td>
					<td><a href="delete.php?user=<?php echo $products['hash']?>"><button class="btn btn-danger">Delete</button></a></td>
				</tr>
			</tbody>
		
				
			<?php

		}
			?>
		
		
	</table>
		
	</div>

</body>
</html>