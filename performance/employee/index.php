<?php
//Testing Stuff
include '../includes/init.php';

//Request Review Form
if(isset($_POST["request"]))
{
	$porm->read("INSERT INTO p_request_employee(requester_id, employee_id, reason) VALUES($id, $id, ?)", [$_POST["reason"]]);
	
	BS::alert("The request was created successfully.", "success");
}

include 'modals.php';
include '../includes/header.php';
?>

    <div class="container-fluid">
      <div class="row">
        <?php
		include "../manager/manager_side.php";
		?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		
		  <h1 class="page-header" id="upcoming">My Performance <button class="btn btn-default btn-sm rightfloat" data-toggle="modal" data-target="#requestModal">Request a Review</button></h1>
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