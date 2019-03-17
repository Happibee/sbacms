<?php
	session_start();
	include "../includes/tempo/header.php";
	include_once "../../classes/customer.php";

	if(!isset($_SESSION['custId'])){
    	header('Location: login.php');
	  }
	  
	$database = new Database();
  	$db = $database->getConnection();

  	$customer = new Customer($db);
  	$customer->readOneCustomer();

  	if(isset($_POST['update'])){
  		$customer->firstName = $_POST['firstName'];
  		$customer->lastName = $_POST['lastName'];
  		$customer->userName = $_POST['userName'];
  		$customer->emailAdd = $_POST['emailAdd'];
  		$customer->contactNo = $_POST['contactNo'];
  		$customer->address = $_POST['address'];

  		if ($customer->updateCustomer()){
  			//echo "Updated";
			header("Location: account.php");
		}
		else{
			echo "Unsuccessful";
	  	}
  	}
?>
<div class="accdet">
	<div class="container">
		<center><h1 class="display-4">Account Details</h1></center>
	</div>
</div>
<style>
	.accdet{
		background-color: #ededed;
		padding: 20px;
	}
</style>

<form method="POST" action="editaccount.php">
<div class="container col-sm-7">
	<div class="row">
		<div class="col-sm-6">
			<label>First Name</label>
			<input type="text" class="form-control" name="firstName" value = "<?php echo $customer->firstName; ?>">
		</div>
		<div class="col-sm-6">
			<label>Last Name</label>
			<input type="text" class="form-control" name="lastName" value = "<?php echo $customer->lastName;?>">
		
		</div>
	</div>
	<div class="row">
		<div class="col-sm-4">
			<label>User Name</label>
			<input type="text" class="form-control" name="userName" value = "<?php echo $customer->userName;?>">
		</div>
		<div class="col-sm-4">
			<label>Email Address</label>
			<input type="email" class="form-control" name="emailAdd" value = "<?php echo $customer->emailAdd;?>">
		</div>
		<div class="col-sm-4">
			<label>Contact Number</label>
			<input type="text" class="form-control" name="contactNo" value = "<?php echo $customer->contactNo;?>">
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<label>Address</label>
			<input type="text" class="form-control" name="address" value = "<?php echo $customer->address;?>">
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
		</div>
		<div class="col-md-4">
			<center>
				<br>
				<a href='changepw.php' class="btn btn-primary">Change Password</a>
			</center>
		</div>
		<div class="col-md-4">
			<center>
				<br>
				<button type="submit" class="btn btn-info" name='update'>Update Account</button>
				<a href="account.php" class="btn btn-danger">Cancel</a>
			</center>
		</div>
	</div>
</div>
</form>