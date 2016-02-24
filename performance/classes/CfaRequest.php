<?php

/*
	The PORM class for custom requests (p_request table)
*/

class CfaRequest{
	public $id = false;
	public $requester_id = false;
	public $employee_id = false;
	public $reason = false;
	public $request_date = false;
	public $fields = ["id","requester_id","employee_id","reason", "request_date"];
}
?>