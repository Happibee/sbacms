<?php
	include "../../config/database.php";
	include "../../classes/employee.php";

	  $database = new Database();
    $db = $database->getConnection();

  	$employee = new Employee($db);
  	

  	if(isset($_POST['employeeId'])){
  		$employee->employeeId = $_POST['employeeId'];
  		$employee->viewEmployee();
  		echo "
  		<div class='modal-body'>
        <div class='form-row my-2 mx-2'>
        </div>
        <div class='form-row my-2 mx-2'>
          <div class='col-sm-6'>
            <h4>Full Name</h4>
          </div>
          <div class='col-sm-6'>
            $employee->firstName $employee->lastName
          </div>
        </div>
        <div class='form-row my-2 mx-2'>
        </div>
      </div>
  		";
  	}
?>