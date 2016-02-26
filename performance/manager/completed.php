<?php

include '../includes/init.php';

//Get Review
$review_id = isset($_GET["review"]) ? (int) $_GET["review"] : die("Invalid review id.");

$review = $porm->readOne("SELECT * FROM p_review WHERE id = $review_id", [], "CfaReview");

$display_time = CfaEmployee::$review_times[$review->review_time][0];

$employee = $porm->readOne("SELECT * FROM teammemberinfo WHERE id = {$review->employee_id}", [], "CfaEmployee");

//Create New Review
if(isset($_POST["edit_review"]))
{
	//Create new Review
	CfaReview::edit($id, $_POST);
}

?>
<?php
include '../includes/header.php';
?>
    <div class="container-fluid">
      <div class="row">
	  <?php
		include "manager_side.php";
		?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Completed Review</h1>
		  <form method="post">
		  <input type="hidden" name="review_id" value="<?=$review_id?>">
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
		
		$comment_text = $comment->comment_text;
		$comment_id = $comment->id;
		
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
			print "<input type='radio' name='p_answer[{$a->id}]' value='$val' required $answered> {$q->{$opt}}<br>";
		}
		print "<textarea class='form-control' name='p_comment[$comment_id]'>$comment_text</textarea>";
		print "</div>";
		$q_num++;
	}
	?>
	<h3 class="page-header">Comments</h3>
	<?php
	
	//Main Comments
	$comments = $porm->read("SELECT * FROM p_comment WHERE review_id = $review_id AND question_id = 0 ORDER BY comment_date", [], "CfaComment");
	
	foreach($comments as $c)
	{
		?>
		<div class="form-group">
		<textarea type="text" class="form-control" id="commentInput" name="p_comment[<?=$c->id?>]"><?=$c->comment_text?></textarea>
		</div>
		<?php
	}
	
	?>
	
	<div class="form-group">
		<label for="commentInput">New Comment</label>
		<textarea type="text" class="form-control" id="commentInput" name="p_comment[-1]"></textarea>
		</div>
	
   <button type="submit" name="edit_review" class="btn btn-default">Edit Review</button>
</form>
        </div>
      </div>
    </div>
<?php
include '../includes/footer.php';
?>