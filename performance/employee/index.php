<?php
//Testing Stuff
include '../includes/init.php';
include '../includes/header.php';
$id = $_SESSION["id"];
$id = 81; //testing
?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
		 <img src="../../images/cfaicon.png" class="img-responsive" alt="../../images/cfaicon.jpg" width="304" height="236"> 
			<h1><small>Welcome back!</small></h1>

        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		
		  <h1 class="page-header" id="upcoming">My Performance</h1>
		<?php
		//Run through days and print
		foreach(CfaEmployee::$review_times as $time => $value)
		{
			//Skip custom reviews
			if($time == "0")
			{
				continue;
			}		

			//Employee's 30/60/90/Year Reviews
			$reviews = $porm->read("SELECT * FROM p_review WHERE employee_id = $id AND review_time = $time AND employee_id IN (SELECT employee_id FROM p_review_active WHERE p_review_active.review_time = p_review.review_time) LIMIT 1", [], "CfaReview");
			
			//Display Averages
			foreach($reviews as $review)
			{
				print "<h2>{$value[0]}</h2>";
				$review->displayAllAverages();
			}
		}
		?>
			  
			  </div>
        </div>
      </div>

<?php
include '../includes/footer.php';
?>