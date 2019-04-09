<?php
	session_start();
	include_once 'includes/header.php';
?>

	<div class="jumbotron jumbotron-fluid">
  		<div class="container">
  			<div class="row">
  				<div class="col-sm-7">
					<div class="card border-light mb-3" style="max-width: 35rem;">
  					<div class="card-header">Contact us!</div>
  				<div class="card-body">
    				<h5 class="card-title">Please contact us with the following credentials</h5>
    				<p class="card-text">Email: Sbacms@email.com</p>
						<p class="card-text">Contact no: 09xx-xxx-xxxx</p>
  				</div>
					</div>
    			</div>
					<div class="card border-success mb-3" style="max-width: 33rem;">
  <div class="card-header">Business Hours</div>
  <div class="card-body text-success">
    <h5 class="card-title">We're open from Monday to Sunday!</h5>
    <p class="card-text">8AM to 7PM!</p>
	</div>

  <?php
    if(isset($_SESSION['username']) && isset($_SESSION['type']) == "Customer"){
      $database = new Database();
        $db=$database->getConnection();
  
        $customer = new Customer($db);
        $stmt = $customer->readOneCustomer();
    }
    else {
      echo "
        <div class='feedback jumbotron-fluid'>
          <p class='lead'>Want to give feedback? Login and tell us your thoughts!&nbsp;<a href='util/login.php' class='btn btn-warning btn-sm'>Login</a></p>
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
	include_once 'includes/footer.php';
?>