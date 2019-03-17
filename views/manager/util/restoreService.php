<?php
    include_once "../../../config/database.php";
    include_once "../../../classes/service.php";

    $database = new Database();
    $db = $database->getConnection();
 
    $service = new Service($db);

    if($_POST){
	    $service->serviceId = $_POST['serviceId'];
	     
		if($service->restoreService()){
			echo "Service has been restored";
		}	
		else{
			echo "Not Archived";
		}
	}
?>