<!--HOME PAGE FOR EMPLOYEES-->
<?php
  session_start();
  include_once 'employeeheader.php';
  include_once '../config/database.php';
  include_once '../classes/user.php';

  if(!isset($_SESSION['employeeId'])){
      header('Location: employeelogin.php');
  }
?>
<!--Services part-->
<div class="homeservice">
  <div class="container">
    <h1 class="display-4"><center>Appointments</center></h1>
  </div>
</div>

<div class="container">
  <table class="table table-borderless">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Date</th>
        <th scope="col">Time</th>
        <th scope="col">Service</th>
        <th scope="col">Customer</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <!--TEMPORARY scripts later-->
    <tbody>
      <tr>
        <td>02/1/2019</td>
        <td>01:00 AM</td>
        <td>Hair Service</td>
        <td>John</td>
        <td>
          <a href='empappointmentresched.php' class="btn btn-warning">Reschedule</a>
          <button type="button" class="btn btn-danger" onclick='return confirm("Are you sure you want to cancel this appointment");'>Cancel</button>
        </td>
      </tr>
    </tbody>
  </table>
</div>

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