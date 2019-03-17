<?php
	include_once "../../../config/database.php";
    include_once "../../../classes/service.php";
    include_once "../../../classes/serviceType.php";

	$database = new Database();
	$db = $database->getConnection();

	$service = new Service($db);

	if(isset($_POST['id'])){
	    $service->id = $_POST['id'];
	    $stmt = $service->readService();
  	}
  
	if(isset($_POST['update-service'])){
		$service->id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: Missing ID');
		$service->service_name = $_POST['service_name'];
	    $service->service_type = $_POST['service_type'];
	    $service->service_description = $_POST['service_description'];
	    $service->price = $_POST['price'];
		$service->average_time = $_POST['average_time'];

	    if ($service->updateService()){
	      header("Location: ../managerservice.php");
	    }
	    else {
			echo "<script>alert('failed')</script>";
		}
	      	
	}
?>
<form method="POST" id="addServiceForm" action="util/updateService.php?id=<?php echo $_POST['id'] ?>">
  <div class="form-row">
    <div class="form-group col-sm-12">
        <label for="inputState">Service Type</label>
			<select class="form-control" name="service_type">
                <option selected>Choose Service Type</option>
                <?php
                    $serviceType = new ServiceType($db);
                    $st = $serviceType->readServiceTypes();
                    
                    while ($data = $st->fetch(PDO::FETCH_ASSOC)) {
                        if ($data['id'] == $service->service_type){
                            echo '<option value="'.$data['id'].'" selected>' . $data['service_type'] . '</option>'; 
                        }
                        else {
                            echo '<option value="'.$data['id'].'">' . $data['service_type'] . '</option>'; 
                        }
                    }
                ?> 
            </select>
		</div>
  </div>
  
	<div class="form-row">
		<div class="form-group col-sm-12">
			<label>Service Name</label>
			<input type="text" class="form-control" name="service_name" value = '<?php  echo $service->service_name; ?>' required>
		</div>
  </div>
  <div class="form-row">
		<div class="form-group col-sm-12">
			<label>Service Description</label>
			<input type="text" class="form-control" name="service_description" value = '<?php  echo $service->service_description; ?>' required>
		</div>
	</div>
  <div class="form-row">
		<div class="form-group col-sm-6">
			<label>Price</label>
			<input type="number" class="form-control" name="price" value = '<?php  echo $service->price; ?>' required>
		</div>
		<div class="col-sm-6">
			<label>Average Time</label>
			<input type="text" class="form-control" name="average_time" value = '<?php  echo $service->average_time; ?>' required>
		</div>
	</div>
	<div class="form-row">
		<div class='form-group col-md-12 mt-2'>
				<button type="submit" name="update-service" id='update-service' class="btn btn-info">Submit</button>
        
				<button class="btn btn-danger"  data-dismiss="modal" aria-label="Close">Cancel</button>
		</div>
	</div>
        	</form>