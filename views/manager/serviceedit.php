<?php
	session_start();
	include_once "managerheader.php";
	include_once "../classes/service.php";
	include_once "../config/database.php";

	$serviceId = isset($_GET['serviceId']) ? $_GET['serviceId'] : die('ERROR: missing ID.');

	$database = new Database();
  	$db = $database->getConnection();

	$service = new Service($db);
	$service->serviceId=$serviceId;
    $service->readOneService();

    if(isset($_POST['update'])){
		$service->serviceName = $_POST['serviceName'];
		$service->serviceDescription = $_POST['serviceDescription'];
		$service->price = $_POST['price'];
		$service->averageTime = $_POST['averageTime'];
	
		//if successful, goes to managerhome
		if ($service->updateService()){
			echo "Successful";
			header("Location: managerhome.php");
		}
		else{
			echo "Unsuccessful";
	  	}
  	}

?>
<form method="POST" action="serviceedit.php?serviceId=<?php echo $service->serviceId;?>">
<div class="container">
	<div class="form-group">
			<label for="serviceName"><b>Service Name</b></label>
    			<input type="text" class="form-control" name="serviceName" value = "<?php echo $service->serviceName; ?>">
    		<label for="serviceDescription"><b>Service Description</b></label>
				<textarea class="form-control" name="serviceDescription"><?php echo $service->serviceDescription; ?>
				</textarea>
			<label for="price"><b>Price</b></label>
    			<input type="text" class="form-control" name="price" value = "<?php echo $service->price; ?>">
    		<label for="averageTime"><b>Average Time</b></label>
    			<input type="text" class="form-control" name="averageTime" value = "<?php echo $service->averageTime; ?>">
	</div>
	<div class="form-group">
    	<center>
			<button type="submit" name="update" class="btn btn-primary">Submit</button>
			<a href="managerservice.php" class="btn btn-danger">Cancel</a>
		</center>
	</div>
</div>
</form>