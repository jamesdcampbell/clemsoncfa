
<?php
include '../includes/init.php';

$review_id = isset($_GET["id"]) ? $_GET["id"] : die("Invalid review id.");

$review = $porm->readOne("SELECT * FROM p_review WHERE id = $review_id", [], "CfaReview");

$employee = $porm->readOne("SELECT * FROM TeamMemberInfo WHERE id = '{$review->employee_id}'", [], "CfaEmployee");

//Post Results Form
if(isset($_POST["post"]))
{
	$porm->con->query("DELETE FROM p_review_active WHERE employee_id = {$employee->id} AND review_time = {$review->review_time}");
	$porm->con->query("INSERT INTO p_review_active(employee_id, review_time, show_rank) VALUES({$employee->id}, {$review->review_time}, '{$_POST["rank"]}')");
}

include '../includes/header.php';
include 'modals.php';
?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Reviews</a></li>
            <li><a href="#">Reports</a></li>
            <li><a href="#">Questions</a></li>
            <li><a href="#">Managers</a></li>
            <li><a href="#">Employees</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Review Results</h1>
		  
		  <div class="form-group">
    <label for="employeeInput">Employee</label>
    <input type="text" class="form-control" id="employeeInput" disabled value="<?=$employee->fName . " " . $employee->lName?>">
  </div>
  
  <div class="form-group">
    <label for="typeInput">Review Type</label>
    <input type="text" class="form-control" id="typeInput" disabled value="<?=CfaEmployee::$review_times[$review->review_time][0]?>">
  </div>
  
  <div class="form-group">
	<label>Action</label>
	<br>
    <button class="btn btn-default" data-toggle="modal" data-target="#postModal">Post Results</button>
    <button class="btn btn-default">Add Note</button>
  </div>
		  
		  <h2 class="page-header">Average Reviews</h2>
		  <?php
		  
		  //Display Review Averages
		  $review->displayAllAverages();
		  
		  ?>

		  <h2 class="page-header">Individual Reviews</h2>
		  <?php
		  
		  //Get All Review of this Type and Employee
		  $reviews = $porm->read("SELECT * FROM p_review WHERE review_time = {$review->review_time} AND employee_id = {$review->employee_id}", [], "CfaReview");
		  
		  //Display Results
		  foreach($reviews as $r)
		  {
			  $r->displayReview();
		  }
		  ?>
			</div>
        </div>
      </div>
    </div>

<?php
include '../includes/footer.php';
?>
