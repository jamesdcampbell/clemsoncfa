<?php

/*
	A class for generating Bootstrap tables on the fly.
*/

class CfaTable
{
	/*
		Generates a Table
		$fields = ["object_prop" => "display_name"]
		$table_array = PDO Table Object
	*/
	static function generate($fields, $table_array)
	{
		print "<div class='table-responsive'>";
		print "<table class='table table-striped'>";
		print "<thead><tr>";
		foreach($fields as $field)
		{
			if(is_array($field))
			{
				$field_name = $field[1];
			}
			
			else
			{
				$field_name = $field;
			}
			print "<th>$field_name</th>";
		}
		print"</tr></thead>";
		print "<tbody>";
		foreach($table_array as $row)
		{
			print "<tr>";
			reset($fields);
			foreach($fields as $field)
			{
				if(is_array($field))
				{
					$prop = $field[0];
				}
				
				else
				{
					$prop = $field;
				}
				
				$cell = $row->{$prop};
				print "<td>$cell</td>";
			}
			print "</tr>";
		}
		print "</tbody>";
		print "</table></div>";
	}
}

?>