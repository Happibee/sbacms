<?php
  include_once '../../config/database.php';
  include_once '../../classes/employee.php';


  if(isset($_SESSION['employeeId'])){
        $database = new Database();
        $db=$database->getConnection();
  
 
        $employee = new Employee($db);
      echo "
      <nav class='navbar navbar-expand-lg navbar-light bg-light'>
      <a class='nav-item nav-link active' href='managerhome.php'>
          <img src='../../assets/img/navbarlogo.png' width='200' height='35' class='d-inline-block align-top'>
      </a>
        <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNavAltMarkup' aria-controls='navbarNavAltMarkup' aria-expanded='false' aria-label='Toggle navigation'>
          <span class='navbar-toggler-icon'></span>
        </button>
      <div class='collapse navbar-collapse' id='navbarNavAltMarkup'>
        <div class='navbar-nav'>
            <a class='nav-item nav-link active' href='managerhome.php'>HOME
            <span class='sr-only'>(current)</span></a>
            <a class='nav-item nav-link' href='manageraccount.php'>ACCOUNT</a>
            <a class='nav-item nav-link' href='managerappointments.php'>APPOINTMENTS</a>
            <a class='nav-item nav-link' href='managerservice.php'>SERVICES</a>
            <a class='nav-item nav-link' href='managerpackage.php'>PACKAGE</a>
            <a class='nav-item nav-link' href='managerreport.php'>MAKE REPORT</a>
        </div>
        <div class='navbar-nav'>
        </div>
      </div>
            <a class='nav-item nav-link' href='archivedaccounts.php'>Archived Accounts</a>
            <a class='nav-item nav-link' href='archivedservices.php'>Archived Services</a>
            <a href='managerlogout.php' class='btn btn-danger'>Log Out</a>
      </nav>";
    }
    else {
      Header("Location: ../employee/employeelogin.php");
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