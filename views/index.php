<?php
	session_start();
	include_once 'includes/header.php';
?>

	<?php
		//if user logged-in, redirect to userhome 
		if(isset($_SESSION['custId'])){
			$database = new Database();
  			$db=$database->getConnection();
  
  			$customer = new Customer($db);
  			$stmt = $customer->readOneCustomer();
  			header("Location: customer/userhome.php");
		}
		//page redirects to guesthome if not logged in
		else {
			header("Location: guesthome.php");
		}
	?>

<?php
	include_once "includes/footer.php";
?>