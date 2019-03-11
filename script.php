<?php 
// Options
$shortOptions = "u:p:h:";

$longOptions = array("file:", "help::", "dry_run::", "create_table::");

if (array_key_exists("help", getopt($shortOptions, $longOptions))) {
	print "--file [csv file name] - Name of the CSV to be parsed (must be in same directory as script)\n";
	print "--create_table - Build MySQL \n";
	print "--dry_run - run all queries entered inputed but make no alterations to the database \n";
	print "-u - MySQL username \n";
	print "-p - MySQL password \n";
	print "-h - MySQL host \n";
	print "--help - Show this message\n";
}
elseif (array_key_exists("dry_run", getopt($shortOptions, $longOptions))) {
	//perform function without modifying database
}
elseif (array_key_exists("create_table", getopt($shortOptions, $longOptions))) {
	//create table
}
else {
	//run function that modifies database
}

?>
