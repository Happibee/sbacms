<?php
	class Schedule{
	public $date;
	public $time;
	public $schedId;
	
	public $conn;
	private $tablename = 'schedule';
	
	
	function __construct($db){
		$this->conn=$db;
	}
	
	function createSchedule(){
		//$query = "INSERT INTO schedule";
		
		$stmt = $this->conn->prepare($query);
		$stmt->bindparam(1, $this->schedId);
		$stmt->execute();
		
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$this->date = $row['date'];
		$this->time = $row['time'];
	}
}
?>