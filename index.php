<?php
	session_start();
	include_once 'views/includes/header.php';
?>

	<?php
		//if user logged-in, redirect to userhome 
		if(isset($_SESSION['username']) && isset($_SESSION['type']) == "Customer"){
			$database = new Database();
  			$db=$database->getConnection();
  
  			$customer = new Customer($db);
  			$stmt = $customer->readOneCustomer();
  			header("Location: customer/userhome.php");
		}
		//page redirects to guesthome if not logged in
		else {
			header("Location: views/guesthome.php");
		}
	?>

<?php
	include_once "views/includes/footer.php";
?>