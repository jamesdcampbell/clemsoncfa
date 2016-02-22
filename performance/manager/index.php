<?php

//Testing Stuff
include '../includes/init.php';
include '../includes/header.php';
include '../includes/footer.php';
$id = $_SESSION["id"];
?>



    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
		 <img src="../../images/cfaicon.png" class="img-responsive" alt="../../images/cfaicon.jpg" width="304" height="236"> 
			<h1 class="welcome">Welcome back!</h1>
			<h1 class="manager_name">Manager Name</h1>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		
		  <h1 class="sub-header" id="upcoming">Upcoming Reviews</h1>
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
				  <th>Review</th>
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
				  print "<td><a href='review.php?employee={$e->id}&time=$type' class='btn'>Review</a></td>";
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
		  
		  <h1 class="sub-header" id="completed">Completed Reviews</h1>
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
			  
			  $completed = $porm->read("SELECT fName, lName, review_time, teammemberinfo.id, p_review.id as review_id FROM p_review, TeamMemberInfo
WHERE manager_id = $id
AND TeamMemberInfo.id = employee_id ORDER BY review_date LIMIT 11", [], "CfaEmployee");

			  $count = 0;
			  foreach($completed as $c)
				{
					if($count > 9)
					{
						break;
					}
					print "<tr>";
					$fields = ["fName", "lName", "review_time"];
					print "<td>{$c->id}</td>";
					foreach($fields as $field)
					{
						print "<td>" . $c->{$field} . "</td>";
					}
					print "<td><a href='completed.php?review={$c->review_id}' class='btn'>Edit/View</a></td>";
					print "</tr>";
					$count++;
				}
			  
			  ?>
              </tbody>
            </table>
			<?php
			if(count($completed) > 10)
			{
				print '<a href="completed.php" class="btn btn-primary">View All</a>';
			}
			?>
          </div>
		  
          <h1 class="sub-header" id="employees">Employees &nbsp<small> <a href="test" <span class="label label-success">View All</span></small></a></h1>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Hired</th>
				  <th>Review</th>
                </tr>
              </thead>
              <tbody>
				<?php
				//Select Employees
				$employees = $porm->read("SELECT * FROM TeamMemberInfo WHERE login = 'false' AND fname != ''", [], "CfaEmployee");
				foreach($employees as $e)
				{
					print "<tr>";
					$fields = ["id", "fName", "lName", "hire_date"];
					foreach($fields as $field)
					{
						print "<td>" . $e->{$field} . "</td>";
					}
					print "<td><a href='review.php?employee={$e->id}' class='btn'>Request Review</a></td>";
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
