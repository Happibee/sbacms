<?php
	session_start();
	include_once 'adminheader.php';
	include_once '../config/database.php';
  	include_once '../classes/employee.php';

  	if(!isset($_SESSION['employeeId'])){
    	header('Location: ../employee/employeelogin.php');
  	}

  	if(isset($_SESSION['employeeId'])){
			$database = new Database();
  			$db=$database->getConnection();
  
  			$employee = new Employee($db);
  			$stmt = $employee->readOneAdmin();
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
  <div class='col-md-12'>
      <table class='table'>
        <thead>
          <tr>
            <th scope='col'>First Name</th>
            <th scope='col'>Last Name</th>
            <th scope='col'>Position</th>
            <th scope='col'><center>Action</center></th>
          </tr>
        </thead>
        <tbody>
            <tr>
                <td>Joaquin</td>
                <td>Cortez</td>
                <td>Employee</td>
                <td>
                <center>
                  <button type="button" class="btn btn-primary">View</button>
                  
                </center>
                </td>
            </tr>
            <tr>
                <td>Roselia</td>
                <td>Cruz</td>
                <td>Manager</td>
                <td>
                <center>
                  <button type="button" class="btn btn-primary">View</button>
                  
                </center>
                </td>
            </tr>
            <tr>
                <td>Ken</td>
                <td>Balas</td>
                <td>Customer</td>
                <td>
                <center>
                  <button type="button" class="btn btn-primary">View</button>
                  
                </center>
                </td>
            </tr>
        </tbody>
      </table>
  </div>
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