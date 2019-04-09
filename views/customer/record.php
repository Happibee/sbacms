<?php
	session_start();
	include_once '../includes/tempo/header.php';
  include_once '../../classes/customer.php';

  if(!isset($_SESSION['username']) && !isset($_SESSION['type']) == "Customer"){
      header('Location: ../util/login.php');
    }
?>
<div class="record">
	<div class="container">
		<h1 class="display-4"><center>Record</center></h1>
	</div>
</div>

<div class="container">
  <table class="table table-borderless">
    <thead class="thead-dark">
      <tr>
      	<th scope="col">ID</th>
        <th scope="col">Date</th>
        <th scope="col">Time</th>
        <th scope="col">Service</th>
        <th scope="col">Employee</th>
      </tr>
    </thead>
    <!--TEMPORARY scripts later-->
    <tbody>
      <tr>
      	<th scope="col">2</th>
        <td>02/1/2019</td>
        <td>01:00 AM</td>
        <td>Hair Service</td>
        <td>Joaquin</td>
      </tr>
    </tbody>
  </table>
</div>

<style>
  .record{
    /*background-color: #606060;*/
    background-color: #ff5ead;
    padding: 30px;
    color: white;
  }
</style>