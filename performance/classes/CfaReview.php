<?php

/*
	The PORM class for the Review table
*/

class CfaReview{
	public $id = false;
	public $manager_id = false;
	public $employee_id = false;
	public $review_time = false;
	public $active = false;
	public $fields = ["id","manager_id","employee_id","review_time","active"];
	
	//Create a New Review
	static function create($manager_id, $employee_id, $review_time, $post)
	{
		global $porm;
		
		//Prepare Review for Creation
		$review = new CfaReview;
		$review->manager_id = $manager_id;
		$review->employee_id = $employee_id;
		$review->review_time = $review_time;
		$porm->create($review);
		
		//Add Questions
		foreach($post["p_answer"] as $qid => $value)
		{
			$answer = new CfaAnswer;
			$answer->review_id = $review->id;
			$answer->question_id = $qid;
			$answer->answer = $value;
			$porm->create($answer);
		}
	}
}

?>