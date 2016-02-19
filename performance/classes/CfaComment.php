<?php

class CfaComment{
	public $id = false;
	public $question_id = false;
	public $review_id = false;
	public $creator_id = false;
	public $creator_type = false;
	public $comment_text = false;
	public $comment_date = false;
	public $fields = ["id","review_id",
	"question_id","creator_id","creator_type","comment_text", "comment_date"];
}

?>