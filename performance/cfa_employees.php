<?php

include "porm/porm.php";
$porm = new Porm();

$lines = file("cfa_employees.txt", FILE_IGNORE_NEW_LINES);

$count = 0;
foreach($lines as $line)
{
	$date_name = explode("\t", $line);
	
	$date = $date_name[0];
	$name = $date_name[1];
	
	$date_array = explode("/", $date);
	$name_array = explode(", ", $name);
	
	$day = $date_array[1];
	$month = $date_array[0];
	$year = $date_array[2];
	
	$fname = $name_array[1];
	$lname = $name_array[0];

	
	$user = $porm->read("SELECT * FROM teammemberinfo WHERE fName = '$fname' AND lName = '$lname'");
	
	#Add if non-existent
	if(!$user)
	{
		$porm->read("INSERT INTO teammemberinfo(fName, lName, phone, email, login, position, password, hire_date) VALUES('$fname', '$lname', '', 'dummy-email', 'false', '', '7b4f075f3914bbd4bf9a26623d95954fa0dac20a', '$year-$month-$day')");
		$count++;
	}
}

print "created $count users.";

?>