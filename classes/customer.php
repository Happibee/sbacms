<?php
	class Customer{
		public $firstName;
		public $lastName;
		public $userName;
		public $emailAdd;
		public $password;
		public $address;
		public $contactNo;
		public $custId;

		public $pass_code;
		
		public $conn;
		private $tablename = 'customer';
	
	
	function __construct($db){
		$this->conn=$db;
	}
	
	function readOneCustomer(){
		$query = "SELECT * FROM customer WHERE custId =?";
		
		$stmt = $this->conn->prepare($query);
		$stmt->bindparam(1, $_SESSION['custId']);
		$stmt->execute();
		
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$this->firstName = $row['firstName'];
		$this->lastName = $row['lastName'];
		$this->userName = $row['userName'];
		$this->emailAdd = $row['emailAdd'];
		$this->address = $row['address'];
		$this->contactNo = $row['contactNo'];
		$this->custId = $row['custId'];

		return true;
	}

	function updateCustomer(){
		$query = "UPDATE customer SET firstName = ?, lastName = ?, userName = ?, emailAdd = ?, address = ?, contactNo = ? WHERE custId = ?";
		$stmt = $this->conn->prepare($query);

		$stmt->bindparam(1,$this->firstName);
		$stmt->bindparam(2,$this->lastName);
		$stmt->bindparam(3,$this->userName);
		$stmt->bindparam(4,$this->emailAdd);
		$stmt->bindparam(5,$this->address);
		$stmt->bindparam(6,$this->contactNo);
		$stmt->bindparam(7,$this->custId);

		if($stmt->execute()){
			return true;
		}
		else{
			return false;
		}
	}
	
	function createUser(){
		
		$query = "INSERT INTO customer set firstName=?, lastName=?, userName=?, emailAdd=?, password=?, address=?, contactNo=?" ;
		$stmt = $this->conn->prepare($query);
		$stmt->bindparam(1,$this->firstName);
		$stmt->bindparam(2,$this->lastName);
		$stmt->bindparam(3,$this->userName);
		$stmt->bindparam(4,$this->emailAdd);
		$stmt->bindparam(5,$this->password);
		$stmt->bindparam(6,$this->address);
		$stmt->bindparam(7,$this->contactNo);
		
		if($stmt->execute()){
			return true;
		}
		else{
			return false;
		}
	}
		
	function logout(){
		session_destroy();
		unset($_SESSION['custId']);
		return true;
	}
	}
?>