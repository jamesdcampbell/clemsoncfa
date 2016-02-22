<?php

include '../includes/init.php';
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
            <li><a href="#">Reviews</a></li>
            <li><a href="#">Reports</a></li>
            <li><a href="#">Questions</a></li>
            <li><a href="#">Managers</a></li>
            <li><a href="#">Employees</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Admin Dashboard</h1>
		  <h2 class="page-header">Completed Reviews</h2>
		  <?php
		  
		  $completed = CfaReview::getCompleted();
		  
		  print "<pre>";
		  print_r($completed);
		  print "</pre>";
		  
		  foreach(CfaEmployee::$review_times as $time => $value)
		  {
			  //Skip Custom Reviews
			  if($time == "0" || empty($completed[$time]))
			  {
				  continue;
			  }
			  print "<h3 class='page-header'>{$value[0]}</h3>";
			  
			  //Generate Table
			  CfaTable::generate(["fName", "lName", "score"], $completed[$time]);
		  }
		  
		  ?>
        </div>
      </div>
    </div>

<?php
include '../includes/footer.php';
?>
