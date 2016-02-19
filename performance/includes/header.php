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
          <a class="navbar-brand" href="index.php">PRS - Manager Dashboard</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
		  
			<!-- Prints out number of Upcoming reviews on badge -->
            <li><a HREF="#completedreviews">Upcoming <span class="badge">
			<?php
			  $upcount = 0;
			  foreach(CfaEmployee::$review_times as $type => $type_array)
			  {
			  if($type == "0")
			  {
				  continue;
			  }
			  $employees = CfaEmployee::getUpcoming($type);
			  foreach($employees as $e)
			  {
				  $upcount++;
			  }
			  }
			  print $upcount;
			  ?>
			
			</span></a></li>
			
			<!-- Prints out number of completed reviews on badge -->
            <li><a href="#">Completed <span class="badge">
			<?php
			  $completed = $porm->read("SELECT fName, lName, review_time, teammemberinfo.id FROM p_review, TeamMemberInfo
				WHERE manager_id = $id
				AND TeamMemberInfo.id = employee_id", [], "CfaEmployee");
				$complcount = 0;
				foreach($completed as $c)
				{
				$complcount++;
				}
			  	print $complcount;
			  ?>
			</span></a></li>
		
            <li><a href="#">Employees</a></li>
            <li><a href="#">Help</a></li>
          </ul>
        </div>
      </div>
    </nav>
