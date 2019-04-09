<?php
  ob_start();
  include_once 'includes/header.php';
  include_once "../classes/employee.php";

  if(isset($_SESSION['custId']) && isset($_SESSION['type']) == "Customer"){
    header('Location: userhome.php');
  }
  elseif(isset($_SESSION['employeeId']) && isset($_SESSION['type']) == "Employee"){
    header('Location: employee/employee.php');
  }

  include_once "../classes/user.php";
          
          $database = new Database();
          $db = $database->getConnection();

          $user = new User($db);

          if ($_POST) {
            //verify if username or email exists
            if($user->existingUNameAndEmail()){
              echo '
              <center>
                <div class="alert alert-danger" role="alert">
                  Username and email are taken!
                </div>
              </center>
              ';
            }
            elseif($user->existingUName()){
              echo '
              <center>
                <div class="alert alert-danger" role="alert">
                  Username is taken!
                </div>
              </center>
              ';
            }
            elseif($user->existingEmail()){
              echo '
              <center>
                <div class="alert alert-danger" role="alert">
                  Email is used!
                </div>
              </center>
              ';
            }
            else {
              $user->username = $_POST['username'];
              $user->email = $_POST['email'];
              $user->type = "Customer";
              $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);

              $user->firstname = $_POST['firstname'];
              $user->lastname = $_POST['lastname'];
              $user->address = $_POST['address'];
              $user->contactno = $_POST['contactno'];
            
              if ($user->createUser()) {
                header("Location: index.php");
              } else {
                echo "Unsuccessful";
              }
            }
            

          }
?>
<form method="POST" action="registration.php">
<div class="">
</div>
  <div class="res">
    <h1 class="display-4"><center>Registration</center></h1>
  </div>

  <!--Updated singup form-->
  <div class="container">
    &nbsp
    <div class="row">
      <div class="form-group col-md-4">
        <label for="inputEmail4"><font color="white">First Name *</font></label>
        <input type="text" class="form-control" id="inputFirstname" placeholder="First Name" name="firstname" required>
      </div>
      <div class="form-group col-md-4">
        <label for="inputEmail4"><font color="white">Last Name *</font></label>
        <input type="text" class="form-control" id="inputFirstname" placeholder="Last Name" name="lastname" required>
      </div>
      <div class="form-group col-md-4">
        <label for="inputEmail4"><font color="white">User Name *<font color="white"></label>
        <input type="text" class="form-control" id="inputFirstname" placeholder="Username" name="username" required>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-6">
        <label for="inputEmail4"><font color="white">Email *</font></label>
        <input type="email" class="form-control" id="inputFirstname" placeholder="Email Address" name="email" required>
      </div>
      <div class="form-group col-md-6">
        <label for="inputEmail4"><font color="white">Password *</font></label>
        <input type="password" class="form-control" id="inputFirstname" placeholder="password" name="password" required>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-8">
        <label for="inputEmail4"><font color="white">Address *</font></label>
        <input type="text" class="form-control" id="inputFirstname" placeholder="Address" name="address" required>
      </div>
      <div class="form-group col-md-4">
        <label for="inputEmail4"><font color="white">Contact Number *</font></label>
        <input type="number" class="form-control" id="inputFirstname" placeholder="Contact Number" name="contactno" required>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-4"> 
      </div>
      <div class="form-group col-md-4">
      </div>
      <div class="form-group col-md-4" align="right">
        <button type="submit" class="btn btn-primary submit-object">Submit</button>
          &nbsp
        <a href="index.php" class="btn btn-danger">Cancel</a>
      </div>
    </div>
    &nbsp
  </div>
</form>

<style>
  .container{
    background-color: #f8f1f2;
    border-radius: 5px;
  }
  .res{
    /*background-color: #606060;*/
    padding: 30px;
  }
</style>
&nbsp
<?php
  include_once "footer.php";
?>