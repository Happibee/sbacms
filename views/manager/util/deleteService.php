<?php
	include_once "../../../config/database.php";
    include_once "../../../classes/service.php";
	
	if($_POST){
        $database = new Database();
        $db = $database->getConnection();
        
        $service = new Service($db);
        $service->id = $_POST['id'];
        
        if ($_POST['event'] === 'delete') {
            $service->deleteService();
        } else {
            $service->archiveService();
        }
	}
?>
