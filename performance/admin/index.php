
<?php
include '../includes/init.php';

//Accept/Decline Requests
if(isset($_POST["request"]))
{
	$request = $porm->read("SELECT * FROM p_request_employee WHERE id = {$_POST["request"]}", [], "CfaRequest");
	
	//Decline
	if(isset($_POST["decline"]))
	{
		$porm->read("DELETE FROM p_request_employee WHERE id = {$_POST["request"]}");
	}
	
	else if(isset($_POST["accept"]))
	{
		$porm->read("INSERT INTO p_request(requester_id, employee_id, reason, request_date)
 SELECT requester_id, employee_id, reason, request_date FROM p_request_employee WHERE id = {$_POST["request"]}");
		$porm->read("DELETE FROM p_request_employee WHERE id = {$_POST["request"]}");
	}
}

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
		  
		  <h2>Reviews Requested by Employees</h2>	  
		  <div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Employee</th>
						<th>Reason for Review</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php
				
				$requests = $porm->read("SELECT * FROM p_request_employee ORDER BY request_date DESC", [], "CfaRequest");
				
				foreach($requests as $request)
				{
					$employee = $porm->get($request->employee_id, "CfaEmployee");
					$manager = $porm->get($request->requester_id, "CfaEmployee");
					
					print "<tr>";
					print "<td>{$employee->fName} {$employee->lName}</td>";
					print "<td>{$request->reason}</td>";
					print "<td><form method='post'><input type='hidden' name='request' value='{$request->id}'><input type='submit' name='accept' class='btn btn-success' value='Accept'><input type='submit' name='decline' class='btn btn-warning' value='Decline'></form></td>";
					print "</tr>";
				}
				
				?>
				</tbody>
			</table>
		  </div>
        </div>
      </div>
    </div>

<?php
include '../includes/footer.php';
?>
