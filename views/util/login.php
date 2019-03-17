<?php
	ob_start();
	session_start();
	include_once "config/database.php";
	include_once "classes/customer.php";
	include_once "header.php";
	
	if(isset($_SESSION['custId'])){
		header('Location: index.php');
	}
	
?>
<html>
<div class="fluid">
  <div class="row">
    <div class="left col-sm-4">
    	<!--LEFT EMPTY SPACE-->
    </div>
    <div class="center col-sm-4">
    <!--LOGIN AREA-->
    <div class="container">
		<form class="formlogin" method='post'>
			<div class="form-group">
   				<center>
					<label for="uname"><b>Username</b></label>
    				<input type="text" class="form-control" name="emailAdd" placeholder="Enter Username">
    				<label for="psw"><b>Password</b></label>
    				<input type="password" class="form-control" name="password" placeholder="Enter Password">
				</center>
			</div>
			<div class="form-group">
				<center>
					<a href="forgotpw.php">Forgot Password?</a>
				</center>
    			<center>
					<button type="submit" class="btn btn-primary">Log In</button>
					<a href="index.php" class="btn btn-danger">Cancel</a>
				</center>
			</div>
			</div>

		<div class="form-group">
		<!--php cooode-->
		<?php

		if($_POST){
			$database = new Database();
			$db = $database->getConnection();
	
			$user = new Customer($db);
	
			$user->emailAdd = $_POST['emailAdd'];
			$user->userName = $_POST['emailAdd'];
			$user->password = $_POST['password'];
	
			if($user->login()){
				/*echo "
				<script type='text/javascript'>window.location.href='index.php';</script>";*/
				header("Location: userhome.php");
			}

			else{
				echo "<center>Incorrect Email or Password</center>";
			}
		}
		?>

		</div>
			<center><a href="employee/employeelogin.php" class="btn btn-primary">Are you an Employee?</a></center>
		</form> 
	</div>

    </div>
    <div class="right col-sm-4">
    	<!--RIGHT EMPTY SPACE-->
    </div>
  </div>
</div>

<style>
	.left, .right{
		background-color: white;
	}
</style>

</html>