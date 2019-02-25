 <?php
	class Service{
		public $serviceName;
		public $servicType;
		public $serviceDescription;
		public $price;
		public $averageTime;
		public $serviceId;

		public $conn;
		private $tablename = 'service';

		public function __construct($db){
			$this->conn = $db;
		}

		public function readAllService(){
			$query = "SELECT * FROM service";
			$stmt = $this->conn->prepare($query);
			$stmt->execute();
			return $stmt;
		}

		function readOneService(){
		$query = "SELECT * FROM service WHERE serviceId = ?";
		
		$stmt = $this->conn->prepare($query);
		$stmt->bindparam(1, $this->serviceId);
		$stmt->execute();
		
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$this->serviceName = $row['serviceName'];
		$this->serviceType = $row['serviceType'];
		$this->serviceDescription = $row['serviceDescription'];
		$this->price = $row['price'];
		$this->averageTime = $row['averageTime'];
		}

		function updateService(){
		
		$query = "UPDATE service SET serviceName=?, serviceDescription=?, price=?, averageTime=? WHERE serviceId=?";
		$stmt = $this->conn->prepare($query);
		$stmt->bindparam(1,$this->serviceName);
		$stmt->bindparam(2,$this->serviceDescription);
		$stmt->bindparam(3,$this->price);
		$stmt->bindparam(4,$this->averageTime);
		$stmt->bindparam(5,$this->serviceId);

		if($stmt->execute()){
			return true;
		}
		else{
			return false;
		}
		}
	}
?>