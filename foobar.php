<?php
for ($i = 1; $i<=100; $i++)
{
	if($i % 3 == 0) {
		if($i % 5 == 0){
			print("foobar ");
		}
		else {
			print("foo ");
		}
	}
	elseif($i % 5 == 0) {
		print("bar ");
	}
	else {
		print($i . " ");
	}
}
?>