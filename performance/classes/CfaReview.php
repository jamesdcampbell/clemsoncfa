<?php

/*
	The PORM class for the Review table
*/

class CfaReview{
	public $id = false;
	public $manager_id = false;
	public $employee_id = false;
	public $review_time = false;
	public $request_id = false;
	public $review_date = false;
	public $fields = ["id","manager_id","employee_id","review_time", "request_id", "review_date"];
	
	/*
		Displays averages for a review of a specific time by all managers.
		Uses a review object for the employee id and review time. 
	*/
	public function displayAllAverages()
	{
		global $porm;
		
		//All reviews of this type and employee
		$reviews = $porm->read("SELECT * FROM p_review WHERE employee_id = {$this->employee_id} AND review_time = {$this->review_time}", [], "CfaReview");
		
		//Get Answer Averages
		$questoin_avgs = [];
		$answers = [];
		
		foreach($reviews as $review)
		{
			$answers = $porm->read("SELECT * FROM p_answer WHERE review_id = {$review->id}", [], "CfaAnswer");
			  
			foreach($answers as $answer)
			{	  
				//Get Question Info
				$question = $porm->readOne("SELECT * FROM p_question WHERE id = {$answer->question_id}", [], "CfaQuestion");
				
				if(isset($question_avgs[$question->id]))
				{
					$question_avgs[$question->id][1] += $answer->answer;
				}
				else
				{
					$question_avgs[$question->id] = [$question->short_desc, $answer->answer];
				}
			}
		}
		
		print '<table class="table table-striped">
              <thead>
                <tr>
                  <th>Category</th>
                  <th>Performance (1 to 5)</th>
                </tr>
              </thead>
              <tbody>';
			  
			  $total = 0;
			  $max = count($answers) * 5;
			  foreach($question_avgs as $q_avg)
			  {
				  $cat = $q_avg[0];
				  $avg_score = $q_avg[1] / count($reviews);
				  $total += $avg_score;
				  print "<tr>";
				  print "<td>$cat</td>";
				  print "<td>$avg_score</td>";
				  print "</tr>";
			  }
			  
			  $avg = ($total / $max) * 5;
			  print "<tr><th>Average</th><th>$avg</th></tr>";

              print '</tbody>
            </table>';
	}
	
	//Display a Single Review
	public function displayReview()
	{
		global $porm;
		
		//Manager Name
		$manager = $porm->get($this->manager_id, "CfaEmployee");

		//Get Questions
		$answers = $porm->read("
SELECT answer, short_desc, comment_text FROM p_answer, p_question, p_comment
WHERE p_answer.review_id = {$this->id}
AND p_question.id = p_answer.question_id
AND p_comment.review_id = {$this->id}
AND p_comment.question_id = p_question.id
", [], "CfaAnswer"
		);
		
		print "<h3>{$manager->fName} {$manager->lName}</h3>";
		print '<table class="table table-striped">
              <thead>
                <tr>
                  <th>Category</th>
                  <th>Performance (1 to 5)</th>
				  <th>Comment</th>
                </tr>
              </thead>
              <tbody>';
			  
		foreach($answers as $answer)
		{
			print "<tr>";
			print "<td>" . $answer->short_desc . "</td>";
			print "<td>" . $answer->answer . "</td>";
			print "<td>" . $answer->comment_text . "</td>";
			print "</tr>";
		}
		
		print "</tbody></table>";
		
	}
	
	//Create a New Review
	static function create($manager_id, $employee_id, $review_time, $request_id, $post)
	{
		global $porm;
		
		//Prepare Review for Creation
		$review = new CfaReview;
		$review->manager_id = $manager_id;
		$review->employee_id = $employee_id;
		$review->review_time = $review_time;
		$review->request_id = $request_id;
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
		
		return $review->id;
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
	
	//Get Competed Reviews (for Admins)
	static function getCompleted()
	{
		global $porm;
		
		$ordered = [];
		
		$completed = $porm->read("
SELECT p_review.id, review_time, fName, lName, SUM(answer) / (COUNT(DISTINCT p_answer.question_id) * COUNT(DISTINCT p_review.id)) as score
FROM p_review, teammemberinfo, p_answer
WHERE employee_id = teammemberinfo.id
AND p_review.id = p_answer.review_id
GROUP BY employee_id, review_time
", [], "CfaReview");
		
		foreach($completed as $review)
		{
			$review->review_link = "<a href='review.php?id={$review->id}' class='btn btn-default'>View Details</a>";
			$review->compare_link = "<a href='compare.php?id={$review->id}' class='btn btn-default'>Compare</a>";
			$ordered[$review->review_time][] = $review;
		}

		return $ordered;
	}
}

?>