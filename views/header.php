<?php
  include_once 'config/database.php';
  include_once 'classes/customer.php';


  if(isset($_SESSION['custId'])){
        $database = new Database();
        $db=$database->getConnection();
  
 
        $customer = new Customer($db);
      echo "
      <nav class='navbar navbar-expand-lg navbar-light bg-light'>
      <a class='nav-item nav-link active' href='index.php'>
          <img src='pics/navbarlogo.png' width='200' height='35' class='d-inline-block align-top'>
      </a>
        <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNavAltMarkup' aria-controls='navbarNavAltMarkup' aria-expanded='false' aria-label='Toggle navigation'>
          <span class='navbar-toggler-icon'></span>
        </button>
      <div class='collapse navbar-collapse' id='navbarNavAltMarkup'>
        <div class='navbar-nav'>
            <a class='nav-item nav-link active' href='index.php'>HOME<span class='sr-only'>(current)</span></a>
            <a class='nav-item nav-link' href='services.php'>SERVICES</a>
            <a class='nav-item nav-link' href='about.php'>ABOUT US</a>
            <a class='nav-item nav-link' href='contact.php'>CONTACT US</a>
            <a class='nav-item nav-link' href='reservation.php'>SHEDULE NOW</a>
            <a class='nav-item nav-link' href='review.php'><font color='#ff5ead'>RATE US!</font></a>
        </div>
        <div class='navbar-nav'>
        </div>
      </div>
        <a class='nav-item nav-link' href='account.php'>Account</a>
        <a class='nav-item nav-link' href='custappointment.php'>Appointments</a>
        <a class='nav-item nav-link' href='record.php'><font color='black'>History</font></a>
        <a href='logout.php' class='btn btn-danger'>Log Out</a>
      </nav>";
    }
    else {
      echo "
      <nav class='navbar navbar-expand-lg navbar-light bg-light'>
      <a class='nav-item nav-link active' href='index.php'>
          <img src='pics/navbarlogo.png' width='200' height='35' class='d-inline-block align-top'>
      </a>
        <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNavAltMarkup' aria-controls='navbarNavAltMarkup' aria-expanded='false' aria-label='Toggle navigation'>
          <span class='navbar-toggler-icon'></span>
        </button>
      <div class='collapse navbar-collapse' id='navbarNavAltMarkup'>
        <div class='navbar-nav'>
            <a class='nav-item nav-link' href='index.php'>HOME</a>
            <a class='nav-item nav-link' href='services.php'>SERVICES</a>
            <a class='nav-item nav-link' href='about.php'>ABOUT US</a>
            <a class='nav-item nav-link' href='contact.php'>CONTACT US</a>
            <a class='nav-item nav-link' href='login.php'>SHEDULE NOW</a>
        </div>
        <div class='navbar-nav'>
        </div>
      </div>
      <div>";
          
      echo "
      <a href='login.php' class='btn btn-info'>Login</a>
      <a href='useradd.php' class='btn btn-outline-info'>Register</a>
      </div>
      </nav>";
    }
?>
<html>
  <head>
    <title></title>
      <link rel="stylesheet" href="assets/bootstrap/4.2.1/css/bootstrap.min.css">
      <script src="assets/jquery-3.3.1.slim.min.js"></script>
      <script src="assets/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
      <script src="assets/bootstrap/4.2.1/js/bootstrap.min.js"></script>

      
      <!-- DATE PICKER JAVASCRIPT and CSS -->
      <script type="text/javascript" src="assets/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
      <link rel="stylesheet" href="assets/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>


      <article class='logo'>
        <div class='jumbotron text-center'>
            <!--<p class='lead'>Welcome To</p>-->
            <!--<h1 class='salonname'>Salon De Bliss</h1>-->
            <img width='600px' height='170px' src='pics/title.png'>
        </div>
      </article>


<!--STYLES-->
<style>
    .logo{
      width:100%;
      background-color: #edeff2;
    }
    .logo .jumbotron{
      padding: 50px 30px;
      margin: 0px;
      background-image: url(pics/sbacmsblank.jpg);
      background-size: cover;
      background-repeat: no-repeat;
      color: white;
      border-radius: 0;
}
    .form-gap {
    padding-top: 70px;
}
</style>
</head>
<body>