<?php
	session_start();
	include_once 'header.php';
	include_once 'config/database.php';
  	include_once 'classes/customer.php';

?>

	<?php
		//if user logged-in, redirect to userhome 
		if(isset($_SESSION['custId'])){
			$database = new Database();
  			$db=$database->getConnection();
  
  			$customer = new Customer($db);
  			$stmt = $customer->readOneUser();
  			header("Location: userhome.php");
		}
		//page redirects to guesthome if not logged in
		else {
			header("Location: guesthome.php");
		}
	?>

<?php
	include_once "footer.php";
?>