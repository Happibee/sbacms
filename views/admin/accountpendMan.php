<?php
	session_start();
	$page_title = "Pending Manager Accounts";
	include_once 'adminheader.php';
	$database = new Database();
	$db = $database->getConnection();
?>
<br><br>
<div class="container">
	<center>
		<h1 class='display-4'>Pending Accounts</h1>
	</center>
</div>
<br><br>
<!--Table of pending admin accounts-->
<?php
	$employee = new Employee($db);
	$stmt = $employee->readPendMan();
	echo "
	<div class='container'>
		<div class='row'>
			<div class='col-md-3'>
			</div>
			<div class='col-md-6'>
				<table class='table table-borderless table-hover'>
				<thead>
					<tr>
						<th scope='col'>First Name</th>
						<th scope='col'>Last Name</th>
						<th scope='col'><center>Action</center></th>
					</tr>
				</thead>
				<tbody>";
				while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
				extract($row);
					echo "
					<tr class='table-primary'>
						<td>{$firstName}</td>
						<td>{$lastName}</td>
						<td>
							<input type='button' class='btn btn-primary' value='View Details'>
							<input type='button' class='btn btn-success approve-object text-white' approve-id='{$employeeId}' value='Approve'/>
							<input type='button' class='btn btn-danger decline-object text-white' decline-id='{$employeeId}' value='Decline'/>
						</td>
					</tr>";
				}
				echo "
				</tbody>
				</table>
			</div>
			<div class='col-md-3'>
			</div>
		</div>
	</div>";
?>
<script>
//Approve
$(document).on('click', '.approve-object', function(){
    var employeeId = $(this).attr("approve-id");
    var q = confirm("Approve Manager?");
      if(q == true){
        $.post('approve.php', {
	    	employeeId: employeeId
	    }, function(data){
	      location.reload();
	    }).fail(function() {
	    	alert("Unable to Approve");
        });
      }
      return false;
});
//Decline
$(document).on('click', '.decline-object', function(){
    var employeeId = $(this).attr("decline-id");
    var q = confirm("Decline Account?");
      if(q == true){
        $.post('decline.php', {
	    	employeeId: employeeId
	    }, function(data){
	      location.reload();
	    }).fail(function() {
	    	alert("Unable to Decline");
        });
      }
      return false;
});
</script>


<?php
	include_once 'adminfooter.php';
?>