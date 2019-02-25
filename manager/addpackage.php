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
<div class="pck">
  <div class="container">
  <h1 class="display-4"><center>Edit Package</center></h1>
  </div>
</div>

<style>
  .pck{
    /*background-color: #606060;*/
    background-color: #ff5ead;
    padding: 30px;
    color: white;
  }
</style>


<form method="POST" action="packageedit.php">
<div class="container">
	<div class="form-row">
		<div class="col-md-4">
			
	    </div>
	    <div class="col-md-4">
			<label>Package Name</label>
	    	<input type="text" class="form-control" name="packageName">
			<label>Average Time</label>
			<input type="text" class="form-control" name="serviceName">
			<label>Price</label>
	    	<input type="text" class="form-control" name="price">
	    </div>
	    <div class="col-md-4">
			
	    </div>
	</div>
	&nbsp
	<div class="form-row">
		<div class="col-md-4">
			
	    </div>
	    <div class="col-md-4">
	    	<center>
				<button type="submit" name="update" class="btn btn-primary">Submit</button>
				<a href="managerpackage.php" class="btn btn-danger">Cancel</a>
			</center>
	    </div>
	    <div class="col-md-4">
			
	    </div>
	</div>
</div>
</form>