<?php
	session_start();
	include_once 'adminheader.php';
	include_once '../config/database.php';
  	include_once '../classes/employee.php';

  	if(isset($_SESSION['employeeId'])){
			$database = new Database();
  			$db=$database->getConnection();
  
  			$employee = new Employee($db);
  			$stmt = $employee->readOneEmployee();
		}
		//page logged in
		else {
			header("Location: ../employee/employeelogin.php");
		}
?>
<div class="adm">
	<div class="container">
		<h1 class="display-4"><center>Your Account</center></h1>
	</div>
</div>
<div class="bod">
	<div class="container">
		<?php
			echo "
			&nbsp 
			<div class='container'>
				<center><a href='admineditacc.php' class='btn btn-primary'>Edit Account</a></center>
			</div>
			&nbsp
			<div class='container'>
			<table class='table table-borderless'>
			  <thead>
			    <tr>
			      <th scope='col'>Username</th>
			      <th scope='col'>First Name</th>
			      <th scope='col'>Last Name</th>
			      <th scope='col'>E-mail</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			      <th scope='row'><h2>".$_SESSION['userName']."</h2></th>
			      <td>".$_SESSION['firstName']."</td>
			      <td>".$_SESSION['lastName']."</td>
			      <td>".$_SESSION['emailAdd']."</td>
			    </tr>
			  </tbody>
			</table>
			</div>
			";
		?>
	</div>	
</div>


<style>
  .adm{
    background-color: #ededed;
    padding: 30px;
  }
  .bod{
  	background-color:;
  	padding: 40px;
  }
</style>