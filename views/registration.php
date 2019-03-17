<?php
  ob_start();
	include_once 'includes/header.php';
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
        <input type="text" class="form-control" id="inputFirstname" placeholder="First Name" name="firstName" required>
      </div>
      <div class="form-group col-md-4">
        <label for="inputEmail4"><font color="white">Last Name *</font></label>
        <input type="text" class="form-control" id="inputFirstname" placeholder="First Name" name="lastName" required>
      </div>
      <div class="form-group col-md-4">
        <label for="inputEmail4"><font color="white">User Name *<font color="white"></label>
        <input type="text" class="form-control" id="inputFirstname" placeholder="First Name" name="userName" required>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-6">
        <label for="inputEmail4"><font color="white">Email *</font></label>
        <input type="email" class="form-control" id="inputFirstname" placeholder="First Name" name="emailAdd" required>
      </div>
      <div class="form-group col-md-6">
        <label for="inputEmail4"><font color="white">Password *</font></label>
        <input type="password" class="form-control" id="inputFirstname" placeholder="First Name" name="password" required>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-8">
        <label for="inputEmail4"><font color="white">Address *</font></label>
        <input type="text" class="form-control" id="inputFirstname" placeholder="First Name" name="address" required>
      </div>
      <div class="form-group col-md-4">
        <label for="inputEmail4"><font color="white">Contact Number *</font></label>
        <input type="text" class="form-control" id="inputFirstname" placeholder="First Name" name="contactNo" required>
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

  <div class="container">
        <?php
          $database = new Database();
          $db = $database->getConnection();

          $customer = new Customer($db);

          if($_POST){
            $customer->firstName = $_POST['firstName'];
            $customer->lastName = $_POST['lastName'];
            $customer->userName = $_POST['userName'];
            $customer->emailAdd = $_POST['emailAdd'];
            $customer->password = $_POST['password'];
            $customer->address = $_POST['address'];
            $customer->contactNo = $_POST['contactNo'];

            if ($customer->createUser()){
              header("Location: index.php");
            }
            else{
              echo "Unsuccessful";
            }

          }
        ?>
  </div>
</form>
<script> 
  /*$(document).on('click', '.submit-object', function(){
    var id = $(this).attr('submit');
    var q = confirm("Do you want to register?");
    
    if(q == true){
      $.post('login.php', {
        custId: id
      }, function(data){
        location.reload();
      }).fail(function() {
        alert("Unable to create Account");
      });
    }
    return false;
  });*/
</script>
<style>
  .container{
    background-color: #444444;
    border-radius: 5px;
  }
  .res{
    /*background-color: #606060;*/
    padding: 30px;
  }
</style>