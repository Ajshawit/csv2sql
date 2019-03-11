<?php 
// Options
$shortOptions = "u:p:h:";

$longOptions = array("file:", "help::", "dry_run::", "create_table::");

$options = getopt($shortOptions, $longOptions);

if (array_key_exists("help", $options)) {
	print "--file [csv file name] - Name of the CSV to be parsed (must be in same directory as script)\n";
	print "--create_table - Build MySQL \n";
	print "--dry_run - run all queries entered inputed but make no alterations to the database \n";
	print "-u - MySQL username \n";
	print "-p - MySQL password \n";
	print "-h - MySQL host \n";
	print "--help - Show this message\n";
}
elseif (array_key_exists("dry_run", $options)) {
	//perform function without modifying database
}
elseif (array_key_exists("create_table", $options)) {
	//create table
}
else {
	//run function that modifies database
}

function dbconnect($username, $password, $host, $dbname) {
	// Create connection
	$conn = new mysqli($host, $username, $password);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

}

function dbdisconnect {
	$conn->close();
}

?>
