<?php
	session_start();
	include '../includes/tempo/header.php';
	include_once '../../classes/review.php';

	$database = new Database();
	$db = $database->getConnection();

	$review  = new Review($db);
	


	if(!isset($_SESSION['username']) && !isset($_SESSION['type']) == "Customer"){
  		header("Location: ../util/login.php");
  	}
  	

	if(isset($_POST['submit'])){
		$review->feedback = $_POST['feedback'];
  		$review->rating = $_POST['rating'];

  		if($review->updateReview()){
        	header("Location: userhome.php");
      	}
	    else{
	    	echo "Unsuccessful";
	    }
	}
	elseif(isset($_POST['delete'])){
		$review->deleteReview();
		header("Location: userhome.php");
	}

?>
&nbsp&nbsp&nbsp&nbsp

<div class='container'>
	<form method='POST' action='feedbackcust.php'>
	<?php
	//if a user feedback exists, display contents, if not.... show message: empty
	if ($review->existingReview()){
		$review->readOneReview();
		echo "
		<div class='row'>
	        <div class='col-sm-3'>
	        	<!--Left Space-->
	        </div>
	        <div class='col-sm-6 sm-3'>
	            <label>Comments:</label>
	    		<textarea class='form-control' placeholder='Please leave a comment...' rows='6' name='feedback' required>".$review->feedback."</textarea>
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
			    <select class='form-control' name='rating' required>
			    	<option>".$review->rating."</option>
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
				<center>
			    	<br>
	          		<button type='submit' class='btn btn-success' name='submit'>Save</button>

	          		<button type='submit' class='btn btn-danger' name='delete'>Delete Feedback</button>
		    	</center>
	    ";
	}
	else {
		echo "<br><center><h1 class='display-4'>You have no feedbacks</h1></center>";
	}
    ?>
    
	</form>
</div>
&nbsp&nbsp&nbsp&nbsp