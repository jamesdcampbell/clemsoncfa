<?php

/*
	A Class for Working with the Questions Table
*/

class CfaQuestion
{
	public $id = false;
	public $question_text = false;
	public $developing_text = false;
	public $proficient_text = false;
	public $exemplary_text = false;
	public $short_desc = false;
	public $review_time = false;
	public $question_order = false;
	public $active = false;
	public $fields = ["id", "question_text","developing_text", "proficient_text", "exemplary_text","short_desc", "review_time","question_order", "active"];
	
	//Fetch Questions
	static function getType($type = "0")
	{
		global $db;
		$sql = "SELECT * FROM p_question WHERE review_time = $type";
		
		$results = $db->query($sql);
		
		//Return Empty Array on Failure
		if($results)
			return $results;
		else
			return [];
	}
	
	//Dsplay a Question (On Admin Forms)
	public function displayQuestion($num)
	{
			//Sanitize Data
			$clean = ["question_text", "developing_text", "proficient_text", "exemplary_text", "short_desc"];
			
			$data = [];
			foreach($clean as $prop)
			{
				$data[$prop] = htmlentities($this->{$prop}, ENT_QUOTES);
			}
			
			//No question 0
			$num++;
			?>
			
			<form action="" method="post" class="form-horizontal">
			<input type="hidden" name="question_id" value="<?=$this->id?>">
			<h3>Question <?=$num?>: <?=$data["short_desc"]?></h3>
			<hr>
			<div class="form-group">
				<label class="col-sm-2">Question Text</label>
				<div class="col-sm-10">
					<input class='form-control' name="question_text" value="<?=$data["question_text"]?>">
				</div>
			</div>

			<div class='form-group'>
				<label class="col-sm-2">Developing: </label>
				<div class="col-sm-10">
					<textarea name='developing_text' class='form-control'><?=$data["developing_text"]?></textarea>
				</div>
			</div>

			<div class='form-group'>
				<label class="col-sm-2">Proficient: </label>
				<div class="col-sm-10">
					<textarea name='proficient_text' class='form-control'><?=$data["proficient_text"]?></textarea>
				</div>
			</div>

			<div class='form-group'>
				<label class="col-sm-2">Exemplary: </label>
				<div class="col-sm-10">
					<textarea name='exemplary_text' class='form-control'><?=$data["exemplary_text"]?></textarea>
				</div>
			</div>

			<div class='form-group'>
				<label class="col-sm-2">Short Description: </label>
				<div class="col-md-5">
					<input type="text" name="short_desc" class="form-control" value="<?=$data["short_desc"]?>">
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2">Action</label>
				<div class="col-sm-10">
					<button class='btn btn-warning' type="submit" name="edit">Edit</button>
					<button class='btn btn-danger' type="submit" name="delete">Delete</button>
				</div>
			</div>
			</form>
			<?php
	}
}
?>