<?php
	session_start();
	include_once 'employeeheader.php';
	include_once '../../config/database.php';
	include_once '../../classes/schedule.php';
	include_once '../../classes/service.php';

	$database = new Database();
  $db = $database->getConnection();
?>
<div class="appoint">
  <div class="container">
    <h1 class="display-4"><center>Set an Appointment</center></h1>
  </div>
</div>

<form method="POST" action="editaccount.php">
<div class="container col-sm-7">
  <div class="row">
    <div class="col-sm-6">
      <label>First Name</label>
      <input type="text" class="form-control" name="firstName">
    </div>
    <div class="col-sm-6">
      <label>Last Name</label>
      <input type="text" class="form-control" name="lastName">
    
    </div>
  </div>
  <div class="row">
    <div class="col-sm-4">
      <label>User Name</label>
      <input type="text" class="form-control" name="userName">
    </div>
    <div class="col-sm-4">
      <label>Email Address</label>
      <input type="email" class="form-control" name="emailAdd">
    </div>
    <div class="col-sm-4">
      <label>Contact Number</label>
      <input type="email" class="form-control" name="contactNumber">
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <label>Address</label>
      <input type="email" class="form-control" name="address">
    </div>
  </div>
</div>
</form>

<div>
  <center>
  <div class="container">
    <div class="col-sm-4">
      <label><b><h4>1. Select Service</h4></b></label>
      <select class = 'form-control country' name='service'>
                  <option>Choose a Service</option>
                  <?php
                    $service = new Service($db);
                    $stmt = $service->readAllService();
              
                    while ($option = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo '<option value="'.$option['serviceName'].'">' . $option['serviceName'] . '</option>';}
                  ?>   
              </select>
    </div>
    <div class="col-sm-4">
      <label><b><h4>2. Select a Date</h4></b></label>
      <input class="form-control" id="datepicker" name="datepicker" placeholder="MM/DD/YYYY" type="text"/>
            <script>
              $('#datepicker').datepicker({
                daysOfWeekDisabled: [0,0]
              });
            </script>
    </div>
    <div class="col-sm-4">
      <div class="form-group">
        <label><b><h4>3. Select a Time</h4></b></label>
        <br>
        <input type="time" id="time" name="time">
      </div>
    </div>
    <div class="col-sm-4">
      <div class="form-group">
        <label><b><h4>4. Select an Employee</h4></b></label>
        <select class = 'form-control country' name='service'>
                  <option>Choose an Employee</option>
              </select>
      </div>
    </div>
    <div class="form-group">
      <button class="btn btn-primary " name="submit" type="submit">Submit</button>
      <a href="employeehome.php" class="btn btn-danger">Cancel</a>
    </div>
  </div>
  </center>
</div>


<style>
  .appoint{
    /*background-color: #606060;*/
    background-color: #ff5ead;
    padding: 30px;
    color: white;
  }
</style>
<?php
	//include_once "footer.php";
?>