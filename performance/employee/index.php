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
		for ($countvar=0;$countvar < 4;$countvar++){
				  
	  
		  //Employee's 30/60/90/Year Reviews
		  $reviews = $porm->read("SELECT * FROM p_review WHERE employee_id = $id AND review_time = $countvar", [], "CfaReview");

		  //Get Answer Averages
		  $questoin_avgs = [];
		  $answers = [];
		  foreach($reviews as $review)
		  {
			  $answers = $porm->read("SELECT * FROM p_answer WHERE review_id = {$review->id}", [], "CfaAnswer");
			  
			  foreach($answers as $answer)
			  {	  
				  //Get Question Info
				  $question = $porm->readOne("SELECT * FROM p_question WHERE id = {$answer->question_id}", [], "CfaQuestion");
				
				if(isset($question_avgs[$question->id]))
				{
					$question_avgs[$question->id][1] += $answer->answer;
				}
				else
				{
					$question_avgs[$question->id] = [$question->short_desc, $answer->answer];
				}
			  }
		  }
		  
				  if ($countvar == 0) {$title = "30 Day";};
				  if ($countvar == 1) {$title = "60 Day";};
				  if ($countvar == 2) {$title = "90 Day";};
				  if ($countvar == 3) {$title = "Year";};
				  
			  print "<h2>$title Reviews</h2><div class='table-responsive'><table class='table table-striped'><thead><tr><th>Category</th><th>Performance (1 to 5)</th></tr></thead><tbody>";
			  $total = 0;
			  $max = count($answers) * 5;
			  foreach($question_avgs as $q_avg)
			  {
				  $cat = $q_avg[0];
				  
				  if (count($reviews) != '0')
				  {
					  $avg_score = $q_avg[1] / count($reviews);
					  $total += $avg_score;
					}
				if (count($reviews) != '0'){
				  print "<tr>";
				  print "<td>$cat</td>";
				  print "<td>$avg_score</td>";
				  print "</tr>";
				}
			  }
			  
			  print "<tr><th>Total</th><th>$total / $max</th></tr>";
			  print "</tbody></table></div>";
			  }
			  ?>
			  
			  </div>
        </div>
      </div>

<?php
include '../includes/footer.php';
?>