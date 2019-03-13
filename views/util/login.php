<?php
	ob_start();
	session_start();
	include_once "../../config/database.php";
	include_once "../../classes/customer.php";
	
	if(isset($_SESSION['custId'])){
		header('Location: index.php');
	}
	
?>
<html>
  <head>
    <title></title>
      <link rel="stylesheet" href="../../assets/bootstrap/4.2.1/css/bootstrap.min.css">
      <script src="../../assets/jquery-3.3.1.slim.min.js"></script>
      <script src="../../assets/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
      <script src="../../assets/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<!--STYLES-->
<style>
    .logo{
      width:100%;
      background-color: #edeff2;
    }
    .logo .jumbotron{
      padding: 50px 30px;
      margin: 0px;
      background-image: url('../assets/img/sbacmsblank.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      color: white;
      border-radius: 0;
}
    .form-gap {
    padding-top: 70px;
}
</style>
</head>
<body>
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
					<a href="../index.php" class="btn btn-danger">Cancel</a>
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
				header("Location: ../customer/userhome.php");
			}

			else{
				echo "<center>Incorrect Email or Password</center>";
			}
		}
		?>

		</div>
			<center><a href="../employee/employeelogin.php" class="btn btn-primary">Are you an Employee?</a></center>
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