<?php
	session_start();
	include_once "../config/database.php";
	include_once "../classes/user.php";
	include_once "managerheader.php";
	
	if(!isset($_SESSION['employeeId'])){
    	header('Location: ../employee/employeelogin.php');
  	}
?>
<div class="res">
	<div class="container">
		<h1 class="display-4"><center>Reschedule</center></h1>
	</div>
</div>

<div class="container">
	<table class="table table-borderless">
		<thead class="thead-dark">
			<tr>
				<th scope="col">ID</th>
				<th scope="col">Date</th>
				<th scope="col">Time</th>
				<th scope="col">Service</th>
				<th scope="col">Customer</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
		<!--TEMPORARY scripts later-->
		<tbody>
			<tr>
				<th scope="row">2</th>
				<td>
					<input type="text" class="form-control" name="serviceName" value="02/1/2019">
				</td>
				<td>
					<input type="text" class="form-control" name="serviceName" value="01:00 AM">
				</td>
				<td>Hair Service</td>
				<td>John</td>
				<td>
					<button type="button" class="btn btn-primary">Save</button>
					<a href="managerappointments.php" class="btn btn-danger">Cancel</a>
				</td>
			</tr>
		</tbody>
	</table>
</div>

<style>
  .res{
    /*background-color: #606060;*/
    background-color: #ff5ead;
    padding: 30px;
    color: white;
  }
</style>