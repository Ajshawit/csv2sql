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
class Tablecreation {
	public function tablecreate($host,$username,$password, $dbname){
		//Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 
		// Create table
		$sql = "CREATE TABLE users (
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			firstname VARCHAR(30) NOT NULL,
			lastname VARCHAR(30) NOT NULL,
			email VARCHAR(50)
		)";
		if ($conn->query($sql) === TRUE) {
		    echo "Table created successfully";
		} else {
		    echo "Error creating Table: " . $conn->error;
		}
		return $conn;
	}
}

?>