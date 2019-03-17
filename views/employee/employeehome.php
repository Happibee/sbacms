<!--HOME PAGE FOR EMPLOYEES-->
<?php
  session_start();
  include_once 'employeeheader.php';
  include_once '../../classes/user.php';
  include_once "../../classes/appointment.php";

  if(!isset($_SESSION['employeeId'])){
      header('Location: employeelogin.php');
  }

  $appointment = new Appointment($db);
  $appointment->employee_id = $_SESSION['employeeId'];
  $appointment->status = 'Accepted';
  $appointments = $appointment->getEmployeeAppointments();
?>
<!--Services part-->
<div class="homeservice">
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
				<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
				while ($row = $appointments->fetch(PDO::FETCH_ASSOC)){
					extract($row);
					echo "
					<tr>
						<td>{$id}</td>
						<td>{$date}</td>
						<td>{$time}</td>
						<td>{$service_name}</td>
            <td>{$c_fname} {$c_lname}</td>";
          
            echo "
            <td>
              <a href='empappointmentresched.php?id={$id}' class='btn btn-warning'>Reschedule</a>
              <button type='button' class='btn btn-danger update-appointment' id='{$id}' status='Cancelled' event='cancel'>Cancel</button>
            </td>";
					}
			?>
      </tr>
    </tbody>
  </table>
</div>

<?php
  include_once "../includes/footer.php"
?>

<!--DIV STYLES-->
<style>
  .homesalon{
    background-color: #ededed;
    padding: 30px;
  }
  .homeservice{
    /*background-color: #606060;*/
    background-color: #ff5ead;
    padding: 30px;
    color: white;
  }
</style>