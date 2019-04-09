<!-- Clicking link from email redurects here -->
<?php
	session_start();
	include_once '../includes/header.php';
	include_once '../../classes/customer.php';
	include_once '../../config/database.php';

	if(!isset($_SESSION['username'])){
	  header("Location: login.php");
	}

	$database = new Database();
  	$db = $database-> getConnection();

  	if(isset($_POST['submit'])){
  		$customer = new Customer($db);

  		$customer->oldPass = $_POST['old'];
  		$customer->newPass = $_POST['new'];

  		if($customer->matchPW()){
  			//matches password if true or not
  			if($customer->changePW()){
  				echo "
  				<script>
  					alert(Password has been changed successfuly!);
  				</script>";
  			}
  			else {
  				echo "
  				<script>
	  				alert('Unable to change!');
	  			</script>";
  			}
  		}
  		else{
  			echo "
  			<script>
  				alert('Your Password does not match your current one, please try again!');
  			</script>";
  		}
  	}
?>
<br><br><br>
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
                <p>Please enter your password.</p>
                  <div class="panel-body">
                    <form action='changepw.php' method="POST">
                      <div class="form-group">
                        <div class="input-group">
                          <input name="old" placeholder="Old Password" class="form-control"  type="password">
                          <input name="new" placeholder="New Password" class="form-control"  type="password">
                        </div>
                      </div>
                      <!--Button-->
                      <div class="form-group">
                        <input name="submit" class="btn btn-lg btn-secondary btn-block" type="submit">
                      </div>
                    </form>
                  </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
</div><br><br><br>