<?php
	session_start();
	include "managerheader.php";
	include_once "../../config/database.php";

	include_once "../../classes/employee.php";
	include_once "../../classes/customer.php";
?>
<div class="employeepart">
	<div class="container">
		<center>
			<h1 class="display-3">Archived Accounts</h1>
		</center>
	</div>
</div>

<!--TABLE-->
<div class="container">
		<?php
		  $stmt = $employee->managerArchivedEmp();
		  echo "
		    <div class='container'>
		      <div class='col-md-12'>
		          <table class='table table-hover table-dark'>
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
		                    	<input type='button' class='btn btn-primary archive-object' archive-id='{$employeeId}' value='Restore Account'/>
		                    	<input type='button' class='btn btn-danger delete-object text-white' delete-id='{$employeeId}' value='Delete Account'/>
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
</div>
<!--TABLE-->

<script>
//restore
$(document).on('click', '.archive-object', function(){
    var employeeId = $(this).attr("archive-id");
    var q = confirm("Are you sure you want to restore this account?");
      if(q == true){
        $.post('util/restoreEmployee.php', {
          employeeId: employeeId
        }, function(data){
          location.reload();
        }).fail(function() {
          alert("Unable to Restore");
        });
      }
      return false;
});
//delete
$(document).on('click', '.delete-object', function(){
    var employeeId = $(this).attr("delete-id");
    var q = confirm("Are you sure you want to permanently delete this account?");
      if(q == true){
        $.post('util/deleteEmployee.php', {
          employeeId: employeeId
        }, function(data){
          location.reload();
        }).fail(function() {
          alert("Unable to Restore");
        });
      }
      return false;
});
</script>


<style>
  .employeepart{
    /*background-color: #606060;*/
    background-color: #ff5ead;
    padding: 30px;
    color: white;
  }
</style>