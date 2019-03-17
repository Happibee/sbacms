<?php
	session_start();
	include_once 'includes/header.php';
?>

<div class="servicelogo">
  <div class="container">
  <h1 class="display-2"><center>Our Services</center></h1>
    <center>
    	<p class="lead">
    		Salon De Bliss provides a variety of services offered for our valued customers.
    	</p>
    	<?php
    		if(isset($_SESSION['custId'], $_SESSION['firstName'], $_SESSION['lastName'])){
			   $database = new Database();
  			 $db=$database->getConnection();
  
  			 $customer = new Customer($db);
  			 $stmt = $customer->readOneCustomer();
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

<!--Cards for services hair,brow,nail,wax-->
<div class="card-group">
  <div class="card">
    <img class="card-img-top" id='hair' src="../assets/img/hair.jpg" alt="Card image cap" data-toggle='modal' data-target='#viewModal'>
    <div class="card-body">
      <h5 class="card-title">Hair Service</h5>
      <p class="card-text">Salon de bliss provides hair services ranging from a regular haircut to rebonding.</p>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" id='brow' src="../assets/img/brow.jpg" alt="Card image cap" data-toggle='modal' data-target='#viewModal'>
    <div class="card-body">
      <h5 class="card-title">Brow Service</h5>
      <p class="card-text">We got you covered for your date! we will make sure that your eyebrows are 100% on fleek!</p>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" id='nail' src="../assets/img/nail.jpg" alt="Card image cap" data-toggle='modal' data-target='#viewModal'>
    <div class="card-body">
      <h5 class="card-title">Nail Service</h5>
      <p class="card-text">Life is not perfect, but your nails can be! and were dedicated to make it as pretty as it can be!</p>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" id='wax' src="../assets/img/wax.jpg" alt="Card image cap" data-toggle='modal' data-target='#viewModal'>
    <div class="card-body">
      <h5 class="card-title">Wax Service</h5>
      <p class="card-text">Waxing is a great way to eliminate hair in sensitive or difficult to reach areas and body waxing actually helps remove dead and dry skin cells.</p>
    </div>
  </div>
</div>
<br>
<!--SECOND ROW-->
<div class='container'>
<div class="card">
  <div class="card-body">
    <b><i>Salon De Bliss Offers a wide variety of services to our valued customers. Come check it out!</b></i>
  </div>
</div>
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Service Name</th>
      <th scope="col">Service Type</th>
      <th scope="col">Description</th>
      <th scope="col">Price</th>
      <th scope="col">Average Time</th>
			<th scope='col'>Home-Service Price</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Haircut</td>
      <td>Hair Service</td>
      <td>A regular haircut for girls</td>
      <td>120</td>
      <td>10-15mins</td>
			<td>150</td>
    </tr>
		<tr>
      <td>Haircut</td>
      <td>Hair Service</td>
      <td>A regular haircut for girls</td>
      <td>120</td>
      <td>10-15mins</td>
			<td>150</td>
    </tr>
		<tr>
      <td>Haircut</td>
      <td>Hair Service</td>
      <td>A regular haircut for girls</td>
      <td>120</td>
      <td>10-15mins</td>
			<td>150</td>
    </tr>
  </tbody>
</table>
</div>


<!--THIRD ROW-->
<div class="card text-center">
  <div class="card-header">
    Want more? dont worry, we gotchu!
  </div>
  <div class="card-body">
    <h5 class="card-title">Service Packages</h5>
    <p class="card-text">Want more? Salon De Bliss offers package services for our customers if they want to avail multiple services for their personal needs! Be it a wedding, debut, anniversary or even a simple date! we will make sure that you are always slaying!</p>
    <!-- Button to Open the Modal -->
    <input type='button' class='btn btn-secondary viewbtn' data-toggle='modal' data-target='#viewModal' value='View Packages'>
  </div>
</div>


<!--MODAL-->
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Salon De Bliss Packages</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class='modal-body' id='viewData'>
        <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Package Name</th>
      <th scope="col">Services</th>
      <th scope="col">Average Time</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Event 1</th>
      <td>service1, service2, service 3</td>
      <td>1-2hours</td>
      <td>5000</td>
    </tr>
    <tr>
      <th scope="row">Event 2</th>
      <td>service1, service2, service3</td>
      <td>2-3hours</td>
      <td>7000</td>
    </tr>
  </tbody>
</table>
      </div>


      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
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

  img {
    -webkit-filter: grayscale(100%); /* Safari 6.0 - 9.0 */
    filter: grayscale(100%);
    -webkit-transition: all .8s ease-in-out;
  }
  img:hover{
    filter: none;
    -webkit-filter: grayscale(0%);
  }
</style>

<?php
	include_once 'includes/footer.php';
?>
