<!--HOME PAGE FOR GUESTS-->
<?php
  session_start();
  $page_title = "Home";
  
  include_once 'managerheader.php';
  include_once '../../classes/service.php';

  // if(!isset($_SESSION['employeeId'])){
  //   header('Location: ../util/login.php.php');
  // }

  if(isset($_SESSION['username']) && isset($_SESSION['type']) == "Manager"){
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
    </center>
  </div>
</div>
</div>
</div>
&nbsp
<div class='container'>
  <center>
  <div class='row'>
    <div class='col-sm-6'>
      <?php
      $employee = new Employee($db);
      $stmt = $employee->readPendEmp();
      echo "
      <div class='card text-white bg-primary' style='width: 18rem;'>
        <div class='card-body'>
        <h3 class='card-title'><center>Pending Employee Accounts:</center></h5>
        <center><p class='card-text display-4'>".($stmt->rowCount())."</p></center>&nbsp
          <center><a href='accountpend.php' class='btn btn-primary'>Check</a></center>
        </div>
      </div>";
      ?>
    </div>
    <div class='col-sm-6'>
      <?php
      $stmt = $employee->readDeclinedEmp();
      echo "
      <div class='card text-white bg-danger' style='width: 18rem;'>
        <div class='card-body'>
        <h3 class='card-title'><center>Declined Employee Accounts:</center></h5>
        <center><p class='card-text display-4'>".($stmt->rowCount())."</p></center>&nbsp
          <center><a href='accountdec.php' class='btn btn-danger'>Check</a></center>
        </div>
      </div>";
      ?>
    </div>
  </div>
  </center>
</div>
&nbsp
<?php
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
?>
<!--VIEW MODAL-->
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-hidden="true">
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
//archive
$(document).on('click', '.archive-object', function(){
    var employeeId = $(this).attr("archive-id");
    var q = confirm("Are you sure you want to archive?");
      if(q == true){
        $.post('archiveEmployee.php', {
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