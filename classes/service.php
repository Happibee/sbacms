 <?php
	class Service{
		public $id;
		public $service_name;
		public $servic_type;
		public $service_description;
		public $price;
		public $average_time;

		public $conn;
		private $tablename = 'service';

		public function __construct($db){
			$this->conn = $db;
		}

		public function readServices(){
			$query = "SELECT s.*, st.service_type FROM ". $this->tablename ." s INNER JOIN `service_type` st ON s.service_type = st.id";
			$stmt = $this->conn->prepare($query);
			$stmt->execute();
			return $stmt;
		}

		public function readService(){
			$query = "SELECT * FROM service WHERE id = ?";
			$stmt = $this->conn->prepare($query);
			$stmt->bindparam(1, $this->id);
			$stmt->execute();
			
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$this->service_name = $row['service_name'];
			$this->service_type = $row['service_type'];
			$this->service_description = $row['service_description'];
			$this->price = $row['price'];
			$this->average_time = $row['average_time'];
		}

		public function createService(){
			$query = "INSERT INTO ". $this->tablename ." SET service_name = ?, service_type = ?, service_description = ?, price = ?, average_time = ?";
			$stmt = $this->conn->prepare($query);

			$stmt->bindparam(1, $this->service_name);
			$stmt->bindparam(2, $this->service_type);
			$stmt->bindparam(3, $this->service_description);
			$stmt->bindparam(4, $this->price);
			$stmt->bindparam(5, $this->average_time);

			if($stmt->execute())
				return true;
			else
				return false;
		}

		public function updateService(){	
			$query = "UPDATE ". $this->tablename ." SET service_name = ?, service_type = ?, service_description = ?, price = ?, average_time = ? WHERE id = ?";
			$stmt = $this->conn->prepare($query);

			$stmt->bindparam(1, $this->service_name);
			$stmt->bindparam(2, $this->service_type);
			$stmt->bindparam(3, $this->service_description);
			$stmt->bindparam(4, $this->price);	
			$stmt->bindparam(5, $this->average_time);
			$stmt->bindparam(6, $this->id);

			if($stmt->execute())
				return true;
			else
				return false;
		}

		public function deleteService(){
			$query = "DELETE FROM ". $this->tablename ." WHERE id = ?";
			$stmt = $this->conn->prepare($query);
			$stmt->bindParam(1, $this->id);
			
			if ($stmt->execute()) {
				return true;
			} else {
				return false;
			}
		}

		public function archiveService(){	
			$query = "UPDATE ". $this->tablename ." SET isActive = 0 WHERE id = ?";
			$stmt = $this->conn->prepare($query);

			$stmt->bindparam(1, $this->id);
			
			if($stmt->execute())
				return true;
			else
				return false;
		}
	}
?>