<!--HOME PAGE FOR GUESTS-->
<?php
  session_start();
	include_once 'header.php';
	include_once 'config/database.php';
  include_once 'classes/customer.php';

  if(!isset($_SESSION['custId'])){
    header("Location: guesthome.php");
  }
?>
<!--Salon part-->
<div class="homesalon">
  <div class="container">
    <h1 class="display-4"><center>Our Salon</center></h1>
    <center>
    	<p class="lead">
    		Salon De Bliss provides a comfortable environment that feels like you're right at home.
    	</p>
	</center>
  </div>
</div>
<!--Services part-->
<div class="homeservice">
  <div class="container">
    <h1 class="display-4"><center>Our Services</center></h1>
    <center>
    	<p class="lead">
    		Salon De Bliss provides quality services by our humble and talented stylists.
    	</p>
	</center>
    </p>
  </div>
 <!--Stylists part-->
</div>
<div class="homesalon">
  <div class="container">
    <h1 class="display-4"><center>Our Stylists</center></h1>
    <center>
    	<p class="lead">
    		Salon De Bliss have Stylists that will suit your needs when it comes to services we offer.
    	</p>
    </center>
  </div>
</div>

<!--FEEDBACKS-->
<div class="feed">
  <div class="container">
    <h1 class="display-4"><center>Feedbacks</center></h1>
    <center>
      <p class="lead">
        Feedbacks of our Customers
      </p>
    </center>
    <div class='container'>
        &nbsp
        <center>
          <div class="col-sm-6">
              <font size='6'>"Maganda ang Service, friendly ang mga employees :)"</font>
          </div>
          <div class="col-sm-6">
              <font size='4'>Rating: 5/5</font> <br>
          </div>
          <div class="col-sm-5">
              -Jaydee <br>
          </div>
        </center>
    </div>
  </div>
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
  .feed{
    background-color: #353535;
    padding: 10px;
    color: white;
  }
</style>

<?php
	include_once 'footer.php';
?>