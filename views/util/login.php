<?php
	$pageTitle = "Log In";
	echo "<title>" . $pageTitle . "</title>";
	
	include_once "../includes/tempo/header.php";
	include_once "../../classes/user.php";
	
	session_start();
	// if (isset($_SESSION['username']) && isset($_SESSION['type'] == "Admin")){
	// 	header('Location: ../admin/adminhome.php');
	// }
	// else if (isset($_SESSION['username']) && isset($_SESSION['type']) == "Manager") {
	// 	header('Location: ../manager/managerhome.php');
	// }
	// else if (isset($_SESSION['username']) && isset($_SESSION['type']) == "Employee") {
	// 	header('Location: ../employee/employeehome.php');
	// }
	// else if (isset($_SESSION['username']) && isset($_SESSION['type']) == "Customer") {
	// 	header('Location: ../customer/userhome.php');
	// }
	

	if ($_POST){
		$database = new Database();
		$db = $database->getConnection();

		$user = new User($db);

		$user->username = $_POST['user-cred'];
		$user->password = $_POST['password'];

		if ($user->login()){
			if($_SESSION['type'] == "Admin"){
				header("Location: ../admin/adminhome.php");
			}	
			else if($_SESSION['type'] == "Manager"){
				header("Location: ../manager/managerhome.php");
			}
			else if($_SESSION['type'] == "Employee"){
				header("Location: ../employee/employeehome.php");
			}
			else if($_SESSION['type'] == "Customer"){
				header("Location: ../customer/userhome.php");
			}
		} elseif(empty($_POST['user-cred']) || empty($_POST['password'])){
			echo '
			<center>
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  User Name or Password is left blank!
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				  </button>
				</div>
			</center>';
		}
		
		else {
			echo '
				<center>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
					  Incorrect UserName or Password.
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					  </button>
					</div>
				</center>
				';
		}
	}
?>
<div class="fluid">
  <div class='row'>
  	<div class='container'>
  		<h1 class='mt-3' align='center'>Login</h1>
  	</div>
  </div>
  
  <div class="row">
    <div class="left col-sm-4">
    </div>
    <div class="center col-sm-4">
    <!--LOGIN AREA-->
    <div class="container">
		<form class="formlogin" method='post'>
			<div class="form-group">
   				<center>
					<label for="uname" class='lead'><b>Username</b></label>
    				<input type="text" class="form-control" name="user-cred" placeholder="Enter Username" required>
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
		
		</form> 
	</div>

    </div>
    <div class="right col-sm-4">
    </div>
  </div>
</div>

<style>
	.left, .right{
		background-color: white;
	}
</style>

</html>