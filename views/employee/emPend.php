<?php
	session_start();
	include_once '../classes/employee.php';
	include_once '../config/database.php';

	$database = new Database();
	$db = $database->getConnection();

	$employee = new Employee($db);

	if(!isset($_SESSION['employeeId'])){
		header("Location: ../util/login.php");
	}
	else if(isset($_SESSION['employeeId']) && $_SESSION['approved'] == '1'){
		header("Location: employeehome.php");
	}
?>
<div clas='container'>
	<div class="container">
	  <center>
	    <h1 class='display-4'>
	    	<?php
	    		if($_SESSION['approved'] == '0'){
	    			echo '
	    			<script type="text/javascript">
						alert("Your registered account is pending and will be Approved by the Manager. Contact your Manager for details.");
						location="employeelogout.php";
					</script>
	    			';
	    		}
	    		else if($_SESSION['approved'] == '2'){
	    			echo 'Your Account has been <font color="red">DECLINED</font> by the Manager';
	    		}
	    		else {
	    			header("Location: employeehome.php");
	    		}
	    	?>
	    </h1>
	  	<a href='adminlogout.php' class='btn btn-danger'>Log Out</a>
	  </center>

	</div>
</div>