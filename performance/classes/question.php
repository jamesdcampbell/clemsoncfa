<?php

/*
	A Class for Working with the Questions Table
*/

class Question
{
	//Fetch Questions
	static function getType($type = "0")
	{
		global $db;
		
		$sql = "SELECT * FROM p_question WHERE review_time = $type";
		
		$results = $db->query($sql);
		
		//Return Empty Array on Failure
		if($results)
			return $results;
		else
			return [];
	}
}
?>