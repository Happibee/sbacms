<?php
	session_start();
	include_once 'includes/header.php';
?>

<div class="servicelogo">
  <div class="container">
    <h1 class="display-2"><center>Services</center></h1>
    <center>
    	<p class="lead">
    		Salon De Bliss provides a variety of services offered for our valued customers.
    	</p>
    	<?php
    		if(isset($_SESSION['custId'], $_SESSION['firstName'], $_SESSION['lastName'])){
			   $database = new Database();
  			 $db=$database->getConnection();
  
  			 $customer = new Customer($db);
  			 $stmt = $customer->readOneUser();
			}
			else {
				echo "
					<div class='reserve'>
						<p>Want to have an appointment? Book a schedule now by logging in! Login <a href='util/login.php'>here</a></p>
					</div>
				";
			}
    	?>
	</center>
  </div>
</div>



<!--FIRST ROW-->
<div class="form-row">
	<div class="hairservice col-md-6">
  		<div class="container">
    		<h1 class="display-4"><center>Hair Service</center></h1>
    		<center>
    		<p class="lead">
    			Salon De Bliss provides a variety of Hair Services.
    		</p>
			</center>
  		</div>
	</div>

	<div class="browservice col-md-6">
		<div class="container">
    		<h1 class="display-4"><center>Brow Service</center></h1>
    		<center>
    		<p class="lead">
    			Salon De Bliss provides Brow Services.
    		</p>
			</center>
  		</div>
	</div>
</div>
<!--SECOND ROW-->
<div class="form-row">
	<div class="nailservice col-md-6">
  		<div class="container">
    		<h1 class="display-4"><center>Nail Service</center></h1>
    		<center>
    		<p class="lead">
    			Salon De Bliss provides Nail Services.
    		</p>
			</center>
  		</div>
	</div>

	<div class="waxingservice col-md-6">
		<div class="container">
    		<h1 class="display-4"><center>Waxing Service</center></h1>
    		<center>
    		<p class="lead">
    			We also have Waxing Services.
    		</p>
			</center>
  		</div>
	</div>
</div>
<!--THIRD ROw-->
<div class="eventservice">
  <div class="container">
    <h1 class="display-4"><center>Event Services</center></h1>
    <center>
    	<p class="lead">
    		We can also go to events.
    	</p>
	</center>
  </div>
</div>

<!--DIV STYLES-->
<style>
	.servicelogo{
		background-color: #ededed;
		padding: 30px;
	}
	.homeservice, .nailservice, .waxingservice{
		/*background-color: #606060;*/
		background-color: #ff5ead;
		padding: 30px;
		color: white;
	}
</style>

<?php
	include_once 'includes/footer.php';
?>