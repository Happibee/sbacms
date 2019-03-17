<?php
    class ServiceType{
        public $id;
        public $service_type;

        public $conn;
        private $tablename = 'service_type';

        public function __construct($db){
			$this->conn = $db;
        }
        
        public function readServiceTypes(){
			$query = "SELECT * FROM `service_type`";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
			return $stmt;
		}
    }
?>