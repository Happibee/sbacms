<!-- 
	This is used to add a service
	Last modified on March 10, 2018
-->

<?php
	include_once "../../../config/database.php";
    include_once "../../../classes/service.php";

	$database = new Database();
	$db = $database->getConnection();

	$service = new Service($db);

	if($_POST){
		$service->service_name = $_POST['service_name'];
	    $service->service_type = $_POST['service_type'];
	    $service->service_description = $_POST['service_description'];
	    $service->price = $_POST['price'];
		$service->average_time = $_POST['average_time'];
		
		$service->createService();
	}
?>