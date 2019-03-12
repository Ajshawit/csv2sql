<?php 
require_once('db.php');

// Options
$shortOptions = "u:p:h:d:";

$longOptions = array("file:", "help::", "dry_run::", "create_table::");

$options = getopt($shortOptions, $longOptions);

if (array_key_exists("help", $options)) {
	print "--file [csv file name] - Name of the CSV to be parsed without extension (must be in same directory as script)\n";
	print "--create_table - Build table for users\n";
	print "--dry_run - run all queries entered inputed but make no alterations to the database \n";
	print "-u - MySQL username \n";
	print "-p - MySQL password \n";
	print "-h - MySQL host \n";
	print "-d - MySQL database name";
	print "--help - Show this message\n";
}
elseif (array_key_exists("dry_run", $options)) {
	// $db = new Dbconnection();
	// $db->dbconnect($options["h"],$options["u"],$options["p"], $options["d"]);
	$csv = array_map('str_getcsv', file($options["file"] . ".csv"));
	array_walk($csv, function(&$a) use ($csv) {
		$a = array_combine($csv[0], $a);
	});

	//Remove column header
	array_shift($csv);

	print_r($csv);

	print_r($csv[0]["surname"]);

	$names = array();
	$surnames = array();
	$emails = array();

    foreach ($csv as $value) {
    	if ($value["name"]) {
			$names[] = $value["name"];
		}
		elseif ($value["surname"]) {
			echo $value["surname"];
			$surnames[] = $value["surname"];
		}
		elseif ($value["email"]) {
			echo $value["email"];
			$emails[] = $value["email"];
		}
	}

	print_r($names);
	print_r($surnames);
	print_r($emails);

}
elseif (array_key_exists("create_table", $options)) {
	$tablecreate = new Tablecreation();
	$tablecreate->tablecreate($options["h"],$options["u"],$options["p"], $options["d"]);
}
else {
	//run function that modifies database
}

?>
