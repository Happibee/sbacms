<?php
	class Review{
		public $rating;
		public $feedback;
		public $custId;
		public $reviewId;

		public $conn;
		private $tablename = 'review';

		function __construct($db){
			$this->conn=$db;
		}

		function makeReview(){
			$query = "INSERT INTO review SET rating=?, feedback=?, custId=?";
			$stmt = $this->conn->prepare($query);

			$stmt->bindparam(1,$this->rating);
			$stmt->bindparam(2,$this->feedback);
			$stmt->bindparam(3, $_SESSION['custId']);

			if($stmt->execute()){
				return true;
			}
			else {
				return false;
			}
		}

		function deleteReview(){
			$query = "DELETE FROM review WHERE custId = ?";

			$stmt = $this->conn->prepare($query);
			$stmt->bindparam(1, $_SESSION['custId']);

			$stmt->execute();
		}

		//updates the current review of the customer
		function updateReview(){
			$query = "UPDATE review SET rating=?, feedback=? WHERE custId = ?";
			$stmt = $this->conn->prepare($query);

			$stmt->bindparam(1, $this->rating);
			$stmt->bindparam(2, $this->feedback);
			$stmt->bindparam(3, $_SESSION['custId']);

			if($stmt->execute()){
				return true;
			}
			else{
				return false;
			}
		}
		//reads the users feedback when editing
		function readOneReview(){
			$query = "SELECT * FROM review WHERE custId = ?";

			$stmt = $this->conn->prepare($query);
			$stmt->bindparam(1, $_SESSION['custId']);
			$stmt->execute();

			$row = $stmt->fetch(PDO::FETCH_ASSOC);

			$this->rating = $row['rating'];
			$this->feedback = $row['feedback'];
			$this->custId = $row['custId'];

			return true;
		}
		//displays on the feedback page for guests.
		function viewReview(){
			$query = "SELECT * FROM review INNER JOIN customer ON review.custId = customer.custId";
			$stmt = $this->conn->prepare($query);
			$stmt->execute();
			return $stmt;
		}
		//disables the submit button if the user has already made a comment
		function existingReview(){
			$query = "SELECT * FROM review WHERE custId=?";
			$stmt = $this->conn->prepare($query);

			$stmt->bindparam(1, $_SESSION['custId']);
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

		//read the users review that the user made.
		function readAccReview(){
			$query = "SELECT * FROM service WHERE custId = ?";
			$stmt = $this->conn->prepare($query);

			$stmt->bindparam(1, $_SESSION['custId']);
			$stmt->execute();

			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$this->rating = $row['rating'];
			$this->feedback = $row['feedback'];
			$this->custId = $row['custId'];
		}
	}
?>