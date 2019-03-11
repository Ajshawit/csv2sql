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
	$row = 1;
	if (($handle = fopen($options["file"] . ".csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        echo "$num fields in line $row\n";
        $row++;
        for ($c=0; $c < $num; $c++) {
            echo $data[$c] . "\n";
        }
    }
    fclose($handle);
}

}
elseif (array_key_exists("create_table", $options)) {
	$tablecreate = new Tablecreation();
	$tablecreate->tablecreate($options["h"],$options["u"],$options["p"], $options["d"]);
}
else {
	//run function that modifies database
}

?>
