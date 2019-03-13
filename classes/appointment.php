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

		public $conn;
		private $tablename = 'appointment';

		function __construct($db){
			$this->conn=$db;
		}

		//each account should be included in transaction 
		function createAppointment(){
			$query = "INSERT INTO appointment set $serviceName=?, $date=?, $time=?, $employeeName=?";
			$stmt = $this->conn->prepare($query);
			$stmt->bindparam(1, $this->service_name);
			$stmt->bindparam(2, $this->date);
			$stmt->bindparam(3, $this->time);
			$stmt->bindparam(4, $this->employee_name);
			if($stmt->execute()){
				return true;
			}
			else{
				return false;
			}
		}

		function getEmployeeAppointments(){
			$query = "SELECT appointment.*, service.service_name, service.price, customer.firstName AS c_fname, customer.lastName AS c_lname, employee.firstName AS e_fname, employee.lastName AS e_lname FROM `appointment` INNER JOIN `service` ON appointment.service_id = service.id INNER JOIN `customer` ON appointment.customer_id = customer.id INNER JOIN `employee` ON appointment.employee_id = employee.id WHERE employee.id = ? AND appointment.status = ? ORDER BY appointment.date DESC";
			$stmt = $this->conn->prepare($query);
			$stmt->bindparam(1, $this->employee_id);
			$stmt->bindparam(2, $this->status);
			$stmt->execute();
			return $stmt;
		}

		function getOneAppointment(){
			$query = "SELECT appointment.*, service.service_name, service.price, customer.firstName AS c_fname, customer.lastName AS c_lname, employee.firstName AS e_fname, employee.lastName AS e_lname FROM `appointment` INNER JOIN `service` ON appointment.service_id = service.id INNER JOIN `customer` ON appointment.customer_id = customer.id INNER JOIN `employee` ON appointment.employee_id = employee.id WHERE appointment.id = ?";
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
			if($stmt->execute()){
				return true;
			}
			else{
				return false;
			}
		}
	}
?>