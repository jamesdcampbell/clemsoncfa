<?php

//Testing Stuff
include '../../includes/dbConnections.php';
include '../includes/init.php';

//Manager's Reviews
session_start();
$id = $_SESSION["id"];
$employee_id = isset($_GET["employee"]) ? $_GET["employee"] : "";

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../favicon.ico">

    <title>CFA Performance Review System</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../bootstrap/css/dashboard.css" rel="stylesheet">
  </head>

  <body>

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
		  <h3 class="page-header">General Questions</h3>
		  <p>These questions appear on every review.</p>
		  <?php
			$count = 0;
			$questions = CfaQuestion::getType("0");
			foreach($questions as $q)
			{
				$text = htmlentities($q["question_text"], ENT_QUOTES);
				  print "<div class='form-group'><label for='questionInput{$count}'>Question Text</label><input class='form-control' id='questionInput{$count}' value='$text'></div>";
				$count++;
			}
		  ?>
		<div class="form-group">
			<button class="btn btn-default">Add Question</button>
		</div>
		  
		  <h3 class="page-header">30-Day Questions</h3>
		  <p>These questions appear only on the 30-Day reviews.</p>
		  <?php
			$questions = Question::getType("30");
			foreach($questions as $q)
			{
				  print "<div class='form-group'><label for='questionInput{$count}'>Question Text</label><input class='form-control' id='questionInput{$count}' value='{$row["question_text"]}'></div>";
				$count++;
			}
		  ?>
		<div class="form-group">
			<button class="btn btn-default">Add Question</button>
		</div>
		  
		  <h3 class="page-header">60-Day Questions</h3>
		  <p>These questions appear only on the 60-Day reviews.</p>
		  <?php
			$results = $db->query("SELECT * FROM p_question WHERE review_time = 60");
			foreach($results as $row)
			{
				  print "<div class='form-group'><label for='questionInput{$count}'>Question Text</label><input class='form-control' id='questionInput{$count}'></div>";
				$count++;
			}
		  ?>
		<div class="form-group">
			<button class="btn btn-default">Add Question</button>
		</div>
		  
		  <h3 class="page-header">90-Day Questions</h3>
		  <p>These questions appear only on the 90-Day reviews.</p>
		  <?php
			$results = $db->query("SELECT * FROM p_question WHERE review_time = 90");
			foreach($results as $row)
			{
				  print "<div class='form-group'><label for='questionInput{$count}'>Question Text</label><input class='form-control' id='questionInput{$count}'></div>";
				$count++;
			}
		  ?>
		<div class="form-group">
			<button class="btn btn-default">Add Question</button>
		</div>
		  
		  <h3 class="page-header">1-Year Questions</h3>
		  <p>These questions appear only on the 1-Year reviews.</p>
		  <?php
			$results = $db->query("SELECT * FROM p_question WHERE review_time = 1");
			foreach($results as $row)
			{
				  print "<div class='form-group'><label for='questionInput{$count}'>Question Text</label><input class='form-control' id='questionInput{$count}'></div>";
				$count++;
			}
		  ?>
		<div class="form-group">
			<button class="btn btn-default">Add Question</button>
		</div>
  
  <button type="submit" class="btn btn-default">Save Changes</button>
</form>
        </div>
      </div>
    </div>

    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</html>