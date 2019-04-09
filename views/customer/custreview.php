<?php
	session_start();
	include_once '../includes/tempo/header.php';
  	include_once '../../classes/review.php';

  	if(!isset($_SESSION['username']) && !isset($_SESSION['type']) == "Customer"){
  		header("Location: ../util/login.php");
  	}
  	
    $database = new Database();
    $db = $database->getConnection();
      
    $review = new Review($db);
    
    //on button submit/click 
  	if(isset($_POST['submit'])){
  		$review->feedback = $_POST['feedback'];
  		$review->rating = $_POST['rating'];

  		if($review->makeReview()){
        	header("Location: userhome.php");
      	}
	    else{
	    	echo "unsuccessful";
	    }
  	}

?>
<div class="feedback">
	<div class="container">
		<h1 class="display-4"><center>Give Feedback</center></h1>
	</div>
</div>
<br>
<div class='container'>
	<form method="POST" action='custreview.php'>
	<div class='row'>
        <div class='col-sm-3'>
        	<!--Left Space-->
        </div>
        <div class='col-sm-6 sm-3'>
            <label>Comments:</label>
    		<textarea class="form-control" placeholder='Please leave a comment...' rows="6" name='feedback' required></textarea>
        </div>
        <div class='col-sm-4'>
        	<!--Right Space-->
        </div>
    </div>
    <div class='row'>
	    <div class='col-sm-5'>
			
	    </div>
	    <div class='col-sm-2'>
	    	<br>
	    	<center><label>Rating</label></center>
		    <select class="form-control" name='rating' required>
		    <option></option>
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
		    </select>
	    </div>
	    <div class='col-sm-5'>
			
	    </div>
	</div>
		<br>
		<center>
		<?php
            if($review->existingReview()){
              echo "<button type='submit' class='btn btn-success' name='submit' disabled='true'>Submit Feedback</button><br><br>";

              echo "You already gave a feedback, each feedback is limited to only one customer.<br>(You can either edit your current feedback or delete it by going to Actions.)";
            }
            else{
              echo "<button type='submit' class='btn btn-success' name='submit'>Submit Feedback</button>";
            }
          ?>
        </center>
	</form>
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