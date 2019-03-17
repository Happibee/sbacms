<?php
	class Appointment{
		public $appId;
		public $serviceName;
		public $date;
		public $time;
		public $employeeName;
		public $custName;
		public $custId;
		public $employeeId;

		public $conn;
		private $tablename = 'appointment';

		function __construct($db){
			$this->conn=$db;
		}

		//each account should be included in transaction 
		function createAppointment(){
			$query = "INSERT INTO appointment set $serviceName=?, $date=?, $time=?, $employeeName=?";
			$stmt = $this->conn->prepare($query);
			$stmt->bindparam(1,$this->serviceName);
			$stmt->bindparam(2,$this->date);
			$stmt->bindparam(3,$this->time);
			$stmt->bindparam(4,$this->employeeName);
			if($stmt->execute()){
				return true;
			}
			else{
				return false;
			}
		}
	}
?>