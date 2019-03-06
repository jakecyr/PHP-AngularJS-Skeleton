<?php
class Database{
	private $host;
	private $username;
	private $password;
	private $database;

	private $conn;

	public function __construct($host, $username, $password, $database){
		$this->host = $host;
		$this->username = $username;
		$this->password = $password;
		$this->database = $database;

		$this->connect();
	}
	public function connect(){
		try{
			$this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->database, $this->username, $this->password);
		} catch(PDOException $e){
		    print "Error!: " . $e->getMessage() . "<br/>";
		    die();
		}
	}
	public function runSQL($query, $params=null){
		$statement = $this->conn->prepare($query);
		$statement->execute($params);
		return $this->conn->lastInsertId();
	}
	public function exists($query, $params){
		$result = $this->getRecordSet($query, $params);
		return count($result) > 0;
	}
	public function getRecordSet($query, $params=null){
		$statement = $this->conn->prepare($query);
		$statement->execute($params);
		return $statement->fetchAll(PDO::FETCH_ASSOC);
	}
	public function getFirst($query, $params=null){
		$result = $this->getRecordSet($query, $params);

		if(count($result) > 0){
			return $result[0];
		} else{
			return null;
		}
	}
	public function getValue($column, $query, $params=null){
		$result = $this->getFirst($query, $params);

		if(!is_null($result)){
			return $result[$column];
		} else{
			return null;
		}
	}
	public function getJson($query, $params=null){
		$result = $this->getRecordSet($query, $params);
		return json_encode($result, JSON_NUMERIC_CHECK);
	}
	public function close(){
		$this->conn->close();
	}
}
?>