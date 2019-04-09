<?php
    class User{
        public $username;
        public $email;
        public $password;
        public $type;

        public $firstname;
        public $lastname;
        public $address;
        public $contactno;
        
        private $conn;
        private $tablename = 'user_account';

        function __construct($db){
			$this->conn=$db;
		}

        function login(){
			$query = "SELECT * FROM " . $this->tablename . " INNER JOIN `user_info` ON " . $this->tablename . ".username = user_info.username WHERE " . $this->tablename . ".username = ? OR " . $this->tablename . ".email = ?";
			$stmt = $this->conn->prepare($query);

			$stmt->bindParam(1, $this->username);
            $stmt->bindParam(2, $this->username);

			$stmt->execute();
			$num = $stmt->rowCount();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
			if ($num > 0) {
				if (password_verify($this->password, $row['password'])) {
					$_SESSION['username'] = $row['username'];
					$_SESSION['email'] = $row['email'];
                    $_SESSION['type'] = $row['type'];
                    
                    $_SESSION['firstname'] = $row['first_name'];
                    $_SESSION['lastname'] = $row['last_name'];
                    $_SESSION['contactno'] = $row['contact_no'];
                    return true;	
                } 
                else {
                    return false;
                }
            }
        }

        function createUser(){
            $query = "INSERT INTO user_account SET username=?, email=?, password=?, type=?; INSERT INTO user_info SET username=?, first_name=?, last_name=?, address=?, contact_no=?" ;
            $stmt = $this->conn->prepare($query);
            $stmt->bindparam(1,$this->username);
            $stmt->bindparam(2,$this->email);
            $stmt->bindparam(3,$this->password);
            $stmt->bindparam(4,$this->type);

            $stmt->bindparam(5,$this->username);
            $stmt->bindparam(6,$this->firstname);
            $stmt->bindparam(7,$this->lastname);
            $stmt->bindparam(8,$this->address);
            $stmt->bindparam(9,$this->contactno);
            
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        //checks if username already exists in database
	function existingUName(){
		$query = "SELECT * FROM ". $this->tablename ." WHERE username=?";
		$stmt = $this->conn->prepare($query);
		$stmt->bindparam(1,$this->username);
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
    
    function existingEmail(){
		$query = "SELECT * FROM ". $this->tablename ." WHERE email=?";
		$stmt = $this->conn->prepare($query);
		$stmt->bindparam(1,$this->email);
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
    
    function changePass(){
		$query = "UPDATE customer SET password=? WHERE pass_code = ?";
		$stmt = $this->conn->prepare($query);
		$stmt->bindparam(1,$this->password);
		$stmt->bindparam(2,$this->pass_code);

		if($stmt->execute()){
			return true;
		}
		else{
			return false;
		}
	}
	//function used to match if password matches old password
	// function matchPW(){
	// 		$query = 'SELECT * FROM '.this->tablename.' WHERE password = ? AND custId = ?';
	// 		$stmt = $this->conn->prepare($query);

	// 		$stmt->bindparam(1, $this->oldPass);
	// 		$stmt->bindparam(2, $_SESSION['custId']);

	// 		$stmt->execute();

	// 		$row=$stmt->fetch(PDO::FETCH_ASSOC);

	// 		$num = $stmt->rowCount();

	// 		if($num > 0){
	// 			return true;
	// 		}
	// 		else{
	// 			return false;
	// 		}

	// }
	//function used to change the password if the above function returns true
	function changePW(){
			$query = 'UPDATE '.$this->tablename.' set password = ? WHERE custId = ?';
			$stmt = $this->conn->prepare($query);

			$stmt->bindparam(1, $this->newPass);
			$stmt->bindparam(2, $_SESSION['custId']);

			if($stmt->execute()){
				return true;
			}
			else{
				return false;
			}
	}
	//alanganin this for forgotPW link
	// function setPassCode(){
	// 	$query = "INSERT INTO customer SET pass_code = ? WHERE emailAdd = ?";
	// 	$stmt = $this->conn->prepare($query);
	// 	$stmt->bindparam(1, $this->pass_code);
	// 	$stmt->bindparam(2, $this->emailAdd);

	// 	if($stmt->execute()){
	// 		return true;
	// 	}
	// 	else{
	// 		return false;
	// 	}
	// }
        
        
    }
?>