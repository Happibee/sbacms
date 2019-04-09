<?php
	session_start();
	include_once "../../classes/customer.php";
	include_once "../includes/tempo/header.php";
	
	if(!isset($_SESSION['username']) && !isset($_SESSION['type']) == "Customer"){
    	header('Location: ../util/login.php');
  	}
?>
<div class="appoint">
	<div class="container">
		<h1 class="display-4"><center>Appointments</center></h1>
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
				<th scope="col">Employee</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
		<!--TEMPORARY scripts later-->
		<tbody>
			<tr>
				<th scope="row">2</th>
				<td>02/1/2019</td>
				<td>01:00 AM</td>
				<td>Hair Service</td>
				<td>John</td>
				<td>Jasmine</td>
				<td>
					<a href="editappointment.php" class="btn btn-secondary">Edit</a>
					<button type="button" class="btn btn-danger" onclick='return confirm("Are you sure you want to cancel this appointment?");'>Cancel Appointment</button>
				</td>
			</tr>
		</tbody>
	</table>
</div>

<style>
  .appoint{
    /*background-color: #606060;*/
    background-color: #ff5ead;
    padding: 30px;
    color: white;
  }
</style>