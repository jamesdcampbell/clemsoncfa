
<?php
include '../includes/init.php';

$review_id = isset($_GET["id"]) ? $_GET["id"] : die("Invalid review id.");

$review = $porm->readOne("SELECT * FROM p_review WHERE id = $review_id", [], "CfaReview");

$employee = $porm->readOne("SELECT * FROM teammemberinfo WHERE id = '{$review->employee_id}'", [], "CfaEmployee");

//Is Review Active
$active = $porm->read("SELECT * FROM p_review_active WHERE employee_id = {$employee->id} AND review_time = {$review->review_time}");

if($active)
{
	$published = true;
}

else
{
	$published = false;
}



//Publish/Unpublish Results Form
if(isset($_POST["post"]))
{
	//Unpublish
	if($published)
	{
		$porm->con->query("DELETE FROM p_review_active WHERE employee_id = {$employee->id} AND review_time = {$review->review_time}");
		$published = false;
	}
	
	else
	{
		//Publish
		$porm->con->query("INSERT INTO p_review_active(employee_id, review_time, show_rank) VALUES({$employee->id}, {$review->review_time}, '{$_POST["rank"]}')");
		$published = true;
	}
}

//Publish to Managers
if(isset($_POST["post-manager"]))
{
	$managers = isset($_POST["manager"]) ? $_POST["manager"] : [];
	
	//Send Emails to Managers
	foreach($managers as $m)
	{
		//Is it already published to this manager?
		$result = $porm->read("SELECT * FROM p_review_published WHERE review_time = {$review->review_time} AND employee_id = {$review->employee_id} AND manager_id = $m", []);
		
		if(!count($result))
		{
			//Send published results to manager
			$manager = $porm->get($m, "CfaEmployee");
			$manager->sendEmail("CFA Published Review", "<pre>The {$review->getDisplayTime()} review results for employee {$employee->fName} {$employee->lName} have been made available at:\n\nhttp://clemsoncfa.com/performance/manager/published.php?employee={$review->employee_id}&time={$review->review_time}</pre>");
			
			print("<pre>The {$review->getDisplayTime()} review results for employee {$employee->fName} {$employee->lName} have been made available at:\n\nhttp://clemsoncfa.com/performance/manager/published.php?employee={$review->employee_id}&time={$review->review_time}</pre>");
		}
	}
	
	//Clear published reviews
	$porm->read("DELETE FROM p_review_published WHERE review_time = {$review->review_time} AND employee_id = {$review->employee_id}");
	
	//Add published reviews
	foreach($managers as $m)
	{
		$porm->read($sql = "INSERT INTO p_review_published(employee_id, review_time, manager_id) VALUES({$review->employee_id}, {$review->review_time}, $m)");
		print "<pre>$sql</pre>";
	}
}

$note = $porm->readOne("SELECT * FROM p_admin_comment WHERE employee_id = {$employee->id} AND review_time = {$review->review_time}", [], "CfaAdminComment");

if(!$note)
{
	$note_text = "";
}

else
{
	$note_text = $note->comment_text;
}

//Add Note Form
if(isset($_POST["note"]))
{
	if($note)
	{
		$note->comment_text = $_POST["note_text"];
		$porm->update($note);
		$note_text = $note->comment_text;
	}
	
	else
	{
		$note = new CfaAdminComment;
		$note->comment_text = $_POST["note_text"];
		$note->employee_id = $employee->id;
		$note->review_time = $review->review_time;;
		$porm->create($note);
		$note_text = $note->comment_text;
	}
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
          <h1>Review Results <a href="javascript:window.print()" class="btn btn-default print_hidden rightfloat">Print Page</a></h1>
		  
		  <div class="form-group">
    <label for="employeeInput">Employee</label>
    <input type="text" class="form-control" id="employeeInput" disabled value="<?=$employee->fName . " " . $employee->lName?>">
  </div>
  
  <div class="form-group">
    <label for="typeInput">Review Type</label>
    <input type="text" class="form-control" id="typeInput" disabled value="<?=CfaEmployee::$review_times[$review->review_time][0]?>">
  </div>
  
  <div class="form-group print_hidden">
	<label>Post Results</label>
	<br>
	<?php
	
	//Post to Employees
	if(!$published)
	{
		print '<button class="btn btn-default" data-toggle="modal" data-target="#postModal">Publish to Employee</button>';
	}
	
	else
	{
		print '<form action="" method="post"><button type="submit" class="btn btn-default" name="post">Unpublish from Employee</button></form>';
	}
	
	?>
	
	<button class="btn btn-default" data-toggle="modal" data-target="#postManagerModal">Publish to Managers</button>
	
  </div>
  
  <form action="" method="post" class="print_hidden">
  <div class="form-group">
	<label>Notes</label>
	<textarea name="note_text" class="form-control"><?=$note_text?></textarea>
	<button type="submit" name="note" class="btn btn-default" value="Add Note">Add Note</button>
  </div>
  </form>
  
  <div class="screen_hidden">
	<label>Notes</label>
	<p><?=$note_text?></p>
  </div>
  
		  
		  <h2>Average Reviews</h2>
		  <?php
		  
		  //Display Review Averages
		  $review->displayAllAverages();
		  
		  print "<div class='print_break_after'>...</div>";
		  
		  ?>

		  <h2>Individual Reviews</h2>
		  <?php
		  
		  //Get All Review of this Type and Employee
		  $reviews = $porm->read("SELECT * FROM p_review WHERE review_time = {$review->review_time} AND employee_id = {$review->employee_id}", [], "CfaReview");
		  
		  //Display Results
		  foreach($reviews as $r)
		  {
			  $r->displayReview();
			  
			  //Load Main Comment
			  $comment = $porm->readOne("SELECT * FROM p_comment WHERE review_id = {$r->id} AND question_id = 0", [], "CfaComment");
			  if($comment)
			  {
				  print "
				  <div class='print_hidden'>
				  <h3>Comment</h3>
				  <textarea class='form-control'>{$comment->comment_text}</textarea>
				  </div>
				  
				  <div class='screen_hidden'>
					<p>{$comment->comment_text}</p>
				  </div>
				  ";
				  print "<div class='print_break_after'>...</div>";
			  }
		  }
		  ?>
			</div>
        </div>
      </div>
    </div>

<?php
include '../includes/footer.php';
?>
