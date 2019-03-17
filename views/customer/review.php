<?php
	session_start();
	include_once 'header.php';
	include_once 'config/database.php';
  	include_once 'classes/customer.php';

  	if(!isset($_SESSION['custId'])){
  		header("Location: login.php");
  	}
?>
<div class="feedback">
	<div class="container">
		<h1 class="display-4"><center>Give Feedback</center></h1>
	</div>
</div>
&nbsp
<div class='container'>
	<div class='row'>
        <div class='col-sm-3'>
        	<!--Left Space-->
        </div>
        <div class='col-sm-6 sm-3'>
            <label>Comments:</label>
    		<textarea class="form-control" id="exampleFormControlTextarea1" rows="6"></textarea>
        </div>
        <div class='col-sm-4'>
        	<!--Right Space-->
        </div>
    </div>
    <div class='row'>
	    <div class='col-sm-4'>
			
	    </div>
	    <div class='col-sm-4'>
	    	<br>
	    	<label>Rating</label>
		    <select class="form-control">
		    	<option selected>Pick a rating!</option>
				<option>1 - Lackluster!</option>
				<option>2 - Not Bad!</option>
				<option>3 - Good!</option>
				<option>4 - Very Nice!</option>
				<option>5 - Excellent!</option>
		    </select>
		    <center>
		    	<br>
	    		<button type="button" class="btn btn-success">Submit Feedback</button>
	    	</center>
	    </div>
	</div>
</div>
&nbsp





<style>
  .feedback{
    /*background-color: #606060;*/
    background-color: #ff5ead;
    padding: 30px;
    color: white;
  }
</style>