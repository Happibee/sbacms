<?php
	session_start();
	include "adminheader.php";

	if(!isset($_SESSION['employeeId'])){
    header('Location: ../employee/employeelogin.php');
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

<form method="POST" action="editaccount.php">
<div class="container col-sm-7">
	<div class="row">
		<div class="col-sm-6">
			<label>First Name</label>
			<input type="text" class="form-control" name="firstName">
		</div>
		<div class="col-sm-6">
			<label>Last Name</label>
			<input type="text" class="form-control" name="lastName">
		
		</div>
	</div>
	<div class="row">
		<div class="col-sm-4">
			<label>User Name</label>
			<input type="text" class="form-control" name="userName">
		</div>
		<div class="col-sm-4">
			<label>Email Address</label>
			<input type="email" class="form-control" name="emailAdd">
		</div>
		<div class="col-sm-4">
			<label>Contact Number</label>
			<input type="email" class="form-control" name="contactNumber">
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<label>Address</label>
			<input type="email" class="form-control" name="address">
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">

		</div>
		<div class="col-md-4">
			
		</div>
		<div class="col-md-4">
			<center>
				<br>
				<button type="submit" class="btn btn-info">Save</button>
				<a href="adminhome.php" class="btn btn-danger">Cancel</a>
			</center>
		</div>
	</div>
</div>
</form>