<?php
	session_start();
	include_once 'header.php';
	include_once 'config/database.php';
  	include_once 'classes/customer.php';
	include_once 'classes/schedule.php';
	include_once 'classes/service.php';
	include_once 'classes/employee.php';
  
  	if(!isset($_SESSION['custId'])){
    	header("Location: login.php");
	}

	$database = new Database();
  	$db = $database->getConnection();
?>
<div class="feedback">
	<div class="container">
		<h1 class="display-4"><center>Set Appointment</center></h1>
	</div>
</div>
<form method="POST" action="reservation.php">
	&nbsp
	<div class='container'>

		<!--First Row-->
		<div class="row">
			<div class='form-group col-md-3'>
				<!--Empty Space-->
			</div>
			<!--Service Picker-->
			<div class='form-group col-md-6'>
				<label><h5>Select a Service</h5></label>
				<select class='form-control' name='service'>
					<option>Choose a Service</option>
					<?php
		            	$service = new Service($db);
		            	$stmt = $service->readAllService();
		     				
		            	while ($option = $stmt->fetch(PDO::FETCH_ASSOC)) {
		              		echo '<option value="'.$option['serviceName'].'">' . $option['serviceName'] . '</option>';
		              	}
		          	?> 
		        </select>
			</div>
			<div class='form-group col-md-3'>
				<!--Empty Space-->
			</div>
		</div>

		<!--Second Row-->
		<div class='row'>
			<div class='form-group col-md-3'>
			</div>
			<!--Date Picker-->
			<div class='form-group col-md-3'>
				<label><h5>Select a Date</h5></label>
				<input class="form-control" id="datepicker" name="date" placeholder="MM/DD/YYYY" type="text"/>
            	<script>
              		$('#datepicker').datepicker({
                	//daysOfWeekDisabled: [0,0] comment out in case of schedule changes
              		});
            	</script>
			</div>
			<!--Time Picker-->
			<div class='fomr-group col-md-3'>
				<label><h5>Select a Time</h5></label>
				<input class='form-control' type="time" id="time" name="time">
			</div>
			<div class='form-group col-md-3'>
			</div>
		</div>

		<!--Third Row-->	
		<div class='row'>
			<!--Employee Picker-->
			<div class='fomr-group col-md-3'>
			</div>
			<div class='fomr-group col-md-6'>
				<label><h5>Select an Employee</h5></label>
				<select class = 'form-control country' name='employee'>
					<option>Choose an Employee</option>
					<?php
		            	$employee = new Employee($db);
		            	$stmt = $employee->readEmployeeOnly();
		     				
		            	while ($option = $stmt->fetch(PDO::FETCH_ASSOC)) {
		              		echo '<option value="'.$option['firstName'].'">' . $option['firstName'] . '</option>';
		              	}
		          	?> 
              	</select>
			</div>
			<div class='fomr-group col-md-3'>
			</div>
		</div>
		&nbsp
		<!--Button Area-->
		<div class='row'>
	    	<div class="form-group col-md-7">
	    	</div>
	    	<div class="form-group col-md-5">
	    		<button class="btn btn-primary " name="submit" type="submit">Submit</button>
	      		<a href="index.php" class="btn btn-danger">Cancel</a>
	    	</div>
		</div>
	</div>
</form>
<style>
	.feedback{
    /*background-color: #606060;*/
    background-color: #ff5ead;
    padding: 30px;
    color: white;
  }
</style>