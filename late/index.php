<?php
include "../performance/includes/init.php";
include "header.php";
include __DIR__ . "/modals.php";

//Get Employees
$employees = CfaEmployee::getAll();

//Add Late Log
if(isset($_POST["late"]))
{
	$late = new CfaLateLog;
	$late->date = $_POST["date"];
	$late->memberID = $_POST["employee"];
	$late->arrivalTime = $_POST["time_arrived"];
	$late->scheduledTime = $_POST["time_scheduled"];
	$late->managerName = $user->fName . " " . $user->lName;
	$late->comments = $_POST["comment"];
	$porm->create($late);
	BS::alert("Successfully added the late log.", "success");
}

if(isset($_POST["delete"]))
{
	$log = $porm->get($_POST["log"], "CfaLateLog");
	$porm->delete($log);
	BS::alert("Successfully deleted the late log.", "success");
}
?>

<div class="container-fluid">
      <div class="row">
        <?php
		include "../manager/manager_side.php";
		?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1>Employee Late Log</h1>
		  <h2>View Logs <button data-toggle="modal" data-target="#lateModal" class="btn btn-default btn-sm rightfloat">Add Late Log</button></h2>
		  <form id="late-log-form">
			<div class="form-group">
			<select name="employee" class="form-control" onchange="document.getElementById('late-log-form').submit();">
				<option value="-1">Select an Employee:</option>
			<?php
			foreach($employees as $e)
			{
				$selected = (isset($_GET["employee"]) and $_GET["employee"] == $e->id) ? " selected" : "";
				print "\t<option value='{$e->id}'$selected>{$e->fullName()}</option>";
			}
			?>
			</select>
			</div>
		  </form>
		  
			<?php
			if(isset($_GET["employee"]))
			{
				$employee_id = $_GET["employee"];
				$late = $porm->read("
				SELECT teammemberlate.id AS id, CONCAT(fName, ' ', lName) AS employeeName, arrivalTime, scheduledTime, `date`, comments, managerName
				FROM teammemberlate, teammemberinfo
				WHERE memberID = ?
				AND teammemberinfo.id = ?
				ORDER BY `date` DESC
				", [$employee_id, $employee_id], "CfaEmployee");
				
				$fields = [
					["managerName", "Manager Name"],
					["date", "Date of Incident"],
					["arrivalTime", "Arrival Time"],
					["scheduledTime", "Scheduled Time"],
					["comments", "Comments"],
					["action", "Action"]
				];
				
				foreach($late as $l)
				{
					$l->action = "<form method='post'><input type='hidden' name='log' value='{$l->id}'><input type='submit' name='delete' value='Delete' class='form-control btn btn-danger'></form>";
				}
				
				if(count($late))
				{
					print "<h2>{$late[0]->employeeName}</h2>";
				}
				
				CfaTable::generate($fields, $late);
			}
			?>
        </div>
      </div>
    </div>

<?php
include "footer.php";
?>