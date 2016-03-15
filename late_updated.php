<?php
include "performance/includes/init.php";
include "header.php";

		//Get Employees
		$employees = CfaEmployee::getAll();
?>

<div class="container-fluid">
      <div class="row">
        <?php
		include "../manager/manager_side.php";
		?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1>Employee Late Log</h1>
		  <h2>View Logs  <a href="#"><button class="btn btn-default btn-sm rightfloat">
		  Add Late Log</button></a></h2>
		  <form id="late-log-form">
			<div class="form-group">
			<select name="employee" class="form-control" onchange="document.getElementById('late-log-form').submit();">
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
				SELECT CONCAT(fName, ' ', lName) AS employeeName, arrivalTime, scheduledTime, `date`, comments, managerName
				FROM teammemberlate, teammemberinfo
				WHERE memberID = ?
				AND teammemberinfo.id = ?", [$employee_id, $employee_id]);
				
				$fields = [
					["employeeName", "Employee Name"],
					["managerName", "Manager Name"],
					["date", "Date of Incident"],
					["arrivalTime", "Arrival Time"],
					["scheduledTime", "Scheduled Time"],
					["comments", "Comments"]
				];
				CfaTable::generate($fields, $late);
			}
			?>
        </div>
      </div>
    </div>

<?php
include "footer.php";
?>