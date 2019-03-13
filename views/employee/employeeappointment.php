<?php
	session_start();
	include_once "employeeheader.php";
	include_once "../../classes/user.php";
	include_once "../../classes/appointment.php";
	
	
	if(!isset($_SESSION['employeeId'])){
    	header('Location: ../employee/employeelogin.php');
	}
	
	$appointment = new Appointment($db);
	$appointment->employee_id = $_SESSION['employeeId'];
	$appointment->status = "Pending";
    $appointments = $appointment->getEmployeeAppointments();
?>

<div class="appoint">
	<div class="container">
		<h1 class="display-4"><center>Appointments</center></h1>
	</div>
</div>
&nbsp
<div class="container">
	<center>
		<a href= 'empsetappointment.php' class='btn btn-primary'>Set a Special Appointment</a>
	</center>
</div>
&nbsp
<div class="pend">
	<div class="container">
		<h1 class="display-6"><center>Pending Requests</center></h1>
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
		<tbody>
			<tr>
			<?php
				while ($row = $appointments->fetch(PDO::FETCH_ASSOC)){
					extract($row);
					echo "
						<td>{$id}</td>
						<td>{$date}</td>
						<td>{$time}</td>
						<td>{$service_name}</td>
						<td>{$c_fname} {$c_lname}</td>";

					echo "
					<td>
						<button type='button' class='btn btn-success update-appointment' id='{$id}' status='Accepted' event='accept'>Accept</button>
						<button type='button' class='btn btn-danger update-appointment' id='{$id}' status='Rejected' event='reject'>Reject</button>
					</td>";
					}
			?>
			</tr>
		</tbody>
	</table>
</div>

<?php
	include_once "../includes/footer.php";
?>
<style>
  .appoint{
    /*background-color: #606060;*/
    background-color: #ff5ead;
    padding: 30px;
    color: white;
  }

</style>