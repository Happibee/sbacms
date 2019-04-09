<?php
	session_start();
	include "managerheader.php";
  include_once '../../classes/service.php';
  include_once '../../classes/serviceType.php';

	if(!isset($_SESSION['username'])){
    	header('Location: ../util/login.php');
  	}

  	$database = new Database();
		$db=$database->getConnection();
  
?>
<!--Services part-->
<div class="homeservice">
  <div class="container">
  <h1 class="display-4"><center>Services</center></h1>
  </div>
</div>
&nbsp
<div align='center' class="container">
<button type='button' class='btn btn-success' data-toggle='modal' data-target='#addService'>Add a Service</button>
</div>
<!--SERVICES CONTENT-->
<?php
    $service = new Service($db);
    $stmt = $service->readServices();
    
?>   

<div class='container'>
  <center>
      <table class='table table-borderless'>
        <thead>
          <tr>
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
              <td>".$row['service_name']."</td>
              <td>".$row['service_type']."</td>
              <td>".$row['service_description']."</td>
              <td>".$row['price']."</td>
              <td>".$row['average_time']."</td>";

            echo "
            <td>
						<button type='button' class='btn btn-warning update-service' id='{$id}'>Edit</button>
						
						<button type='button' class='btn btn-danger delete-archive-service' id='{$id}' event= 'delete'>Delete</button>
						
            <button type='button' class='btn btn-secondary delete-archive-service' id='{$id}' event='archive'>Archive</button>
          </td>
            ";
             ?>
              
            </tr>
        <?php
        }
        ?>
        </tbody>
      </table>
  </center>
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


<!--Modal-->
<!--Add-->
<div class="modal fade" id="addService" tabindex="-1" role="dialog" aria-labelledby="addServiceLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
		
      <div class="modal-header">
        <h5 class="modal-title">Add New Service</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form method="post" id="addServiceForm">
  				<div class="form-row">
						<div class="form-group col-sm-12">
    					<label for="inputState">Service Type</label>
							<select class="form-control" name="service_type">
								<option selected>Choose Service Type</option>
								<?php
									$serviceType = new ServiceType($db);
									$st = $serviceType->readServiceTypes();
									
									while ($data = $st->fetch(PDO::FETCH_ASSOC)) {
										echo '<option value="'.$data['id'].'">' . $data['service_type'] . '</option>'; }
								?> 
							</select>
						</div>
  				</div>
  
					<div class="form-row">
						<div class="form-group col-sm-12">
							<label>Service Name</label>
							<input type="text" class="form-control" name="service_name">
						</div>
					</div>
					
					<div class="form-row">
						<div class="form-group col-sm-12">
							<label>Service Description</label>
							<input type="text" class="form-control" name="service_description">
						</div>
					</div>
					
					<div class="form-row">
						<div class="form-group col-sm-6">
							<label>Price</label>
							<input type="number" class="form-control" name="price">
						</div>
						
						<div class="col-sm-6">
							<label>Average Time</label>
							<input type="text" class="form-control" name="average_time">
						</div>
					</div>
				
					<div class="form-row">
						<div class='form-group col-md-12 mt-2'>
								<button type="submit" name="add-service" id='add-service' class="btn btn-info">Submit</button>
								<button class="btn btn-danger"  data-dismiss="modal" aria-label="Close">Cancel</button>
						</div>
					</div>
					
      	</form>
    	</div>
		</div>
  </div>
</div>

	<!--Edit-->
<div class="modal fade" id="updateService" tabindex="-1" role="dialog" aria-labelledby="updateServiceLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Service Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div id='updateServiceModalContent' class="modal-body"> 
      </div>

      <div class="modal-footer">
      </div>
			
    </div>
  </div>
</div>

  <?php
	include_once "../includes/footer.php";
?>