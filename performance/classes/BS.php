<?php

/*
	A Bootstrap class that works with the HTML of Bootstrap
*/

class BS
{
	//Print out a BS alert message
	static function alert($msg, $type)
	{
		print "<div class='col-md-offset-2 alert alert-$type'>$msg</div>";
	}
}

?>