<?php

/*
	This file contains some functions for working with HTML.
*/

//Prints out a Table Cell
function td($args)
{
	print "<td>";
	foreach($args as $arg)
	{
		print $arg;
	}
	print "</td>";
}

//Display Array
function pre($a)
{
	print "<pre>";
	print_r($a);
	print "</pre>";
}

?>