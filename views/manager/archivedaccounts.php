<?php
	session_start();
	include "managerheader.php";
	include_once "../../config/database.php";

	include_once "../../classes/user.php";
	include_once "../../classes/employee.php";
?>
<div class="employeepart">
	<div class="container">
		<center>
			<h1 class="display-3">Archived Accounts</h1>
		</center>
	</div>
</div>

<!--TABLE-->
<div class="container">
	<div class="col-sm-12">
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
				</tr>
			</thead>
			<!--TEMPORARY scripts later-->
			<tbody>
				<tr>
					<th scope="row"></th>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
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