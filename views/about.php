<?php
	session_start();
	include_once "includes/header.php";

	if(isset($_SESSION['custId'])){
			$database = new Database();
  			$db=$database->getConnection();
  
  			$customer = new Customer($db);
  			$stmt = $customer->readOneUser();
	}
?>
<div class="aboutwindow">
  <div class="container">
    <h1 class="display-4">About Us</h1>
    <p class="lead">
    	Salon De Bliss is a full service men and women’s hair salon located at Lower Assumption Road, Baguio City.
    </p>
    <p>
    	The business started out when Ms.Jennifer        
    	Lizardo bought the stall from a previous owner. The 
    	salon is the first business of Ms. Jennifer 
    	Lizardo, the proud owner of the salon. She managed the business and 
    	kept it with only two employees at that time. Now 
    	she has 5 employees; 3 regular and 2 are on-call.
	</p>
	<p>
		The company started with 3 services: hair services, 
		threading and makeup. However, because 
    	of the regular customers they added other services 
    	like: manicure, pedicure and waxing.

	</p>
  </div>
</div>

<br>

	<div class="form-row">
		<div class="form-group col-md-4">
			<center><h2>We are located here:</h2>
					</br>
					</br>
					<img width="90px" height="90px" src="../assets/img/arrowright.png">
			</center>
		</div>
		<div class="form-group col-md-4">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d478.4046475800966!2d120.59729987773876!3d16.412776311070633!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3391a15d7ab2830b%3A0x262169bb9eb907ef!2sBohemian+Cafe!5e0!3m2!1sen!2sph!4v1547889067670" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
		<div class="form-group col-md-4">
			<p>Our Main Address:</p>
			<p class="lead">
				Room #201, 2nd floor of
    			Bohemian Cafe, Lower Assumption Road Baguio City.
			</p>
		</div>
	</div>
<style>
	.aboutwindow{
		background-color: #ededed;
		padding: 30px;
	}
</style>
<?php
	include_once "includes/footer.php";
?> 