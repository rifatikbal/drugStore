<?php
	session_start();
	require_once('db.php');
	if(isset($_SESSION['user'])){
		$user = $_SESSION['user'];
		$qr = mysqli_query($con, "SELECT * FROM login WHERE username = '$user';");
		$row = mysqli_fetch_array($qr);
		$name = $row['full_name'];
	}
	else{
		header('Location: index.php');
	}

	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}

	$qr = mysqli_query($con, "SELECT * FROM item WHERE id = '$id'");
	$row = mysqli_fetch_array($qr);
	$group_name = $row['group_name'];
	$q2 = mysqli_query($con, "SELECT * FROM recommend WHERE group_name = '$group_name' AND username = '$user'");
	if(mysqli_num_rows($q2)>0){

	}
	else{
		$ins_query = mysqli_query($con, "INSERT INTO `recommend` (`id`, `username`, `group_name`, `flag`) VALUES (NULL, '$user', '$group_name', '1')");
	}

	if(isset($_POST['submit'])){
		$phone = $_POST['number'];
		$transaction = $_POST['transaction'];
		//$file = $_FILES['prescription']['name'];
    	//$file_tmp = $_FILES['prescription']['tmp_name'];
		$qr = mysqli_query($con, "INSERT INTO `ordered` (`id`, `CustomerID`, `CustomerName`, `product_id`, `phonenumber`, `transaction_id`, `prescription`) VALUES (NULL, '$user', '$name', '$id', '$phone', '$transaction', '')");
		if($qr){
	  		$msg = "Order Successfull.";	
	  	}
	    else{
	      
	       $msg = "Something Went Wrong, Please Try Again.";
	    }
		
	}

	if(isset($_POST['submit1'])){
		
		$phone = $_POST['number1'];
		echo $phone;
		$transaction = $_POST['transaction1'];
		$file = $_FILES['prescription']['name'];
    	$file_tmp = $_FILES['prescription']['tmp_name'];
    	$pid = $id;
		$qr = mysqli_query($con, "INSERT INTO `ordered` (`id`, `CustomerID`, `CustomerName`, `product_id`, `phonenumber`, `transaction_id`, `prescription`) VALUES (NULL, '$user', '$name', '$pid', '$phone', '$transaction', '$file');");		

		if(!empty($file)){
		  	if(move_uploaded_file($file_tmp, "prescription/$file") && $qr){
		  		$msg = "Order Successfull.";	
		  	}
		    else{
		      
		       $msg = "Something Went Wrong, Please Try Again.";
		    }
	   	}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Drug Store</title>
	<link rel="icon" href="logo2.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script src="js/bal.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
</head>
<body>
<div style="width: 87%; margin: 0px auto;" class="row">
	<div class="col-md-9">
		<img src="logo1.png" width="250">
	</div>
	<div class="col-md-3">
		<div class="button-group" style="margin-left: 70px;">
			<?php
				if(!isset($user)){


			?>
			<a href="login.php"><button class="btn btn-success" style="">Log in</button></a>
			<a href="register.php"><button class="btn btn-success" style="">Sign Up</button></a>
			<?php
				}
				else{
					$qr = mysqli_query($con, "SELECT * FROM login WHERE username = '$user'");
					$row = mysqli_fetch_array($qr);
					$fullname = $row['full_name'];
				?>
				<button class="btn btn-success" style="">Hi, <?php echo $fullname;?></button>
				<?php
				}
			?>
		</div>
		
	</div>
</div>
<div style="width: 84%; margin: 0 auto;background: #66A620; border-radius: 50px; padding: 1px 30px;">
	<div class="topnav" id="myTopnav">
	  <a href="index.php" class="active" style="color: #66A620;">Home</a>
	  <a href="items.php">All Medicines</a>
	  <a href="contact_us.php">Contact us</a>
	  
	  <a href="#about">About</a>
	  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
	</div>
</div>
	<div style="width: 80%; margin: 20px auto;" class="row">
		<div class="row">
			<div class="col-md-6" style="background: white; padding: 10px 20px;border-radius: 10px;box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);">
				<?php
					$qr = mysqli_query($con, "SELECT * FROM item WHERE id = '$id'");
						$row = mysqli_fetch_array($qr);
						$id = $row['id'];
						$name = $row['name'];
						$g_name = $row['group_name'];
						$description = $row['description'];
						
						$price = $row['price'];
						$image = $row['image'];
						$sensitiveOrNot = $row['sensitiveOrNot'];
					
				?>
				<div class="" style="margin-top: 20px; margin-bottom: 20px;">
					<?php
						if($sensitiveOrNot==1){
					?>
					<div style="width: 100%; border-radius: 5px; background: red; margin-top:-20px; padding: 1px;">
						<h6 style="color:white; text-align: center;">Sensitive Category, you need to provide prescription to purchase</h6>
					</div>
					<?php
						}
					?>
					<h4 style="color: green;"><?php echo $name;?></h4>
					<h5  style="color: #7f7f7f;"><?php echo $g_name;?></h5>
					
					<img src="items/<?php echo $image; ?>" width="230">
					<h6><?php echo $description;?></h6>
					
					<h3 style="color: #7f7f7f; font-weight: bold;"><?php echo $price;?>/-</h3>
					
				</div>
				<?php
					
				?>
			
			</div>
			<div class="col-md-1"></div>
			<div class="col-md-5" style="background: white; padding: 10px 20px;border-radius: 10px;box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);">
				<h4 style="color: #7f7f7f;">At first Send money to our BKash number:01767806571, then proceed with the form</h4>
				<br>
				<?php
					if(isset($msg)){
						echo $msg;
					}
				?>
				<?php
					if($sensitiveOrNot==0){


				?>
				<form method="post" action="" enctype="multipart/form-data">
					<h5>Mobile:</h5>
					<input type="text" class="form-control"  name="mobile" placeholder="Enter your mobile number">
					<h5>Address:</h5>
					<input type="text" class="form-control"  name="address" placeholder="Enter your address">
					<h5>Bkash number:</h5>
					<input type="text"  class="form-control" name="number" placeholder="Enter Bkash number">
					<br>
					<h5>Transaction ID:</h5>
					<input type="text"  class="form-control" name="transaction" placeholder="Enter TransactionID">
					<br>
					<button type="submit" name="submit" class="btn btn-success">Place Order</button>
				</form>
				<?php
					}
					else{
				?>
				<form method="post" action="" enctype="multipart/form-data">
					<h5>Mobile:</h5>
					<input type="text" class="form-control"  name="mobile1" placeholder="Enter your mobile number">
					<h5>Address:</h5>
					<input type="text" class="form-control"  name="address1" placeholder="Enter your address">
					<h5>Bkash number:</h5>
					<input type="text"  class="form-control" name="number1" placeholder="Enter Bkash number">
					<h5>Prescription:</h5>
					<input type="file"  class="form-control" name="prescription">
					<br>
					<h5>Transaction ID:</h5>
					<input type="text"  class="form-control" name="transaction1" placeholder="Enter TransactionID">
					<br>
					<button type="submit" name="submit1" class="btn btn-success">Place Order</button>
				</form>
				<?php
					}
				?>
			</div>
		</div>
	</div>
	<br>
	<div style="width: 100%; background:#335E2E; padding: 10px;">
		<h6 style="color: white; font-style: italic; font-weight: bold; text-align: center;">Copyright &copy; All Rights Reserved by Drug Store</h6>
	</div>

<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>
</body>
</html>