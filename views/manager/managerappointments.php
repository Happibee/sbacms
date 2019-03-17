<?php
	session_start();
	include_once "../config/database.php";
	include_once "../classes/employee.php";
	include_once "managerheader.php";
	
	if(!isset($_SESSION['employeeId'])){
    	header('Location: ../employee/employeelogin.php');
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
				<th scope="col">Status</th>
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
				<td>Pending</td>
				<td>
					<a href="appointmentresched.php" class="btn btn-danger">Reschedule</a>
					<!--<a href="appointmentedit.php" class="btn btn-secondary">Edit</a>
					<button type="button" class="btn btn-danger" onclick='return confirm("Are you sure you want to delete?");'>Delete</button>-->
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
<script> 
/*
  $(document).on('click', '.submit-object', function(){
    var id = $(this).attr('submit');
    var q = confirm("Do you want to register?");
    
    if(q == true){
      $.post('login.php', {
        userId: id
      }, function(data){
        location.reload();
      }).fail(function() {
        alert("Unable to create Account");
      });
    }
    return false;
  });
 */
</script>