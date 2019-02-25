<?php
	session_start();
	include "adminheader.php";
	include_once "../config/database.php";

	include_once "../classes/customer.php";
	include_once "../classes/employee.php";
?>
<div class="employeepart">
	<div class="container">
		<center>
			<h1 class="display-3">Archive</h1>
		</center>
	</div>
</div>

<!--TABLE-->
<div class="container">
	<div class="col-sm-12">
		<h1 class="display-4"><center>Accounts</center></h1>
		<table class="table table-borderless">
			<thead class="thead-dark">
				<tr>
					<th scope="col">ID</th>
					<th scope="col">First Name</th>
					<th scope="col">Last Name</th>
					<th scope="col">User Name</th>
					<th scope="col">Email Address</th>
					<th scope="col">Address</th>
					<th scope="col">Contact Number</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<!--TEMPORARY scripts later-->
			<tbody>
				<tr>
					<th scope="row">7</th>
					<td>Mike</td>
					<td>Santos</td>
					<td>Mikael</td>
					<td>Mike@email.com</td>
					<td>Session Road</td>
					<td>090909090912</td>
					<td>
						<button type="button" class="btn btn-danger">Delete</button>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<!--TABLE-->
<style>
  .employeepart{
    /*background-color: #606060;*/
    background-color: #ff5ead;
    padding: 30px;
    color: white;
  }
</style>