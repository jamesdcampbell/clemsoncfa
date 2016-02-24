<?php

include '../includes/init.php';

?>

<?php
include '../includes/header.php';
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
		  <form>
		  <h2 class="page-header">General Questions</h2>
		  <p>These questions appear on every review.</p>
		  <?php
			$count = 0;
			$questions = $porm->read("SELECT * FROM p_question WHERE review_time = 0", [], "CfaQuestion");
			foreach($questions as $q)
			{
				$text = htmlentities($q->question_text, ENT_QUOTES);
				print "<div class='form-group'><label for='questionInput{$count}'>Question Text</label>
				<input class='form-control' id='questionInput{$count}' value='$text'>
				<button class='edit'>Edit</button>
					<button class='delete'>Delete</button>
				</div>";
				$count++;
			}
		  ?>
		<div class="form-group">
		<button class="btn btn-default add">Add Question</button>
		</div>
		  
		  <hr>
		  <h3 class="page-header">30-Day Questions</h3>
		  <p>These questions appear only on the 30-Day reviews.</p>
		  <?php
			$questions = $porm->read("SELECT * FROM p_question WHERE review_time = 30", [], "CfaQuestion");
			foreach($questions as $q)
			{
				$text = htmlentities($q->question_text, ENT_QUOTES);
				print "<div class='form-group'><label for='questionInput{$count}'>Question Text</label><input class='form-control' id='questionInput{$count}' value='$text'></div>";
				$count++;
			}
		  ?>
		<div class="form-group">
		<button class="btn btn-default add">Add Question</button>
		</div>
		  <hr>
		  <h3 class="page-header">60-Day Questions</h3>
		  <p>These questions appear only on the 60-Day reviews.</p>
		  <?php
			$questions = $porm->read("SELECT * FROM p_question WHERE review_time = 60", [], "CfaQuestion");
			foreach($questions as $q)
			{
				$text = htmlentities($q->question_text, ENT_QUOTES);
				  print "<div class='form-group'><label for='questionInput{$count}'>Question Text</label>
				  <input class='form-control' id='questionInput{$count}' value='$text'>

				  </div>";
				$count++;
			}
		  ?>
		<div class="form-group">
				<button class="btn btn-default add">Add Question</button>
		</div>
		  
		  <h3 class="page-header">90-Day Questions</h3>
		  <p>These questions appear only on the 90-Day reviews.</p>
		  <?php
			$questions = $porm->read("SELECT * FROM p_question WHERE review_time = 90", [], "CfaQuestion");
			foreach($questions as $q)
			{
				$text = htmlentities($q->question_text, ENT_QUOTES);
				  print "<div class='form-group'><label for='questionInput{$count}'>Question Text</label><input class='form-control' id='questionInput{$count}' value='$text'></div>";
				$count++;
			}
		  ?>
		<div class="form-group">
		<button class="btn btn-default add">Add Question</button>
		</div>
		  
		  <h3 class="page-header">1-Year Questions</h3>
		  <p>These questions appear only on the 1-Year reviews.</p>
		  <?php
			$questions = $porm->read("SELECT * FROM p_question WHERE review_time = 1", [], "CfaQuestion");
			foreach($questions as $q)
			{
				$text = htmlentities($q->question_text, ENT_QUOTES);
				  print "<div class='form-group'><label for='questionInput{$count}'>Question Text</label><input class='form-control' id='questionInput{$count}' value='$text'></div>";
				$count++;
			}
		  ?>
		<div class="form-group">
		<button class="btn btn-default add">Add Question</button>
		</div>
  
  <br>
  <button type="submit" class="btn btn-default save">Save Changes</button>
  <br>
   <br>
</form>
        </div>
      </div>
    </div>
<?php
include '../includes/footer.php';
?>