
<?php
include '../includes/init.php';
include '../includes/header.php';
?>

    <div class="container-fluid">
      <div class="row">
        <?php
		include "../manager/manager_side.php";
		?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1>Admin Dashboard</h1>
		  <h2>Completed Reviews  <a href="questions.php"><button class="btn btn-default btn-sm rightfloat">
		  View Questions</button></a></h2>
		  <?php
		  
		  $completed = CfaReview::getCompleted();
		  
		  foreach(CfaEmployee::$review_times as $time => $value)
		  {
			  //Skip Custom Reviews
			  if(empty($completed[$time]))
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
