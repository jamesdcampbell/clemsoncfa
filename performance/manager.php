<?php

//Testing Stuff
include '../includes/dbConnections.php';

//Select Employees
$query = $db->query("SELECT * FROM TeamMemberInfo WHERE login = 'false' AND fname != ''", PDO::FETCH_ASSOC);

//1-Year Reviews
"SELECT * FROM TeamMemberInfo
WHERE CURRENT_DATE() > DATE_ADD(hire_date, INTERVAL 1 YEAR)
AND CURRENT_DATE() <= DATE_ADD(hire_date, INTERVAL 1000 YEAR)
AND id NOT IN(
	SELECT employee_id FROM p_review
	WHERE employee_id = TeamMemberInfo.id
	AND review_time = 1
)";

//90-Day Reviews
"SELECT * FROM TeamMemberInfo
WHERE CURRENT_DATE() > DATE_ADD(hire_date, INTERVAL 90 DAY)
AND CURRENT_DATE() <= DATE_ADD(hire_date, INTERVAL 1 YEAR)
AND id NOT IN(
	SELECT employee_id FROM p_review
	WHERE employee_id = TeamMemberInfo.id
	AND review_time = 90
)";

//60-Day Reviews
"SELECT * FROM TeamMemberInfo
WHERE CURRENT_DATE() > DATE_ADD(hire_date, INTERVAL 60 DAY)
AND CURRENT_DATE() <= DATE_ADD(hire_date, INTERVAL 90 DAY)
AND id NOT IN(
	SELECT employee_id FROM p_review
	WHERE employee_id = TeamMemberInfo.id
	AND review_time = 60
)";

//30-Day Reviews
$thirty_day = "SELECT * FROM TeamMemberInfo
WHERE CURRENT_DATE() > DATE_ADD(hire_date, INTERVAL 30 DAY)
AND CURRENT_DATE() <= DATE_ADD(hire_date, INTERVAL 60 DAY)
AND id NOT IN(
	SELECT employee_id FROM p_review
	WHERE employee_id = TeamMemberInfo.id
	AND review_time = 30
)";
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
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="bootstrap/css/dashboard.css" rel="stylesheet">
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
          <h1 class="page-header">Manager Dashboard</h1>

          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Section title</span>
            </div>
          </div>

		  <h2 class="sub-header">Upcoming Reviews</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Review Type</th>
				  <th>Review</th>
                </tr>
              </thead>
              <tbody>
			  <?php
			  
			  ?>
              </tbody>
            </table>
          </div>
		  
		  <h2 class="sub-header">Completed Reviews</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Review Type</th>
				  <th>View</th>
                </tr>
              </thead>
              <tbody>
			  
              </tbody>
            </table>
          </div>
		  
          <h2 class="sub-header">Employees</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Hired</th>
				  <th>Review</th>
                </tr>
              </thead>
              <tbody>
				<?php
				foreach($query as $row)
				{
					print "<tr>";
					$fields = ["id", "fName", "lName", "hire_date"];
					foreach($fields as $field)
					{
						print "<td>" . $row[$field] . "</td>";
					}
					print "<td><a href='#' class='btn'>Review</a></td>";
					print "</tr>";
				}
				?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  
</html>
