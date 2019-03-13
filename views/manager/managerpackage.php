<?php
  session_start();
  include_once 'managerheader.php';
  include_once '../../config/database.php';
  include_once '../../classes/employee.php';
  include_once '../../classes/service.php';

  if(!isset($_SESSION['employeeId'])){
    header('Location: ../employee/employeelogin.php');
  }
?>
<div class="pck">
  <div class="container">
  <h1 class="display-4"><center>Packages</center></h1>
  </div>
</div>
&nbsp
<center>
<a href="addpackage.php" class='btn btn-dark'>Add Package</a>
</center>
&nbsp
<div class="container">
	<table class="table table-borderless">
		<thead class="thead-dark">
			<tr>
				<th scope="col">Event ID</th>
				<th scope="col">Package Name</th>
				<th scope="col">Average Time</th>
				<th scope="col">Price</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
		<!--TEMPORARY scripts later-->
		<tbody>
			<tr>
				<th scope="row">1</th>
				<td>Haircut with Recolor</td>
				<td>10-20 Mins</td>
				<td>Hair Service</td>
				<td>
					<a href="packageedit.php" class=" btn btn-secondary">Edit</a>
					<button type="button" class="btn btn-danger" onclick='return confirm("Are you sure you want to delete this package?");'>Delete</button>
				</td>
			</tr>
		</tbody>
	</table>
</div>

<style>
  .pck{
    /*background-color: #606060;*/
    background-color: #ff5ead;
    padding: 30px;
    color: white;
  }
</style>