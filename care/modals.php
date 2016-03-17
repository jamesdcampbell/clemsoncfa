<!-- New Late Log Modal -->
<div class="modal fade" id="careModal" tabindex="-1" role="dialog" aria-labelledby="requestModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
	 <form action="" method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Customer Issue</h4>
      </div>
      <div class="modal-body">
			<h3>Call Information</h3>
			<div class="form-group">
				<label>Call Taken By</label>
				<input name="call_manager"  class="form-control">
			</div>
			
			<div class="form-group">
				<label>Date of Call</label>
				<input type="date" name="call_date" value="<?=date("Y-m-d");?>" class="form-control">
			</div>
			
			<div class="form-group">
				<label>Time of Call</label>
				<input type="time" name="call_time" class="form-control">
			</div>
			
			<h3>Customer Information</h3>
			<div class="form-group">
				<label>Name</label>
				<input name="cust_name"  class="form-control">
			</div>
			
			<div class="form-group">
				<label>Address</label>
				<input name="cust_address"  class="form-control">
			</div>
			
			<div class="form-group">
				<label>Phone</label>
				<input name="cust_phone"  class="form-control">
			</div>
			
			
			<h3>Issue Information</h3>
			
			<div class="form-group">
				<label>Date of Incident</label>
				<input type="date" name="incident_date" value="<?=date("Y-m-d");?>" class="form-control">
			</div>
			
			<div class="form-group">
				<label>Time of Incident</label>
				<input type="time" name="incident_time" class="form-control">
			</div>
			
			<div class="form-group">
				<label>Employee</label>
				<input name="incident_employee" class="form-control">
			</div>
			
			<div class="form-group">
				<label>Details</label>
				<textarea name="incident_details" class="form-control"></textarea>
			</div>
			
			<div class="form-group">
				<label>Handled</label>
				<textarea name="incident_handled" class="form-control"></textarea>
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


