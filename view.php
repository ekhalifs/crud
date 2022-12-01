<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
	<title></title>
</head>
<body>
	<?php
	include 'db.php';
	$db = new db_connect;
	$user = $_GET['user'];
	$product = $db->selectAProduct('product',$user);
	$message = '';

	if(isset($_POST['save'])){
		$price = $_POST['price'];
		$validity = $_POST['validity'];
		$description = $_POST['description'];
		$location = $_POST['location'];
		$phone = $_POST['phone'];
		$warranty = $_POST['warranty'];


		$stmt =  $db->UpdateAProduct('product',$price,$validity,$description,$location,$phone,$warranty,$user);
		var_dump($stmt);
		if($stmt) {?>
			<div class="container">
				<div class="alert alert-success">
					<div class="text-center">
						$message = "Data was saved successfully";
					</div>	
				</div>
				
			</div>
			<?php

			header('location:update.php');
		}else{
			echo 'Data was not updated';
		}


		}
	?>
	<div class="container">
		<div class="text-center"><h1><strong>Update your product</strong></h1></div>
	</div>
	<form action="" method="POST" enctype="multipart/form-data">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<label for="name">Name</label>
					<input type="text" name="name" class="form-control" placeholder="<?php echo $product['name']; ?>" readonly>
				</div>
			
				<div class="col-lg-3">
					<label for="price">Price</label>
					<input type="number" name="price" class="form-control" placeholder="<?php echo $product['price']?>" min="0" >
				</div>
				<div class="col-lg-3">
					<label for="validity">Expiry Date</label>
					<input type="date" name="validity" class="form-control" >
				</div>
			</div>
			<br>

			<div class="row">
				<div class="col-lg-6">
					<label for="description">Product Description</label>
					<textarea class="form-control" name="description" cols="50" rows="6" required=""><?php echo $product['description']?></textarea>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-lg-3">
					<label for="location">Location of Seller</label>
					<input type="text" name="location" class="form-control" placeholder="<?php echo $product['location']?>" >
				</div>

				<div class="col-lg-3">
					<label for="phone">Phone Number</label>
					<input type="text" name="phone" class="form-control" placeholder="<?php echo $product['phone']?>"  >
				</div>

				<div class="col-lg-3">
					<label for="warranty">Warranty(years)</label>
					<input type="number" name="warranty" class="form-control" placeholder="<?php echo $product['warranty']?>" min="0" >
				</div>
				
			</div>
			<br>
			<div class="text-center">
				<button type="submit" class="btn btn-primary" name="save">Save</button>
				<button type="reset" class="btn btn-danger">Reset</button>
			</div>
		</div>
	</form>
	<?php
	if(isset($message)){
			echo $message;
			unset($message);
		}
	?>

</body>
</html>
