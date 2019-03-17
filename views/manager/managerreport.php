<?php
	session_start();
	include_once 'managerheader.php';

	if(!isset($_SESSION['employeeId'])){
		header('Location: ../employee/employeelogin.php');
	}
	//if the user is not a manager redirects to employee home
	if(isset($_SESSION['type']) && !($_SESSION['type'] == 'Manager')){
		header('Location: ../employee/employeehome.php');
	}
?>
&nbsp
<div class='form-group'>
	<h1 class='display-4' align='center'>Generate a Report</h1>
	<p class='lead' align='center'>A printable pdf will be generated after choosing what type of report you have chosen.</p>
</div>
&nbsp

<div class='container'>
	<div class='col-sm-12'>
		<div class='form-row'>
			<div class='col-sm-3'>
				
			</div>
			<div class='col-sm-3'>
				<label><h5>Date From</h5></label>
				<input class="form-control date" id="datepicker" name="dateFrom" placeholder="MM/DD/YYYY" type="text"/>
            	<script>
              		$('#datepicker').datepicker({
                	//daysOfWeekDisabled: [0,0] comment out in case of schedule changes
              		});
            	</script>
			</div>
			<div class='col-sm-3'>
				<label><h5>Date To</h5></label>
				<input class="form-control date" id="datepicker2" name="dateTo" placeholder="MM/DD/YYYY" type="text"/>
            	<script>
              		$('#datepicker2').datepicker({
                	//daysOfWeekDisabled: [0,0] comment out in case of schedule changes
              		});
            	</script>
			</div>
			<div class='col-sm-3'>
				
			</div>
		</div>
		&nbsp
		<div class='form-row'>
			<div class='col-sm-3'>
			</div>
			<div class='col-sm-6'>
				<div class='form-group'>
					<label class='lead' align='center'><h5>Report Type:</h5></label>
					<select class='form-control' name='reportType' required>
						<option></option>
						<option>Customer Accounts</option>
						<option>Services Offered</option>
						<option>Transactions</option>
					</select>
					<br>	
				</div>
			</div>
			<div class='col-sm-3'>
			</div>
		</div>
		<div class='form-row'>
			<div class='col-sm-4'>
			</div>
			<div class='col-sm-4'>
				<center>
					<button type='submit' class='btn btn-dark' align='center'>Submit</button>
					<a href='managerhome.php' class="btn btn-danger">Cancel</a>
				</center>
			</div>
			<div class='col-sm-4'>
			</div>
		</div>
	</div>
</div>