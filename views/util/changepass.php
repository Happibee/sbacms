<!-- Change customer password -->
<?php
  include_once '../../classes/customer.php';
  include_once '../../config/database.php';
  

  $database = new Database();
    $db = $database->getConnection();

    $customer = new Customer($db);

    if(isset($_GET['verify'])){
        $customer->pass_code = $_GET['verify'];
        $customer->setPassCode();
        if($_POST){
            $customer->password = $_POST['password'];
            if ($customer->changePass()){

              echo "password changed!";
              //header("Location: login.php");
            }
            else{
              echo "password not changed!";
            }

        }
    }
?>
<br>
<br>
<html>
	<head>
		<title></title>
			<link rel="stylesheet" href="assets/bootstrap/4.2.1/css/bootstrap.min.css">
	      	<script src="assets/jquery-3.3.1.slim.min.js"></script>
	      	<script src="assets/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
	      	<script src="assets/bootstrap/4.2.1/js/bootstrap.min.js"></script>
	</head>

<div class="form-gap">
<div class="container">
	<div class="row">
  <!--Left Space-->
  <div class='col-sm-3'>
    <!--Left Space-->
  </div>
		<div class="col-md-6">
      <div class="panel panel-default">
          <div class="panel-body">
            <div class="text-center">
              <h2 class="text-center">Change Password</h2>
                <p>Please enter your new password</p>
                  <div class="panel-body">
                    <form action='changePass.php' method="post">
                      <div class="form-group">
                        <div class="input-group">
                          <input name="password" placeholder="New Password" class="form-control"  type="password">
                        </div>
                      </div>
                      <!--Button to send stuff to email-->
                      <div class="form-group">
                        <input name="submit" class="btn btn-lg btn-primary btn-block" type="submit">
                      </div>
                      <input type="hidden" class="hide" name="token" id="token" value=""> 
                    </form>
                  </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
</div>
</html>