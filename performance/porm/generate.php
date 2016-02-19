<?php

/*
	Add a Database to the Porm
*/

//Load Config File
require 'config.php';

//Form Submission
if(isset($_POST['db']) && isset($_POST['table']))
{
	print "<hr>";
	$db = $_POST['db'];
	$table = $_POST['table'];
	
	//Connect to Database
	try {
		$con = new PDO($porm_config['pdo_string'], $porm_config['user'], $porm_config['pass']);
	} catch (PDOException $e) {
		die('I died.');
	}	
	
	$table_class = ucFirst($table);
	$code = "class $table_class{\n";
	
	$cres = $con->query("SHOW COLUMNS IN $db.$table");
			
	if($cres)
	{
		$columns = [];
		foreach($cres as $column)
		{
			$name = $column[0];
			$columns[] = '"' . $name . '"';
			$code .= "\tpublic \${$name} = false;\n";
		}
		
		$code .= "\tpublic \$fields = [" . implode(',',  $columns) . "];\n";
		
		$code .= "}\n";
		
		print "<pre>";
		print $code;
		print "</pre>";
		print "<hr>";
	}
			
	else
	{
				print "<p>Could not find $db.$table</i>!</p>";
	}
}

?>

<form method="post">
<p>Generate Class:</p>
<input name="db" placeholder="Database"> . <input name="table" placeholder="Table"> <input type="submit" value="Generate">
</form>