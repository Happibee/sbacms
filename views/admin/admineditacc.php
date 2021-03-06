<?php
	session_start();
	include "adminheader.php";

	if(!isset($_SESSION['username']) && !isset($_SESSION['type']) == "Admin"){
    header('Location: ../util/login.php');
	}
	
	$database = new Database();
  	$db = $database->getConnection();

  	$employee = new Employee($db);
  	$employee->readOneAccount();

  	if(isset($_POST['update'])){
  		$employee->firstName = $_POST['firstName'];
  		$employee->lastName = $_POST['lastName'];
  		$employee->userName = $_POST['userName'];
  		$employee->emailAdd = $_POST['emailAdd'];
  		$employee->contactNo = $_POST['contactNo'];
  		$employee->address = $_POST['address'];

  		if ($employee->updateEmployee()){
  			//echo "Updated";
			header("Location: adminaccount.php");
		}
		else{
			echo "Unsuccessful";
	  	}
  	}
?>
<div class="accdet">
	<div class="container">
		<center><h1 class="display-4">Edit Account</h1></center>
	</div>
</div>
<style>
	.accdet{
		background-color: #ededed;
		padding: 20px;
	}
</style>

<form method="POST" action="admineditacc.php">
<div class="container col-sm-7">
	<div class="row">
		<div class="col-sm-6">
			<label>First Name</label>
			<input type="text" class="form-control" name="firstName" value = "<?php echo $employee->firstName; ?>">
		</div>
		<div class="col-sm-6">
			<label>Last Name</label>
			<input type="text" class="form-control" name="lastName" value = "<?php echo $employee->lastName; ?>">
		</div>
	</div>
	<div class="row">
		<div class="col-sm-4">
			<label>User Name</label>
			<input type="text" class="form-control" name="userName" value = "<?php echo $employee->userName; ?>">
		</div>
		<div class="col-sm-4">
			<label>Email Address</label>
			<input type="email" class="form-control" name="emailAdd" value = "<?php echo $employee->emailAdd;?>">
		</div>
		<div class="col-sm-4">
			<label>Contact Number</label>
			<input type="text" class="form-control" name="contactNo" value = "<?php echo $employee->contactNo;?>">
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<label>Address</label>
			<input type="text" class="form-control" name="address" value= "<?php echo $employee->address;?>">
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
				<a href="adminhome.php" class="btn btn-danger">Cancel</a>
			</center>
		</div>
	</div>
</div>
</form>