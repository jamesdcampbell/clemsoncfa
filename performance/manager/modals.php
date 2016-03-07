<!-- Request Review Modal -->
<div class="modal fade" id="requestModal" tabindex="-1" role="dialog" aria-labelledby="requestModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
	 <form action="" method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Request a Review</h4>
      </div>
      <div class="modal-body">
			<div class="form-group">
				<label>Employee</label>
				<select name="employee" class="form-control">
				<?php
				$employees = CfaEmployee::getAll();
				
				foreach($employees as $e)
				{
					print "<option value='{$e->id}'>{$e->fName} {$e->lName}</option>";
				}
				?>
				</select>
			</div>
			
			<div class="form-group">
				<label>Reason for Review</label>
				<textarea class="form-control" name="reason"></textarea>
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="submit" name="request" class="btn btn-primary">Submit</button>
      </div>
	  </form>
    </div>
  </div>
</div>


