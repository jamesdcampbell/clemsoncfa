<?php blah blah
	/* File: dbConnections.php
	 * Purpose: just has the db connection string	 
	 * Misc: If you include this file in other files that you interact with the databse with
	 * you only have to change this connection string (easier administration)
	 */
	$db = new PDO('mysql:host=localhost;dbname=_cfa','root','');
?>