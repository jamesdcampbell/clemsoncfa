<?php

include '../includes/init.php';

//Create Question
if(isset($_POST["add"]))
{
	$question = new CfaQuestion;

	$fields = ["review_time", "question_text", "developing_text", "proficient_text", "exemplary_text", "short_desc"];
	
	foreach($fields as $field)
	{
		$question->{$field} = $_POST[$field];
	}
	$porm->create($question);
	BS::alert("Question created successfully.", "success");
}

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

include '../includes/header.php';
include 'modals.php';

?>

    <div class="container-fluid">
      <div class="row">
        <?php
		include "../manager/manager_side.php";
		?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1>Edit Questions</h1>
		  
		<div class="form-group">
			<button class="btn btn-success add" data-toggle="modal" data-target="#questionModal" data->Add Question</button>
		</div>
		  
		  <h2>General Questions</h2>
		  <p>These questions appear on every review.</p>
		  <?php
			$count = 0;
			$questions = $porm->read("SELECT * FROM p_question WHERE review_time = -1 AND active = 1 ORDER BY short_desc", [], "CfaQuestion");
			foreach($questions as $q)
			{
				$q->displayQuestion($count);
				$count++;
			}
		  ?>

		  <h2>Custom Review Questions</h2>
		  <p>These questions appear only on custom employee reviews.</p>
		  <?php
			$questions = $porm->read("SELECT * FROM p_question WHERE review_time = 0 AND active = 1 ORDER BY short_desc", [], "CfaQuestion");
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
		  
		  <h2>30-Day Questions</h2>
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

		  <h2>60-Day Questions</h2>
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
		  
		  <h2>90-Day Questions</h2>
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
		  
		  <h2>1-Year Questions</h2>
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
			<button class="btn btn-success add" data-toggle="modal" data-target="#questionModal" data->Add Question</button>
		</div>
		
        </div>
      </div>
    </div>
<?php
include '../includes/footer.php';
?>