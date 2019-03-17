<?php
	session_start();
	include "adminheader.php";
	include_once "../config/database.php";

	include_once "../classes/customer.php";
	include_once "../classes/employee.php";
?>
<div class="employeepart">
	<div class="container">
		<center>
			<h1 class="display-3">Archive</h1>
		</center>
	</div>
</div>

<!--TABLE-->
<div class="container">
	<div class="col-sm-12">
		<h1 class="display-4"><center>Accounts</center></h1>
		</div>
		<?php
		  $stmt = $employee->adminArchivedManager();
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
        $.post('util/restoreManager.php', {
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
    var q = confirm("Are you sure you want to delete this account?");
      if(q == true){
        $.post('util/deleteManager.php', {
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