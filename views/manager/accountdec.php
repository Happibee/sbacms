<?php
	session_start();
	$page_title = "Declined Accounts";
	include_once 'managerheader.php';
	$database = new Database();
	$db = $database->getConnection();
?>
<br><br>
<div class="container">
	<center>
		<h1 class='display-4'>Declined Accounts</h1>
	</center>
</div>
<br><br>
<!--Table of pending admin accounts-->
<?php
	$employee = new Employee($db);
	$stmt = $employee->readDeclinedEmp();
	echo "
	<div class='container'>
		<div class='row'>
			<div class='col-md-3'>
			</div>
			<div class='col-md-6'>
				<table class='table table-borderless table-hover'>
				<thead>
					<tr>
						<th scope='col'>First Name</th>
						<th scope='col'>Last Name</th>
						<th scope='col'><center>Action</center></th>
					</tr>
				</thead>
				<tbody>";
				while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
				extract($row);
					echo "
					<tr class='table-success'>
						<td>{$firstName}</td>
						<td>{$lastName}</td>
						<td>
							<input type='button' class='btn btn-primary' value='View Details'>
							<input type='button' class='btn btn-danger' value='Delete'>
						</td>
					</tr>";
				}
				echo "
				</tbody>
				</table>
			</div>
			<div class='col-md-3'>
			</div>
		</div>
	</div>";
?>