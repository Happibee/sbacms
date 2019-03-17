<?php
	session_start();
	include_once "../includes/tempo/header.php";

  	if(isset($_SESSION['custId'])){
			$database = new Database();
  			$db=$database->getConnection();
  
  			$customer = new Customer($db);

			echo "
			<div class='accdet'>
				<div class='container'>
					<center><h1 class='display-4'>Account Details</h1></center>
				</div>
			</div>
			&nbsp
			<style>
				.accdet{
					background-color: #ededed;
					padding: 20px;
				}
			</style> 
			<div class='container'>
				<center><a href='editaccount.php' class='btn btn-primary'>Edit Account</a></center>
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
			      <th scope='col'>Contact No.</th>
			      <th scope='col'>Address</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			      <th scope='row'><h2>".$_SESSION['userName']."</h2></th>
			      <td>".$_SESSION['firstName']."</td>
			      <td>".$_SESSION['lastName']."</td>
			      <td>".$_SESSION['emailAdd']."</td>
			      <td>1234567890</td>
			      <td>Assumption Road, Baguio City</td>
			    </tr>
			  </tbody>
			</table>
			</div>
			";
		}
		//redirect to login if id not in session
		else {
			header("Location: login.php");
		}
?>
			