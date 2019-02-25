<?php
	class Employee{
		public $firstName;
		public $lastName;
		public $userName;
		public $emailAdd;
		public $password;
		public $type;
		public $employeeId;
	
		public $conn;
		private $tablename = 'employee';
	
	
		function __construct($db){
			$this->conn=$db;
		}

		function readOneAdmin(){
			$query = "SELECT * FROM employee WHERE type= 'admin'";
			
			$stmt = $this->conn->prepare($query);
			$stmt->bindparam(1, $this->employeeId);
			$stmt->execute();
			
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$this->firstName = $row['firstName'];
			$this->lastName = $row['lastName'];
			$this->userName = $row['userName'];
			$this->emailAdd = $row['emailAdd'];
			$this->password = $row['password'];
			$this->type = $row['type'];
		}

		function readOneEmployee(){
			$query = "SELECT * FROM employee WHERE employeeId =? LIMIT 0,1";
			
			$stmt = $this->conn->prepare($query);
			$stmt->bindparam(1, $this->employeeId);
			$stmt->execute();
			
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$this->firstName = $row['firstName'];
			$this->lastName = $row['lastName'];
			$this->userName = $row['userName'];
			$this->emailAdd = $row['emailAdd'];
			$this->password = $row['password'];
			$this->type = $row['type'];
		}
		function readEmployeeOnly(){
			$query = "SELECT * FROM employee WHERE type='employee'";
			$stmt = $this->conn->prepare($query);
			$stmt->execute();
			return $stmt;
		}
		
		function createEmployee(){
			
			$query = "INSERT INTO employee set firstName=?, lastName=?, userName=?, emailAdd=?, password=?, type=?";
			$stmt = $this->conn->prepare($query);
			$stmt->bindparam(1,$this->firstName);
			$stmt->bindparam(2,$this->lastName);
			$stmt->bindparam(3,$this->userName);
			$stmt->bindparam(4,$this->emailAdd);
			$stmt->bindparam(5,$this->password);
			$stmt->bindparam(6,$this->type);
			if($stmt->execute()){
				return true;
			}
			else{
				return false;
			}
		}
		
		function login(){
			$query = "SELECT * FROM " .$this->tablename. " WHERE emailAdd = ? AND password = ?";
			$stmt = $this->conn->prepare($query);
			
			$stmt->bindParam(1, $this->emailAdd);
			$stmt->bindParam(2, $this->password);
			
			$stmt->execute();
			
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
			
			$num = $stmt->rowCount();
			if($num > 0){
				session_start();
				//data from DB to display on user page from login function
				$_SESSION['employeeId'] = $row['employeeId'];
				$_SESSION['firstName'] = $row['firstName'];
				$_SESSION['lastName'] = $row['lastName'];
				$_SESSION['userName'] = $row['userName'];
				$_SESSION['emailAdd'] = $row['emailAdd'];
				$_SESSION['type'] = $row['type'];
				return true;
			}
			else{
				return false;
			}
		}

		
		function logout(){
			session_destroy();
			unset($_SESSION['employeeId']);
			return true;
		}
	}
?>