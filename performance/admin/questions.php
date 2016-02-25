<?php

include '../includes/init.php';
include '../includes/header.php';

//Edit Question
if(isset($_POST["edit"]))
{
	//Questions cannot be edited as it would mess up past reviews. They are disabled and new questions are created.
	$question = $porm->get((int) $_POST["question_id"], "CfaQuestion");
	$question->active = 0;
	$porm->update($question);
	
	//New Question
	$fields = ["question_text", "developing_text", "proficient_text", "exemplary_text", "short_desc"];
	$new_question = new CfaQuestion;
	foreach($fields as $field)
	{
		$new_question->{$field} = $_POST[$field];
	}
	$porm->create($new_question);
	BS::alert("Question updated successfully.", "success");
}

//Delete Question
if(isset($_POST["delete"]))
{
	//Questions cannot be deleted, but only disabled so that past reviews will still show up on reviews.
	$question = $porm->get((int) $_POST["question_id"], "CfaQuestion");
	
	$question->active = 0;
	
	$porm->update($question);
	BS::alert("Question deleted successfully.", "success");
}

?>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Performance Review System</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Help</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>

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
          <h1 class="page-header">Edit Questions</h1>
		  <h2 class="page-header">General Questions</h2>
		  <p>These questions appear on every review.</p>
		  <?php
			$count = 0;
			$questions = $porm->read("SELECT * FROM p_question WHERE review_time = 0 AND active = 1 ORDER BY short_desc", [], "CfaQuestion");
			foreach($questions as $q)
			{
				$q->displayQuestion($count);
				$count++;
			}
		  ?>
		<div class="form-group">
			<button class="btn btn-success">Add Question</button>
		</div>
		  
		  <hr>
		  <h2 class="page-header">30-Day Questions</h2>
		  <p>These questions appear only on the 30-Day reviews.</p>
		  <?php
			$questions = $porm->read("SELECT * FROM p_question WHERE review_time = 30 AND active = 1 ORDER BY short_desc", [], "CfaQuestion");
			$count = 0;
			foreach($questions as $q)
			{
				foreach($questions as $q)
				{
					$q->displayQuestion($count);
					$count++;
				}
				$count++;
			}
		  ?>
		<div class="form-group">
			<button class="btn btn-success">Add Question</button>
		</div>
		  <hr>
		  <h2 class="page-header">60-Day Questions</h2>
		  <p>These questions appear only on the 60-Day reviews.</p>
		  <?php
			$questions = $porm->read("SELECT * FROM p_question WHERE review_time = 60 AND active = 1 ORDER BY short_desc", [], "CfaQuestion");
			$count = 0;
			foreach($questions as $q)
			{
				$q->displayQuestion($count);
				$count++;
			}
		  ?>
		<div class="form-group">
			<button class="btn btn-success">Add Question</button>
		</div>
		  
		  <h2 class="page-header">90-Day Questions</h2>
		  <p>These questions appear only on the 90-Day reviews.</p>
		  <?php
			$questions = $porm->read("SELECT * FROM p_question WHERE review_time = 90 AND active = 1 ORDER BY short_desc", [], "CfaQuestion");
			$count = 0;
			foreach($questions as $q)
			{
				$q->displayQuestion($count);
				$count++;
			}
		  ?>
		<div class="form-group">
			<button class="btn btn-success">Add Question</button>
		</div>
		  
		  <h2 class="page-header">1-Year Questions</h2>
		  <p>These questions appear only on the 1-Year reviews.</p>
		  <?php
			$questions = $porm->read("SELECT * FROM p_question WHERE review_time = 1 AND active = 1 ORDER BY short_desc", [], "CfaQuestion");
			$count = 0;
			foreach($questions as $q)
			{
				$q->displayQuestion($count);
				$count++;
			}
		  ?>
		<div class="form-group">
			<button class="btn btn-success">Add Question</button>
		</div>
		
		<h2 class="page-header">Front Employee Questions</h2>
		  <p>These questions are only on the reviews for front employees.</p>
		  <?php
			$questions = $porm->read("SELECT * FROM p_question WHERE position = 'front' AND active = 1 ORDER BY short_desc", [], "CfaQuestion");
			$count = 0;
			foreach($questions as $q)
			{
				$q->displayQuestion($count);
				$count++;
			}
		  ?>
		<div class="form-group">
			<button class="btn btn-success">Add Question</button>
		</div>
		
		<h2 class="page-header">Back Employee Questions</h2>
		  <p>These questions are only on the reviews for back employees.</p>
		  <?php
			$questions = $porm->read("SELECT * FROM p_question WHERE position = 'back' AND active = 1 ORDER BY short_desc", [], "CfaQuestion");
			$count = 0;
			foreach($questions as $q)
			{
				$q->displayQuestion($count);
				$count++;
			}
		  ?>
		<div class="form-group">
			<button class="btn btn-success">Add Question</button>
		</div>
		
        </div>
      </div>
    </div>
<?php
include '../includes/footer.php';
?>