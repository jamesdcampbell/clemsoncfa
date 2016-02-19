<?php

//Testing Stuff
include '../includes/init.php';

$id = $_SESSION["id"];
$manager_review = "SELECT fName, lName, review_time FROM p_review, TeamMemberInfo
WHERE manager_id = $id
AND TeamMemberInfo.id = employee_id";
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
          <a class="navbar-brand" href="#">PRS - Manager Dashboard</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a HREF="#completedreviews">Upcoming <span class="badge">10</span> </a></li>
            <li><a href="#">Completed <span class="badge">10</span> </a></li>
            <li><a href="#">Employees</a></li>
            <li><a href="#">Help</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
		 <img src="../../images/cfaicon.png" class="img-responsive" alt="../../images/cfaicon.jpg" width="304" height="236"> 
			<h1 class="welcome"><small>Welcome back!</small></h1>
			<h1 class="manager_name">$Manager Name</h1>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		  <h2 class="sub-header">Upcoming Reviews <small> <a href="test" <span class="label label-success">View All</span></small></a></h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Hire Date</th>
                  <th>Review Type</th>
				  <th>Review</th>
                </tr>
              </thead>
              <tbody>
			  <?php
			  
			  foreach(CfaEmployee::$review_times as $type => $type_array)
			  {
			  $employees = CfaEmployee::getUpcoming($type);
			  foreach($employees as $e)
			  {
				  print "<tr>";
				  $fields = ["id", "fName", "lName", "hire_date"];
				  foreach($fields as $field)
				  {
					  print "<td>" . $e->{$field} . "</td>";
				  }
				  
				  $type_display = $type_array[0];
				  print "<td>$type_display</td>";
				  print "<td><a href='review.php?employee={$e->id}&time=$type' class='btn'>Review</a></td>";
				  print "</tr>";
			  }
			  }
			  ?>
              </tbody>
            </table>
          </div>
		  
		  <h2 class="sub-header">Completed Reviews <small> <a href="test" <span class="label label-success">View All</span></small></a></h2>
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
			  <?php
			  
			  $query = $db->query($manager_review);

			  foreach($query as $row)
				{
					print "<tr>";
					$fields = ["fName", "lName", "review_time"];
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
		  
          <h2 class="sub-header">Employees <small> <a href="test" <span class="label label-success">View All</span></small></a></h2>
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
				//Select Employees
				$query = $db->query("SELECT * FROM TeamMemberInfo WHERE login = 'false' AND fname != ''", PDO::FETCH_ASSOC);
				foreach($query as $row)
				{
					print "<tr>";
					$fields = ["id", "fName", "lName", "hire_date"];
					foreach($fields as $field)
					{
						print "<td>" . $row[$field] . "</td>";
					}
					print "<td><a href='new_review.php?employee={$row["id"]}' class='btn'>Request Review</a></td>";
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
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</html>