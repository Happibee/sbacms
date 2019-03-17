<?php
  include_once '../../config/database.php';
  include_once '../../classes/employee.php';


  if(isset($_SESSION['employeeId'])){
        $database = new Database();
        $db=$database->getConnection();
  
 
        $employee = new Employee($db);
      echo "
      <nav class='navbar navbar-expand-lg navbar-light bg-light'>
      <a class='navbar-brand' href='adminhome.php'>
        <img src='../../assets/img//navbarlogo.png' width='200' height='35' class='d-inline-block align-top'>
      </a>
        <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNavAltMarkup' aria-controls='navbarNavAltMarkup' aria-expanded='false' aria-label='Toggle navigation'>
          <span class='navbar-toggler-icon'></span>
        </button>
      <div class='collapse navbar-collapse' id='navbarNavAltMarkup'>
        <div class='navbar-nav'>
            <a class='nav-item nav-link active' href='adminhome.php'>HOME 
            <span class='sr-only'>(current)</span></a>
            <a class='nav-item nav-link' href='adminaccount.php'>ACCOUNT</a>
            <a class='nav-item nav-link' href='adminarchive.php'>ARCHIVE</a>
        </div>
        
        <div class='navbar-text' id='message'>
          Welcome ".$_SESSION['firstName'].", You're an ".$_SESSION['type']."!
        </div>

        </div>
      </div>
          <span class='navbar-text'>
            Welcome ".$_SESSION['firstName'].", You're an ".$_SESSION['type']."!
          </span>
          &nbsp
          <a href='adminlogout.php' class='btn btn-danger'>Log Out</a>
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

  <script>
    //message disappears after 2 seconds
    setTimeout(function(){
    document.getElementById('message').style.display = 'none';
    }, 2000);
  </script>