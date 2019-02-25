<?php
	include_once "../config/database.php";
	include_once "../classes/employee.php";
  include_once '../classes/service.php';

	if(!isset($_SESSION['employeeId'])){
    	header('Location: ../employee/employeelogin.php');
  	}

  	$database = new Database();
    $db=$database->getConnection();
    $service = new Service($db);
    $stmt = $service->readAllService();
  
?>
<div class='container'>
  <center>
      <table class='table table-borderless'>
        <thead>
          <tr>
            <th scope='col'>ID Number</th>
            <th scope='col'>Service Name</th>
            <th scope='col'>Service Type</th>
            <th scope='col'>Service Description</th>
            <th scope='col'>Price</th>
            <th scope='col'>Average Time</th>
            <th scope='col'>Action</th>
          </tr>
        </thead>
      <?php
      	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      	extract($row);
      ?>
        <tbody>
            <tr>
            <?php
            echo "
              <td>".$row['serviceId']."</td>
              <td>".$row['serviceName']."</td>
              <td>".$row['serviceType']."</td>
              <td>".$row['serviceDescription']."</td>
              <td>".$row['price']."</td>
              <td>".$row['averageTime']."</td>"
             ?>
              <td>
                <a href='serviceedit.php?serviceId={$serviceId}' class='btn btn-secondary'>Edit</a>
                <button type='button' class='btn btn-danger' onclick='return confirm("Are you sure you want to delete this service?");'>Delete</button>
                <button type='button' class='btn btn-warning'>Archive</button>
              </td>
            </tr>
        <?php
        }
        ?>
        </tbody>
      </table>
  </center>
</div>