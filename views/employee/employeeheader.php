<?php
  include_once '../../config/database.php';
  include_once '../../classes/employee.php';

  $database = new Database();
        $db=$database->getConnection();

  if(isset($_SESSION['employeeId'])){
        $employee = new Employee($db);
      echo "
      <nav class='navbar navbar-expand-lg navbar-light bg-light'>
      <a class='nav-item nav-link active' href='employee.php'>
          <img src='../../assets/img//navbarlogo.png' width='200' height='35' class='d-inline-block align-top'>
      </a>
        <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNavAltMarkup' aria-controls='navbarNavAltMarkup' aria-expanded='false' aria-label='Toggle navigation'>
          <span class='navbar-toggler-icon'></span>
        </button>
      <div class='collapse navbar-collapse' id='navbarNavAltMarkup'>
        <div class='navbar-nav'>
            <a class='nav-item nav-link active' href='employee.php'>HOME 
            <span class='sr-only'>(current)</span></a>
            <a class='nav-item nav-link' href='employeeaccount.php'>ACCOUNT</a>
            <a class='nav-item nav-link' href='employeeappointment.php'>APPOINTMENTS</a>
        </div>
        <div class='navbar-nav'>
        </div>
      </div>
          <span class='navbar-text'>
          Welcome ".$_SESSION['firstName'].", You're an ".$_SESSION['type']."!
          </span>
          &nbsp
          <a href='employeelogout.php' class='btn btn-danger'>Log Out</a>
      </nav>";
    }
    else {
      echo "
      <nav class='navbar navbar-expand-lg navbar-light bg-light'>
      <a class='nav-item nav-link active' href='employee.php'>
          <img src='../../assets/img/navbarlogo.png' width='200' height='35' class='d-inline-block align-top'>
      </a>
        <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNavAltMarkup' aria-controls='navbarNavAltMarkup' aria-expanded='false' aria-label='Toggle navigation'>
          <span class='navbar-toggler-icon'></span>
        </button>
      <div class='collapse navbar-collapse' id='navbarNavAltMarkup'>
        <div class='navbar-nav'>
            <a class='nav-item nav-link active' href='employee.php'>HOME<span class='sr-only'>(current)</span></a>
            
        </div>
        <div class='navbar-nav'>
        </div>
      </div>
            
      </nav>";
    }
?>
<html>
  <head>
    <title></title>
      <link rel="stylesheet" href="../../assets/bootstrap/4.2.1/css/bootstrap.min.css">
      <script src='../../assets/jquery/3.2.1/jquery-3.2.1.slim.min.js'></script>
      <script src="../../assets/jquery/3.3.1/jquery-3.3.1.min.js"></script>
      <script src="../../assets/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
      <script src="../../assets/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  </head>
  <body>