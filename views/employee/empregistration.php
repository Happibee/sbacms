<?php
	session_start();
	include_once 'employeeheader.php';

	if(isset($_SESSION['employeeId'])){
		header("Location: employee.php");
	}
	else if(!isset($_SESSION['employeeId'])){
		header("../index.php");
	}

	$database = new Database();
	$db = $database->getConnection();

	$employee = new Employee($db);
?>
&nbsp
<div class='accdet'>
	<center><h1 class='display-4'><font color='white'>Employee Registration</font></h1></center>
</div>
&nbsp
<form method='POST' action='empregistration.php'>
<div class='container'>
	<div class='row'>
		<div class='col-md-3'>
			<!--SPACE-->
		</div>
		<div class='col-md-6 cont'>
			<br>
			<?php
				if(isset($_POST['addEmp'])){
					// $employee->employeeId = $_POST['employeeId'];
					$employee->firstName = $_POST['firstName'];
					$employee->lastName = $_POST['lastName'];
					$employee->userName = $_POST['userName'];
					$employee->emailAdd = $_POST['emailAdd'];
					$employee->password = $_POST['password'];
					$employee->address = $_POST['address'];
					$employee->contactNo = $_POST['contactNo'];
					$employee->type = $_POST['type'];

					if($employee->existingUname() && $employee->existingEmail()){
						echo '
						<center>
							<div class="alert alert-danger" role="alert">
							Username and email are taken!
							</div>
						</center>
						';
					}
					else if ($employee->existingUname()){
						echo '
						<center>
							<div class="alert alert-danger" role="alert">
							Username has been taken!
							</div>
						</center>
						';
					}
					else if ($employee->existingEmail()){
						echo '
						<center>
							<div class="alert alert-danger" role="alert">
							Email has been taken!
							</div>
						</center>
						';
					}
					else if ($employee->existingAdmin()){
						$employee->createAdmin();
						echo '
						<script>
							alert("You have successfully created an admin account, since you are the first admin, an approval will not be needed.");
							window.location = "../util/login.php";
						</script>
						';
					}
					else {
						$employee->createEmployee();
						echo '
						<script>
							alert("You have successfully created an account, login and see if your account has been approved.");
							window.location = "../util/login.php";
						</script>
						';
					}
			}
			?>
			<!--Insert text box for employee ID here-->
			&nbsp
			<div class='row'>
				<div class='col-sm-6'>
					<label>First Name</label>
					<input type='text' class='form-control' pattern="[A-Z,a-z]{3, 10}" title="A proper name should be used i.e John" name='firstName' value="<?php echo isset($_POST['firstName']) ? $_POST['firstName'] : '' ?>" required>
				</div>
				<div class='col-sm-6'>
					<label>Last Name</label>
					<input type='text' class='form-control' pattern="[A-Z,a-z]{3, 10}" title="A proper name should be used i.e Johanson" name='lastName' value="<?php echo isset($_POST['lastName']) ? $_POST['lastName'] : '' ?>" required>
				</div>
			</div>
			&nbsp
			<div class='row'>
				<div class='col-sm-12'>
					<label>User Name</label>
					<input type='text' class='form-control' pattern="[a-z]{6, 15}" title="Username should be 6 to 15 characters long" name='userName' value="<?php echo isset($_POST['userName']) ? $_POST['userName'] : '' ?>" required>
				</div>
			</div>
			&nbsp
			<div class='row'>
				<div class='col-sm-6'>
					<label>Email</label>
					<input type='email' class='form-control' name='emailAdd' pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Should be a valid email. i.e john@email.com" value="<?php echo isset($_POST['emailAdd']) ? $_POST['emailAdd'] : '' ?>" required>
				</div>
				<div class='col-sm-6'>
					<label>Password</label>
					<input type='password' class='form-control' pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters" name='password' required>
				</div>
			</div>
			&nbsp
			<div class='row'>
				<div class='col-sm-12'>
					<label>Address</label>
					<textarea class="form-control" id="exampleFormControlTextarea1" name='address' rows="2"></textarea>
				</div>
			</div>
			&nbsp
			<div class='row'>
				<div class='col-sm-6'>
					<label>Mobile Phone Number</label>
					<input type="text" class="form-control" name="contactNo" pattern="[0-9]{11,11}" title="Must be a valid 11 digit number" value="<?php echo isset($_POST['contactNo']) ? $_POST['contactNo'] : '' ?>" required>
				</div>
				<div class='col-sm-6'>
					<label>Sign-up as a:</label>
					<select class='form-control' name='type' required>
						<option></option>
						<option>Employee</option>
						<option>Manager</option>
						<option>Admin</option>
					</select>
				</div>
			</div>
			&nbsp
			<div class='row'>
				<div class='col-sm-4'>
					<!-- SPACE -->
				</div>
				<div class='col-sm-4'>
					<input type='submit' class='btn btn-primary' name='addEmp' value='Submit'>
					<a href='../util/login.php' class='btn btn-danger'>Cancel</a>
				</div>
				<div class='col-sm-4'>
					<!-- SPACE -->
				</div>
			</div>
			<br>
		</div>
		<div class='col-md-3'>
			<!--SPACE-->
		</div>
	</div>
	&nbsp
</div>
</form>

<style>
	.cont{
		background-color: #f8f1f2 ;
		border-radius: 5px;
	}
	body {
		background-color: #474747;
	}
</style>