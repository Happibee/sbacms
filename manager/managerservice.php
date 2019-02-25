<?php
	session_start();
	include "managerheader.php";
	include_once "../config/database.php";
	include_once "../classes/employee.php";
  include_once '../classes/service.php';

	if(!isset($_SESSION['employeeId'])){
    	header('Location: ../employee/employeelogin.php');
  	}

  	$database = new Database();
    $db=$database->getConnection();
  
?>
<!--Services part-->
<div class="homeservice">
  <div class="container">
  <h1 class="display-4"><center>Services</center></h1>
  </div>
</div>
&nbsp
<div align='center' class="container">
  <a href="managerserviceadd.php" class="btn btn-dark">Add a Service</a>
</div>
&nbsp
<!--SERVICES CONTENT-->
<?php
    $service = new Service($db);
    $stmt = $service->readAllService();
    
    include "managerservice2.php";
    ?>   

<!--DIV STYLES-->
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