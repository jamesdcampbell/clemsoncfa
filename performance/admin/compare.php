<?php

//Testing Stuff
include '../includes/init.php';
include '../includes/header.php';

?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
		 <img src="../../images/cfaicon.png" class="img-responsive" alt="../../images/cfaicon.jpg" width="304" height="236"> 
			<h1><small>Welcome back!</small></h1>

        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<h1 class="page-header" id="upcoming">Compare Reviews</h1>
		
		<form action="" style="inline">
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
							print "<option value='$time'>{$value[0]}</option>";
						}
					}
					?>
					</select>
				</div>
				
				<div class="form-group">
					<label>Employee Type</label>
					<select name="type[0]" class="form-control">
						<option value="specific">Specific Employee</option>
						<option value="front">Front</option>
						<option value="back">Back</option>
					</select>
				</div>
				
				<div class="form-group">
					<label>Specific Employee</label>
					<select name="employee[0]" class="form-control">
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
			<h3>Results (Front)</h3>
			</div>
			
			<div class="col-md-6">
			<h3>Results (Back)</h3>
			</div>
		</div>
        </div>
      </div>

<?php
include '../includes/footer.php';
?>