<!--HOME PAGE FOR GUESTS-->
<?php
  session_start();
	include_once 'includes/header.php';
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
<!--Carousel-controls-indicator-->
<div class="container">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="../assets/img/salon1.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="../assets/img/salon2.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="../assets/img/salon3.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
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
  </div>
<!--Carousel-controls-indicator-->
<div class="container">
<div id="carouselExampleIndicators1" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators1" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators1" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators1" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="../assets/img/serv1.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="../assets/img/serv2.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="../assets/img/serv3.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators1" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators1" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
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
<!--Carousel-controls-indicator-->
<div class="container">
<div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators2" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="../assets/img/sty1.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="../assets/img/sty2.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="../assets/img/sty3.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>

<!--FEEDBACKS-->
<div class="feed">
  <div class="container">
    <h1 class="display-4"><center>Feedback</center></h1>
    <center>
      <p class="lead">
        Feedback from our Customers
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
</style>

<?php
	include_once 'includes/footer.php';
?>