<?php
  session_start();
  $page_title = "Home";
	include_once 'adminheader.php';

  	if(isset($_SESSION['username']) && isset($_SESSION['type']) == "Admin"){
			$database = new Database();
  			$db=$database->getConnection();
  
  			$employee = new Employee($db);
  			$stmt = $employee->readOneAccount();
  }
  else if(isset($_SESSION['username']) && isset($_SESSION['type']) == "Employee"){
    $database = new Database();
    $db=$database->getConnection();

    $employee = new Employee($db);
    $stmt = $employee->readOneAccount();
  }
?>
<div class="employeepart">
  <div class="container">
    <center>
    <h1 class="display-4">Account Information</h1>
      (VIEW ALL ACCOUNTS)
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
<!-- <div class="container">
	<center><a href= 'adminadd.php' class='btn btn-success'>Add a Manager</a></center>
</div> -->
&nbsp
<div class='container'>
<center>
    <h1 class='display-4'>Manager Account</h1>
  </center>
</div>
&nbsp
<?php
  $stmt = $employee->adminManagerdata();
  echo "
    <div class='container'>
      <div class='col-md-12'>
          <table class='table'>
            <thead>
              <tr>
                <th scope='col'>ID</th>
                <th scope='col'>First Name</th>
                <th scope='col'>Last Name</th>
                <th scope='col'>Position</th>
                <th scope='col'><center>Action</center></th>
              </tr>
            </thead>
            <tbody>";
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
              extract($row);
              echo "
                <tr>
                    <td>{$employeeId}</td>
                    <td>{$firstName}</td>
                    <td>{$lastName}</td>
                    <td>{$type}</td>
                    <td>
                    <center>
                      <input type='button' class='btn btn-primary viewbtn' data-toggle='modal' data-target='#viewModal' value='View' employeeId = '{$employeeId}'>
                      <input type='button' class='btn btn-warning archive-object text-white' archive-id='{$employeeId}' value='Archive'/>
                    </center>
                    </td>
                </tr>";
            }
            echo "
            </tbody>
          </table>
      </div>
    </div>";

  echo "
  &nbsp
  <div class='container'>
    <center>
      <h1 class='display-4'>Employee Accounts</h1>
    </center>
  </div>
  &nbsp";

  $stmt = $employee->adminEmployeedata();
  echo "
    <div class='container'>
      <div class='col-md-12'>
          <table class='table'>
            <thead>
              <tr>
                <th scope='col'>ID</th>
                <th scope='col'>First Name</th>
                <th scope='col'>Last Name</th>
                <th scope='col'>Position</th>
                <th scope='col'><center>Action</center></th>
              </tr>
            </thead>
            <tbody>";
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
              extract($row);
              echo "
                <tr>
                    <td>".$row['employeeId']."</td>
                    <td>".$row['firstName']."</td>
                    <td>".$row['lastName']."</td>
                    <td>".$row['type']."</td>
                    <td>
                    <center>
                      <input type='button' class='btn btn-primary viewbtn' data-toggle='modal' data-target='#viewModal' value='View' employeeId = '{$employeeId}'>
                    </center>
                    </td>
                </tr>";
            }
            echo "
            </tbody>
          </table>
      </div>
    </div>";
?>
<!--VIEW MODAL-->
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View Employee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div id='viewData'>

      </div>
      
    </div>
  </div>
</div>

<script>
//archive employee
$(document).on('click', '.archive-object', function(){
    var employeeId = $(this).attr("archive-id");
    var q = confirm("Are you sure you want to archive?");
      if(q == true){
        $.post('archiveManager.php', {
          employeeId: employeeId
        }, function(data){
          location.reload();
        }).fail(function() {
          alert("Unable to Archive");
        });
      }
      return false;
});
//view details
$(document).on('click', '.viewbtn', function(){
  var employeeId = $(this).attr("employeeId");

  $.ajax({
    url:'employeeview.php',
    method: 'POST',
    data:{employeeId: employeeId},

    success: function(data){
      $('#viewData').html(data),
      $('#viewModal').modal('show');
    }
  })
})
</script>


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
  .employeepart{
    /*background-color: #606060;*/
    background-color: #ff5ead;
    padding: 30px;
    color: white;
  }
</style>