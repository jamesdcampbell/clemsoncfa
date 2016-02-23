<?php

/*
	A class for generating Bootstrap tables on the fly.
*/

class CfaTable
{
	static function generate($fields, $table_array)
	{
		print "<div class='table-responsive'>";
		print "<table class='table table-striped'>";
		print "<thead><tr>";
		foreach($fields as $field)
		{
			print "<th>$field</th>";
		}
		print"</tr></thead>";
		print "<tbody>";
		foreach($table_array as $row)
		{
			print "<tr>";
			reset($fields);
			foreach($fields as $field2)
			{
				$cell = $row->{$field2};
				print "<td>$cell</td>";
			}
			print "</tr>";
		}
		print "</tbody>";
		print "</table></div>";
	}
}

?>