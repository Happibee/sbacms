<!-- 
	This is used to set appointment status to
		Scheduled,
		Rejected,
		Rescheduled, 
		Cancelled,
	Last modified on March 9, 2018
-->

<?php
	include_once "../../../config/database.php";
	include_once "../../../classes/appointment.php";

	$database = new Database();
	$db = $database->getConnection();

	$appointment = new Appointment($db);

	if ($_POST) {
		$appointment->id = $_POST['id'];
		$appointment->status = $_POST['status'];
        	
		if ($appointment->updateAppointmentStatus()) {
            echo "Success";
		} else {
			echo "Unable to Delete Object";
		}
	}
?>