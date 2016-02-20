<?php

include '../includes/init.php';

//Get Review
$review_id = isset($_GET["review"]) ? (int) $_GET["review"] : die("Invalid review id.");

$review = $porm->readOne("SELECT * FROM p_review WHERE id = $review_id", [], "CfaReview");

$display_time = CfaEmployee::$review_times[$review->review_time][0];

$employee = $porm->readOne("SELECT * FROM teammemberinfo WHERE id = {$review->employee_id}", [], "CfaEmployee");

?>
<?php
include '../includes/header.php';
?>
    <div class="container-fluid">
      <div class="row">
<div class="col-sm-3 col-md-2 sidebar">
		 <img src="../../images/cfaicon.png" class="img-responsive" alt="../../images/cfaicon.jpg" width="304" height="236"> 
			<h1 class="welcome"><small>Welcome back!</small></h1>
			<h1 class="manager_name">$Manager Name</h1>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Completed Review</h1>
		  <form method="post">
  <div class="form-group">
    <label for="employeeInput">Employee</label>
    <input type="text" class="form-control" id="employeeInput" disabled value="<?=$employee->fName . " " . $employee->lName?>">
  </div>
  
  <div class="form-group">
    <label for="typeInput">Review Type</label>
    <input type="text" class="form-control" id="typeInput" disabled value="<?=$display_time?>">
  </div>
  
  <h3 class="page-header">Answers</h3>
	<?php
	//Get Questions from Database
	$answers = $porm->read("SELECT * FROM p_answer WHERE review_id = $review_id", [], "CfaAnswer");
	
	$q_num = 1;
	foreach($answers as $a)
	{
		//Get Question Info
		$q = $porm->readOne("SELECT * FROM p_question WHERE id = {$a->question_id}", [], "CfaQuestion");
		
		//Get Comment
		$comment = $porm->readOne("SELECT * FROM p_comment WHERE review_id = $review_id AND question_id = {$a->question_id}", [], "CfaComment");
		
		$comment_text = $comment ? $comment->comment_text : "";
		
		$count = $q->id;
		print "<div class='form-group'>";
		print "<h4>$q_num. {$q->question_text}</h4>";
		$answer_options = ["1" => "developing_text", "3" => "proficient_text", "5" => "exemplary_text"];
		foreach($answer_options as $val => $opt)
		{
			$answered = "";
			if($val == $a->answer)
			{
				$answered = "checked";
			}
			print "<input type='radio' name='p_answer[$count]' value='$val' required $answered> {$q->{$opt}}<br>";
		}
		print "<textarea class='form-control' name='p_comment[$count]'>$comment_text</textarea>";
		print "</div>";
		$q_num++;
	}
	?>
	<h3 class="page-header">Comments</h3>
  <div class="form-group">
    <label for="commentInput">Comments</label>
    <textarea type="text" class="form-control" id="commentInput" name="p_comment['review']"></textarea>
  </div>
   <button type="submit" name="submit_review" class="btn btn-default">Submit Review</button>
</form>
        </div>
      </div>
    </div>
<?php
include '../includes/footer.php';
?>