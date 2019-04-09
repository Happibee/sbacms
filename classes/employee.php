<?php
	class Employee{
		public $firstName;
		public $lastName;
		public $userName;
		public $emailAdd;
		public $password;
		public $type;
		public $employeeId;

		public $address;
		public $contactNo;
		public $archive;
	
		public $conn;
		private $tablename = 'employee';
	
		function __construct($db){
			$this->conn=$db;
		}
		//reads one account that has been logged in using it's session ID V
		function readOneAccount(){
			$query = "SELECT * FROM employee WHERE employeeId = ?";
			
			$stmt = $this->conn->prepare($query);
			$stmt->bindparam(1, $_SESSION['employeeId']);
			$stmt->execute();
			
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$this->firstName = $row['firstName'];
			$this->lastName = $row['lastName'];
			$this->userName = $row['userName'];
			$this->emailAdd = $row['emailAdd'];
			$this->password = $row['password'];
			$this->address = $row['address'];
			$this->contactNo = $row['contactNo'];
			$this->employeeId = $row['employeeId'];
		}
		//updates an employee(admin, manager, employee)
		function updateEmployee(){
		
			$query = "UPDATE employee SET firstName=?, lastName=?, userName=?, emailAdd=?, contactNo=?, address=? where employeeId=?";
			$stmt = $this->conn->prepare($query);
			$stmt->bindparam(1,$this->firstName);
			$stmt->bindparam(2,$this->lastName);
			$stmt->bindparam(3,$this->userName);
			$stmt->bindparam(4,$this->emailAdd);
			$stmt->bindparam(5,$this->contactNo);
			$stmt->bindparam(6,$this->address);
			$stmt->bindparam(7,$this->employeeId);
		
			if($stmt->execute()){
				return true;
			}
			else{
				return false;
			}
		}
		//display function for employees registered(Managerhome)
		function readEmployeeOnly(){
			$query = "SELECT * FROM employee WHERE type='employee' AND archive = 0";
			$stmt = $this->conn->prepare($query);
			$stmt->execute();
			return $stmt;
		}

		//disables button if there is 1 or more managers
		// function disableAddManager(){
		// 	$query = "SELECT * FROM employee where type = 'Manager' AND archive = 0";
		// 	$stmt = $this->conn->prepare($query);
		// 	$stmt->execute();

		// 	$row=$stmt->fetch(PDO::FETCH_ASSOC);

		// 	$num = $stmt->rowCount();
		// 	if($num > 0){
		// 		return true;
		// 	}
		// 	else{
		// 		return false;
		// 	}
		// }
		//this function shows data of manager
		function adminManagerdata(){
			$query = "SELECT * FROM employee WHERE type = 'Manager' AND archive = 0";
			$stmt = $this->conn->prepare($query);
			$stmt ->execute();
			return $stmt;
		}
		//shows archived managers
		function adminArchivedManager(){
			$query = "SELECT * FROM employee WHERE type = 'Manager' AND archive = 1";
			$stmt = $this->conn->prepare($query);
			$stmt ->execute();
			return $stmt;
		}
		//shows archived employees
		function managerArchivedEmp(){
			$query = "SELECT * FROM employee WHERE type = 'Employee' AND archive = 1";
			$stmt = $this->conn->prepare($query);
			$stmt ->execute();
			return $stmt;
		}
		//this function shows data of employees
		function adminEmployeedata(){
			$query = "SELECT * FROM employee WHERE type = 'Employee' AND archive = 0";
			$stmt = $this->conn->prepare($query);
			$stmt ->execute();
			return $stmt;
		}
		//<<<<<<<<note2self ,combine all the archive functions>>>>>>>
		//archives a manager and set it to 1(not working for some reason)
		function archiveManager(){
			$query = "UPDATE employee SET archive=1 WHERE employeeId=?"; 
			$stmt = $this->conn->prepare($query);
			
			$stmt->bindparam(1,$this->employeeId);

			if($stmt->execute())
				return true;
			else
				return false; 	
		}
		//used to view account of manager/employee in modal
		function viewEmployee(){
			$query = 'SELECT * FROM employee WHERE employeeId=?';
			$stmt = $this->conn->prepare($query);
			$stmt->bindparam(1, $this->employeeId);
			$stmt->execute();

			$row = $stmt->fetch(PDO::FETCH_ASSOC);

			$this->employeeId = $row['employeeId'];
			$this->firstName = $row['firstName'];
			$this->lastName = $row['lastName'];
			$this->userName = $row['userName'];
			$this->emailAdd = $row['emailAdd'];
			$this->contactNo = $row['contactNo'];
			$this->address = $row['address'];
		}
		//restores archived manager
		function restoreManager(){
			$query = "UPDATE employee SET archive=0 WHERE employeeId=?"; 
			$stmt = $this->conn->prepare($query);
			
			$stmt->bindparam(1,$this->employeeId);

			if($stmt->execute())
				return true;
			else
				return false; 
		}
		//archives employee set it to 1
		function archiveEmployee(){
			$query = "UPDATE employee SET archive=1 WHERE employeeId=?"; 
			$stmt = $this->conn->prepare($query);
			
			$stmt->bindparam(1,$this->employeeId);

			if($stmt->execute())
				return true;
			else
				return false; 	
		}
		//restores employee
		function restoreEmployee(){
			$query = "UPDATE employee SET archive=0 WHERE employeeId=?"; 
			$stmt = $this->conn->prepare($query);
			
			$stmt->bindparam(1,$this->employeeId);

			if($stmt->execute())
				return true;
			else
				return false;
		}
		function deleteEmployee(){
			$query = "DELETE FROM employee WHERE employeeId=?"; 
			$stmt = $this->conn->prepare($query);
			$stmt->bindparam(1,$this->employeeId);
			
			$stmt->execute();
		}
		//password matcher VV
		function matchPW(){
			$query = 'SELECT * FROM employee WHERE password = ? AND employeeId = ?';
			$stmt = $this->conn->prepare($query);

			$stmt->bindparam(1, $this->oldPass);
			$stmt->bindparam(2, $_SESSION['employeeId']);

			$stmt->execute();

			$row=$stmt->fetch(PDO::FETCH_ASSOC);

			$num = $stmt->rowCount();

			if($num > 0){
				return true;
			}
			else{
				return false;
			}

		}
		//if pass matches, function executes
		function changePW(){
			$query = 'UPDATE employee set password = ? WHERE employeeId = ?';
			$stmt = $this->conn->prepare($query);

			$stmt->bindparam(1, $this->newPass);
			$stmt->bindparam(2, $_SESSION['employeeId']);

			if($stmt->execute()){
				return true;
			}
			else{
				return false;
			}
		}

		//a functions that creates a manager. If one manager is existing, disable button(it's a function called "disableAddManager")
		function createManager(){
			$query = "INSERT INTO employee set firstName=?, lastName=?, userName=?, emailAdd=?, password=?, contactNo=?, address=?, type=?";
			$stmt = $this->conn->prepare($query);
			$stmt->bindparam(1,$this->firstName);
			$stmt->bindparam(2,$this->lastName);
			$stmt->bindparam(3,$this->userName);
			$stmt->bindparam(4,$this->emailAdd);
			$stmt->bindparam(5,$this->password);
			$stmt->bindparam(6,$this->contactNo);
			$stmt->bindparam(7,$this->address);
			$stmt->bindparam(8,$this->type);
			
			if($stmt->execute()){
				return true;
			}
			else{
				return false;
			}
		}
		//creates employee or a manager depending on the user.
		function createEmployee(){
			$query = "INSERT INTO employee set firstName=?, lastName=?, userName=?, emailAdd=?, password=?, contactNo=?, address=?, type=?";
			$stmt = $this->conn->prepare($query);
			$stmt->bindparam(1,$this->firstName);
			$stmt->bindparam(2,$this->lastName);
			$stmt->bindparam(3,$this->userName);
			$stmt->bindparam(4,$this->emailAdd);
			$stmt->bindparam(5,$this->password);
			$stmt->bindparam(6,$this->contactNo);
			$stmt->bindparam(7,$this->address);
			$stmt->bindparam(8,$this->type);
			if($stmt->execute()){
				return true;
			}
			else{
				return false;
			}
		}
		//detects if an admin has been created, if none, proceed to create the first admin or sadmin
		function existingAdmin(){
			$query = "SELECT * FROM employee WHERE type=Admin";
			$stmt = $this->conn->prepare($query);
			$stmt->bindparam(1,$this->type);
			
			$stmt->execute();

			$row=$stmt->fetch(PDO::FETCH_ASSOC);

			$num = $stmt->rowCount();
			if($num > 0){
				return true;
			}
			else{
				return false;
			}
		}

		//creates the first admin, first admin don't need to be approved by someone.
		function createAdmin(){
			$query = "INSERT INTO employee set firstName=?, lastName=?, userName=?, emailAdd=?, password=?, contactNo=?, address=?, type=?, approved=1";
			$stmt = $this->conn->prepare($query);
			$stmt->bindparam(1,$this->firstName);
			$stmt->bindparam(2,$this->lastName);
			$stmt->bindparam(3,$this->userName);
			$stmt->bindparam(4,$this->emailAdd);
			$stmt->bindparam(5,$this->password);
			$stmt->bindparam(6,$this->contactNo);
			$stmt->bindparam(7,$this->address);
			$stmt->bindparam(8,$this->type);
			$stmt->bindparam(9,$this->approved);
			if($stmt->execute()){
				return true;
			}
			else{
				return false;
			}
		}
		//approves employee accounts.
		function approveEmp(){
			$query = "UPDATE employee set approved=1 WHERE employeeId=?";
			$stmt = $this->conn->prepare($query);
			
			$stmt->bindparam(1,$this->employeeId);

			if($stmt->execute())
				return true;
			else
				return false; 
		}
		function declineEmp(){
			$query = "UPDATE employee set approved=2 WHERE employeeId=?";
			$stmt = $this->conn->prepare($query);
			
			$stmt->bindparam(1,$this->employeeId);

			if($stmt->execute())
				return true;
			else
				return false; 
		}
		/**************************************************************************/
		//reads pending accounts of admins
		function readPendAdmin(){
			$query = "SELECT * FROM employee WHERE type='Admin' AND approved=0";
			$stmt = $this->conn->prepare($query);
			$stmt->execute();
			return $stmt;
		}
		//reads approved accounts
		function readApprovedAdmin(){
			$query = "SELECT * FROM employee WHERE type='Admin' AND approved=1";
			$stmt = $this->conn->prepare($query);
			$stmt->execute();
			return $stmt;
		}
		//reads declined accounts
		function readDeclinedAdmin(){
			$query = "SELECT * FROM employee WHERE type='Admin' AND approved=2";
			$stmt = $this->conn->prepare($query);
			$stmt->execute();
			return $stmt;
		}
		/***************************************************************************/
		//reads pending accounts of managers
		function readPendMan(){
			$query = "SELECT * FROM employee WHERE type='Manager' AND approved=0";
			$stmt = $this->conn->prepare($query);
			$stmt->execute();
			return $stmt;
		}
		//reads declined accounts
		function readDeclinedMan(){
			$query = "SELECT * FROM employee WHERE type='Manager' AND approved=2";
			$stmt = $this->conn->prepare($query);
			$stmt->execute();
			return $stmt;
		}
		/*************************************************************************/
		//reads pending accounts of employees
		function readPendEmp(){
			$query = "SELECT * FROM employee WHERE type='Employee' AND approved=0";
			$stmt = $this->conn->prepare($query);
			$stmt->execute();
			return $stmt;
		}
		//reads declined accounts of employees
		function readDeclinedEmp(){
			$query = "SELECT * FROM employee WHERE type='Employee' AND approved=2";
			$stmt = $this->conn->prepare($query);
			$stmt->execute();
			return $stmt;
		}
		//login function, uses either email or username
		function emplogin(){
			$query = "SELECT * FROM " .$this->tablename. " WHERE emailAdd = ? OR userName = ? AND password = ?";
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
				$_SESSION['employeeId'] = $row['employeeId'];
				$_SESSION['firstName'] = $row['firstName'];
				$_SESSION['lastName'] = $row['lastName'];
				$_SESSION['userName'] = $row['userName'];
				$_SESSION['emailAdd'] = $row['emailAdd'];
				// $_SESSION['password'] = $row['password'];
				$_SESSION['address'] = $row['address'];
				$_SESSION['contactNo'] = $row['contactNo'];
				$_SESSION['type'] = $row['type'];
				$_SESSION['archive'] = $row['archive'];
				$_SESSION['approved'] = $row['approved'];
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