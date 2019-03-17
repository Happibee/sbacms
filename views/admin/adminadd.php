<?php
	session_start();
	include_once "adminheader.php";

  if(!isset($_SESSION['employeeId'])){
      header('Location: ../employee/employeelogin.php');
  }
?>

<?php
if(isset($_SESSION['employeeId'])){
	if($_SESSION['type'] == 'admin'){
		$database = new Database();
          $db = $database->getConnection();

          $employee = new Employee($db);

          if($_POST){
            $employee->firstName = $_POST['firstName'];
            $employee->lastName = $_POST['lastName'];
            $employee->userName = $_POST['userName'];
            $employee->emailAdd = $_POST['emailAdd'];
            $employee->password = $_POST['password'];
            $employee->type = $_POST['type'];

            if ($employee->createEmployee()){
              echo "Successful";
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
                  <input type='text' class='form-control' name='firstName'>
                </div>
                <div class='col-sm-6'>
                  <label>Last Name</label>
                  <input type='text' class='form-control' name='lastName'>
                
                </div>
              </div>
              <div class='row'>
                <div class='col-sm-4'>
                  <label>User Name</label>
                  <input type='text' class='form-control' name='userName'>
                </div>
                <div class='col-sm-4'>
                  <label>Email Address</label>
                  <input type='email' class='form-control' name='emailAdd'>
                </div>
                <div class='col-sm-4'>
                  <label>Password</label>
                  <input type='email' class='form-control' name='contactNumber'>
                </div>
              </div>
              <div class='row'>
                <div class='col-sm-4'>
                  <label>Contact Number</label>
                  <input type='text' class='form-control' name='password'>
                </div>
                <div class='col-sm-8'>
                  <label>Address</label>
                  <input type='text' class='form-control' name='address'>
                </div>
              </div>
              <div class='row'>
                <div class='col-sm-4'>
                  <!--LEFT SPACE-->
                </div>
                <div class='col-sm-4'>
                  &nbsp
                  <input type='text' class='form-control' name='type' value='Manager' readonly>
                </div>
                <div class='col-sm-4'>
                  <!--RIGHT SPACE-->                
                </div>
              </div>
              

              <div class='row'>
                <div class='col-md-12'>
                  <center>
                    <br>
                    <button type='submit' class='btn btn-info'>Save</button>
                    <a href='adminhome.php' class='btn btn-danger'>Cancel</a>
                  </center>
                </div>
              </div>
            </div>
    				</form>
				";
			}
}
else {
	header("Location: ../employee/employeelogin.php");
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