<!--HOME PAGE FOR GUESTS-->
<?php
  session_start();
  include_once 'managerheader.php';
  include_once '../../classes/service.php';

  if(!isset($_SESSION['employeeId'])){
    header('Location: ../employee/employeelogin.php');
  }
?>
<!--Salon part-->
<div class="homesalon">
  <div class="container">
    <center>
      <h1 class="display-3">
        Home
      </h1>
    </center>
  </div>
</div>

<div class="employeepart">
  <div class="container">
    <center>
      <h1 class="display-6">Employees Registered</h1>
    </center>
  </div>
</div>
&nbsp
<div class="container">
  <center><a href= 'manageradd.php' class='btn btn-success'>Add an Employee</a></center>
</div>
&nbsp
<!--TABLE OF EMPLYOEES-->
<?php
    $employee = new Employee($db);
    $stmt = $employee->readEmployeeOnly();
    
    echo "
<div class='container'>
  <center>
      <table class='table table-borderless'>
        <thead>
          <tr>
            <th scope='col'>Employee Id</th>
            <th scope='col'>First Name</th>
            <th scope='col'>Last Name</th>
            <th scope='col'>User Name</th>
            <th scope='col'>Email Address</th>
            <th scope='col'>Action</th>
          </tr>
        </thead>";
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
        echo "<tbody>
            <tr>
                <td>".$row['id']."</td>
                <td>".$row['firstName']."</td>
                <td>".$row['lastName']."</td>
                <td>".$row['userName']."</td>
                <td>".$row['emailAdd']."</td>
                <td>
                  <button type='button' class='btn btn-warning'>Archive</button>
                </td>
            </tr>";
        }
      echo "
        </tbody>
      </table>
  </center>
</div>";
?>
<style>
  .homesalon{
    background-color: #ededed;
    padding: 30px;
  }
  .employeepart{
    /*background-color: #606060;*/
    background-color: #ff5ead;
    padding: 30px;
    color: white;
  }
</style>