<!-- Employee Post Review Modal -->
<div class="modal fade" id="postModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
	 <form action="" method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Publish Review</h4>
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

<!-- Manager Post Review Modal -->
<div class="modal fade" id="postManagerModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
	 <form action="" method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Publish Review</h4>
      </div>
      <div class="modal-body">
	  <p>This will publish the review averages to the managers specified who will each receive a notification email.</p>
			<div class="form-group">
				<label>Managers</label>
				<?php
				$managers = CfaEmployee::getManagers();
				
				foreach($managers as $m)
				{
					//Is it already published to this manager?
					$checked = "";
					
					$result = $porm->read("SELECT * FROM p_review_published WHERE review_time = {$review->review_time} AND employee_id = {$review->employee_id} AND manager_id = {$m->id}", []);
					
					if(count($result))
					{
						$checked = " checked";
					}
					
					print "<div class='form-group'>
						<input type='checkbox' name='manager[{$m->id}]'$checked> {$m->fName} {$m->lName}</div>";
				}
				?>
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="submit" name="post-manager" class="btn btn-primary">Post</button>
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


<!-- Add Question Modal -->
<div class="modal fade" id="questionModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
	 <form action="" method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add a Question</h4>
      </div>
      <div class="modal-body">
	  <p>Add a question that will display on manage's reviews.</p>
			<div class="form-group">
				<label>Review Time</label>
				<select name="review_time" class="form-control">
					<option value="-1">All</option>
					<option value="0">Custom</option>
					<option value="30">30 Day</option>
					<option value="60">60 Day</option>
					<option value="90">90 Day</option>
					<option value="1">1 Year</option>
				</select>
			</div>
			
			<div class="form-group">
				<label>Question Text</label>
				<input type="text" name="question_text" class="form-control">
			</div>
			
			<div class="form-group">
				<label>Developing Answer</label>
				<input type="text" name="developing_text" class="form-control">
			</div>
			
			<div class="form-group">
				<label>Proficient Answer</label>
				<input type="text" name="proficient_text" class="form-control">
			</div>
			
			<div class="form-group">
				<label>Exemplary Answer</label>
				<input type="text" name="exemplary_text" class="form-control">
			</div>
			
			<div class="form-group">
				<label>Short Description</label>
				<input type="text" name="short_desc" class="form-control">
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="submit" name="add" class="btn btn-primary">Add</button>
      </div>
	  </form>
    </div>
  </div>
</div>