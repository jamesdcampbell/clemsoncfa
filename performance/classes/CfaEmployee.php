<?php

/*
	This is the PORM class for the TeamMemberInfo table.
	It represents an employee.
*/

class CfaEmployee{
	public $id = false;
	public $fName = false;
	public $lName = false;
	public $phone = false;
	public $address = false;
	public $email = false;
	public $login = false;
	public $password = false;
	public $hire_date = false;
	public $fields = ["id","fName","lName","phone","address","email","login","password","hire_date"];
	
	//Review Times (Keys are times, and values are [interval, upper limit] for reviews)
	static $review_times = [
		"30" => ["30 DAY", "60 DAY"],
		"60" => ["60 DAY", "90 DAY"],
		"90" => ["90 DAY", "1 YEAR"],
		"1" =>  ["1 YEAR", "100 YEAR"],
	];
	
	//Get Employees with Upcoming Reviews
	static function getUpcoming($type)
	{
		global $porm;
		
		//Security
		$type = (int) $type;
		
		$interval = CfaEmployee::$review_times[$type][0];
		$upper_limit = CfaEmployee::$review_times[$type][1];
			
		$sql = "
SELECT * FROM TeamMemberInfo
WHERE CURRENT_DATE() > DATE_ADD(hire_date, INTERVAL $interval)
AND CURRENT_DATE() <= DATE_ADD(hire_date, INTERVAL $upper_limit)
AND id NOT IN(
	SELECT employee_id FROM p_review
	WHERE employee_id = TeamMemberInfo.id
	AND review_time = $type
)";
		return $porm->read($sql, [], "CfaEmployee");
	}
}
?>