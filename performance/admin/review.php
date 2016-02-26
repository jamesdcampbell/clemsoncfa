
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

$note = $porm->readOne("SELECT * FROM p_admin_comment WHERE employee_id = {$employee->id} AND review_time = {$review->review_time}", [], "CfaAdminComment");

if(!$note)
{
	$note = new CfaAdminComment;
	$note->comment_text = "";
}

//Add Note Form
if(isset($_POST["note"]))
{
	$note->comment_text = $_POST["note_text"];
	$porm->update($note);
}

include '../includes/header.php';
include 'modals.php';
?>

    <div class="container-fluid">
      <div class="row">
        <?php
		include "../manager/manager_side.php";
		?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1>Review Results</h1>
		  
		  <div class="form-group">
    <label for="employeeInput">Employee</label>
    <input type="text" class="form-control" id="employeeInput" disabled value="<?=$employee->fName . " " . $employee->lName?>">
  </div>
  
  <div class="form-group">
    <label for="typeInput">Review Type</label>
    <input type="text" class="form-control" id="typeInput" disabled value="<?=CfaEmployee::$review_times[$review->review_time][0]?>">
  </div>
  
  <div class="form-group">
	<label>Post Results</label>
	<br>
    <button class="btn btn-default" data-toggle="modal" data-target="#postModal">Post Results</button>
  </div>
  
  <form action="" method="post">
  <div class="form-group">
	<label>Notes</label>
	<textarea name="note_text" class="form-control"><?=$note->comment_text?></textarea>
	<button type="submit" name="note" class="btn btn-default" value="Add Note">Add Note</button>
  </div>
  </form>
  
		  
		  <h2>Average Reviews</h2>
		  <?php
		  
		  //Display Review Averages
		  $review->displayAllAverages();
		  
		  ?>

		  <h2>Individual Reviews</h2>
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
