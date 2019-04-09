<?php
	session_start();
	include_once '../includes/tempo/header.php';
	include_once '../../classes/schedule.php';
	include_once '../../classes/service.php';
	include_once '../../classes/employee.php';
	include_once '../../classes/appointment.php';
  
  	if(!isset($_SESSION['username']) && isset($_SESSION['type']) == "Customer"){
    	header("Location: ../util/login.php");
	}

	$database = new Database();
	$db = $database->getConnection();

	$appointment = new Appointment($db);

	if(isset($_POST['addApp'])){
		// $appointment->serviceType = $_POST['serviceType'];
		// $appointment->serviceName = $_POST['serviceName'];
		// $appointment->appDate = date('m-d-Y',strtotime($_POST['appDate']));
		$appointment->appTime = date('h:i',strtotime($_POST['appTime']));
		echo $_POST['appTime'];
		// if($appointment->createAppointment()){
		// 	echo "schedule successfull";
		// 	header("Location: userhome.php");
		// }
		// else {
		// 	echo "error";
		// }
	}
	
?>
<div class="feedback">
  <div class="container">
	  <h1 class="display-4"><center>Set Appointment</center></h1>
  </div>
</div>
<form method="POST" action="reservation.php">
  &nbsp
  <div class='container'>
	  <!--First Row-->
	  <div class="row">
		  <div class='form-group col-md-3'>
			  <!--Empty Space-->
		  </div>
		  <!--Service Picker-->
		  
		  <!-- <div class='form-group col-md-3'>
			  <label><h5>Select a Service Type</h5></label>
			  <select class='form-control' name='serviceType' required>
				  <option></option>
				  <option value='Hair Service'>Hair Service</option>
				  <option value='Brow Service'>Brow Service</option>
				  <option value='Nail Service'>Nail Service</option>
				  <option value='Waxing Service'>Waxing Service</option>
				  <option value='Event Service'>Event Service</option>

			  </select>
		  </div> -->
		  <!--Show Hair Services-->
		  <!-- <div class='form-group col-md-3' id='hairserv'>
			  <label><h5>Select a Service</h5></label>
			  <select class='form-control' name='serviceName' required>
				  <option></option>
				  <?php
					  $service = new Service($db);
					  $stmt = $service->readHairService();

					  while ($option = $stmt->fetch(PDO::FETCH_ASSOC)) {
							echo '<option value="'.$option['serviceName'].'">' . $option['serviceName'] . '</option>';
						}
				  ?>
			  </select>
		  </div> -->
		  
		  
		  <div class='form-group col-md-3'>
			  <!--Empty Space-->
		  </div>
	  </div>

	  <!--Second Row-->
	  <div class='row'>
		  <div class='form-group col-md-3'>
		  </div>
		  <!--Date Picker-->
		  <!-- <div class='form-group col-md-3'>
			  <label><h5>Select a Date</h5></label>
			  <input class="form-control" id="picker" name="appDate" placeholder="MM/DD/YYYY" type="text" required/>
			  <script>
					$('#picker').datepicker({
				  //daysOfWeekDisabled: [0,0] comment out in case of schedule changes
					});
			  </script>
		  </div> -->
		  <!--Time Picker-->
		  <div class='fomr-group col-md-3'>
			  <label><h5>Select a Time</h5></label>
			  <input class='form-control' type="time" id="time" name="appTime">
		  </div>
		  <div class='form-group col-md-3'>
		  </div>
	  </div>

	  <!--Third Row-->	
	  <div class='row'>
		  <!--Employee Picker-->
		  <div class='fomr-group col-md-3'>
		  </div>
		  <!-- <div class='fomr-group col-md-6'>
			  <label><h5>Select an Employee</h5></label>
			  
		  </div> -->
		  <div class='fomr-group col-md-3'>

		  </div>
	  </div>
	  &nbsp
	  <!--Button Area-->
	  <div class='row'>
		  <div class="form-group col-md-7">
		  </div>
		  <div class="form-group col-md-5">
			  <button class="btn btn-primary" name="addApp" type="submit">Submit</button>
				<a href="index.php" class="btn btn-danger">Cancel</a>
		  </div>
	  </div>
  </div>
</form>

<script>
// function show(aval) {
//     if (aval == "Hair Service") {
//     	hairserv.style.display='inline-block';
//     	browserv.style.display='none';
//     	nailserv.style.display='none'
//     	Form.fileURL.focus();
//     }
//    	else if (aval == "Brow Service") {
//     	browserv.style.display='inline-block';
//     	hairserv.style.display='none';
//     	nailserv.style.display='none'
//     	Form.fileURL.focus();
	  
//     }
//     else if (aval == "Nail Service"){
//     	nailserv.style.display='inline-block';
//     	hairserv.style.display='none';
//     	browserv.style.display='none';
//     	Form.fileURL.focus();
//     }
//   }
</script>





<style>
  .feedback{
  /*background-color: #606060;*/
  background-color: #ff5ead;
  padding: 30px;
  color: white;
}
</style>