<?php
    include_once "../../../config/database.php";
    include_once "../../../classes/employee.php";

    $database = new Database();
    $db = $database->getConnection();
 
    $employee = new Employee($db);

    if($_POST){
	    $employee->employeeId = $_POST['employeeId'];
	     
		if($employee->archiveEmployee()){
			echo "Account has been archived";
		}	
		else{
			echo "Not Archived";
		}
	}
?>