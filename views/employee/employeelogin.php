<?php
	session_start();
	include_once "employeeheader.php";

	if(isset($_SESSION['employeeId'])){
		header('Location: employee.php');
	}
?>

<div class="fluid">
  <div class="row">
    <div class="left col-sm-4">
    	<!--LEFT EMPTY SPACE-->
    </div>
    <div class="center col-sm-4">
    <!--LOGIN AREA-->
    <div class="container">
		<form class="formlogin" method='post'>
			<br>
			<center><img src='../../assets/img/salonlogo2.png' width='140px' height='150px'></center>
			<br>
			<div class="form-group">
   				<center>
					<h1 class='display-4'>Employee Login</h1>
					<label for="uname" class='lead'>Username</label>
    				<input type="text" class="form-control" name="emailAdd" placeholder="Enter Username">
    				<label for="psw" class='lead'>Password</label>
    				<input type="password" class="form-control" name="password" placeholder="Enter Password">
				</center>
			</div>
			<div class="form-group">
    			<center>
				<button type="submit" class="btn btn-primary">Log In</button>
					<a href="../index.php" class="btn btn-danger">Cancel</a>
				</center>
			</div>
		<div class="form-group">

		<!--php cooode-->
		<?php

		if($_POST){
		$database = new Database();
		$db = $database->getConnection();
	
		$employee = new Employee($db);
	
		$employee->emailAdd = $_POST['emailAdd'];
		$employee->password = $_POST['password'];
	
			if($employee->login()){
				header("Location: employeehome.php");
				
			}
			else{
				echo "<center>Incorrect Email or Password</center>";
			}
		}
		?>

		</div>
		</form> 
	</div>
    </div>
    <div class="right col-sm-4">
    	<!--RIGHT EMPTY SPACE-->
    </div>
  </div>
</div>
</form>
</div>