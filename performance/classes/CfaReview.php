<?php

/*
	The PORM class for the Review table
*/

class CfaReview{
	public $id = false;
	public $manager_id = false;
	public $employee_id = false;
	public $review_time = false;
	public $active = false;
	public $fields = ["id","manager_id","employee_id","review_time","active"];
}

?>