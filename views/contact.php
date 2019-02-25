<?php
	session_start();
	include_once 'header.php';
	include_once 'config/database.php';
  include_once 'classes/customer.php';
?>

	<div class="jumbotron jumbotron-fluid">
  		<div class="container">
  			<div class="row">
  				<div class="col-sm-7">
    				<h1 class="display-4">Contact Us</h1>
    				<br>
    				<p class="lead">Feel free to contact us in any way you like!</p>
    				<p>E: salondebliss@email.com</p>
    				<p>P: 09213456780</p>
    			</div>
    			<div class="col-sm-5">
    				<h1 class="display-4">Working Hours</h1>
    				<p>We're open everyday from Monday to Sunday</p>
            <p>8am - 7pm</p>
    			</div>
    		</div>
  		</div>
	</div>

  <?php
    if(isset($_SESSION['custId'])){
      $database = new Database();
        $db=$database->getConnection();
  
        $customer = new Customer($db);
        $stmt = $customer->readOneUser();
    }
    else {
      echo "
        <div class='feedback jumbotron-fluid'>
          <p class='lead'>Want to give feedback? Login and tell us your thoughts!&nbsp;<a href='login.php' class='btn btn-warning btn-sm'>Login</a></p>
         </div>
      ";
    }
  ?>
	

	<style>
		.feedback {
			background-color: #606060;
			padding: 4px;
			color: white;
			margin: 0px;
		}
	</style>

<?php
	include_once 'footer.php';
?>