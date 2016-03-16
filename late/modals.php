<!-- New Late Log Modal -->
<div class="modal fade" id="lateModal" tabindex="-1" role="dialog" aria-labelledby="requestModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
	 <form action="" method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Late Incident</h4>
      </div>
      <div class="modal-body">
			<div class="form-group">
				<label>Employee</label>
				<select name="employee" class="form-control">
				<?php
				$employees = CfaEmployee::getAll();
				
				foreach($employees as $e)
				{
					$selected = (isset($_GET["employee"]) and $_GET["employee"] == $e->id) ? " selected" : "";
					print "<option value='{$e->id}'$selected>{$e->fName} {$e->lName}</option>";
				}
				?>
				</select>
			</div>
			
			<div class="form-group">
				<label>Date</label>
				<input type="date" name="date" value="<?=date("Y-m-d");?>" class="form-control">
			</div>
			
			<div class="form-group">
				<label>Arrival Time</label>
				<input type="time" name="time_arrived" class="form-control">
			</div>
			
			<div class="form-group">
				<label>Scheduled Time</label>
				<input type="time" name="time_scheduled" class="form-control">
			</div>
			
			<div class="form-group">
				<label>Comment</label>
				<textarea name="comment" class="form-control"></textarea>
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="submit" name="late" class="btn btn-primary">Submit</button>
      </div>
	  </form>
    </div>
  </div>
</div>


