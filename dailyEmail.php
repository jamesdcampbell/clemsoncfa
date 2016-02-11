#!/usr/bin/php
<?php

mysql_connect("localhost","clemsonc_clemson","CLEMcfa2536$") or die(mysql_error());
// Check connection
mysql_select_db("clemsonc_clemsonScheduling") or die(mysql_error());

date_default_timezone_set('America/New_York');
$yesterday = date('Y-m-d', strtotime("-1 day"));
$today = date('Y-m-d');

$findRequests = mysql_query("SELECT * FROM requestOff WHERE dateAdded = '" . $today . "'");

$numRequests = mysql_num_rows($findRequests);


$findEmail = mysql_query("SELECT * FROM employeeInformation WHERE position = 'Administrator' AND employed = '1'");	
	
while($row = mysql_fetch_array($findEmail))
{
	$emails[] = $row['email'];
}
$to = implode(", ", $emails);
$subject = "New Requests";
$message = "These are the requests that have been made in the last day:\r\n";
$message .= "-----------------------------------------------------------\r\n";

while($requestsRow = mysql_fetch_array($findRequests))
{
	$findEmployee = mysql_fetch_array(mysql_query("SELECT * FROM employeeInformation WHERE employeeNumber = '" . $requestsRow['employeeId'] . "'"));
	$name = $findEmployee['firstName'] . ' ' . $findEmployee['lastName'];
	$message .= $name . " has requested " . $requestsRow['month'] . "/" . $requestsRow['day'] . "/" . $requestsRow['year'] . " off from " . $requestsRow['start'] . ":00-" . $requestsRow['end'] . ":00, their reason is: " . $requestsRow['reason'] . ".\r\n";
	
}

$headers = 'From: clemsoncfa@clemsoncfa.com';
if($numRequests != 0)
{
	mail($to, $subject, $message, $headers);
}



?>
