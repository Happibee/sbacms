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
		
		public $conn;
		private $tablename = 'customer';
	
	
	function __construct($db){
		$this->conn=$db;
	}
	
	function readOneUser(){
		$query = "SELECT * FROM customer WHERE custId =? LIMIT 0,1";
		
		$stmt = $this->conn->prepare($query);
		$stmt->bindparam(1, $this->userId);
		$stmt->execute();
		
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$this->firstName = $row['firstName'];
		$this->lastName = $row['lastName'];
		$this->userName = $row['userName'];
		$this->emailAdd = $row['emailAdd'];
		$this->password = $row['password'];
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
	
	function login(){
		$query = "SELECT * FROM " .$this->tablename. " WHERE userName = ? OR emailAdd = ? AND password = ?";
		$stmt = $this->conn->prepare($query);
		
		$stmt->bindParam(1, $this->emailAdd);
		$stmt->bindParam(2, $this->userName);
		$stmt->bindParam(3, $this->password);
		
		$stmt->execute();
		
		$row=$stmt->fetch(PDO::FETCH_ASSOC);
		
		$num = $stmt->rowCount();
		if($num > 0){
			session_start();
			//data from DB to display on user page from login function
			$_SESSION['custId'] = $row['id'];
			$_SESSION['firstName'] = $row['firstName'];
			$_SESSION['lastName'] = $row['lastName'];
			$_SESSION['userName'] = $row['userName'];
			$_SESSION['emailAdd'] = $row['emailAdd'];
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