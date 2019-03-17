<?php
	session_start();
	include_once 'adminheader.php';

  	if(!isset($_SESSION['employeeId'])){
    	header('Location: ../employee/employeelogin.php');
  	}

  	if(isset($_SESSION['employeeId'])){
			$database = new Database();
  			$db=$database->getConnection();
  
  			$employee = new Employee($db);
  			$stmt = $employee->readOneAccount();
	}
?>
<div class="employeepart">
  <div class="container">
    <center>
      <h1 class="display-4">Registered Accounts List</h1>
    </center>
  </div>
</div>
<style>
  .employeepart{
    /*background-color: #606060;*/
    background-color: #ff5ead;
    padding: 30px;
    color: white;
  }
</style>
&nbsp
<div class="container">
	<center><a href= 'adminadd.php' class='btn btn-success'>Add a Manager</a></center>
</div>
&nbsp
<div class='container'>

</div>





<style>
  .homesalon{
    background-color: #ededed;
    padding: 30px;
  }
  .homeservice{
    /*background-color: #606060;*/
    background-color: #ff5ead;
    padding: 30px;
    color: white;
  }
</style>