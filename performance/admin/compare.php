<?php

//Testing Stuff
include '../includes/init.php';

$review_id = isset($_GET["id"]) ? (int) $_GET["id"] : "";

$review = $porm->get($review_id, "CfaReview");

include '../includes/header.php';

?>

    <div class="container-fluid">
      <div class="row">
        <?php
		include "../manager/manager_side.php";
		?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<h1 id="upcoming">Compare Reviews</h1>
		
		<form action="compare.php" method="post">
			<div class="col-md-6">
				<h2>Review 1</h2>
				<div class="form-group">
					<label>Review Time</label>
					<select name="time[0]" class="form-control">
					<?php
					foreach(CfaEmployee::$review_times as $time => $value)
					{
						if($time != "0")
						{
							$selected = "";
							if($time == $review->review_time)
							{
								$selected = "selected";
							}
							print "<option value='$time' $selected>{$value[0]}</option>";
						}
					}
					?>
					</select>
				</div>
				
				<div class="form-group">
					<label>Employee Type</label>
					<select name="type[0]" class="form-control">
						<option value="specific" selected>Specific Employee</option>
						<option value="front">Front</option>
						<option value="back">Back</option>
					</select>
				</div>
				
				<div class="form-group">
					<label>Specific Employee</label>
					<select name="employee[0]" class="form-control">
					<?php
					
					$employees = CfaEmployee::getAll();
					
					foreach($employees as $e)
					{
						$selected = "";
						if($e->id == $review->employee_id)
						{
							$selected = "selected";
						}
						print "<option value='{$e->id}' $selected>{$e->fName} {$e->lName}</option>";
					}
					
					?>
					</select>
				</div>
				
			</div>
			
			<div class="col-md-6">
				<h2>Review 2</h2>
				<div class="form-group">
					<label>Review Time</label>
					<select name="time[1]" class="form-control">
					<?php
					foreach(CfaEmployee::$review_times as $time => $value)
					{
						if($time != "0")
						{
							print "<option value='$time'>{$value[0]}</option>";
						}
					}
					?>
					</select>
				</div>
				
				<div class="form-group">
					<label>Employee Type</label>
					<select name="type[1]" class="form-control">
						<option value="specific">Specific Employee</option>
						<option value="front">Front</option>
						<option value="back">Back</option>
					</select>
				</div>
				
				<div class="form-group">
					<label>Specific Employee</label>
					<select name="employee[1]" class="form-control">
					<?php
					
					$employees = $porm->read("SELECT * FROM teammemberinfo ORDER BY lName, fName ASC", [], "CfaEmployee");
					
					foreach($employees as $e)
					{
						print "<option value='{$e->id}'>{$e->fName} {$e->lName}</option>";
					}
					
					?>
					</select>
				</div>
			</div>
			
			<div class="col-md-12">
				<div class="form-group">
					<input type="submit" class="btn btn-primary" name="compare" value="Compare">
				</div>
			</div>
		</form>
		
			<div class="col-md-6">
			<h2>Results 1</h2>
			<?php
			
			if(isset($_POST["compare"]))
			{
				$time = $_POST["time"][0];
				$type = $_POST["type"][0];
				
				if($type == "specific")
				{
					$employee_id = $_POST["employee"][0];
				
					$review = $porm->readOne("SELECT * FROM p_review WHERE employee_id = $employee_id AND review_time = $time", [], "CfaReview");
				}
				
				else
				{
					$review = $porm->readOne("SELECT * FROM p_review WHERE position = ?", [$type], "CfaReview");
				}
				
				if($review)
				{
					$review->displayAllAverages();
				}
				
				else
				{
					print "<h3>No Results</h3>";
				}
			}
			
			?>
			</div>
			
			<div class="col-md-6">
			<h2>Results 2</h2>
			<?php
			
			if(isset($_POST["compare"]))
			{
				$time = $_POST["time"][1];
				$type = $_POST["type"][1];
				
				if($type == "specific")
				{
					$employee_id = $_POST["employee"][1];
				
					$review = $porm->readOne("SELECT * FROM p_review WHERE employee_id = $employee_id AND review_time = $time", [], "CfaReview");
				}
				
				else
				{
					$review = $porm->readOne("SELECT * FROM p_review WHERE position = ?", [$type], "CfaReview");
				}
				
				if($review)
				{
					$review->displayAllAverages();
				}
				
				else
				{
					print "<h3>No Results</h3>";
				}
			}
			
			?>
			</div>
		</div>
        </div>
      </div>

<?php
include '../includes/footer.php';
?>