<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<title>
		Crud PHP
	</title>
</head>
<body>
	<?php
	if(isset($message)){ ?>

		<div class="alert alert-success">
			<?php echo "message" ?>
			<?php unset($message) ?>
		</div>
	<?php
	}
	?>
	<div class="container">
		<div class="text-center"><h1><strong>Enter your product</strong></h1></div>
	</div>
	<form action="" method="POST" enctype="multipart/form-data">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<label for="name">Name</label>
					<input type="text" name="name" class="form-control" placeholder="Enter name of the product" required="">
				</div>
			
				<div class="col-lg-3">
					<label for="price">Price</label>
					<input type="number" name="price" class="form-control" placeholder="Enter price of the product" min="0" required="">
				</div>
				<div class="col-lg-3">
					<label for="validity">Expiry Date</label>
					<input type="date" name="validity" class="form-control" placeholder="Enter the Expiry Date" required="">
				</div>
			</div>
			<br>

			<div class="row">
				<div class="col-lg-6">
					<label for="description">Product Description</label>
					<textarea class="form-control" name="description" cols="50" rows="6" required=""></textarea>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-lg-3">
					<label for="location">Location of Seller</label>
					<input type="text" name="location" class="form-control" placeholder="Location of Seller" required="">
				</div>

				<div class="col-lg-3">
					<label for="phone">Phone Number</label>
					<input type="text" name="phone" class="form-control" placeholder="Phone Number of the Seller"  required="">
				</div>

				<div class="col-lg-3">
					<label for="warranty">Warranty(years)</label>
					<input type="number" name="warranty" class="form-control" placeholder="Enter the Warranty in years" min="0" required="">
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
include 'db.php';
$db = new  db_connect;
$message = '';

if(isset($_POST['save'])){
	$name = $_POST['name'];
	$hash = md5($_POST['name']).''.time();
	$price = $_POST['price'];
	$validity = $_POST['validity'];
	$description = $_POST['description'];
	$location = $_POST['location'];
	$phone = $_POST['phone'];
	$warranty = $_POST['warranty'];

	$stmt = $db->create_product('product',$name,$hash,$price,$validity,$description,$location,$phone,$warranty);
	//var_dump($stmt);
	if($stmt){ ?>
		<div class="container">
			<div class="col-lg-4">
				<div class="text-center">
					<div class="alert alert-success">
						Your data was saved successfully.
					</div>
				</div>
			</div>
		</div>
		<?php
	}else{ ?>
		<div class="container">
			<div class="col-lg-4">
				<div class="text-center">
					<div class="alert alert-danger">
						Error occured in saving your data
					</div>
				</div>
			</div>
		</div>
	<?php
	}
 }

 ?>

</body>
</html>
