<?php
include "../performance/includes/init.php";
include "header.php";

$i = $porm->get($_GET["id"], "CfaIncident");

//Create new Care Log
if(isset($_POST["edit"]))
{
	if(empty($_POST["followUp"]))
	{
		$_POST["followUp"] = "off";
	}
	
	foreach($i->fields as $f)
	{
		if(isset($_POST[$f]))
		{
			$i->{$f} = $_POST[$f];
		}
	}
	$porm->update($i);
	BS::alert("Updated the incident successfully.", "success");
}
?>

<div class="container-fluid">
      <div class="row">
        <?php
		include "../manager/manager_side.php";
		?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1>View or Edit Care Log</h1>

<form action="" method="post">
			<h3>Call Information</h3>
			<div class="form-group">
				<label>Call Taken By</label>
				<input name="callTakenByID"  class="form-control" value="<?=$i->callTakenByID?>">
			</div>
			
			<div class="form-group">
				<label>Date of Call</label>
				<input type="date" name="callDate" value="<?=$i->callDate?>" class="form-control">
			</div>
			
			<div class="form-group">
				<label>Time of Call</label>
				<input type="time" name="callTime" value="<?=$i->callTime?>" class="form-control">
			</div>
			
			<h3>Customer Information</h3>
			<div class="form-group">
				<label>Name</label>
				<input name="customerName" value="<?=$i->customerName?>" class="form-control">
			</div>
			
			<div class="form-group">
				<label>Address</label>
				<input name="address" value="<?=$i->address?>" class="form-control">
			</div>
			
			<div class="form-group">
				<label>Phone</label>
				<input name="phoneOne" value="<?=$i->phoneOne?>" class="form-control">
			</div>
			
			
			<h3>Issue Information</h3>
			<div class="form-group">
				<label>Date of Incident</label>
				<input type="date" name="incidentDate" value="<?=$i->incidentDate?>" class="form-control">
			</div>
			
			<div class="form-group">
				<label>Time of Incident</label>
				<input type="time" name="incidentTime" value="<?=$i->incidentTime?>" class="form-control">
			</div>
			
			<div class="form-group">
				<label>Employee</label>
				<input name="tMemberIssue" value="<?=$i->tMemberIssue?>" class="form-control">
			</div>
			
			<div class="form-group">
				<label>Details</label>
				<textarea name="details" class="form-control"><?=$i->details?></textarea>
			</div>
			
			<div class="form-group">
				<label>Handled</label>
				<textarea name="handled" class="form-control"><?=$i->handled?></textarea>
			</div>
			
			<div class="form-group">
				<input type="checkbox" name="followUp" <?=$i->followUp == "on" ? "checked" : ""?>>
				<label>Followup Needed?</label>
			</div>
			
			<div class="form-group">
				<button type="submit" name="edit"class="btn btn-warning">Save Changes</button>
				<a href="/care" class="btn btn-default">Go Back</a>
			</div>
	  </form>