<?php
	session_start();
	$page_title = "Account Requests";
	include 'adminheader.php';

	if(!isset($_SESSION['username']) && !isset($_SESSION['type']) == "Employee"){
		header("Location: ../util/login.php");
	}
	// elseif($_SESSION['type'] !== 'Sadmin'){
	// 	header("Location: ../employee/employee.php");
	// }

	$database = new Database();
	$db = $database->getConnection();
?>
&nbsp
<div class="container">
	<center>
		<h1 class='display-4'>Account Requests</h1>
	</center>
</div>
<br><br>
<div class='container'>
	<center>
		<h1>Admin</h1>
	</center>
</div>
<div class='container'>
	<center>
	<div class='row'>
		<div class='col-sm-4'>
			<?php
			$employee = new Employee($db);
			$stmt = $employee->readPendAdmin();
			echo "
			<div class='card text-white bg-primary' style='width: 18rem;'>
				<div class='card-body'>
				<h3 class='card-title'><center>Pending Admin Accounts:</center></h5>
				<center><p class='card-text display-4'>".($stmt->rowCount())."</p></center>&nbsp
					<center><a href='accountpend.php' class='btn btn-primary'>Check</a></center>
				</div>
			</div>";
			?>
		</div>
		<div class='col-sm-4'>
			<?php
			$stmt = $employee->readApprovedAdmin();
			echo "
			<div class='card text-white bg-success' style='width: 18rem;'>
				<div class='card-body'>
				<h3 class='card-title'><center>Approved Admin Accounts:</center></h5>
				<center><p class='card-text display-4'>".($stmt->rowCount())."</p></center>&nbsp
					<center><a href='accountapp.php' class='btn btn-success'>Check</a></center>
				</div>
			</div>";
			?>
		</div>
		<div class='col-sm-4'>
			<?php
			$stmt = $employee->readDeclinedAdmin();
			echo "
			<div class='card text-white bg-danger' style='width: 18rem;'>
				<div class='card-body'>
				<h3 class='card-title'><center>Declined Admin Accounts:</center></h5>
				<center><p class='card-text display-4'>".($stmt->rowCount())."</p></center>&nbsp
					<center><a href='accountdec.php' class='btn btn-danger'>Check</a></center>
				</div>
			</div>";
			?>
		</div>
	</div>
	</center>
</div>
<br><br>
<div class='container'>
	<center>
		<h1>Manager</h1>
	</center>
</div>
<div class='container'>
	<center>
	<div class='row'>
		<div class='col-sm-6'>
			<?php
			$employee = new Employee($db);
			$stmt = $employee->readPendMan();
			echo "
			<div class='card text-white bg-primary' style='width: 100%;'>
				<div class='card-body'>
				<h3 class='card-title'><center>Pending Manager Accounts:</center></h5>
				<center><p class='card-text display-4'>".($stmt->rowCount())."</p></center>&nbsp
					<center><a href='accountpendMan.php' class='btn btn-primary'>Check</a></center>
				</div>
			</div>";
			?>
		</div>
		<div class='col-sm-6'>
			<?php
			$stmt = $employee->readDeclinedMan();
			echo "
			<div class='card text-white bg-danger' style='width: 100%;'>
				<div class='card-body'>
				<h3 class='card-title'><center>Declined Manager Accounts:</center></h5>
				<center><p class='card-text display-4'>".($stmt->rowCount())."</p></center>&nbsp
					<center><a href='accountdecMan.php' class='btn btn-danger'>Check</a></center>
				</div>
			</div>";
			?>
		</div>
	</div>
	</center>
</div>
<?php
	include_once 'adminfooter.php';
?>