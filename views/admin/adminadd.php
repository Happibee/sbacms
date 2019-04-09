<?php
	session_start();
	include_once "adminheader.php";

  if(!isset($_SESSION['username']) && isset($_SESSION['type']) == "Admin"){
      header('Location: ../util/login.php');
  }
  elseif($employee->disableAddManager()){
    header('Location: adminhome.php');
  }
?>

<?php
if(isset($_SESSION['username']) && isset($_SESSION['type']) == "Admin"){  
		$database = new Database();
          $db = $database->getConnection();

          $employee = new Employee($db);

          if(isset($_POST['addManager'])){
            $employee->firstName = $_POST['firstName'];
            $employee->lastName = $_POST['lastName'];
            $employee->userName = $_POST['userName'];
            $employee->emailAdd = $_POST['emailAdd'];
            $employee->password = $_POST['password'];
            $employee->contactNo = $_POST['contactNo'];
            $employee->address = $_POST['address'];
            $employee->type = $_POST['type'];

            if ($employee->createManager()){
              //echo "Successful";
              header("Location: adminhome.php");
            }
            else{
              echo "Unsuccessful";
            }

          }
				echo "
        <div class='accdet'>
          <div class='container'>
            <center><h1 class='display-4'>Add Manager</h1></center>
          </div>
        </div>

        <form method='POST' action='adminadd.php'>
        <div class='container col-sm-7'>
          <div class='row'>
            <div class='col-sm-6'>
              <label>First Name</label>
              <input type='text' class='form-control' name='firstName' required>
            </div>
            <div class='col-sm-6'>
              <label>Last Name</label>
              <input type='text' class='form-control' name='lastName' required>
            
            </div>
          </div>
          <div class='row'>
            <div class='col-sm-4'>
              <label>User Name</label>
              <input type='text' class='form-control' name='userName' required>
            </div>
            <div class='col-sm-4'>
              <label>Email Address</label>
              <input type='email' class='form-control' name='emailAdd' required>
            </div>
            <div class='col-sm-4'>
              <label>Password</label>
              <input type='password' class='form-control' name='password' required>
            </div>
          </div>
          <div class='row'>
            <div class='col-sm-4'>
              <label>Contact Number</label>
              <input type='text' class='form-control' name='contactNo' required>
            </div>
            <div class='col-sm-8'>
              <label>Address</label>
              <input type='text' class='form-control' name='address' required>
            </div>
          </div>
          <div class='row'>
            <div class='col-sm-4'>
              <!--LEFT SPACE-->
            </div>
            <div class='col-sm-4'>
              &nbsp
              <input type='text' class='form-control' value='Manager' name = 'type' readonly>
            </div>
            <div class='col-sm-4'>
              <!--RIGHT SPACE-->                
            </div>
          </div>
          

          <div class='row'>
            <div class='col-md-12'>
              <center>
                <br>
                <button type='submit' class='btn btn-info' name='addManager'>Add Manager</button>
                <a href='adminhome.php' class='btn btn-danger'>Cancel</a>
              </center>
            </div>
          </div>
        </div>
        </form>
				";
}
else {
	header("Location: ../util/login.php");
}

?>


<style>
  .accdet{
    background-color: #ededed;
    padding: 20px;
  }
</style>



<?php
	include_once "adminfooter.php";
?>