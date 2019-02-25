<?php
	class User{
	public $firstName;
	public $lastName;
	public $userName;
	public $emailAdd;
	public $password;
	public $userId;
	
	public $conn;
	private $tablename = 'user';
	
	
	function __construct($db){
		$this->conn=$db;
	}
	
	function readOneUser(){
		$query = "SELECT * FROM user WHERE userId =? LIMIT 0,1";
		
		$stmt = $this->conn->prepare($query);
		$stmt->bindparam(1, $this->userId);
		$stmt->execute();
		
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$this->firstName = $row['firstName'];
		$this->lastName = $row['lastName'];
		$this->userName = $row['userName'];
		$this->emailAdd = $row['emailAdd'];
		$this->password = $row['password'];
		//return $stmt;
	}
	
	function createUser(){
		
		$query = "INSERT INTO user set firstName=?, lastName=?, userName=?, emailAdd=?, password=?";
		$stmt = $this->conn->prepare($query);
		$stmt->bindparam(1,$this->firstName);
		$stmt->bindparam(2,$this->lastName);
		$stmt->bindparam(3,$this->userName);
		$stmt->bindparam(4,$this->emailAdd);
		$stmt->bindparam(5,$this->password);
		
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
			$_SESSION['userId'] = $row['userId'];
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
		unset($_SESSION['userId']);
		return true;
	}
	}
?>