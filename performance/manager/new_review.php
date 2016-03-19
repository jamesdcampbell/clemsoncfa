<?php

//Initialize
include '../includes/init.php';

//Manager's Reviews
$employee_id = isset($_GET["employee"]) ? (int) $_GET["employee"] : "";

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
          <h1 class="page-header">New Review</h1>
		  <form action="review.php" method="get">
  <div class="form-group">
	<input type="hidden" name="time" value="0">
    <label for="employeeInput">Employee</label>
    <select name="employee" class="form-control" id="employeeInput">
		<?php
		$query = $db->query("SELECT * FROM teammemberinfo WHERE fname != '' ORDER BY lname, fname");
		foreach($query as $employee)
		{
			$selected = $employee["id"] == $employee_id ? "selected" : "";
			print "<option value='{$employee["id"]}' $selected>{$employee["fName"]} {$employee["lName"]}</option>";
		}
		?>
	</select>
  </div>
  
  <button type="submit" class="btn btn-default">Create Review</button>
</form>
        </div>
      </div>
    </div>

    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</html>