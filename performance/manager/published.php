
<?php
include '../includes/init.php';

$employee_id = isset($_GET["employee"]) ? $_GET["employee"] : die("Invalid employee id.");

$review_time = isset($_GET["time"]) ? $_GET["time"] : die("Invalid review time.");

$review = $porm->readOne("SELECT * FROM p_review WHERE employee_id = {$employee_id} AND review_time = {$review_time}", [], "CfaReview");

$employee = $porm->readOne("SELECT * FROM teammemberinfo WHERE id = '{$review->employee_id}'", [], "CfaEmployee");

//Does the manager have permission to see this review?
$permission = $porm->readOne("SELECT * FROM p_review_published WHERE employee_id = {$employee_id} AND review_time = {$review_time} AND manager_id = {$user->id}");

if(!$permission)
{
	die("You do not have permission to see this review.");
}

include '../includes/header.php';
?>

    <div class="container-fluid">
      <div class="row">
        <?php
		include "../manager/manager_side.php";
		?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1>Published Results <a href="javascript:window.print()" class="btn btn-default print_hidden rightfloat">Print Page</a></h1>
		  
		  <div class="form-group">
    <label for="employeeInput">Employee</label>
    <input type="text" class="form-control" id="employeeInput" disabled value="<?=$employee->fName . " " . $employee->lName?>">
  </div>
  
  <div class="form-group">
    <label for="typeInput">Review Type</label>
    <input type="text" class="form-control" id="typeInput" disabled value="<?=CfaEmployee::$review_times[$review_time][0]?>">
  </div>
		  
		  <h2>Average Reviews</h2>
		  <?php
		  
		  //Display Review Averages
		  $review->displayAllAverages();
		  
		  print "<div class='print_break_after'>...</div>";
		  
		  ?>
			</div>
        </div>
      </div>
    </div>

<?php
include '../includes/footer.php';
?>
