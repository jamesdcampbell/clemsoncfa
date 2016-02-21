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
	public $review_date = false;
	public $fields = ["id","manager_id","employee_id","review_time","active", "review_date"];
	
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
		
		//Add Comments
		foreach($post["p_comment"] as $qid => $value)
		{	
			//Main Review Comment
			if($qid == "review")
			{
				$qid = false;
			}
			
			$comment = new CfaComment;
			$comment->review_id = $review->id;
			$comment->question_id = $qid;
			$comment->creator_id = $manager_id;
			$comment->comment_text = $value;
			$porm->create($comment);
		}
	}
	
	//Edit a Completed Review
	static function edit($manager_id, $post)
	{
		global $porm;
		
		$review_id = (int) $post["review_id"];
		
		//Prepare Review for Creation
		$review = $porm->readOne("SELECT * FROM p_review WHERE id = $review_id", [], "CfaReview");
		
		//Update Questions
		foreach($post["p_answer"] as $aid => $value)
		{
			$answer = $porm->readOne("SELECT * FROM p_answer WHERE id = $aid", [], "CfaAnswer");
			$answer->answer = $value;
			$porm->update($answer);
		}
		
		//Add Comments
		print_r($post["p_comment"]);
		foreach($post["p_comment"] as $cid => $value)
		{
			if($cid == "-1")
			{
				//Create Comment
				if($value == "")
				{
					continue;
				}
				
				else
				{
					print "creating comment.";
					$comment = new CfaComment;
					$comment->review_id = $review->id;
					$comment->question_id = false;
					$comment->creator_id = $manager_id;
					$comment->comment_text = $value;
					$porm->create($comment);
				}
			}
			
			$comment = $porm->readOne("SELECT * FROM p_comment WHERE id = $cid", [], "CfaComment");

			if($comment)
			{
				$comment->comment_text = $value;
				$porm->update($comment);
			}
		}
	}
}

?>