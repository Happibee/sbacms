<?php
	session_start();
	include_once "../../config/database.php";
	include_once "../../classes/user.php";
	include_once "../../classes/appointment.php";
	include_once "employeeheader.php";
	
	if(!isset($_SESSION['employeeId'])){
    	header('Location: ../employee/employeelogin.php');
	}

	$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: Missing ID');
	  
	$appointment = new Appointment($db);
	$appointment->id = $id;
	
	$appointment->getOneAppointment();

	if(isset($_POST['update'])){
		$appointment->date = $_POST['date'];
		$appointment->time = $_POST['time'];
			
		if($appointment->rescheduleAppointment()){
			header("Location: employeehome.php");
		}
		else{
			echo "Failed to reschedule";
		}
	}
?>
<div class="res">
	<div class="container">
		<h1 class="display-4"><center>Reschedule</center></h1>
	</div>
</div>

<div class="container">
<form method="POST" action="empappointmentresched.php?id=<?php $appointment->id ?>">
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
				<th><?php  echo $appointment->id; ?></th>
				<td>
					<input type="text" class="form-control" name="date" value="<?php  echo $appointment->date; ?>">
				</td>
				<td>
					<input type="text" class="form-control" name="time" value="<?php  echo $appointment->time; ?>">
				</td>
			
				<td><?php echo $appointment->serviceName; ?></td>
				<td><?php echo $appointment->customer_name; ?></td>
				<td>
				<button type="submit" class="btn btn-primary" name="update">Save</button>
					<a href="employeehome.php" class="btn btn-danger">Cancel</a>
				</td>
			</tr>
		</tbody>
	</table>
	</form>
</div>

<style>
  .res{
    /*background-color: #606060;*/
    background-color: #ff5ead;
    padding: 30px;
    color: white;
  }
</style>