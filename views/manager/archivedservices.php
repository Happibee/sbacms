<?php
	session_start();
	include "managerheader.php";
	include_once "../../config/database.php";
	include_once "../../classes/service.php"

?>
<div class="employeepart">
	<div class="container">
		<center>
			<h1 class="display-3">Archived Services</h1>
		</center>
	</div>
</div>

<!--TABLE-->
<?php
    $service = new Service($db);
    $stmt = $service->archivedService();
?> 
<div class='container'>
  <center>
      <table class='table table-hover table-dark'>
        <thead>
          <tr>
            <th scope='col'>ID Number</th>
            <th scope='col'>Service Type</th>
            <th scope='col'>Service Name</th>
            <th scope='col'>Service Description</th>
            <th scope='col'>Price</th>
            <th scope='col'>Average Time</th>
            <th scope='col'>Action</th>
          </tr>
        </thead>
      <?php
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        echo "
        <tbody>
            <tr>
              <td>{$id}</td>
              <td>{$type}</td>
              <td>{$name}</td>
              <td>{$description}</td>
              <td>{$price}</td>
              <td>{$average_time}</td>

              <td>
                <a href='serviceedit.php?serviceId={$serviceId}' class='btn btn-secondary'>Edit</a>
                <input type='button' class='btn btn-danger delete-object text-white' delete-id='{$serviceId}' value='Delete Service'/>
                <input type='button' class='btn btn-primary archive-object' archive-id='{$serviceId}' value='Restore Service'/>
              </td>
            </tr>";
        }
        ?>
        </tbody>
      </table>
  </center>
</div>
<script>
//restore
$(document).on('click', '.archive-object', function(){
    var serviceId = $(this).attr("archive-id");
    var q = confirm("Are you sure you want to restore this Service?");
      if(q == true){
        $.post('restoreService.php', {
          serviceId: serviceId
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
    var serviceId = $(this).attr("delete-id");
    var q = confirm("Are you sure you want to permanently delete this Service?");
      if(q == true){
        $.post('deleteEmployee.php', {
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
<!--TABLE-->
<style>
  .employeepart{
    /*background-color: #606060;*/
    background-color: #ff5ead;
    padding: 30px;
    color: white;
  }
</style>