<?php
	session_start();
	require_once('db.php');
	if(isset($_SESSION['admin'])){
		$user = $_SESSION['admin'];
	}
	else{
		header('Location: login.php');
	}
	if(isset($_POST['submit'])){
    
    	$medicine_name = $_POST['medicine_name'];
    	$group_name = $_POST['group_name'];
    	$description = mysqli_real_escape_string($con,$_POST['description']);
    	$price = $_POST['price'];
    	$file = $_FILES['medicine_image']['name'];
    	$file_tmp = $_FILES['medicine_image']['tmp_name'];
		$sensitive = $_POST['sensitive'];
   		
   		$q1= "INSERT INTO `item` (`id`, `name`, `group_name`, `description`, `price`, `image`, `sensitiveOrNot`) VALUES (NULL, '$medicine_name', '$group_name', '$description', '$price', '$file','$sensitive');";
    	
    	$r1 = mysqli_query($con,$q1);
    
    	if(!empty($file)){
      	if(move_uploaded_file($file_tmp, "items/$file") && $r1){
      		$msg = "File Uploaded.";	
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
	<title>Admin</title>
	<link rel="icon" href="logo2.png">
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-success">
		<div class="container">
		  <a class="navbar-brand" href="#">Admin Panel</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		      
		    </ul>
		    
		      <a href="logout.php"><button class="btn btn-danger my-2 my-sm-0" type="submit">Logout</button></a>
		    
		  </div>
		</div>
	</nav>
	<div style="margin: 35px auto; width: 80%; background: #f9f9f9; border-radius: 15px; padding: 20px 15px; box-shadow: 0 4px 10px rgba(0,0,0,0.15);">
		<h4 style="color: #28A745;">Enter Medicine Data:</h4>
		<img src="logo2" width="40" style="margin-left: 23%; margin-top: -70px;">
		<form method="post" enctype="multipart/form-data">
			<?php if(isset($msg))echo $msg; ?>
			<h5>Medicine Name:</h5>
			<input type="text" name="medicine_name" placeholder="Enter medicine Name" class="form-control">
			<h5>Group Name:</h5>
			<input type="text" name="group_name" placeholder="Enter the group name of this medicine" class="form-control">
			<h5>Description:</h5>
			<input type="text" name="description" placeholder="Enter the description name of this medicine" class="form-control">
			<h5>Price:</h5>
			<input type="number" name="price" class="form-control" placeholder="Enter the price of this medicine">
			<h5>Medicine image:</h5>
			<input type="file" name="medicine_image" class="form-control">
			<h5>Category:</h5>
			<select name="sensitive" class="form-control">
				<option value="0">General</option>
				<option value="1">Sensitive</option>
			</select>
			<br>
			<button type="submit" name="submit" class="form-control btn btn-success">Add medicine to directory</button>
		</form>
	</div>

	<div style="margin: 35px auto; width: 80%; background: #f9f9f9; border-radius: 15px; padding: 20px 15px; box-shadow: 0 4px 10px rgba(0,0,0,0.15);">
		<h4 style="color: #28A745;">Orders:</h4>
		<img src="logo2" width="40" style="margin-left: 23%; margin-top: -70px;">
		<table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Customer Name</th>
                  <th scope="col">Item</th>
                  <th scope="col">Bkash No</th>
                  <th scope="col">Transaction Id</th>
                  <th scope="col">Prescription</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    $qr = mysqli_query($con, "SELECT * FROM ordered;");
                    if(mysqli_num_rows($qr)>0){
                      $ct = mysqli_num_rows($qr);
                      for($i=1;$i<=$ct;$i++){
                        $row = mysqli_fetch_array($qr);
                        $name = $row['CustomerName'];
                        $pid = $row['product_id'];
                        $xx = mysqli_query($con, "SELECT * FROM item WHERE id='$pid'");
                        $rxx = mysqli_fetch_array($xx);
                        $pname = $rxx['name'];
                        $bkash = $row['phonenumber'];
                        $transaction_id = $row['transaction_id'];
                        $Prescription= $row['prescription'];
                    
                ?>
                <tr>
                  <th scope="row"><?php echo $i;?></th>
                  <td><?php echo $name;?></td>
                  <td><?php echo $pname;?></td>
                  <td><?php echo $bkash;?></td>
                  <td><?php echo $transaction_id;?></td>
                  <?php
                  	if(!empty($Prescription)){
                  ?>
                  	<td><a href="prescription/<?php echo $Prescription;?>">Show Prescription</a></td>
                  <?php
              		}
                  ?>
                </tr>
                <?php
                      }
                    }
                ?>
              </tbody>
            </table>
	</div>
</body>
</html>