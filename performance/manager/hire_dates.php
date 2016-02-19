<?php

include '../includes/init.php';

$lines = file('hire_dates.txt');

foreach($lines as $line)
{
	$date_name = explode("\t", $line);
	
	$date = $date_name[0];
	$name = $date_name[1];
	
	
	
	$date_array = array_reverse(explode("/", $date));
	
	$fixed_date = implode("-", [$date_array[0], $date_array[2], $date_array[1]]);
	
	$last_first = explode(", ", $name);
	$first = $last_first[1];
	$last = $last_first[0];
	
	$sql = "UPDATE teammemberinfo SET hire_date = '$fixed_date' WHERE fName = '$first' AND lName = '$last'";
	
	print $sql . ";\n";
	
	$porm->con->query($sql);
}

?>