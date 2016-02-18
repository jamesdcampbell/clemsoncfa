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
	CfaReview::create($id, $employee_id, $review_time, $_POST);
}

?>
<?php
include '../includes/header.php';
?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Upcoming</a></li>
            <li><a href="#">My Reviews</a></li>
            <li><a href="#">New Review</a></li>
            <li><a href="#">Employees</a></li>
          </ul>
        </div>
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
  
  <h3 class="page-header">Questions</h3>
	<?php
	//Get Questions from Database
	$questions = $porm->read("SELECT * FROM p_question WHERE review_time = 0 OR review_time = $review_time", [], "CfaQuestion");
	
	$q_num = 1;
	foreach($questions as $q)
	{
		//Display Question once Daniel has created the design.
		$count = $q->id;
		print "<div class='form-group'>";
		print "<h4>$q_num. {$q->question_text}</h4>";
		print "<input type='radio' name='p_answer[$count]' value='1' required> {$q->developing_text}<br>";
		print "<input type='radio' name='p_answer[$count]' value='3'> {$q->proficient_text}<br>";
		print "<input type='radio' name='p_answer[$count]' value='5'> {$q->exemplary_text}<br>";
		print "<textarea class='form-control' name='p_comment[$count]'></textarea>";
		print "</div>";
		$q_num++;
	}
	?>
	<h3 class="page-header">Comments</h3>
  <div class="form-group">
    <label for="commentInput">Comments</label>
    <textarea type="text" class="form-control" id="commentInput" name="review_comment"></textarea>
  </div>
   <button type="submit" name="submit_review" class="btn btn-default">Submit Review</button>
</form>
        </div>
      </div>
    </div>
<?php
include '../includes/footer.php';
?>