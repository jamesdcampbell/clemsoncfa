<?php
include "../performance/includes/init.php";
include "header.php";

include __DIR__ . "/modals.php";

$name = "";
$phone = "";
$address = "";

?>

<div class="container-fluid">
      <div class="row">
        <?php
		include "../manager/manager_side.php";
		?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1>Customer Care Log</h1>
		  <h2>Search Care Log (design needed)</h2>
		  <p>You can search for customer care logs by the customer's name, phone number, or address.</p>
		  <form class="form-horizontal" style="width:50%;">
			<div class="form-group">
				<div class="col-sm-2">
					<label>Search By:</label>
				</div>
				
				<div class="col-sm-10">
					<select name="search_by" class="form-control">
						<option value="name">Name</option>
						<option value="phone">Phone</option>
						<option value="address">Address</option>
					</select>
				</div>
			</div>
			<br>
			<div class="form-group">
				<div class="col-sm-2">
					<label>Search Text:</label>
				</div>
				<div class="col-sm-10">
					<input type="text" name="search_text" class="form-control">
				</div>
			</div>
			
			<div class="form-group">
				<button type="submit" name="search" class="btn btn-default">Search</button>
			</div>
		  </form>
		  
			<?php
			$care = $porm->read("
			SELECT id, customerName AS custName, callDate AS dateCall, callTime, callTakenByID AS callTakenBy, incidentDate AS doi, incidentTime AS toi, details, followUp, address, phoneOne, phoneTwo, tMemberIssue, handled
			FROM incident");
			
			$fields = [
				["custName", "Customer Name"],
				["dateCall", "Call Date"],
				["callTakenBy", "Call Taken By"],
				["doi", "Date of Incident"],
				["toi", "Time of Incident"],
				["details", "Details of Incident"],
				["action", "Action"]
			];
			
			array_map(function($el){
				$el->action = "<form method='post'><input type='hidden' name='care_id' value='{$el->id}'><input type='submit' name='edit' value='View/Edit' class='btn btn-warning form-control'><input type='submit' name='delete' value='Delete' class='btn btn-danger form-control'></form>";
			}, $care);
			
			print "<h2>Care Log Results <button data-toggle='modal' data-target='#careModal' class='btn btn-default'>New Care Log</button></h2>";
			CfaTable::generate($fields, $care);
			?>
        </div>
      </div>
    </div>

<?php
include "footer.php";
?>