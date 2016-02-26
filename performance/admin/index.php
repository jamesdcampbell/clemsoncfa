
<?php
include '../includes/init.php';
include '../includes/header.php';
?>

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
		  
		  foreach(CfaEmployee::$review_times as $time => $value)
		  {
			  //Skip Custom Reviews
			  if($time == "0" || empty($completed[$time]))
			  {
				  continue;
			  }
			  print "<h3>{$value[0]}</h3>";
			  
			  //Generate Table
			  CfaTable::generate([
					["fName", "First Name"],
					["lName", "Last Name"],
					["score", "Score"],
					["review_link", "Review"],
					["compare_link", "Compare"]
				] ,$completed[$time]);
		  }
		  
		  ?>
        </div>
      </div>
    </div>

<?php
include '../includes/footer.php';
?>
