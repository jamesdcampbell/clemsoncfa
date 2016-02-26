<?php

include '../includes/init.php';

//Manager's Reviews

//Get Employee
$employee_id = isset($_GET["employee"]) ? (int) $_GET["employee"] : "";

$employee = $porm->readOne("SELECT * FROM TeamMemberInfo WHERE id = '$employee_id'", [], "CfaEmployee");

if(!$employee)
{
	exit("Invalid employee.");
}

//Get Review Time
$review_time = isset($_GET["time"]) ? (int) $_GET["time"] : "0";

$display_time = CfaEmployee::$review_times[$review_time][0];

//Create New Review
if(isset($_POST["submit_review"]))
{
	//Create new Review
	$request_id = isset($_GET["request"]) ? $_GET["request"] : false;
	CfaReview::create($id, $employee_id, $review_time, $request_id, $_POST);
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
          <h1 class="page-header">Review Employee</h1>
		  <form method="post">
  <div class="form-group">
    <label for="employeeInput">Employee</label>
    <input type="text" class="form-control" id="employeeInput" disabled value="<?=$employee->fName . " " . $employee->lName?>">
  </div>
  
  <div class="form-group">
    <label for="typeInput">Review Type</label>
    <input type="text" class="form-control" id="typeInput" disabled value="<?=$display_time?>">
  </div>
  
  <h2 lass="page-header">Questions</h2>
	<?php
	//Get Questions from Database
	$questions = $porm->read("SELECT * FROM p_question WHERE (review_time = 0 OR review_time = $review_time) AND active = 1", [], "CfaQuestion");
	
	$q_num = 1;
	foreach($questions as $q)
	{
		print "<br>";
		$count = $q->id;
		print "<div class='form-group'>";
		print "<h4>$q_num. {$q->question_text}</h4>";
		print "<input type='radio' name='p_answer[$count]' value='1' required> {$q->developing_text}<br>";
		print "<input type='radio' name='p_answer[$count]' value='3'> {$q->proficient_text}<br>";
		print "<input type='radio' name='p_answer[$count]' value='5'> {$q->exemplary_text}<br>";
		print "<br>";
		print "Comment";
		print "<textarea class='form-control' name='p_comment[$count]'></textarea>";
		print "<hr>";
		print "</div>";
		$q_num++;
	}
	?>
	<h2 class="page-header">Final Comments</h2>
  <div class="form-group">
    <label for="commentInput">Comments</label>
    <textarea type="text" class="form-control" id="commentInput" name="p_comment['review']"></textarea>
  </div>
   <br>
   <button type="submit" name="submit_review" class="submit">Submit Review</button>
   <br><br>
</form>
        </div>
      </div>
    </div>
<?php
include '../includes/footer.php';
?>