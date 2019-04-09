<?php 
	session_start();
	include_once 'employeeheader.php';
	include_once '../../config/database.php';
  	include_once '../../classes/employee.php';
?>
	<?php
		//page logged in
		if(isset($_SESSION['username']) && isset($_SESSION['type']) == "Employee"){
			$database = new Database();
  			$db=$database->getConnection();
  
  			$employee = new Employee($db);
  			$stmt = $employee->readOneAccount();

			if($_SESSION['type'] == 'Admin'){
				//redirects to adminhome if admin
				header("Location: ../admin/adminhome.php");
			}
			else if($_SESSION['type'] == 'Manager'){
				//redirects to managerhome if manager, if it's archived, disp message and logout
				if($_SESSION['archive'] == '1'){
					echo '
						<script type="text/javascript">
							alert("Your account has been archived. Contact your Admin for details.");
							location="employeelogout.php";
						</script>
					';
					}
					else{
						header("Location: ../manager/managerhome.php");
					}
			}
			else {
				if($_SESSION['archive'] == '1'){
					//redirects to employee home if employee, if it's archived, disp message and logout
					echo '
						<script type="text/javascript">
							alert("Your account has been archived. Contact your Manager for details.");
							location="employeelogout.php";
						</script>
					';
					}
					else {
						//redirects to employeehome if employee and if it's not archived.
						header("Location: employeehome.php");
					}
			}
		}
		//page login if employee is pending
		elseif(isset($_SESSION['employeeId']) && $_SESSION['approved'] == '0'){
			if($_SESSION['type'] == 'Admin'){
			  //redirects to unvalidated
			  header("Location: ../admin/adminpend.php");
		  }
		  else if($_SESSION['type'] == 'Manager'){
			  //redirects to unvalidated
			  header("Location: ../manager/emPend.php");
		  }
		  else {
			  //redirects to unvalidated
			  header("Location: emPend.php");
		  }
	  }
	  //page login if employee is declined
	  elseif(isset($_SESSION['employeeId']) && $_SESSION['approved'] == '2'){
			if($_SESSION['type'] == 'Admin'){
			  //redirects to unvalidated
			  header("Location: ../admin/adminpend.php");
		  }
		  else if($_SESSION['type'] == 'Manager'){
			  //redirects to unvalidated
			  header("Location: ../manager/emPend.php");
		  }
		  else {
			  //redirects to unvalidated
			  header("Location: emPend.php");
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