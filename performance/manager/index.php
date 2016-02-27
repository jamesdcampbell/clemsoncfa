<?php

include '../includes/init.php';
include '../includes/header.php';

//Modal Dropdowns for Forms
include 'modals.php';

//Ignore a Review Form
if(isset($_POST["ignore"]))
{
	$time = $_POST["time"];
	$employee = $_POST["employee"];
	$porm->con->query("INSERT INTO p_review_ignore(employee_id, review_time) VALUES($employee, $time)");
	BS::alert("Successfully ignored the review.", "success");
}

//Unignore a Review Form
if(isset($_POST["unignore"]))
{
	$time = $_POST["time"];
	$employee = $_POST["employee"];
	$porm->con->query("DELETE FROM p_review_ignore WHERE employee_id = $employee AND review_time = $time");
	BS::alert("Successfully unignored the review.", "success");
}

//Request Review Form
if(isset($_POST["request"]))
{
	$request = new CfaRequest;
	$request->requester_id = $id;
	$request->employee_id = $_POST["employee"];
	$request->reason = $_POST["reason"];
	
	$porm->create($request);
	
	BS::alert("The request was created successfully.", "success");
}
?>
    <div class="container-fluid">
      <div class="row">
        <?php
		include "manager_side.php";
		?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<h1>Manager Dashboard</h1>
		  <h2 id="upcoming">Upcoming Reviews</h2>
          <div class="table-responsive">
		  
		  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
		  
			<?php
			foreach(CfaEmployee::$review_times as $type => $type_array)
			{
				if($type == "0")
				{
					continue;
				}
				
				$employees = CfaEmployee::getUpcoming($type);
				
				if(!count($employees))
				{
					continue;
				}
			?>
			
			<div class="panel panel-default">
			<div class="panel-heading" role="tab" id="heading<?=$type?>">
			<h4 class="panel-title">
			<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$type?>" aria-expanded="true" aria-controls="collapse<?=$type?>">
				View All <?=CfaEmployee::$review_times[$type][0]?> Reviews <span class="badge"><?=count($employees)?></span>
			</a>
			</h4>
			</div>
			
			<div id="collapse<?=$type?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?=$type?>">
			<div class="panel-body">
			
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Hire Date</th>
                  <th>Review Type</th>
				  <th>Action</th>
                </tr>
              </thead>
              <tbody>
			  <?php

			  foreach($employees as $e)
			  {
				  print "<tr>";
				  $fields = ["id", "fName", "lName", "hire_date"];
				  foreach($fields as $field)
				  {
					  print "<td>" . $e->{$field} . "</td>";
				  }
				  
				  $type_display = $type_array[0];
				  print "<td>$type_display</td>";
				  print "<td><a href='review.php?employee={$e->id}&time=$type' class='btn btn-default'>Review</a><form style='display:inline;' action='' method='post'><input type='hidden' name='employee' value='{$e->id}'><input type='hidden' name='time' value='$type'><button type='submit' name='ignore' class='btn btn-default'>Ignore</button></form></td>";
				  print "</tr>";
			  }
			  ?>
              </tbody>
            </table>
			      </div>
			</div>
			</div><!--end of accordion panel-->
			<?php
			}//end of for loop
			?>
			</div><!--end of accordion-->
          </div>
		  
		  <h2>Review Requests <button class="btn btn-default btn-sm rightfloat" data-toggle="modal" data-target="#requestModal">Request Review</button></h2>
		  <div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Requester</th>
						<th>Employee</th>
						<th>Reason for Review</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php
				
				$requests = $porm->read("SELECT * FROM p_request WHERE employee_id NOT IN (SELECT employee_id FROM p_review WHERE manager_id = $id AND request_id = p_request.id) ORDER BY request_date DESC", [], "CfaRequest");
				
				foreach($requests as $request)
				{
					$employee = $porm->get($request->employee_id, "CfaEmployee");
					$manager = $porm->get($request->requester_id, "CfaEmployee");
					
					print "<tr>";
					print "<td>{$manager->fName} {$manager->lName}</td>";
					print "<td>{$employee->fName} {$employee->lName}</td>";
					print "<td>{$request->reason}</td>";
					print "<td><a href='review.php?employee={$employee->id}&request={$request->id}'>Review</td>";
					print "</tr>";
				}
				
				?>
				</tbody>
			</table>
		  </div>
		  
		  <h2 id="completed">Completed Reviews</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Review Type</th>
				  <th>View</th>
                </tr>
              </thead>
              <tbody>
			  <?php
			  
			  $completed = $porm->read("
SELECT fName, lName, review_time, teammemberinfo.id, p_review.id as review_id
FROM p_review, TeamMemberInfo
WHERE manager_id = $id
AND TeamMemberInfo.id = employee_id
AND TeamMemberInfo.id NOT IN(
	SELECT employee_id
	FROM p_review_active
	WHERE employee_id = TeamMemberInfo.id
	AND review_time = p_review.review_time
)
ORDER BY review_date"
				, [], "CfaEmployee");

			  foreach($completed as $c)
				{
					print "<tr>";
					$fields = ["fName", "lName", "review_time"];
					print "<td>{$c->id}</td>";
					foreach($fields as $field)
					{
						print "<td>" . $c->{$field} . "</td>";
					}
					print "<td><a href='completed.php?review={$c->review_id}' class='btn'>Edit/View</a></td>";
					print "</tr>";
				}
			  
			  ?>
              </tbody>
            </table>
          </div><!--end of completed reviews-->
		  
		  <h2 id="ignored">Ignored Reviews</h2>
          <div class="table-responsive">
		  
		  <div class="panel-group" id="ignore_accordion" role="tablist" aria-multiselectable="true">
			<div class="panel panel-default">
			<div class="panel-heading" role="tab" id="ignore_heading">
			<h4 class="panel-title">
			<a role="button" data-toggle="collapse" data-parent="#ignore_accordion" href="#ignore_collapse" aria-expanded="true" aria-controls="collapse">
				View Ignored Reviews
			</a>
			</h4>
			</div>
			
			<div id="ignore_collapse" class="panel-collapse collapse" role="tabpanel" aria-labelledby="ignore_heading">
			<div class="panel-body">
			
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Review Type</th>
				  <th>Action</th>
                </tr>
              </thead>
              <tbody>
			  <?php

			foreach(CfaEmployee::$review_times as $type => $type_array)
			{
				if($type == "0")
				{
					continue;
				}
				
				$ignored = CfaEmployee::getIgnored($type);
				
				if(!count($ignored))
				{
					continue;
				}
			  
			  foreach($ignored as $e)
			  {
				  print "<tr>";
				  $fields = ["id", "fName", "lName"];
				  foreach($fields as $field)
				  {
					  print "<td>" . $e->{$field} . "</td>";
				  }
				  
				  $type_display = $type_array[0];
				  print "<td>$type_display</td>";
				  print "<td><a href='review.php?employee={$e->id}&time=$type' class='btn btn-default'>Review</a><form style='display:inline;' action='' method='post'><input type='hidden' name='employee' value='{$e->id}'><input type='hidden' name='time' value='$type'><button type='submit' name='unignore' class='btn btn-default'>Unignore</button></form></td>";
				  print "</tr>";
			  }
			}
			  ?>
              </tbody>
            </table>
			      </div>
			</div>
			</div><!--end of accordion panel-->
			</div><!--end of accordion-->
          </div>
		  
        </div>
      </div>
    </div>
<?php
include '../includes/footer.php';
?>
