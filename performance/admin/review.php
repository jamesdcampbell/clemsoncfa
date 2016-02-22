
<?php
include '../includes/init.php';
include '../includes/header.php';

$review_id = isset($_GET["id"]) ? $_GET["id"] : die("Invalid review id.");

$review = $porm->readOne("SELECT * FROM p_review WHERE id = $review_id", [], "CfaReview");

$employee = $porm->readOne("SELECT * FROM TeamMemberInfo WHERE id = '{$review->employee_id}'", [], "CfaEmployee");

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
		  
		  <h2 class="page-header">Average Reviews</h2>
		  <?php
		  
		  //Display Review Averages
		  $review->displayAverage();
		  
		  ?>
			</div>
        </div>
      </div>
    </div>

<?php
include '../includes/footer.php';
?>
