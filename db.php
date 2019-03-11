<?php 
class Dbconnection {
	public function dbconnect($host,$username,$password){
		// Create connection
		$conn = mysqli_connect($host, $username, $password, "users");
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 
		return $conn;
	}
}
class Dbcreation {
	public function dbcreate($host,$username,$password){
		//Create connection
		$conn = new mysqli($servername, $username, $password);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 
		// Create database
		$sql = "CREATE DATABASE users";
		if ($conn->query($sql) === TRUE) {
		    echo "Database created successfully";
		} else {
		    echo "Error creating database: " . $conn->error;
		}
		return $conn;
	}
}

?>