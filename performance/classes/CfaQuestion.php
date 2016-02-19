<?php

/*
	A Class for Working with the Questions Table
*/

class CfaQuestion
{
	public $id = false;
	public $question_text = false;
	public $developing_text = false;
	public $proficient_text = false;
	public $exemplary_text = false;
	public $review_time = false;
	public $question_order = false;
	public $fields = ["id","question_text","developing_text","proficient_text","exemplary_text","review_time","question_order"];
	
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