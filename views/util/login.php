<?php
	ob_start();
	session_start();
	include_once "includes/header.php";
	
	if(isset($_SESSION['custId'])){
		header('Location: index.php');
	}
	
?>
<html>
<div class="fluid">
  <div class='row'>
  	<div class='container'>
  		&nbsp
  		<h1 class='display-4' align='center'>Customer Login</h1>
  	</div>
  </div>
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
					<label for="uname" class='lead'><b>Username</b></label>
    				<input type="text" class="form-control" name="emailAdd" placeholder="Enter Username" required>
    				<label for="psw" class='lead'><b>Password</b></label>
    				<input type="password" class="form-control" name="password" placeholder="Enter Password" required>
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
	
			$customer = new Customer($db);
	
			$customer->emailAdd = $_POST['emailAdd'];
			$customer->userName = $_POST['emailAdd'];
			$customer->password = $_POST['password'];
	
			if($customer->login()){
				header("Location: userhome.php");
			}

			else{
				echo "<center>Incorrect Email or Password</center>";
			}
		}
		?>

		</div>
			<center><a href="employee/employeelogin.php" class="btn btn-dark">Are you an Employee?</a></center>
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