<!-- Post Review Modal -->
<div class="modal fade" id="postModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
	 <form action="" method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Post Review</h4>
      </div>
      <div class="modal-body">
	  <p>This will show the review to the employee. Optionally, a rank may be specified so that the employee can see how they compare to others.</p>
			<div class="form-group">
				<label>Show Rank</label>
				<select name="rank" class="form-control">
					<option value="none">None</option>
					<option value="same">Same Type (Front or Back)</option>
					<option value="all">All (Front and Back)</option>
				</select>
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="submit" name="post" class="btn btn-primary">Post</button>
      </div>
	  </form>
    </div>
  </div>
</div>


<!-- Add Note Modal -->
<div class="modal fade" id="noteModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
	 <form action="" method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add a Note</h4>
      </div>
      <div class="modal-body">
	  <p>Add a note for yourself that will display on the review results.</p>
			<div class="form-group">
				<label>Note</label>
				<textarea class="form-control" name="note_text"></textarea>
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="submit" name="note" class="btn btn-primary">Add</button>
      </div>
	  </form>
    </div>
  </div>
</div>