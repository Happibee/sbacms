<?php
	class Appointment{
		public $id;
		public $service_name;
		public $date;
		public $time;
		public $status;
		public $employee_name;
		public $customer_name;
		public $custId;
		public $employee_id;

		// new
		public $appDate;
		public $apptTme;
		public $serviceType;
		public $serviceName;
		public $price;
		public $status;
		public $appId;
		// end of new

		public $conn;
		private $tablename = 'appointment';

		function __construct($db){
			$this->conn=$db;
		}

		//each account should be included in transaction 
		function createAppointment(){
			$query = "INSERT INTO appointment set appTime=?, custId=?";
			$stmt = $this->conn->prepare($query);
			// $stmt->bindparam(1, $this->serviceType);
			// $stmt->bindparam(2, $this->serviceName);
			// $stmt->bindparam(3, $this->appDate);
			$stmt->bindparam(1, $this->appTime);
			$stmt->bindparam(2, $_SESSION['username']);

			if($stmt->execute()){
				return true;
			}
			else{
				return false;
			}
		}

		function getEmployeeAppointments(){
			$query = "SELECT appointment.*, c.first_name AS c_fname, c.last_name AS c_lname, e.first_name AS e_fname, e.last_name AS e_lname, service.service_name FROM `appointment` INNER JOIN user_info c ON appointment.customer = c.username INNER JOIN user_info e ON appointment.employee = e.username INNER JOIN service ON appointment.service_id = service.id  WHERE e.username = ? AND appointment.status = ? ORDER BY appointment.date DESC";
			$stmt = $this->conn->prepare($query);
			$stmt->bindparam(1, $this->employee_id);
			$stmt->bindparam(2, $this->status);
			$stmt->execute();
			return $stmt;
		}

		function getOneAppointment(){
			$query = "SELECT appointment.*, c.first_name AS c_fname, c.last_name AS c_lname, e.first_name AS e_fname, e.last_name AS e_lname, service.service_name FROM `appointment` INNER JOIN user_info c ON appointment.customer = c.username INNER JOIN user_info e ON appointment.employee = e.username INNER JOIN service ON appointment.service_id = service.id WHERE appointment.id = ?";
			$stmt = $this->conn->prepare($query);
			$stmt->bindparam(1, $this->id);
			$stmt->execute();

			$data = $stmt->fetch(PDO::FETCH_ASSOC);
			
			$this->id = $data['id'];
			$this->date = $data['date'];
			$this->time = $data['time'];
			$this->serviceName = $data['service_name'];
			$this->customer_name = $data['c_fname'] . " " . $data['c_lname'];
			
			return $stmt;
		}

		function updateAppointmentStatus(){
			$query = "UPDATE `appointment` SET status = ? WHERE id = ?";
			$stmt = $this->conn->prepare($query);
			$stmt->bindparam(1, $this->status);
			$stmt->bindparam(2, $this->id);
			if($stmt->execute()){
				return true;
			}
			else{
				return false;
			}
		}

		function rescheduleAppointment(){
			$query = "UPDATE `appointment` SET date = ?, time = ? WHERE id = ?";
			$stmt = $this->conn->prepare($query);
			$stmt->bindparam(1, $this->date);
			$stmt->bindparam(2, $this->time);
			$stmt->bindparam(3, $this->id);
			
			if ($stmt->execute()) {
				return true;
			}
			else {
				return false;
			}
		}
	}
?>