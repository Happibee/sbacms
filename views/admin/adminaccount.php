<?php
	session_start();
	include_once 'adminheader.php';
	$page_title = 'Admin Account';

  	if(isset($_SESSION['username']) && isset($_SESSION['type']) == "Admin"){
			$database = new Database();
  			$db=$database->getConnection();
  
  			$employee = new Employee($db);
  			$stmt = $employee->readOneAccount();
		}
		//page logged in
		else {
			header("Location: ../util/login.php");
		}
?>
<div class="bod">
	<div class="container">
		<div class='row'>
		<?php
		echo "
		<div class='col-sm-4'>
		</div>
		<div class='col-sm-4'>
			<div class='card' style='width: 18rem;'>
			<img class='card-img-top' src='...' alt='Insert Image Here(optional to add)' style='height: 17rem;'>
				<div class='card-body'>
				<center><h5 class='card-title'>".$_SESSION['username']."</h5>
				".$_SESSION['firstname']." ".$_SESSION['lastname']."<br>
				".$_SESSION['email']."<br>
				".$_SESSION['contactno']."<br><br>
				<label><h4>Role</h4></label><br>
				".$_SESSION['type']."
				</center>
				<br>
				<center>
					<a href='admineditacc.php' class='btn btn-primary'>Edit Account</a>
				</center>
				</div>
			</div>
		</div>
		<div class='col-sm-4'>
		</div>
		";
		?>
		</div>
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
  body {
  	background-color: #4c4c4c;;
  }
</style>

<?php
	include_once 'adminfooter.php';
?>