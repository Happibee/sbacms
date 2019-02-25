<?php 
	session_start();
	include_once 'employeeheader.php';
	include_once '../config/database.php';
  	include_once '../classes/employee.php';
?>
	<?php
		//page logged in
		if(isset($_SESSION['employeeId'])){
			$database = new Database();
  			$db=$database->getConnection();
  
  			$employee = new Employee($db);
  			$stmt = $employee->readOneEmployee();

			if($_SESSION['type'] == 'admin'){
				//redirects to adminhome if admin
				header("Location: ../admin/adminhome.php");
			}
			else if($_SESSION['type'] == 'manager' || $_SESSION['type'] == 'Manager'){
				//redirects to managerhome if manager
				header("Location: ../manager/managerhome.php");
			}
			else {
				//redirects to employeehome if employee
				header("Location: employeehome.php");
			}
		}
		//page logged in
		else {
			header("Location: ../index.php");
		}
	?>
<?php 
	include_once "employeefooter.php";
?>