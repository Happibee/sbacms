<?php
  session_start();
  include_once 'managerheader.php';
  include_once '../config/database.php';
  include_once '../classes/employee.php';
  include_once '../classes/service.php';

  if(!isset($_SESSION['employeeId'])){
    header('Location: ../employee/employeelogin.php');
  }
?>
<div class="addserv">
  <div class="container">
  <h1 class="display-4"><center>Add a Service</center></h1>
  </div>
</div>

<form method="POST" action="managerserviceadd.php">
<div class="container col-sm-7">
	<div class="row">
		<div class="col-sm-4">
			<label>Service Name</label>
			<input type="text" class="form-control" name="firstName">
		</div>
		<div class="col-sm-4">
			<label>Price</label>
			<input type="text" class="form-control" name="lastName">
		</div>
		<div class="col-sm-4">
			<label>Average Time</label>
			<input type="text" class="form-control" name="userName">
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<label>Service Description</label>
			<input type="email" class="form-control" name="address">
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			
		</div>
		<div class='col-md-4'>
			
		</div>
		<div class='col-md-4'>
			<center>
				<br>
				<button type="submit" class="btn btn-info">Save</button>
				<a href="managerservice.php" class="btn btn-danger">Cancel</a>
			</center>
		</div>
	</div>
</div>
</form>



<style>
  .addserv{
    /*background-color: #606060;*/
    background-color: #ff5ead;
    padding: 30px;
    color: white;
  }
</style>